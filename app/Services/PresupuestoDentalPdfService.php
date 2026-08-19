<?php

namespace App\Services;

use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\GeneradorQrController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ficha_atencionController;
use App\Models\EmpresasConvenios;
use App\Models\FichaAtencion;
use App\Models\LugarAtencion;
use App\Models\OdontogramaPaciente;
use App\Models\Paciente;
use App\Models\PresupuestosDental;
use App\Models\Profesional;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class PresupuestoDentalPdfService
{
    /**
     * Genera o regenera el PDF de un presupuesto dental sin depender
     * del usuario autenticado.
     *
     * @param PresupuestosDental $presupuesto
     * @param callable $odontogramaResolver
     *        Firma esperada:
     *        fn($idPaciente, $idFicha, $idLugar, $idTipoEspecialidad, $idPresupuesto)
     * @param bool|null $urgencia
     * @return array
     */
    public function generar(
        PresupuestosDental $presupuesto,
        callable $odontogramaResolver,
        ?bool $urgencia = null
    ): array {
        $fichaController = new ficha_atencionController();

        /*
        |--------------------------------------------------------------------------
        | CONTEXTO DEL PRESUPUESTO
        |--------------------------------------------------------------------------
        */
        $paciente = Paciente::find($presupuesto->id_paciente);

        if (!$paciente) {
            throw new \RuntimeException('Paciente no encontrado para el presupuesto.');
        }

        $prestacion = OdontogramaPaciente::where('id_presupuesto', $presupuesto->id)
            ->where('presupuesto', 1)
            ->orderByDesc('id')
            ->first();

        $idFicha = $presupuesto->id_ficha_atencion
            ?? optional($prestacion)->id_ficha_atencion;

        $ficha = $idFicha ? FichaAtencion::find($idFicha) : null;

        $idProfesional = $presupuesto->id_profesional
            ?? optional($prestacion)->id_profesional
            ?? optional($ficha)->id_profesional;

        $idLugar = $presupuesto->id_lugar_atencion
            ?? optional($prestacion)->id_lugar_atencion
            ?? optional($ficha)->id_lugar_atencion;

        if (!$idFicha || !$idProfesional || !$idLugar) {
            throw new \RuntimeException(
                'No fue posible determinar ficha, profesional o lugar de atención del presupuesto.'
            );
        }

        $profesional = Profesional::with([
            'TipoEspecialidad',
            'SubTipoEspecialidad',
        ])->find($idProfesional);

        if (!$profesional) {
            throw new \RuntimeException('Profesional no encontrado para el presupuesto.');
        }

        if (empty($profesional->id_tipo_especialidad)) {
            throw new \RuntimeException(
                'El profesional no tiene configurado id_tipo_especialidad.'
            );
        }

        $lugarAtencion = LugarAtencion::with([
            'Direccion.Ciudad.Region',
        ])->find($idLugar);

        if (!$lugarAtencion) {
            throw new \RuntimeException('Lugar de atención no encontrado para el presupuesto.');
        }

        /*
         * Si no se fuerza el tipo desde el controlador, se obtiene desde
         * las prestaciones guardadas en este mismo presupuesto.
         */
        if ($urgencia === null) {
            $urgencia = OdontogramaPaciente::where('id_presupuesto', $presupuesto->id)
                ->where('presupuesto', 1)
                ->where('urgencia', 1)
                ->exists();
        }

        $esPresupuestoUrgencia = (bool) $urgencia;

        /*
        |--------------------------------------------------------------------------
        | DATOS ODONTOGRAMA / FICHA
        |--------------------------------------------------------------------------
        */
        $maxilar_superior_gral_tratamiento =
            $fichaController->dameMaxilarSuperiorGeneralTratamiento(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_superior_gral_diagnostico =
            $fichaController->dameMaxilarSuperiorGeneralDiagnostico(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_inferior_gral_tratamiento =
            $fichaController->dameMaxilarInferiorGeneralTratamiento(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_inferior_gral_diagnostico =
            $fichaController->dameMaxilarInferiorGeneralDiagnostico(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $boca_completa_gral_tratamiento =
            $fichaController->dameBocaCompletaGeneralTratamiento(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $boca_completa_gral_diagnostico =
            $fichaController->dameBocaCompletaGeneralDiagnostico(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_inferior_gral_tratamientos_endo =
            $fichaController->dameMaxilarInferiorGeneralTratamientoEndodoncia(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_inferior_gral_diagnosticos_endo =
            $fichaController->dameMaxilarInferiorGeneralDiagnosticoEndodoncia(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_superior_gral_tratamientos_endo =
            $fichaController->dameMaxilarSuperiorGeneralTratamientoEndodoncia(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $maxilar_superior_gral_diagnosticos_endo =
            $fichaController->dameMaxilarSuperiorGeneralDiagnosticoEndodoncia(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $boca_completa_gral_tratamiento_endo =
            $fichaController->dameCompletaEndoTratamiento(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        $boca_completa_gral_diagnostico_endo =
            $fichaController->dameCompletaEndoDiagnostico(
                $paciente->id,
                $profesional->id_tipo_especialidad,
                $idFicha,
                $profesional->id
            );

        /*
        |--------------------------------------------------------------------------
        | PRESTACIONES DEL PRESUPUESTO
        |--------------------------------------------------------------------------
        */
        $odontograma = $odontogramaResolver(
            $paciente->id,
            $idFicha,
            $idLugar,
            $profesional->id_tipo_especialidad,
            $presupuesto->id
        )
            ->where('presupuesto', 1)
            ->where('urgencia', $esPresupuestoUrgencia ? 1 : 0)
            ->values();

        $insumos = $fichaController->dame_insumos_tratamiento(
            $paciente->id,
            $idFicha
        );

        $insumos = $insumos
            ->where('id_presupuesto', $presupuesto->id)
            ->where('presupuesto', 1)
            ->where('urgencia', $esPresupuestoUrgencia ? 1 : 0)
            ->values();

        /*
        |--------------------------------------------------------------------------
        | CONVENIO / TOTALES
        |--------------------------------------------------------------------------
        */
        $idConvenioReporte = $esPresupuestoUrgencia
            ? $presupuesto->id_convenio_urgencia_aplicado
            : $presupuesto->id_convenio_aplicado;

        $convenioAplicado = null;

        if ($idConvenioReporte) {
            $consultaConvenio = EmpresasConvenios::whereKey($idConvenioReporte)
                ->where('id_profesional', $profesional->id)
                ->where('estado_convenio', 1);

            if ($esPresupuestoUrgencia) {
                $nombrePrevision = trim(
                    (string) optional(optional($paciente)->prevision)->nombre
                );

                $consultaConvenio->whereRaw(
                    'LOWER(TRIM(nombre_convenio)) = ?',
                    [mb_strtolower($nombrePrevision)]
                );
            }

            $convenioAplicado = $consultaConvenio->first();
        }

        $porcentajeDescuento = $convenioAplicado
            ? (float) $convenioAplicado->porcentaje
            : 0;

        $subtotalPiezas = (float) $odontograma->sum('valor');

        $subtotalInsumos = (float) $insumos->sum(function ($insumo) {
            return (float) $insumo->valor * max(1, (int) $insumo->cantidad);
        });

        $subtotalPresupuesto = $subtotalPiezas + $subtotalInsumos;

        $valores_odontograma = [
            0,
            $subtotalPiezas,
            $subtotalInsumos,
            0,
        ];

        $descuentoPresupuesto = (int) round(
            $subtotalPresupuesto * ($porcentajeDescuento / 100)
        );

        $totalPresupuesto = max(
            0,
            (int) round($subtotalPresupuesto) - $descuentoPresupuesto
        );

        /*
        |--------------------------------------------------------------------------
        | QR DOCUMENTO
        |--------------------------------------------------------------------------
        */
        $tipoDocumentoPresupuesto = 27;

        $tempTokenDocumento = CertificadoController::certificadoDocumento(
            $idFicha,
            $profesional->id,
            $paciente->id,
            $tipoDocumentoPresupuesto,
            $presupuesto->id
        );

        if (
            !isset($tempTokenDocumento['estado']) ||
            (int) $tempTokenDocumento['estado'] !== 1
        ) {
            throw new \RuntimeException(
                'No fue posible generar el token de validación del presupuesto.'
            );
        }

        $token_presupuesto = $tempTokenDocumento['certificado'];
        $url_presupuesto = CertificadoController::generarUrlDocumento($token_presupuesto);
        $qr_presupuesto = GeneradorQrController::generar($url_presupuesto);

        /*
        |--------------------------------------------------------------------------
        | QR PROFESIONAL
        |--------------------------------------------------------------------------
        */
        $token_profesional = null;
        $url_profesional = null;
        $qr_profesional = null;

        $codAutoPresupuesto = $presupuesto->cod_auto ?? null;

        if (empty($codAutoPresupuesto)) {
            $codAutoPresupuesto = strtoupper(
                substr(
                    hash(
                        'sha256',
                        $presupuesto->id . '|' .
                        $paciente->id . '|' .
                        $profesional->id . '|' .
                        microtime(true) . '|' .
                        bin2hex(random_bytes(16))
                    ),
                    0,
                    20
                )
            );

            $presupuesto->cod_auto = $codAutoPresupuesto;
            $presupuesto->save();
        }

        $tempTokenProfesional = CertificadoController::certificadoProfesional(
            $profesional->id,
            $codAutoPresupuesto,
            (string) $tipoDocumentoPresupuesto,
            $presupuesto->id
        );

        if (
            isset($tempTokenProfesional['estado']) &&
            (int) $tempTokenProfesional['estado'] === 1
        ) {
            $token_profesional = $tempTokenProfesional['certificado'];
            $url_profesional = CertificadoController::generarUrlProfesional(
                $token_profesional
            );
            $qr_profesional = GeneradorQrController::generar($url_profesional);
        } else {
            Log::warning('No fue posible generar el token profesional del presupuesto.', [
                'id_presupuesto' => $presupuesto->id,
                'id_profesional' => $profesional->id,
                'cod_auto' => $codAutoPresupuesto,
                'respuesta' => $tempTokenProfesional,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | QR FIRMA PACIENTE
        |--------------------------------------------------------------------------
        */
        $token_paciente = null;
        $url_paciente = null;
        $qr_paciente = null;

        if (
            (int) ($presupuesto->firma_paciente_estado ?? 0) === 1 &&
            !empty($presupuesto->firma_paciente_token)
        ) {
            $token_paciente = $presupuesto->firma_paciente_token;

            if (Route::has('presupuesto.validar.firma')) {
                $url_paciente = route(
                    'presupuesto.validar.firma',
                    ['token' => $token_paciente]
                );

                $qr_paciente = GeneradorQrController::generar($url_paciente);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DATOS DE CABECERA / FOOTER
        |--------------------------------------------------------------------------
        */
        $direccionPaciente = '';
        $direccionPacienteModel = $paciente->Direccion()->first();

        if ($direccionPacienteModel) {
            $ciudadPaciente = $direccionPacienteModel->Ciudad()->first();

            $direccionPaciente = trim(
                ($direccionPacienteModel->direccion ?? '') . ' ' .
                ($direccionPacienteModel->numero_dir ?? '') .
                ($ciudadPaciente ? ', ' . $ciudadPaciente->nombre : '')
            );
        }

        $direccionLugar = '';
        $regionLugar = '';
        $comunaLugar = '';

        $direccionLugarModel = $lugarAtencion->Direccion;

        if ($direccionLugarModel) {
            $ciudadLugar = $direccionLugarModel->Ciudad;

            $direccionLugar = trim(
                ($direccionLugarModel->direccion ?? '') . ' ' .
                ($direccionLugarModel->numero_dir ?? '') .
                ($ciudadLugar ? ', ' . $ciudadLugar->nombre : '')
            );

            if ($ciudadLugar) {
                $comunaLugar = $ciudadLugar->nombre ?? '';
                $regionModel = $ciudadLugar->Region;

                if ($regionModel) {
                    $regionLugar = $regionModel->nombre ?? '';
                }
            }
        }

        $especialidadProfesional = '';

        if ($profesional->SubTipoEspecialidad) {
            $especialidadProfesional =
                $profesional->SubTipoEspecialidad->nombre ?? '';
        } elseif ($profesional->TipoEspecialidad) {
            $especialidadProfesional =
                $profesional->TipoEspecialidad->nombre ?? '';
        }

        $array_ficha_atencion = [
            'id' => $presupuesto->id,
            'created_at' => now()->format('d/m/Y'),
            'token' => $token_presupuesto,
            'url' => $url_presupuesto,
            'qr' => $qr_presupuesto,
        ];

        $array_lugar_atencion = [
            'id' => $lugarAtencion->id,
            'nombre' => $lugarAtencion->nombre,
            'direccion' => $direccionLugar,
            'region' => $regionLugar,
            'comuna' => $comunaLugar,
        ];

        $array_profesional = [
            'id' => $profesional->id,
            'nombre' => trim(
                ($profesional->nombre ?? '') . ' ' .
                ($profesional->apellido_uno ?? '') . ' ' .
                ($profesional->apellido_dos ?? '')
            ),
            'rut' => $profesional->rut,
            'especialidad' => $especialidadProfesional,
            'id_especialidad' => $profesional->id_especialidad,
            'id_tipo_especialidad' => $profesional->id_tipo_especialidad,
            'id_sub_tipo_especialidad' => $profesional->id_sub_tipo_especialidad,
            'num_colegio' => $profesional->num_colegio,
            'token' => $token_profesional,
            'url' => $url_profesional,
            'qr' => $qr_profesional,
        ];

        $array_paciente = [
            'id' => $paciente->id,
            'nombre' => trim(
                ($paciente->nombres ?? '') . ' ' .
                ($paciente->apellido_uno ?? '') . ' ' .
                ($paciente->apellido_dos ?? '')
            ),
            'fecha_nac' => $paciente->fecha_nac,
            'rut' => $paciente->rut,
            'sexo' => $paciente->sexo,
            'telefono_uno' => $paciente->telefono_uno,
            'email' => $paciente->email,
            'direccion' => $direccionPaciente,
        ];

        $presupuestoReporte = $presupuesto;

        $datosPDF = compact(
            'array_ficha_atencion',
            'array_lugar_atencion',
            'array_profesional',
            'array_paciente',
            'odontograma',
            'paciente',
            'profesional',
            'lugarAtencion',
            'valores_odontograma',
            'maxilar_superior_gral_tratamiento',
            'maxilar_superior_gral_diagnostico',
            'maxilar_inferior_gral_tratamiento',
            'maxilar_inferior_gral_diagnostico',
            'boca_completa_gral_tratamiento',
            'boca_completa_gral_diagnostico',
            'maxilar_inferior_gral_tratamientos_endo',
            'maxilar_inferior_gral_diagnosticos_endo',
            'maxilar_superior_gral_tratamientos_endo',
            'maxilar_superior_gral_diagnosticos_endo',
            'boca_completa_gral_tratamiento_endo',
            'boca_completa_gral_diagnostico_endo',
            'insumos',
            'presupuestoReporte',
            'convenioAplicado',
            'porcentajeDescuento',
            'subtotalPresupuesto',
            'descuentoPresupuesto',
            'totalPresupuesto',
            'esPresupuestoUrgencia',
            'token_presupuesto',
            'url_presupuesto',
            'qr_presupuesto',
            'token_profesional',
            'url_profesional',
            'qr_profesional',
            'token_paciente',
            'url_paciente',
            'qr_paciente'
        );

        $tituloPDF = $esPresupuestoUrgencia
            ? 'PRESUPUESTO DE URGENCIA ODONTOLÓGICA'
            : 'PRESUPUESTO ODONTOLÓGICO';

        $nombrePDF = (
            $esPresupuestoUrgencia
            ? 'Presupuesto Urgencia '
            : 'Presupuesto Dental '
        )
            . $paciente->rut
            . ' N° '
            . $presupuesto->id
            . ' '
            . date('YmdHi');

        $resultadoPDF = PdfController::generarPDF(
            $tituloPDF,
            $datosPDF,
            $nombrePDF,
            'presupuesto_dental',
            'G',
            $datosPDF
        );

        if (
            !is_object($resultadoPDF) ||
            !isset($resultadoPDF->estado) ||
            (int) $resultadoPDF->estado !== 1 ||
            empty($resultadoPDF->pdf_url)
        ) {
            throw new \RuntimeException(
                'No fue posible guardar el PDF del presupuesto.'
            );
        }

        $presupuesto->pdf_url = $resultadoPDF->pdf_url;
        $presupuesto->save();

        return [
            'estado' => 1,
            'ruta' => $resultadoPDF->pdf_url,
            'pdf' => $resultadoPDF->pdf ?? null,
            'token_documento' => $token_presupuesto,
            'url_validacion_documento' => $url_presupuesto,
            'firma_profesional' => !empty($qr_profesional),
            'firma_paciente' => !empty($qr_paciente),
        ];
    }
}
