<?php

namespace App\Console\Commands;

use App\Models\RestControl;
use App\Services\FirebaseCloudMessaging;
use Illuminate\Console\Command;

class SendRestControlReminders extends Command
{
    protected $signature = 'reposo:enviar-recordatorios';
    protected $description = 'Envía los recordatorios pendientes de control de reposo';

    public function handle(FirebaseCloudMessaging $fcm): int
    {
        $now = now();

        RestControl::where('status', 'active')
            ->whereNotNull('ends_at')->where('ends_at', '<', $now)
            ->update(['status' => 'completed', 'next_reminder_at' => null]);

        RestControl::where('status', 'active')
            ->whereNotNull('next_reminder_at')->where('next_reminder_at', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
            })->orderBy('id')->chunkById(100, function ($controls) use ($fcm) {
                foreach ($controls as $control) {
                    $sent = $fcm->sendRestControlReminder($control);
                    $control->update([
                        'last_reminder_at' => now(),
                        'next_reminder_at' => now()->addHours($control->frequency_hours),
                    ]);
                    $this->line("Control {$control->id}: {$sent} dispositivo(s) notificado(s).");
                }
            });

        return self::SUCCESS;
    }
}
