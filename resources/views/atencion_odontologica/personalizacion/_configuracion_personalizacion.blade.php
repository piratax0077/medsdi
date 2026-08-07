@php
    /*
     * Configuración común para todas las fichas odontológicas.
     *
     * Debe incluirse al comienzo de cada ficha odontológica que necesite
     * respetar la plantilla personalizada del profesional.
     */
    $configuracionFichaDental = $plantilla
        ?? ($plantillaFicha
        ?? ($configuracionFicha
        ?? null));

    if (
        empty($configuracionFichaDental)
        && isset($profesional)
        && !empty($profesional->id)
    ) {
        $consultaPlantillaDental = \App\Models\PlantillaFichaMedica::with([
                'secciones' => function ($query) {
                    $query->orderBy('orden');
                },
                'secciones.campos' => function ($query) {
                    $query->orderBy('orden');
                },
                'secciones.subsecciones' => function ($query) {
                    $query->orderBy('orden');
                },
                'secciones.subsecciones.campos' => function ($query) {
                    $query->orderBy('orden');
                },
            ])
            ->where('id_profesional', $profesional->id)
            ->where('id_especialidad', (int) ($profesional->id_especialidad ?? 0))
            ->where('id_tipo_especialidad', (int) ($profesional->id_tipo_especialidad ?? 0))
            ->where('id_sub_tipo_especialidad', (int) ($profesional->id_sub_tipo_especialidad ?? 0))
            ->where('activa', 1);

        $configuracionFichaDental = $consultaPlantillaDental
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->first();
    }

    $seccionesPersonalizadasDental = data_get(
        $configuracionFichaDental,
        'secciones',
        []
    );

    if (is_string($seccionesPersonalizadasDental)) {
        $seccionesPersonalizadasDental =
            json_decode($seccionesPersonalizadasDental, true) ?: [];
    } elseif (
        $seccionesPersonalizadasDental instanceof
        \Illuminate\Support\Collection
    ) {
        $seccionesPersonalizadasDental =
            $seccionesPersonalizadasDental->toArray();
    } elseif (is_object($seccionesPersonalizadasDental)) {
        $seccionesPersonalizadasDental = json_decode(
            json_encode($seccionesPersonalizadasDental),
            true
        ) ?: [];
    }

    $normalizarCodigoFichaDental = static function ($valor) {
        return \Illuminate\Support\Str::slug((string) $valor, '_');
    };

    $buscarSeccionFichaDental = static function (array $alias) use (
        $seccionesPersonalizadasDental,
        $normalizarCodigoFichaDental
    ) {
        if (empty($seccionesPersonalizadasDental)) {
            return null;
        }

        $aliasNormalizados = collect($alias)
            ->map($normalizarCodigoFichaDental)
            ->filter()
            ->values()
            ->all();

        foreach ($seccionesPersonalizadasDental as $seccion) {
            $codigo = $normalizarCodigoFichaDental(
                data_get($seccion, 'codigo', '')
            );
            $nombre = $normalizarCodigoFichaDental(
                data_get($seccion, 'nombre', '')
            );

            if (
                in_array($codigo, $aliasNormalizados, true)
                || in_array($nombre, $aliasNormalizados, true)
            ) {
                return $seccion;
            }
        }

        return null;
    };

    $seccionVisibleFichaDental = static function (
        array $alias,
        bool $predeterminado = true
    ) use (
        $buscarSeccionFichaDental,
        $seccionesPersonalizadasDental
    ) {
        if (empty($seccionesPersonalizadasDental)) {
            return $predeterminado;
        }

        $seccion = $buscarSeccionFichaDental($alias);

        if ($seccion === null) {
            return $predeterminado;
        }

        if (
            (bool) data_get(
                $seccion,
                'obligatoria',
                data_get($seccion, 'obligatorio', false)
            )
        ) {
            return true;
        }

        return filter_var(
            data_get($seccion, 'visible', true),
            FILTER_VALIDATE_BOOLEAN
        );
    };

    $subseccionVisibleFichaDental = static function (
        array $aliasSeccion,
        array $aliasSubseccion,
        bool $predeterminado = true
    ) use (
        $buscarSeccionFichaDental,
        $normalizarCodigoFichaDental
    ) {
        $seccion = $buscarSeccionFichaDental($aliasSeccion);

        if ($seccion === null) {
            return $predeterminado;
        }

        $subsecciones = data_get($seccion, 'subsecciones', []);

        if ($subsecciones instanceof \Illuminate\Support\Collection) {
            $subsecciones = $subsecciones->toArray();
        } elseif (is_object($subsecciones)) {
            $subsecciones = json_decode(
                json_encode($subsecciones),
                true
            ) ?: [];
        }

        if (empty($subsecciones)) {
            return $predeterminado;
        }

        $aliasNormalizados = collect($aliasSubseccion)
            ->map($normalizarCodigoFichaDental)
            ->filter()
            ->values()
            ->all();

        foreach ($subsecciones as $subseccion) {
            $codigo = $normalizarCodigoFichaDental(
                data_get($subseccion, 'codigo', '')
            );
            $nombre = $normalizarCodigoFichaDental(
                data_get($subseccion, 'nombre', '')
            );

            if (
                in_array($codigo, $aliasNormalizados, true)
                || in_array($nombre, $aliasNormalizados, true)
            ) {
                return filter_var(
                    data_get($subseccion, 'visible', true),
                    FILTER_VALIDATE_BOOLEAN
                );
            }
        }

        return $predeterminado;
    };

    /*
     * Alias temporales para otras vistas odontológicas antiguas que todavía
     * utilicen los nombres previos. Esto evita romperlas durante la migración.
     */
    $configuracionFichaOdontologica = $configuracionFichaDental;
    $seccionesPersonalizadasOdonto = $seccionesPersonalizadasDental;
    $normalizarCodigoFichaOdonto = $normalizarCodigoFichaDental;
    $buscarSeccionFichaOdonto = $buscarSeccionFichaDental;
    $seccionVisibleFichaOdonto = $seccionVisibleFichaDental;
@endphp
