<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPdfUrlToExamenesBiopsiaTable extends Migration
{
    public function up()
    {
        Schema::table('examenes_biopsia', function (Blueprint $table) {
            $table->string('pdf_url')->nullable()->after('observaciones');
        });
    }

    public function down()
    {
        Schema::table('examenes_biopsia', function (Blueprint $table) {
            $table->dropColumn('pdf_url');
        });
    }
}
