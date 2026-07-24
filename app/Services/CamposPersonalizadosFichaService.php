<?php

namespace App\Services;

use App\Models\FichaCampoPersonalizado;
use App\Models\PlantillaFichaMedica;

class CamposPersonalizadosFichaService
{
    public function guardar(
        $profesional,
        string $tipoFicha,
        int $idFicha,
        array $valoresEnviados
    ): void {
        if (!$profesional) {
            return;
        }

        $plantilla = $this->obtenerPlantillaActiva($profesional);

        if (!$plantilla) {
            return;
        }

        foreach ($plantilla->secciones as $seccion) {
            if (!(bool) $seccion->personalizada || !(bool) $seccion->visible) {
                continue;
            }

            foreach ($seccion->subsecciones as $subseccion) {
                $idSubseccion = (string) $subseccion->id;

                if (
                    !(bool) $subseccion->visible
                    || !array_key_exists($idSubseccion, $valoresEnviados)
                ) {
                    continue;
                }

                $valor = $valoresEnviados[$idSubseccion];

                if (is_array($valor) || is_object($valor)) {
                    continue;
                }

                FichaCampoPersonalizado::updateOrCreate(
                    [
                        'tipo_ficha' => $tipoFicha,
                        'id_ficha' => $idFicha,
                        'id_plantilla_subseccion' => $subseccion->id,
                    ],
                    [
                        'seccion_codigo' => $seccion->codigo,
                        'seccion_nombre' => $seccion->nombre,
                        'subseccion_codigo' => $subseccion->codigo,
                        'subseccion_nombre' => $subseccion->nombre,
                        'tipo' => $subseccion->tipo ?: 'textarea',
                        'valor' => (string) $valor,
                    ]
                );
            }
        }
    }

    private function obtenerPlantillaActiva($profesional)
    {
        $query = PlantillaFichaMedica::with([
            'secciones.subsecciones',
        ])->where('id_profesional', $profesional->id)
            ->where('id_especialidad', $profesional->id_especialidad)
            ->where('id_tipo_especialidad', $profesional->id_tipo_especialidad);

        if (!empty($profesional->id_sub_tipo_especialidad)) {
            $query->where(
                'id_sub_tipo_especialidad',
                $profesional->id_sub_tipo_especialidad
            );
        } else {
            $query->whereNull('id_sub_tipo_especialidad');
        }

        return $query->where('activa', 1)->first();
    }
}
