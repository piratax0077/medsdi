@extends('template.profesional.template')

@php
    /* Datos oficiales del profesional. Se usa optional() para que la vista
       nunca falle si algun dato no existe. Solo lectura, no se editan aqui. */
    $msNombre    = trim((optional($profesional)->nombre ?? '') . ' ' . (optional($profesional)->apellido_uno ?? '') . ' ' . (optional($profesional)->apellido_dos ?? ''));
    $msRut       = optional($profesional)->rut ?? '';
    $msRegistro  = optional($profesional)->registro_sis ?? (optional($profesional)->n_registro ?? '');
    $msColegio   = optional($profesional)->registro_colegio ?? '';

    /* Especialidad registrada del profesional. Define el conjunto rápido que
       se ofrece en «Campos y estructura». Si no se puede determinar, se usa
       Medicina General como base. */
    $msEspecialidad = optional(optional($profesional)->especialidad)->nombre
        ?? (optional(optional($profesional)->tipo_especialidad)->nombre ?? 'Medicina General');
@endphp

@section('page-styles')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=IBM+Plex+Sans:wght@400;600;700&family=Montserrat:wght@400;600;700;800&family=Lato:wght@400;700;900&family=Open+Sans:wght@400;600;700;800&display=swap">
    <style>

        #medstudio {
            --ms-primario: #1a49a3;
            --ms-texto: #2b2f3a;
            --ms-suave: #8b93a7;
            --ms-borde: #e6eaf1;
            --ms-fondo: #f4f6fa;
            --ms-blanco: #fff;
        }

        /* ---------- Barra superior ---------- */
        #medstudio .ms-topbar {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            background: var(--ms-blanco);
            border: 1px solid var(--ms-borde);
            border-radius: 14px;
            padding: 12px 16px;
            margin-bottom: 16px;
            box-shadow: 0 2px 10px rgba(30, 40, 80, .05);
        }
        #medstudio .ms-topbar-label {
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            color: var(--ms-suave);
            white-space: nowrap;
        }
        #medstudio .ms-topbar-doc { min-width: 260px; flex: 1 1 260px; }
        #medstudio .ms-topbar-acciones { display: flex; align-items: center; gap: 8px; margin-left: auto; }
        #medstudio .ms-guardado {
            font-size: .74rem;
            color: #72B02C;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }
        #medstudio .ms-icon-btn {
            width: 34px; height: 34px;
            border-radius: 9px;
            border: 1px solid var(--ms-borde);
            background: var(--ms-blanco);
            color: #5f6b7a;
            display: inline-flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: all .15s ease;
        }
        #medstudio .ms-icon-btn:hover:not(:disabled) { background: #eef2f8; color: var(--ms-texto); }
        #medstudio .ms-icon-btn:disabled { opacity: .38; cursor: default; }

        /* ---------- Espacio de trabajo ---------- */
        #medstudio .ms-workspace { display: flex; align-items: flex-start; gap: 18px; }
        #medstudio .ms-panel { width: 390px; min-width: 390px; }
        #medstudio .ms-canvas-wrap { flex: 1; min-width: 0; position: sticky; top: 96px; }

        /* ---------- Acordeon ---------- */
        #medstudio .ms-seccion {
            background: var(--ms-blanco);
            border: 1px solid var(--ms-borde);
            border-radius: 12px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        #medstudio .ms-seccion-head {
            display: flex; align-items: center; gap: 11px;
            padding: 13px 15px;
            cursor: pointer;
            user-select: none;
            transition: background .15s ease;
        }
        #medstudio .ms-seccion-head:hover { background: #f8fafc; }
        #medstudio .ms-seccion-ico {
            width: 32px; height: 32px; min-width: 32px;
            border-radius: 9px;
            background: rgba(26, 73, 163, .09);
            color: var(--ms-primario);
            display: flex; align-items: center; justify-content: center;
            font-size: .95rem;
        }
        #medstudio .ms-seccion-txt { flex: 1; min-width: 0; }
        #medstudio .ms-seccion-nombre { font-size: .88rem; font-weight: 700; color: var(--ms-texto); line-height: 1.3; }
        #medstudio .ms-seccion-resumen {
            font-size: .73rem; color: var(--ms-suave); line-height: 1.3;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        #medstudio .ms-seccion-chev { color: #b6bfd0; transition: transform .18s ease; font-size: .85rem; }
        #medstudio .ms-seccion.abierta .ms-seccion-chev { transform: rotate(180deg); }
        #medstudio .ms-seccion-body { display: none; padding: 4px 15px 16px; border-top: 1px solid #f0f3f8; }
        #medstudio .ms-seccion.abierta .ms-seccion-body { display: block; }

        #medstudio .ms-grupo { margin-top: 14px; }
        #medstudio .ms-lbl {
            display: block;
            font-size: .7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .04em;
            color: var(--ms-suave); margin-bottom: 6px;
        }
        #medstudio .ms-ayuda { font-size: .72rem; color: var(--ms-suave); margin-top: 6px; line-height: 1.4; }

        /* ---------- Datos oficiales ---------- */
        #medstudio .ms-oficial {
            background: #f2f6fd;
            border: 1px solid #dde6f5;
            border-radius: 11px;
            padding: 14px;
        }
        #medstudio .ms-oficial-top {
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 11px; padding-bottom: 9px;
            border-bottom: 1px solid #e2eaf7;
        }
        #medstudio .ms-oficial-top strong {
            font-size: .7rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: .05em;
            color: #46536b;
        }
        #medstudio .ms-badge-ok {
            margin-left: auto;
            font-size: .66rem; font-weight: 700;
            color: #2f8f4e; background: rgba(114, 176, 44, .14);
            padding: 3px 8px; border-radius: 20px;
        }
        #medstudio .ms-oficial-fila { display: flex; gap: 10px; padding: 5px 0; font-size: .82rem; }
        #medstudio .ms-oficial-fila span { color: var(--ms-suave); min-width: 96px; }
        #medstudio .ms-oficial-fila b { color: var(--ms-texto); font-weight: 600; }
        #medstudio .ms-oficial-pie { margin-top: 10px; padding-top: 9px; border-top: 1px solid #e2eaf7; font-size: .73rem; color: var(--ms-suave); }
        #medstudio .ms-oficial-pie a { color: var(--ms-primario); font-weight: 600; }

        /* ---------- Paletas ---------- */
        #medstudio .ms-paletas { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; }
        #medstudio .ms-paleta {
            border: 2px solid transparent;
            border-radius: 9px; padding: 4px; cursor: pointer;
            background: #f7f9fc; transition: all .15s ease;
        }
        #medstudio .ms-paleta:hover { background: #eef2f8; }
        #medstudio .ms-paleta.activa { border-color: var(--ms-primario); background: #fff; }
        #medstudio .ms-paleta-mini {
            height: 42px; border-radius: 5px; background: #fff;
            border: 1px solid #e4e9f2; overflow: hidden;
            display: flex; flex-direction: column;
        }
        #medstudio .ms-paleta-mini i { display: block; height: 5px; width: 100%; }
        #medstudio .ms-paleta-mini u { display: block; height: 2px; margin: 4px 5px 0; border-radius: 2px; text-decoration: none; }
        #medstudio .ms-paleta-nom { font-size: .62rem; text-align: center; color: #6b7688; margin-top: 4px; line-height: 1.2; }

        /* ---------- Tipografias ---------- */
        #medstudio .ms-fuente {
            border: 1px solid var(--ms-borde);
            border-radius: 9px; padding: 9px 11px;
            cursor: pointer; margin-bottom: 6px;
            transition: all .15s ease;
        }
        #medstudio .ms-fuente:hover { background: #f8fafc; }
        #medstudio .ms-fuente.activa { border-color: var(--ms-primario); background: #f5f8ff; }
        #medstudio .ms-fuente-nom { font-size: .68rem; color: var(--ms-suave); text-transform: uppercase; letter-spacing: .04em; }
        #medstudio .ms-fuente-demo { font-size: .92rem; font-weight: 700; color: var(--ms-texto); line-height: 1.35; }

        /* ---------- Botonera segmentada ---------- */
        #medstudio .ms-seg { display: flex; gap: 4px; background: #eef2f7; padding: 4px; border-radius: 9px; }
        #medstudio .ms-seg button {
            flex: 1; border: none; background: transparent;
            padding: 6px 4px; border-radius: 7px;
            font-size: .76rem; font-weight: 600; color: #6b7688;
            cursor: pointer; transition: all .15s ease;
        }
        #medstudio .ms-seg button.activo { background: #fff; color: var(--ms-primario); box-shadow: 0 1px 4px rgba(30, 40, 80, .1); }

        /* ---------- Fichas activables ---------- */
        #medstudio .ms-chips { display: flex; flex-wrap: wrap; gap: 6px; }
        #medstudio .ms-chip {
            border: 1px dashed #c9d3e2; background: #fff;
            border-radius: 20px; padding: 5px 11px;
            font-size: .74rem; color: #6b7688; cursor: pointer;
            transition: all .15s ease;
        }
        #medstudio .ms-chip:hover { border-color: var(--ms-primario); color: var(--ms-primario); }
        #medstudio .ms-activos { margin-top: 10px; }
        #medstudio .ms-activo-fila {
            display: flex; align-items: center; gap: 7px;
            background: #f7f9fc; border: 1px solid #eaeef5;
            border-radius: 8px; padding: 6px 8px; margin-bottom: 5px;
        }
        #medstudio .ms-activo-fila .ms-mover { color: #b6bfd0; cursor: grab; font-size: .8rem; }
        #medstudio .ms-activo-fila .ms-nom { font-size: .76rem; font-weight: 600; color: var(--ms-texto); min-width: 74px; }
        #medstudio .ms-activo-fila input.form-control,
        #medstudio .ms-activo-fila select.form-control { height: 28px; font-size: .76rem; padding: 3px 8px; }
        #medstudio .ms-quitar { border: none; background: transparent; color: #c2ccdb; cursor: pointer; font-size: .85rem; padding: 0 2px; }
        #medstudio .ms-quitar:hover { color: #ff5252; }
        #medstudio .ms-contador { font-size: .72rem; margin-top: 8px; }
        #medstudio .ms-contador.ok { color: #72B02C; }
        #medstudio .ms-contador.medio { color: #d99a2b; }
        #medstudio .ms-contador.alto { color: #ff5252; }

        /* ---------- Editor de bloques ---------- */
        #medstudio .ms-bloque { border: 1px solid var(--ms-borde); border-radius: 9px; margin-bottom: 7px; background: #fff; }
        #medstudio .ms-bloque-top {
            display: flex; align-items: center; gap: 6px;
            padding: 6px 9px; background: #f7f9fc;
            border-bottom: 1px solid #eef1f6; border-radius: 9px 9px 0 0;
        }
        #medstudio .ms-bloque-top i.tipo { color: var(--ms-primario); font-size: .78rem; }
        #medstudio .ms-bloque-top span { font-size: .72rem; font-weight: 700; color: #5f6b7a; flex: 1; }
        #medstudio .ms-bloque-body { padding: 8px 9px; }
        #medstudio .ms-bloque-body .form-control { font-size: .76rem; height: auto; padding: 5px 8px; }
        #medstudio .ms-bloque-body textarea.form-control { line-height: 1.45; }
        #medstudio .ms-bloque-item { display: flex; align-items: center; gap: 5px; margin-bottom: 5px; }
        #medstudio .ms-bloque-vacio { text-align: center; padding: 16px 10px; color: var(--ms-suave); font-size: .78rem; }

        /* ---------- Zona de carga ---------- */
        #medstudio .ms-drop {
            border: 2px dashed #c9d3e2; border-radius: 11px;
            background: #f8fafd; padding: 20px 14px; text-align: center;
            cursor: pointer; transition: all .15s ease;
        }
        #medstudio .ms-drop:hover, #medstudio .ms-drop.sobre { border-color: var(--ms-primario); background: #f2f6fd; }
        #medstudio .ms-drop i { font-size: 1.5rem; color: #9aa8bf; display: block; margin-bottom: 6px; }
        #medstudio .ms-drop-txt { font-size: .8rem; color: #58647a; font-weight: 600; }
        #medstudio .ms-drop-hint { font-size: .7rem; color: var(--ms-suave); margin-top: 3px; }
        #medstudio .ms-preview-img {
            display: flex; align-items: center; gap: 10px;
            background: #f7f9fc; border: 1px solid var(--ms-borde);
            border-radius: 10px; padding: 9px;
        }
        #medstudio .ms-preview-img img { max-width: 54px; max-height: 40px; object-fit: contain; }
        #medstudio .ms-preview-img .ms-info { flex: 1; min-width: 0; font-size: .72rem; color: var(--ms-suave); }

        /* ---------- Selector 9 puntos ---------- */
        #medstudio .ms-pos9 { display: grid; grid-template-columns: repeat(3, 26px); gap: 3px; }
        #medstudio .ms-pos9 button {
            width: 26px; height: 26px; padding: 0;
            border: 1px solid var(--ms-borde); background: #fff;
            border-radius: 5px; cursor: pointer; transition: all .15s ease;
        }
        #medstudio .ms-pos9 button:hover { background: #eef2f8; }
        #medstudio .ms-pos9 button.activo { background: var(--ms-primario); border-color: var(--ms-primario); }

        /* ---------- Lienzo ---------- */
        #medstudio .ms-canvas {
            background: #eef1f6; border: 1px solid var(--ms-borde);
            border-radius: 14px; padding: 26px 20px;
            display: flex; align-items: flex-start; justify-content: center;
            overflow: auto; max-height: calc(100vh - 230px);
        }
        #medstudio .ms-canvas-barra {
            display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
            margin-top: 10px; padding: 9px 12px;
            background: #fff; border: 1px solid var(--ms-borde); border-radius: 11px;
        }
        #medstudio .ms-zoom-val { font-size: .74rem; color: #6b7688; min-width: 42px; text-align: center; font-weight: 600; }
        #medstudio .ms-toggle {
            border: 1px solid var(--ms-borde); background: #fff;
            border-radius: 8px; padding: 5px 10px;
            font-size: .74rem; color: #6b7688; cursor: pointer; transition: all .15s ease;
        }
        #medstudio .ms-toggle:hover { background: #f2f5fa; }
        #medstudio .ms-toggle.activo { background: var(--ms-primario); border-color: var(--ms-primario); color: #fff; }

        /* ---------- EL DOCUMENTO (A5 · 14 x 21 cm · 3px por mm) ---------- */
        #medstudio .ms-paper-outer { transform-origin: top center; transition: transform .18s ease; }
        #medstudio .ms-paper {
            width: 420px;      /* 140 mm */
            height: 630px;     /* 210 mm */
            background: #fff;
            box-shadow: 0 10px 34px rgba(30, 40, 80, .17);
            border-radius: 2px;
            position: relative;
            overflow: hidden;
            padding: 24px 26px 20px;
            display: flex; flex-direction: column;
            font-family: 'Inter', sans-serif;
            color: #222;
        }
        #medstudio .ms-paper.gris { filter: grayscale(1) contrast(.95); }

        /* Guias de impresion */
        #medstudio .ms-guias { position: absolute; inset: 0; pointer-events: none; display: none; z-index: 6; }
        #medstudio .ms-paper.con-guias .ms-guias { display: block; }
        #medstudio .ms-guias .g-sangrado { position: absolute; inset: 9px; border: 1px dashed rgba(255, 82, 82, .55); }
        #medstudio .ms-guias .g-seguro { position: absolute; inset: 24px; border: 1px dashed rgba(70, 128, 255, .5); }

        /* Zonas clicables */
        #medstudio .ms-zona { position: relative; cursor: pointer; border-radius: 3px; }
        #medstudio .ms-zona:hover { outline: 1px dashed rgba(26, 73, 163, .4); outline-offset: 2px; }
        #medstudio .ms-zona.ms-pulso { animation: msPulso .5s ease; }
        @keyframes msPulso {
            0%   { box-shadow: 0 0 0 0 rgba(26, 73, 163, .35); }
            100% { box-shadow: 0 0 0 9px rgba(26, 73, 163, 0); }
        }

        /* Encabezado del documento */
        #medstudio .ms-doc-head { display: flex; align-items: center; gap: 12px; }
        #medstudio .ms-doc-head.der { flex-direction: row-reverse; }
        #medstudio .ms-doc-head.centro { flex-direction: column; align-items: center; text-align: center; }
        #medstudio .ms-doc-logo { flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
        #medstudio .ms-doc-logo img { display: block; object-fit: contain; }
        #medstudio .ms-doc-logo.s img { max-width: 44px;  max-height: 44px; }
        #medstudio .ms-doc-logo.m img { max-width: 62px;  max-height: 62px; }
        #medstudio .ms-doc-logo.l img { max-width: 84px;  max-height: 84px; }
        #medstudio .ms-doc-logo-vacio {
            width: 56px; height: 56px; border: 1px dashed #d5dbe6; border-radius: 6px;
            display: flex; align-items: center; justify-content: center;
            color: #c9d1de; font-size: .95rem;
        }
        #medstudio .ms-doc-ident { min-width: 0; flex: 1; }
        #medstudio .ms-doc-nombre { font-weight: 800; line-height: 1.2; }
        #medstudio .ms-doc-esp { line-height: 1.3; }
        #medstudio .ms-doc-datos { line-height: 1.45; color: #4a4a4a; }
        #medstudio .ms-etiqueta-esq {
            position: absolute; top: 0; left: 0;
            padding: 4px 16px 5px 26px;
            border-bottom-right-radius: 16px;
            font-size: 7px; font-weight: 700; letter-spacing: .12em;
            text-transform: uppercase; color: #fff;
        }

        /* Banda separadora */
        #medstudio .ms-doc-banda { height: 5px; border-radius: 2px; margin: 10px 0 12px; }

        /* Campos del paciente */
        #medstudio .ms-doc-campos { display: flex; flex-wrap: wrap; gap: 4px 12px; }
        #medstudio .ms-doc-campo { display: flex; align-items: flex-end; gap: 4px; min-height: 21px; }
        #medstudio .ms-doc-campo.full { flex: 0 0 100%; }
        #medstudio .ms-doc-campo.half { flex: 1 1 calc(50% - 6px); }
        #medstudio .ms-doc-campo label { margin: 0; white-space: nowrap; color: #444; }
        #medstudio .ms-doc-linea { flex: 1; min-width: 26px; }
        #medstudio .ms-doc-linea.continua { border-bottom: 1px solid #9aa2b0; }
        #medstudio .ms-doc-linea.punteada { border-bottom: 1px dotted #9aa2b0; }
        #medstudio .ms-doc-linea.caja { border: 1px solid #d8dde6; border-radius: 3px; height: 15px; }

        /* Titulo del documento */
        #medstudio .ms-doc-titulo {
            text-align: center;
            font-weight: 800;
            letter-spacing: .06em;
            text-transform: uppercase;
            margin: 2px 0 12px;
            line-height: 1.25;
        }
        #medstudio .ms-doc-titulo.izq { text-align: left; }
        #medstudio .ms-doc-titulo.der { text-align: right; }
        #medstudio .ms-doc-titulo .sub {
            display: block;
            font-weight: 600;
            letter-spacing: .02em;
            text-transform: none;
            color: #666;
            margin-top: 2px;
        }

        /* Rp. y area de escritura */
        #medstudio .ms-doc-rp { font-weight: 700; margin: 14px 0 0; }
        #medstudio .ms-doc-rp.centro { text-align: center; }
        #medstudio .ms-doc-area { flex: 1; position: relative; min-height: 40px; }

        /* ---- Cuerpo del documento: bloques ---- */
        #medstudio .ms-doc-cuerpo { position: relative; z-index: 1; padding-top: 4px; --ms-sep: 7px; }
        #medstudio .ms-b { margin-bottom: var(--ms-sep, 7px); }
        #medstudio .ms-b:last-child { margin-bottom: 0; }
        #medstudio .ms-b-parrafo { line-height: 1.85; color: #333; }
        #medstudio .ms-b-parrafo .hueco {
            display: inline-block;
            border-bottom: 1px solid #9aa2b0;
            min-width: 52px;
            margin: 0 3px;
        }
        #medstudio .ms-b-subtitulo { font-weight: 700; margin-bottom: 5px; }
        #medstudio .ms-b-campos { display: flex; flex-wrap: wrap; gap: 4px 12px; }
        #medstudio .ms-b-lineas .ln { border-bottom: 1px solid #9aa2b0; margin-top: 15px; }
        #medstudio .ms-b-lineas.punteada .ln { border-bottom-style: dotted; }
        #medstudio .ms-b-tabla { width: 100%; border-collapse: collapse; }
        #medstudio .ms-b-tabla th, #medstudio .ms-b-tabla td {
            border: 1px solid #b9c1cd;
            padding: 4px 5px;
            text-align: center;
            line-height: 1.3;
        }
        #medstudio .ms-b-tabla th { background: #f1f4f8; font-weight: 700; }
        #medstudio .ms-b-tabla td.rot { background: #f7f9fc; font-weight: 700; text-align: left; }

        /* QR flotante dentro del area */
        #medstudio .ms-doc-qr-flot { position: absolute; z-index: 2; background: #fff; padding: 2px; line-height: 0; }
        #medstudio .ms-doc-qr-flot img, #medstudio .ms-doc-qr-flot canvas { display: block; }
        #medstudio .ms-doc-qr-head { margin-left: auto; background: #fff; line-height: 0; }
        #medstudio .ms-doc-qr-head img, #medstudio .ms-doc-qr-head canvas { display: block; }
        #medstudio .ms-doc-qr-pie { line-height: 0; background: #fff; }
        #medstudio .ms-doc-qr-pie img, #medstudio .ms-doc-qr-pie canvas { display: block; }
        #medstudio .ms-qr-cap { font-size: 6px; text-align: center; color: #666; margin-top: 2px; line-height: 1.2; }

        /* Marca de agua */
        #medstudio .ms-doc-marca { position: absolute; inset: 0; pointer-events: none; display: flex; z-index: 0; }
        #medstudio .ms-doc-marca img { object-fit: contain; }
        #medstudio .ms-doc-marca.s img { max-width: 38%; max-height: 38%; }
        #medstudio .ms-doc-marca.m img { max-width: 58%; max-height: 58%; }
        #medstudio .ms-doc-marca.l img { max-width: 82%; max-height: 82%; }

        /* Pie */
        #medstudio .ms-doc-pie { display: flex; align-items: flex-end; gap: 18px; margin-top: 8px; }
        #medstudio .ms-doc-pie.der { justify-content: flex-end; }
        #medstudio .ms-doc-pie.centro { justify-content: center; }
        #medstudio .ms-doc-firma { text-align: center; min-width: 130px; }
        #medstudio .ms-doc-firma .l { border-bottom: 1px solid #9aa2b0; }
        #medstudio .ms-doc-firma .t { color: #666; margin-top: 3px; }
        #medstudio .ms-doc-pie.amplio .ms-doc-firma .l { margin-top: 44px; }

        /* Barra inferior */
        #medstudio .ms-doc-barra {
            display: flex; align-items: center; gap: 10px;
            margin: 12px -26px -20px; padding: 9px 26px;
            color: #fff;
        }
        #medstudio .ms-doc-barra .qr { background: #fff; padding: 3px; border-radius: 3px; line-height: 0; }
        #medstudio .ms-doc-barra .qr img, #medstudio .ms-doc-barra .qr canvas { display: block; width: 42px; height: 42px; }
        #medstudio .ms-doc-barra .cont { flex: 1; min-width: 0; line-height: 1.5; }
        #medstudio .ms-doc-barra .cont.izq { text-align: left; }
        #medstudio .ms-doc-barra .cont.centro { text-align: center; }
        #medstudio .ms-doc-barra .cont.der { text-align: right; }
        #medstudio .ms-barra-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px 14px;
            text-align: left;
        }
        #medstudio .ms-barra-cols span { display: block; }

        /* ---------- Historial ---------- */
        #medstudio .ms-hist { display: flex; gap: 12px; flex-wrap: wrap; }
        #medstudio .ms-hist-card {
            width: 168px; background: #fff;
            border: 1px solid var(--ms-borde); border-radius: 11px;
            overflow: hidden; transition: all .15s ease;
        }
        #medstudio .ms-hist-card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(30, 40, 80, .1); }
        #medstudio .ms-hist-thumb { height: 112px; background: #eef1f6; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        #medstudio .ms-hist-thumb img { max-width: 100%; max-height: 100%; object-fit: contain; }
        #medstudio .ms-hist-info { padding: 9px 10px; }
        #medstudio .ms-hist-nom { font-size: .78rem; font-weight: 700; color: var(--ms-texto); line-height: 1.25; }
        #medstudio .ms-hist-meta { font-size: .68rem; color: var(--ms-suave); margin-top: 2px; }
        #medstudio .ms-hist-acc { display: flex; gap: 4px; padding: 0 8px 9px; }
        #medstudio .ms-hist-acc button { flex: 1; font-size: .68rem; padding: 4px 2px; border-radius: 6px; border: 1px solid var(--ms-borde); background: #fff; color: #6b7688; cursor: pointer; }
        #medstudio .ms-hist-acc button:hover { background: #f2f5fa; color: var(--ms-texto); }

        #medstudio .ms-vacio { text-align: center; padding: 26px 16px; color: var(--ms-suave); }
        #medstudio .ms-vacio i { font-size: 1.7rem; color: #c9d1de; display: block; margin-bottom: 8px; }
        #medstudio .ms-vacio p { font-size: .8rem; margin: 0; }

        /* ---------- Preflight ---------- */
        #medstudio .ms-check { display: flex; align-items: flex-start; gap: 8px; font-size: .78rem; padding: 5px 0; line-height: 1.4; }
        #medstudio .ms-check.ok i { color: #72B02C; }
        #medstudio .ms-check.warn i { color: #d99a2b; }

        /* ---------- Aviso de escritorio ---------- */
        #medstudio .ms-aviso-movil { display: none; }

        /* ===================== RESPONSIVE ===================== */

        /* Notebook */
        @media (max-width: 1399.98px) {
            #medstudio .ms-panel { width: 340px; min-width: 340px; }
        }

        /* Tablet horizontal y menor: el lienzo pasa arriba y los controles abajo */
        @media (max-width: 1199.98px) {
            #medstudio .ms-workspace { flex-direction: column; }
            #medstudio .ms-panel { width: 100%; min-width: 0; }
            #medstudio .ms-canvas-wrap { position: static; width: 100%; margin-bottom: 16px; }
            #medstudio .ms-canvas { max-height: 62vh; }
        }

        @media (max-width: 767.98px) {
            #medstudio .ms-paletas { grid-template-columns: repeat(3, 1fr); }
            #medstudio .ms-canvas { padding: 16px 10px; max-height: 56vh; }
            #medstudio .ms-topbar-acciones { margin-left: 0; width: 100%; justify-content: space-between; }
            #medstudio .ms-hist-card { width: 100%; }
            #medstudio .ms-aviso-movil { display: block; }
        }

        /* Impresion: solo el documento */
        @media print {
            body * { visibility: hidden !important; }
            #medstudio .ms-paper, #medstudio .ms-paper * { visibility: visible !important; }
            #medstudio .ms-paper { position: fixed; top: 0; left: 0; box-shadow: none; }
        }
    </style>
@endsection

@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">EN CONSTRUCCIÓN</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">MedStudio</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div id="medstudio">

                <!-- ============ BARRA SUPERIOR ============ -->
                <div class="ms-topbar">
                    <span class="ms-topbar-label">Diseñando</span>
                    <div class="ms-topbar-doc">
                        <select class="form-control form-control-sm" id="ms_documento">
                            <option value="receta_simple" selected>Receta Médica Simple — 14 × 21 cm</option>
                            <option value="certificado">Certificado Médico — 14 × 21 cm</option>
                            <option value="retenida" disabled>Receta retenida — próximamente</option>
                            <option value="magistral" disabled>Receta magistral — próximamente</option>
                            <option value="orden" disabled>Orden de examen — próximamente</option>
                            <option value="especialidad" disabled>Receta por especialidad — próximamente</option>
                        </select>
                    </div>
                    <div class="ms-topbar-acciones">
                        <span class="ms-guardado" id="ms_guardado"><i class="feather icon-check"></i> Guardado</span>
                        <button type="button" class="ms-icon-btn" id="ms_undo" title="Deshacer (Ctrl+Z)" disabled><i class="feather icon-rotate-ccw"></i></button>
                        <button type="button" class="ms-icon-btn" id="ms_redo" title="Rehacer (Ctrl+Shift+Z)" disabled><i class="feather icon-rotate-cw"></i></button>
                        <button type="button" class="btn btn-info btn-sm" id="ms_btn_exportar"><i class="feather icon-download"></i> Exportar</button>
                    </div>
                </div>

                <div class="alert alert-primary ms-aviso-movil" role="alert">
                    <i class="feather icon-info mr-1"></i>
                    Para diseñar con comodidad te recomendamos una tablet o un computador.
                    Desde aquí puedes revisar, hacer ajustes rápidos y exportar.
                </div>

                <!-- ============ ESPACIO DE TRABAJO ============ -->
                <div class="ms-workspace">

                    <!-- ---------- LIENZO ---------- -->
                    <div class="ms-canvas-wrap">
                        <div class="ms-canvas">
                            <div class="ms-paper-outer" id="ms_paper_outer">
                                <div class="ms-paper" id="ms_paper">

                                    <div class="ms-guias">
                                        <div class="g-sangrado"></div>
                                        <div class="g-seguro"></div>
                                    </div>

                                    <div class="ms-etiqueta-esq" id="ms_doc_etiqueta" style="display:none;">Receta</div>

                                    <!-- 1. Encabezado -->
                                    <div class="ms-zona ms-doc-head" id="ms_doc_head" data-seccion="marca">
                                        <div class="ms-doc-logo m" id="ms_doc_logo">
                                            <div class="ms-doc-logo-vacio"><i class="feather icon-image"></i></div>
                                        </div>
                                        <div class="ms-doc-ident">
                                            <div class="ms-doc-nombre" id="ms_doc_nombre">{{ $msNombre !== '' ? $msNombre : 'Nombre del profesional' }}</div>
                                            <div class="ms-doc-esp" id="ms_doc_esp"></div>
                                            <div class="ms-doc-datos" id="ms_doc_datos"></div>
                                        </div>
                                    </div>

                                    <!-- 2. Banda -->
                                    <div class="ms-doc-banda" id="ms_doc_banda"></div>

                                    <!-- 3. Título del documento -->
                                    <div class="ms-zona ms-doc-titulo" id="ms_doc_titulo" data-seccion="cuerpo"></div>

                                    <!-- 4. Campos del paciente -->
                                    <div class="ms-zona ms-doc-campos" id="ms_doc_campos" data-seccion="campos"></div>

                                    <!-- 5. Rp. -->
                                    <div class="ms-doc-rp" id="ms_doc_rp">Rp.</div>

                                    <!-- 6. Marca de agua + cuerpo del documento -->
                                    <div class="ms-doc-area">
                                        <div class="ms-doc-marca m" id="ms_doc_marca" style="display:none;"></div>
                                        <div class="ms-zona ms-doc-cuerpo" id="ms_doc_cuerpo" data-seccion="cuerpo"></div>
                                        <div class="ms-doc-qr-flot" id="ms_doc_qr_flot" style="display:none;"></div>
                                    </div>

                                    <!-- 7. Pie -->
                                    <div class="ms-zona ms-doc-pie" id="ms_doc_pie" data-seccion="campos"></div>

                                    <!-- 8. Barra inferior -->
                                    <div class="ms-zona ms-doc-barra" id="ms_doc_barra" data-seccion="contacto" style="display:none;"></div>

                                </div>
                            </div>
                        </div>

                        <div class="ms-canvas-barra">
                            <button type="button" class="ms-icon-btn" id="ms_zoom_menos" title="Alejar"><i class="feather icon-minus"></i></button>
                            <span class="ms-zoom-val" id="ms_zoom_val">100%</span>
                            <button type="button" class="ms-icon-btn" id="ms_zoom_mas" title="Acercar"><i class="feather icon-plus"></i></button>
                            <button type="button" class="ms-toggle" id="ms_zoom_fit">Ajustar</button>
                            <span class="ml-auto"></span>
                            <button type="button" class="ms-toggle" id="ms_ver_guias" title="Sangrado 3mm y margen seguro"><i class="feather icon-crop"></i> Guías</button>
                            <button type="button" class="ms-toggle" id="ms_ver_gris" title="Simula impresión en blanco y negro"><i class="feather icon-printer"></i> Vista impresión</button>
                        </div>
                    </div>

                    <!-- ---------- PANEL DE CONTROL ---------- -->
                    <div class="ms-panel">

                        <!-- 1. DOCUMENTO -->
                        <div class="ms-seccion" data-sec="documento">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-file-text"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Documento</div>
                                    <div class="ms-seccion-resumen" id="ms_res_documento">Talonario A5 · 14 × 21 cm</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">
                                <div class="ms-grupo">
                                    <label class="ms-lbl">Disposición del encabezado</label>
                                    <div class="ms-seg" id="ms_seg_head">
                                        <button type="button" data-v="izq" class="activo">Logo izq.</button>
                                        <button type="button" data-v="der">Logo der.</button>
                                        <button type="button" data-v="centro">Centrado</button>
                                    </div>
                                </div>
                                <div class="ms-grupo">
                                    <label class="ms-lbl">Elementos</label>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_banda" checked>
                                        <label class="custom-control-label" for="ms_sw_banda" style="font-size:.8rem;">Banda de color separadora</label>
                                    </div>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_etiqueta">
                                        <label class="custom-control-label" for="ms_sw_etiqueta" style="font-size:.8rem;">Etiqueta de esquina</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_barra">
                                        <label class="custom-control-label" for="ms_sw_barra" style="font-size:.8rem;">Barra inferior de contacto</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. DATOS OFICIALES -->
                        <div class="ms-seccion" data-sec="oficial">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-lock"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Datos oficiales</div>
                                    <div class="ms-seccion-resumen">{{ $msNombre !== '' ? $msNombre : 'Sin datos' }} · Verificado</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">
                                <div class="ms-oficial mt-3">
                                    <div class="ms-oficial-top">
                                        <i class="feather icon-lock" style="color:#6f86ac;"></i>
                                        <strong>Datos oficiales</strong>
                                        <span class="ms-badge-ok">✓ Verificado</span>
                                    </div>
                                    <div class="ms-oficial-fila"><span>Nombre</span><b>{{ $msNombre !== '' ? $msNombre : '—' }}</b></div>
                                    <div class="ms-oficial-fila"><span>RUT</span><b>{{ $msRut !== '' ? $msRut : '—' }}</b></div>
                                    <div class="ms-oficial-fila"><span>Registro SIS</span><b>{{ $msRegistro !== '' ? $msRegistro : '—' }}</b></div>
                                    <div class="ms-oficial-fila"><span>Colegio Méd.</span><b>{{ $msColegio !== '' ? $msColegio : '—' }}</b></div>
                                    <div class="ms-oficial-pie">
                                        Provienen de tu perfil profesional.
                                        <a href="{{ route('profesional.mi_perfil') }}">¿Hay un error? Actualízalos en tu perfil →</a>
                                    </div>
                                </div>
                                <div class="ms-grupo">
                                    <label class="ms-lbl">Mostrar en el documento</label>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_rut" checked>
                                        <label class="custom-control-label" for="ms_sw_rut" style="font-size:.8rem;">RUT</label>
                                    </div>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_registro" checked>
                                        <label class="custom-control-label" for="ms_sw_registro" style="font-size:.8rem;">Registro SIS</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_colegio">
                                        <label class="custom-control-label" for="ms_sw_colegio" style="font-size:.8rem;">Colegio Médico</label>
                                    </div>
                                </div>
                                <div class="ms-grupo">
                                    <label class="ms-lbl">Especialidad / cargo</label>
                                    <input type="text" class="form-control form-control-sm" id="ms_especialidad" placeholder="Ej: Medicina General" maxlength="70">
                                    <div class="ms-ayuda">Aparece bajo tu nombre. Es editable porque puede variar según el lugar de atención.</div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. MARCA -->
                        <div class="ms-seccion abierta" data-sec="marca">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-droplet"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Marca</div>
                                    <div class="ms-seccion-resumen" id="ms_res_marca">Azul clínico · Inter</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Logo principal</label>
                                    <div class="ms-drop" id="ms_logo_drop">
                                        <i class="feather icon-upload-cloud"></i>
                                        <div class="ms-drop-txt">Arrastra tu logo o haz clic</div>
                                        <div class="ms-drop-hint">PNG con fondo transparente · mínimo 600px</div>
                                    </div>
                                    <input type="file" id="ms_logo_input" accept="image/png,image/jpeg,image/svg+xml" style="display:none;">
                                    <div id="ms_logo_preview" style="display:none;" class="mt-2"></div>
                                    <div id="ms_logo_alerta" class="mt-2"></div>
                                </div>

                                <div class="ms-grupo" id="ms_logo_opts" style="display:none;">
                                    <label class="ms-lbl">Tamaño del logo</label>
                                    <div class="ms-seg" id="ms_seg_logo_size">
                                        <button type="button" data-v="s">Pequeño</button>
                                        <button type="button" data-v="m" class="activo">Mediano</button>
                                        <button type="button" data-v="l">Grande</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Paleta de color</label>
                                    <div class="ms-paletas" id="ms_paletas"></div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Ajuste fino</label>
                                    <div class="d-flex align-items-center" style="gap:8px;">
                                        <input type="color" id="ms_color_pick" value="#1a49a3" class="form-control form-control-sm" style="width:46px;padding:2px;height:32px;">
                                        <input type="text" id="ms_color_hex" class="form-control form-control-sm" value="#1a49a3" maxlength="7" style="width:96px;">
                                        <button type="button" class="ms-toggle" id="ms_color_logo" title="Extrae el color dominante de tu logo">
                                            <i class="feather icon-aperture"></i> Del logo
                                        </button>
                                    </div>
                                    <div class="mt-2" id="ms_cmyk_box"></div>
                                    <div class="mt-2">
                                        <label class="ms-lbl">Recientes</label>
                                        <div class="d-flex" style="gap:5px;flex-wrap:wrap;" id="ms_recientes"></div>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Tipografía</label>
                                    <div id="ms_fuentes"></div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Tamaño del texto</label>
                                    <div class="ms-seg" id="ms_seg_escala">
                                        <button type="button" data-v="compacto">Compacto</button>
                                        <button type="button" data-v="normal" class="activo">Normal</button>
                                        <button type="button" data-v="amplio">Amplio</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 4. CAMPOS Y ESTRUCTURA -->
                        <div class="ms-seccion" data-sec="campos">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-edit-3"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Información del paciente y pie</div>
                                    <div class="ms-seccion-resumen" id="ms_res_campos">Campos y estructura</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Conjunto rápido</label>
                                    <div class="ms-chips" id="ms_conjuntos"></div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Campos activos</label>
                                    <div class="ms-activos" id="ms_campos_activos"></div>
                                    <label class="ms-lbl mt-3">Agregar campo</label>
                                    <div class="ms-chips" id="ms_campos_disp"></div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Campo personalizado</label>
                                    <div class="d-flex" style="gap:6px;">
                                        <input type="text" class="form-control form-control-sm" id="ms_campo_nuevo" placeholder="Nombre del campo" maxlength="34">
                                        <select class="form-control form-control-sm" id="ms_campo_nuevo_ancho" style="width:120px;">
                                            <option value="full">Línea completa</option>
                                            <option value="half">Media línea</option>
                                        </select>
                                        <button type="button" class="btn btn-info btn-sm" id="ms_campo_add" title="Agregar"><i class="feather icon-plus"></i></button>
                                    </div>
                                    <div class="ms-ayuda">Ej: «Previsión», «N° de ficha», «Alergias». Aparece en el bloque de datos del paciente.</div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Estilo de línea</label>
                                    <div class="ms-seg" id="ms_seg_linea">
                                        <button type="button" data-v="continua" class="activo">Continua</button>
                                        <button type="button" data-v="punteada">Punteada</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Tamaño del texto de los campos</label>
                                    <div class="ms-seg" id="ms_seg_campos_escala">
                                        <button type="button" data-v="normal" class="activo">Normal</button>
                                        <button type="button" data-v="grande">Grande</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Pie del documento</label>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_fecha" checked>
                                        <label class="custom-control-label" for="ms_sw_fecha" style="font-size:.8rem;">Fecha</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_firma" checked disabled>
                                        <label class="custom-control-label" for="ms_sw_firma" style="font-size:.8rem;">Firma y timbre profesional <small class="text-muted">(obligatorio)</small></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 5. TÍTULO Y CUERPO -->
                        <div class="ms-seccion" data-sec="cuerpo">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-layout"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Título y cuerpo</div>
                                    <div class="ms-seccion-resumen" id="ms_res_cuerpo">Receta simple · Área libre</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Título del documento</label>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_titulo" checked>
                                        <label class="custom-control-label" for="ms_sw_titulo" style="font-size:.8rem;">Mostrar título</label>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" id="ms_titulo_txt" placeholder="RECETA SIMPLE" maxlength="46">
                                    <input type="text" class="form-control form-control-sm mt-2" id="ms_titulo_sub" placeholder="Subtítulo (opcional)" maxlength="60">
                                    <label class="ms-lbl mt-2">Alineación</label>
                                    <div class="ms-seg" id="ms_seg_titulo_align">
                                        <button type="button" data-v="izq">Izquierda</button>
                                        <button type="button" data-v="centro" class="activo">Centro</button>
                                        <button type="button" data-v="der">Derecha</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Plantillas de cuerpo</label>
                                    <div class="ms-chips" id="ms_cuerpo_plantillas"></div>
                                    <div class="ms-ayuda">Aplica una estructura ya armada. Después puedes editarla bloque a bloque.</div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Espacio entre bloques</label>
                                    <div class="ms-seg" id="ms_seg_espacio_bloques">
                                        <button type="button" data-v="normal" class="activo">Normal</button>
                                        <button type="button" data-v="separado">Separado</button>
                                    </div>
                                    <div class="ms-ayuda">Controla cuánto aire queda entre cada bloque del cuerpo.</div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Bloques del cuerpo</label>
                                    <div id="ms_bloques"></div>
                                    <label class="ms-lbl mt-3">Agregar bloque</label>
                                    <div class="ms-chips" id="ms_bloques_add"></div>
                                    <div class="ms-ayuda">
                                        En los párrafos, escribe <b>___</b> (tres guiones bajos) donde quieras una línea para completar a mano.
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 6. CONTACTO -->
                        <div class="ms-seccion" data-sec="contacto">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-phone"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Contacto</div>
                                    <div class="ms-seccion-resumen" id="ms_res_contacto">0 de 8 datos</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">
                                <div class="ms-grupo">
                                    <label class="ms-lbl">Agrega los datos que quieras mostrar</label>
                                    <div class="ms-chips" id="ms_contacto_disp"></div>
                                </div>
                                <div class="ms-grupo">
                                    <div class="ms-activos" id="ms_contacto_activos"></div>
                                    <div class="ms-contador" id="ms_contacto_contador"></div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Disposición</label>
                                    <div class="ms-seg" id="ms_seg_contacto_estilo">
                                        <button type="button" data-v="linea" class="activo">En una línea</button>
                                        <button type="button" data-v="columna">En columnas</button>
                                    </div>
                                    <div class="ms-ayuda">«En columnas» reparte los datos en dos bloques para que no queden apretados.</div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Alineación</label>
                                    <div class="ms-seg" id="ms_seg_contacto_align">
                                        <button type="button" data-v="izq">Izquierda</button>
                                        <button type="button" data-v="centro" class="activo">Centro</button>
                                        <button type="button" data-v="der">Derecha</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Tamaño del texto de contacto</label>
                                    <div class="ms-seg" id="ms_seg_contacto_escala">
                                        <button type="button" data-v="chico">Chico</button>
                                        <button type="button" data-v="normal" class="activo">Normal</button>
                                        <button type="button" data-v="grande">Grande</button>
                                    </div>
                                    <div class="ms-ayuda">Afecta a los datos bajo tu nombre y a la barra inferior.</div>
                                </div>
                            </div>
                        </div>

                        <!-- 6. EXTRAS -->
                        <div class="ms-seccion" data-sec="extras">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-grid"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Extras</div>
                                    <div class="ms-seccion-resumen" id="ms_res_extras">Sin QR · Sin marca de agua</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Código QR</label>
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="ms_sw_qr">
                                        <label class="custom-control-label" for="ms_sw_qr" style="font-size:.8rem;">Incluir código QR</label>
                                    </div>
                                    <div id="ms_qr_opts" style="display:none;">
                                        <label class="ms-lbl">¿A dónde lleva?</label>
                                        <div class="ms-chips mb-2" id="ms_qr_tipos"></div>
                                        <input type="text" class="form-control form-control-sm" id="ms_qr_valor" placeholder="https://…">
                                        <div class="ms-ayuda" id="ms_qr_ayuda">Pega el enlace completo.</div>

                                        <label class="ms-lbl mt-3">¿Dónde va el QR?</label>
                                        <div class="ms-seg" id="ms_seg_qr_pos" style="flex-direction:column;gap:4px;">
                                            <button type="button" data-v="head">Encabezado, a la derecha</button>
                                            <button type="button" data-v="pie" class="activo">Junto a la firma</button>
                                            <button type="button" data-v="esquina">Esquina inferior derecha</button>
                                            <button type="button" data-v="barra">Barra inferior de contacto</button>
                                        </div>
                                        <div class="ms-ayuda" id="ms_qr_pos_ayuda"></div>

                                        <label class="ms-lbl mt-3">Tamaño</label>
                                        <div class="ms-seg" id="ms_seg_qr_size">
                                            <button type="button" data-v="s">Pequeño</button>
                                            <button type="button" data-v="m" class="activo">Mediano</button>
                                            <button type="button" data-v="l">Grande</button>
                                        </div>

                                        <label class="ms-lbl mt-3">Leyenda bajo el QR (opcional)</label>
                                        <input type="text" class="form-control form-control-sm" id="ms_qr_leyenda" placeholder="Ej: Agenda tu hora" maxlength="28">

                                        <div class="d-flex align-items-center mt-3" style="gap:10px;">
                                            <div id="ms_qr_muestra" style="line-height:0;"></div>
                                            <button type="button" class="ms-toggle" id="ms_qr_probar"><i class="feather icon-maximize-2"></i> Probar QR</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Marca de agua</label>
                                    <div class="ms-drop" id="ms_mw_drop">
                                        <i class="feather icon-image"></i>
                                        <div class="ms-drop-txt">Sube una imagen de fondo</div>
                                        <div class="ms-drop-hint">PNG, JPG o SVG</div>
                                    </div>
                                    <input type="file" id="ms_mw_input" accept="image/png,image/jpeg,image/svg+xml" style="display:none;">
                                    <div id="ms_mw_preview" style="display:none;" class="mt-2"></div>

                                    <div id="ms_mw_opts" style="display:none;">
                                        <label class="ms-lbl mt-3">Opacidad · <span id="ms_mw_op_val">6%</span></label>
                                        <input type="range" class="form-control-range" id="ms_mw_opacidad" min="2" max="30" value="6">
                                        <div class="ms-ayuda" id="ms_mw_op_aviso"></div>

                                        <label class="ms-lbl mt-3">Tamaño</label>
                                        <div class="ms-seg" id="ms_seg_mw_size">
                                            <button type="button" data-v="s">Pequeño</button>
                                            <button type="button" data-v="m" class="activo">Mediano</button>
                                            <button type="button" data-v="l">Grande</button>
                                        </div>

                                        <label class="ms-lbl mt-3">Posición</label>
                                        <div class="ms-pos9" id="ms_mw_pos"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- 7. EXPORTAR -->
                        <div class="ms-seccion" data-sec="exportar">
                            <div class="ms-seccion-head">
                                <div class="ms-seccion-ico"><i class="feather icon-download"></i></div>
                                <div class="ms-seccion-txt">
                                    <div class="ms-seccion-nombre">Exportar</div>
                                    <div class="ms-seccion-resumen" id="ms_res_exportar">PDF · A5 individual</div>
                                </div>
                                <i class="feather icon-chevron-down ms-seccion-chev"></i>
                            </div>
                            <div class="ms-seccion-body">

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Formato</label>
                                    <div class="ms-seg" id="ms_seg_formato">
                                        <button type="button" data-v="pdf" class="activo">PDF</button>
                                        <button type="button" data-v="jpeg">JPEG</button>
                                        <button type="button" data-v="png">PNG</button>
                                    </div>
                                    <div class="ms-ayuda" id="ms_formato_ayuda">Vectorial para imprenta. Es el recomendado.</div>
                                </div>

                                <div class="ms-grupo" id="ms_dist_grupo">
                                    <label class="ms-lbl">Distribución en la hoja</label>
                                    <div class="ms-seg" id="ms_seg_dist" style="flex-direction:column;gap:4px;">
                                        <button type="button" data-v="a5" class="activo">A5 individual (imprenta)</button>
                                        <button type="button" data-v="2a4">2 en A4 horizontal + línea de corte</button>
                                    </div>
                                </div>

                                <div class="ms-grupo">
                                    <label class="ms-lbl">Revisión previa</label>
                                    <div id="ms_preflight"></div>
                                </div>

                                <button type="button" class="btn btn-info btn-block btn-sm mt-3" id="ms_generar">
                                    <i class="feather icon-download"></i> Generar documento
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-block btn-sm" id="ms_guardar_hist">
                                    <i class="feather icon-save"></i> Guardar en mis diseños
                                </button>
                            </div>
                        </div>

                    </div><!-- /ms-panel -->
                </div><!-- /ms-workspace -->

                <!-- ============ HISTORIAL ============ -->
                <div class="card referidos-card mt-3" style="border:none;border-radius:14px;box-shadow:0 2px 10px rgba(30,40,80,.06);">
                    <div class="card-body">
                        <div class="titulo-seccion-sdi"><i class="feather icon-clock"></i> Tus últimos diseños</div>
                        <div id="ms_historial"></div>
                    </div>
                </div>

            </div><!-- /#medstudio -->

        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!-- ============ MODAL: PROBAR QR ============ -->
    <div class="modal fade" id="ms_modal_qr" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content" style="border:none;border-radius:14px;overflow:hidden;">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Probar QR</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" onclick="$('#ms_modal_qr').modal('hide');"><span>&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <div id="ms_qr_grande" style="display:inline-block;"></div>
                    <p class="text-muted mt-3 mb-0" style="font-size:.8rem;">Escanéalo con tu celular para comprobar que funciona.</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
    /* =====================================================================
       MEDSTUDIO
       Todo vive dentro de esta funcion anonima: no expone variables ni
       funciones globales, por lo que no puede interferir con ningun otro
       script del sistema.
       ===================================================================== */
    (function () {
        'use strict';

        var raiz = document.getElementById('medstudio');
        if (!raiz) { return; }

        /* ---------------- Datos del profesional (solo lectura) ------------- */
        var PROF = {
            nombre:    @json($msNombre),
            rut:       @json($msRut),
            registro:  @json($msRegistro),
            colegio:   @json($msColegio)
        };

        /* ---------------- Catalogos ---------------- */
        var PALETAS = [
            { id: 'azul',    nombre: 'Azul clínico', primario: '#1a49a3', texto: '#22293a' },
            { id: 'teal',    nombre: 'Turquesa',     primario: '#1c9c9c', texto: '#1f2f30' },
            { id: 'verde',   nombre: 'Verde salud',  primario: '#3f8f4a', texto: '#22301f' },
            { id: 'grafito', nombre: 'Grafito',      primario: '#3c4453', texto: '#20242c' },
            { id: 'borgona', nombre: 'Borgoña',      primario: '#8e2c46', texto: '#301b21' },
            { id: 'indigo',  nombre: 'Índigo',       primario: '#4a3f9f', texto: '#241f3d' },
            { id: 'ocre',    nombre: 'Ocre',         primario: '#a5722a', texto: '#332617' },
            { id: 'pizarra', nombre: 'Pizarra',      primario: '#2f5f7a', texto: '#1d2a33' }
        ];

        var FUENTES = ['Inter', 'IBM Plex Sans', 'Nunito', 'Montserrat', 'Lato', 'Open Sans'];

        var ESCALAS = {
            compacto: { nombre: 8.5,  esp: 6.5, datos: 6,   tit: 10.5, campo: 7,   rp: 13, cuerpo: 7,   pie: 6.5, barra: 6 },
            normal:   { nombre: 10,   esp: 7.5, datos: 6.8, tit: 12,   campo: 7.8, rp: 15, cuerpo: 7.8, pie: 7.2, barra: 6.5 },
            amplio:   { nombre: 11.5, esp: 8.5, datos: 7.6, tit: 13.5, campo: 8.6, rp: 17, cuerpo: 8.6, pie: 8,   barra: 7 }
        };

        /* Catalogo de campos del paciente (cabecera del documento) */
        var CAMPOS_CAT = {
            nombre:      { label: 'Nombre',      ancho: 'full' },
            rut:         { label: 'RUT',         ancho: 'half' },
            edad:        { label: 'Edad',        ancho: 'half' },
            direccion:   { label: 'Dirección',   ancho: 'full' },
            prevision:   { label: 'Previsión',   ancho: 'half' },
            diagnostico: { label: 'Diagnóstico', ancho: 'full' },
            telefono:    { label: 'Teléfono',    ancho: 'half' }
        };

        /* -------------------------------------------------------------------
           CONJUNTOS RAPIDOS
           «Estándar» siempre está disponible. Además se muestra el conjunto
           de la especialidad registrada del profesional. Aquí se van sumando
           las especialidades a medida que se definan: cada una puede traer
           sus propios campos de paciente y su propia estructura de cuerpo.
           ------------------------------------------------------------------- */
        var ESPECIALIDAD_PROF = @json($msEspecialidad);

        var CONJUNTOS = {
            'Estándar': {
                campos: ['nombre', 'rut', 'edad', 'direccion', 'diagnostico']
            },
            'Medicina General': {
                campos: ['nombre', 'rut', 'edad', 'direccion', 'diagnostico']
            },
            'Oftalmología': {
                campos: ['nombre', 'rut', 'edad', 'diagnostico'],
                bloques: [
                    { t: 'subtitulo', texto: 'Prescripción óptica' },
                    { t: 'tabla', cols: ['', 'Esfera', 'Cilindro', 'Eje', 'Add'], filas: ['OD', 'OI'] },
                    { t: 'campos', items: [{ label: 'D.P.', ancho: 'half' }, { label: 'Tipo de lente', ancho: 'half' }] },
                    { t: 'subtitulo', texto: 'Observaciones' },
                    { t: 'lineas', n: 2, estilo: 'continua' }
                ]
            }
        };

        /* Devuelve los conjuntos visibles: Estándar + el de la especialidad */
        function conjuntosVisibles() {
            var out = ['Estándar'];
            var norm = function (s) {
                return String(s || '').toLowerCase()
                    .replace(/[áà]/g, 'a').replace(/[éè]/g, 'e').replace(/[íì]/g, 'i')
                    .replace(/[óò]/g, 'o').replace(/[úù]/g, 'u').trim();
            };
            var buscada = norm(ESPECIALIDAD_PROF);
            var encontrada = Object.keys(CONJUNTOS).filter(function (k) {
                return k !== 'Estándar' && norm(k) === buscada;
            })[0];
            out.push(encontrada || 'Medicina General');
            return out;
        }

        /* -------------------------------------------------------------------
           PERFILES DE DOCUMENTO
           Cada documento declara su titulo, si lleva Rp. y que plantilla de
           cuerpo trae por defecto. Agregar un documento nuevo es agregar una
           entrada aqui: no hay que rediseñar la interfaz.
           ------------------------------------------------------------------- */
        var DOCS = {
            receta_simple: { nombre: 'Receta Médica Simple', titulo: 'RECETA SIMPLE',      rp: true,  plantilla: 'Área libre' },
            certificado:   { nombre: 'Certificado Médico',   titulo: 'CERTIFICADO MÉDICO', rp: false, plantilla: 'Justificación' }
        };

        /* -------------------------------------------------------------------
           BLOQUES DEL CUERPO
           Con estos seis tipos se arma la estructura interna de cualquier
           documento clinico: recetas, certificados, ordenes de examen y
           prescripciones de especialidad (oftalmologia, kinesiologia, etc.).
           ------------------------------------------------------------------- */
        var BLOQUE_TIPOS = {
            parrafo:   { label: 'Párrafo',   ico: 'align-left' },
            subtitulo: { label: 'Subtítulo', ico: 'type' },
            campos:    { label: 'Campos',    ico: 'edit-3' },
            lineas:    { label: 'Líneas',    ico: 'menu' },
            tabla:     { label: 'Tabla',     ico: 'grid' },
            espacio:   { label: 'Espacio',   ico: 'move' }
        };

        /* Bloques que el usuario puede agregar a mano. La tabla queda fuera:
           solo la usan los conjuntos por especialidad ya armados. */
        var BLOQUES_AGREGABLES = ['parrafo', 'subtitulo', 'campos', 'lineas', 'espacio'];

        function bloqueNuevo(t) {
            if (t === 'parrafo')   { return { t: 'parrafo', texto: 'Escribe aquí. Usa ___ para dejar una línea en blanco.' }; }
            if (t === 'subtitulo') { return { t: 'subtitulo', texto: 'Subtítulo' }; }
            if (t === 'campos')    { return { t: 'campos', items: [{ label: 'Campo', ancho: 'full' }] }; }
            if (t === 'lineas')    { return { t: 'lineas', n: 3, estilo: 'continua' }; }
            if (t === 'tabla')     { return { t: 'tabla', cols: ['', 'Esfera', 'Cilindro', 'Eje'], filas: ['OD', 'OI'] }; }
            return { t: 'espacio', alto: 20 };
        }

        /* -------------------------------------------------------------------
           PLANTILLAS DE CUERPO por tipo de documento
           ------------------------------------------------------------------- */
        /* Cada plantilla declara si reemplaza los datos del paciente.
           En los certificados los datos van dentro del cuerpo, por eso esas
           plantillas limpian los campos de la cabecera para no duplicarlos. */
        var PLANTILLAS = {
            receta_simple: {
                'Área libre': { sinCampos: false, bloques: [] },
                'Con indicaciones': {
                    sinCampos: false,
                    bloques: [
                        { t: 'espacio', alto: 96 },
                        { t: 'subtitulo', texto: 'Indicaciones' },
                        { t: 'lineas', n: 3, estilo: 'continua' }
                    ]
                }
            },
            certificado: {
                'Justificación': {
                    sinCampos: true,
                    bloques: [
                        { t: 'parrafo', texto: 'El profesional que suscribe certifica que:' },
                        { t: 'campos', items: [{ label: 'Paciente', ancho: 'full' }] },
                        { t: 'campos', items: [{ label: 'R.U.T.', ancho: 'full' }] },
                        { t: 'campos', items: [{ label: 'Justifica desde', ancho: 'half' }, { label: 'Hasta', ancho: 'half' }] },
                        { t: 'subtitulo', texto: 'Diagnóstico:' },
                        { t: 'lineas', n: 1, estilo: 'continua' },
                        { t: 'espacio', alto: 10 },
                        { t: 'parrafo', texto: 'Se otorga el presente certificado para ser presentado en:' },
                        { t: 'lineas', n: 1, estilo: 'continua' }
                    ]
                },
                'Reposo': {
                    sinCampos: true,
                    bloques: [
                        { t: 'parrafo', texto: 'Paciente: ___' },
                        { t: 'parrafo', texto: 'Run N°: ___ fue atendido (a) en esta Consulta, por el Médico ___ , el día ___ , a las ___ Hrs. y cuyo diagnóstico es ___ , amerita reposo por ___ días.' },
                        { t: 'espacio', alto: 10 },
                        { t: 'parrafo', texto: 'Se extiende el presente documento para ser presentado en Institución correspondiente.' }
                    ]
                },
                'Atención profesional': {
                    sinCampos: true,
                    bloques: [
                        { t: 'parrafo', texto: 'Certifico atención profesional al paciente' },
                        { t: 'lineas', n: 2, estilo: 'continua' },
                        { t: 'subtitulo', texto: 'Diagnóstico' },
                        { t: 'lineas', n: 3, estilo: 'continua' },
                        { t: 'parrafo', texto: 'para los fines que estime conveniente' },
                        { t: 'lineas', n: 3, estilo: 'continua' },
                        { t: 'parrafo', texto: 'Atentamente.' }
                    ]
                },
                'Solo título': { sinCampos: false, bloques: [] }
            }
        };

        var CONTACTO_CAT = {
            telefono:    { label: 'Teléfono',    ph: '+56 2 2345 6789' },
            celular:     { label: 'Celular',     ph: '+56 9 8765 4321' },
            email:       { label: 'Email',       ph: 'contacto@ejemplo.cl' },
            web:         { label: 'Sitio web',   ph: 'www.ejemplo.cl' },
            direccion:   { label: 'Dirección',   ph: 'Av. Providencia 1234' },
            ciudad:      { label: 'Ciudad',      ph: 'Santiago' },
            horario:     { label: 'Horario',     ph: 'Lun a Vie · 9:00 a 18:00' },
            descripcion: { label: 'Descripción', ph: 'Breve descripción' }
        };

        var QR_TIPOS = {
            enlace:   { label: 'Enlace',   ph: 'https://…',            ayuda: 'Pega el enlace completo.' },
            telefono: { label: 'Teléfono', ph: '+56 2 2345 6789',      ayuda: 'Al escanear, abre el marcador telefónico.' },
            whatsapp: { label: 'WhatsApp', ph: '+56 9 8765 4321',      ayuda: 'Generamos el enlace wa.me automáticamente.' },
            agenda:   { label: 'Agenda',   ph: 'https://…/reservar',   ayuda: 'Enlace a tu agenda online.' },
            ficha:    { label: 'Ficha',    ph: 'https://…/ficha',      ayuda: 'Enlace a la ficha del paciente.' }
        };

        /* ---------------- Estado ---------------- */
        function camposDesde(ids) {
            return ids.map(function (id) {
                var c = CAMPOS_CAT[id];
                return { id: id, label: c.label, ancho: c.ancho };
            });
        }

        var estado = {
            doc: 'receta_simple',
            paleta: 'azul',
            color: '#1a49a3',
            fuente: 'Inter',
            escala: 'normal',
            especialidad: '',
            headPos: 'izq',
            banda: true,
            etiqueta: false,
            barra: false,
            verRut: true,
            verRegistro: true,
            verColegio: false,
            logo: null,
            logoSize: 'm',
            campos: camposDesde(['nombre', 'rut', 'edad', 'direccion', 'diagnostico']),
            camposCustom: null,
            conjuntoActivo: 'Estándar',
            plantillaActiva: '',
            linea: 'continua',
            camposEscala: 'normal',
            contactoEscala: 'normal',
            contactoEstilo: 'linea',
            contactoAlign: 'centro',
            espacioBloques: 'normal',
            /* Titulo del documento */
            titulo: true,
            tituloTxt: 'RECETA SIMPLE',
            tituloSub: '',
            tituloAlign: 'centro',
            /* Cuerpo */
            verRp: true,
            bloques: [],
            /* Pie */
            pieFecha: true,
            timbre: 'normal',
            contacto: [],
            /* QR */
            qr: false,
            qrTipo: 'enlace',
            qrValor: '',
            qrPos: 'pie',
            qrSize: 'm',
            qrLeyenda: '',
            /* Marca de agua */
            mw: null,
            mwOpacidad: 6,
            mwSize: 'm',
            mwPos: 'centro-centro',
            /* Exportacion */
            formato: 'pdf',
            dist: 'a5'
        };

        var recientes = [];
        var pilaUndo = [], pilaRedo = [];
        var zoom = 1, ignorarCambio = false;

        /* ---------------- Utilidades ---------------- */
        function $id(x) { return document.getElementById(x); }
        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;')
                .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }
        function debounce(fn, ms) {
            var t; return function () {
                var a = arguments, c = this;
                clearTimeout(t); t = setTimeout(function () { fn.apply(c, a); }, ms);
            };
        }
        function hexToRgb(h) {
            h = (h || '').replace('#', '');
            if (h.length === 3) { h = h[0] + h[0] + h[1] + h[1] + h[2] + h[2]; }
            var n = parseInt(h, 16);
            if (isNaN(n)) { return { r: 0, g: 0, b: 0 }; }
            return { r: (n >> 16) & 255, g: (n >> 8) & 255, b: n & 255 };
        }
        function rgbToCmyk(r, g, b) {
            var rr = r / 255, gg = g / 255, bb = b / 255;
            var k = 1 - Math.max(rr, gg, bb);
            if (k === 1) { return { c: 0, m: 0, y: 0, k: 100 }; }
            return {
                c: Math.round(((1 - rr - k) / (1 - k)) * 100),
                m: Math.round(((1 - gg - k) / (1 - k)) * 100),
                y: Math.round(((1 - bb - k) / (1 - k)) * 100),
                k: Math.round(k * 100)
            };
        }
        /* Simula como se vera el color impreso en CMYK */
        function simulaCmyk(hex) {
            var o = hexToRgb(hex), k = rgbToCmyk(o.r, o.g, o.b);
            var r = Math.round(255 * (1 - k.c / 100) * (1 - k.k / 100));
            var g = Math.round(255 * (1 - k.m / 100) * (1 - k.k / 100));
            var b = Math.round(255 * (1 - k.y / 100) * (1 - k.k / 100));
            r = Math.round(r * .93 + 10); g = Math.round(g * .93 + 10); b = Math.round(b * .9 + 12);
            return 'rgb(' + r + ',' + g + ',' + b + ')';
        }
        function distanciaColor(a, b) {
            return Math.abs(a.r - b.r) + Math.abs(a.g - b.g) + Math.abs(a.b - b.b);
        }
        function esHex(v) { return /^#[0-9a-fA-F]{6}$/.test(v); }

        /* ---------------- Historial de cambios (undo / redo) ---------------- */
        function snapshot() {
            if (ignorarCambio) { return; }
            pilaUndo.push(JSON.stringify(estado));
            if (pilaUndo.length > 40) { pilaUndo.shift(); }
            pilaRedo = [];
            actualizaUndoBtns();
        }
        function actualizaUndoBtns() {
            $id('ms_undo').disabled = pilaUndo.length === 0;
            $id('ms_redo').disabled = pilaRedo.length === 0;
        }
        function aplicaEstado(json) {
            estado = JSON.parse(json);
            ignorarCambio = true;
            sincronizaControles();
            ignorarCambio = false;
            render();
        }
        $id('ms_undo').addEventListener('click', function () {
            if (!pilaUndo.length) { return; }
            pilaRedo.push(JSON.stringify(estado));
            aplicaEstado(pilaUndo.pop());
            actualizaUndoBtns();
        });
        $id('ms_redo').addEventListener('click', function () {
            if (!pilaRedo.length) { return; }
            pilaUndo.push(JSON.stringify(estado));
            aplicaEstado(pilaRedo.pop());
            actualizaUndoBtns();
        });
        document.addEventListener('keydown', function (e) {
            if (!(e.ctrlKey || e.metaKey)) { return; }
            if (e.key === 'z' && !e.shiftKey) { e.preventDefault(); $id('ms_undo').click(); }
            if ((e.key === 'z' && e.shiftKey) || e.key === 'y') { e.preventDefault(); $id('ms_redo').click(); }
        });

        /* ---------------- Autoguardado ---------------- */
        var guardar = debounce(function () {
            try { localStorage.setItem('ms_borrador', JSON.stringify(estado)); } catch (e) {}
            var g = $id('ms_guardado');
            g.innerHTML = '<i class="feather icon-check"></i> Guardado';
        }, 700);

        /* ---------------- Acordeon ---------------- */
        Array.prototype.forEach.call(raiz.querySelectorAll('.ms-seccion-head'), function (h) {
            h.addEventListener('click', function () {
                var sec = h.parentNode, abierta = sec.classList.contains('abierta');
                Array.prototype.forEach.call(raiz.querySelectorAll('.ms-seccion'), function (s) {
                    s.classList.remove('abierta');
                });
                if (!abierta) { sec.classList.add('abierta'); }
            });
        });
        function abreSeccion(nombre) {
            Array.prototype.forEach.call(raiz.querySelectorAll('.ms-seccion'), function (s) {
                s.classList.toggle('abierta', s.getAttribute('data-sec') === nombre);
            });
        }
        /* Clic en el documento abre la seccion correspondiente */
        Array.prototype.forEach.call(raiz.querySelectorAll('.ms-paper .ms-zona'), function (z) {
            z.addEventListener('click', function () {
                var s = z.getAttribute('data-seccion');
                if (!s) { return; }
                abreSeccion(s);
                z.classList.add('ms-pulso');
                setTimeout(function () { z.classList.remove('ms-pulso'); }, 500);
                var panel = raiz.querySelector('.ms-seccion[data-sec="' + s + '"]');
                if (panel && window.innerWidth < 1200) { panel.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
            });
        });

        /* ---------------- Botoneras segmentadas ---------------- */
        function seg(idCont, cb) {
            var cont = $id(idCont);
            if (!cont) { return; }
            cont.addEventListener('click', function (e) {
                var b = e.target.closest('button');
                if (!b) { return; }
                snapshot();
                Array.prototype.forEach.call(cont.querySelectorAll('button'), function (x) { x.classList.remove('activo'); });
                b.classList.add('activo');
                cb(b.getAttribute('data-v'));
                render();
            });
        }
        function segMarca(idCont, valor) {
            var cont = $id(idCont);
            if (!cont) { return; }
            Array.prototype.forEach.call(cont.querySelectorAll('button'), function (x) {
                x.classList.toggle('activo', x.getAttribute('data-v') === valor);
            });
        }

        seg('ms_seg_head',     function (v) { estado.headPos = v; });
        seg('ms_seg_escala',   function (v) { estado.escala = v; });
        seg('ms_seg_logo_size', function (v) { estado.logoSize = v; });
        seg('ms_seg_linea',    function (v) { estado.linea = v; });
        seg('ms_seg_campos_escala',   function (v) { estado.camposEscala = v; });
        seg('ms_seg_contacto_escala', function (v) { estado.contactoEscala = v; });
        seg('ms_seg_contacto_estilo', function (v) { estado.contactoEstilo = v; });
        seg('ms_seg_contacto_align',  function (v) { estado.contactoAlign = v; });
        seg('ms_seg_espacio_bloques', function (v) { estado.espacioBloques = v; });
        seg('ms_seg_mw_size',  function (v) { estado.mwSize = v; });
        seg('ms_seg_formato',  function (v) {
            estado.formato = v;
            $id('ms_formato_ayuda').textContent = v === 'pdf'
                ? 'Vectorial para imprenta. Es el recomendado.'
                : (v === 'jpeg' ? 'Imagen de alta resolución (300 DPI).' : 'Imagen con transparencia, para uso digital.');
            $id('ms_dist_grupo').style.display = v === 'pdf' ? '' : 'none';
        });
        seg('ms_seg_dist', function (v) { estado.dist = v; });

        /* ---------------- Interruptores simples ---------------- */
        function sw(id, prop, extra) {
            var el = $id(id);
            if (!el) { return; }
            el.addEventListener('change', function () {
                snapshot();
                estado[prop] = el.checked;
                if (extra) { extra(el.checked); }
                render();
            });
        }
        sw('ms_sw_banda', 'banda');
        sw('ms_sw_etiqueta', 'etiqueta');
        sw('ms_sw_barra', 'barra');
        sw('ms_sw_rut', 'verRut');
        sw('ms_sw_registro', 'verRegistro');
        sw('ms_sw_colegio', 'verColegio');
        sw('ms_sw_fecha', 'pieFecha');
        sw('ms_sw_qr', 'qr', function (v) { $id('ms_qr_opts').style.display = v ? '' : 'none'; });

        $id('ms_especialidad').addEventListener('input', debounce(function () {
            estado.especialidad = $id('ms_especialidad').value;
            render();
        }, 200));

        /* ---------------- Paletas ---------------- */
        (function pintaPaletas() {
            $id('ms_paletas').innerHTML = PALETAS.map(function (p) {
                return '<div class="ms-paleta" data-p="' + p.id + '" title="' + esc(p.nombre) + '">' +
                    '<div class="ms-paleta-mini">' +
                        '<i style="background:' + p.primario + '"></i>' +
                        '<u style="background:' + p.texto + ';width:60%"></u>' +
                        '<u style="background:#d9dee7;width:80%"></u>' +
                        '<u style="background:#d9dee7;width:70%"></u>' +
                    '</div>' +
                    '<div class="ms-paleta-nom">' + esc(p.nombre) + '</div>' +
                '</div>';
            }).join('');
        })();
        $id('ms_paletas').addEventListener('click', function (e) {
            var d = e.target.closest('.ms-paleta');
            if (!d) { return; }
            snapshot();
            var p = PALETAS.filter(function (x) { return x.id === d.getAttribute('data-p'); })[0];
            estado.paleta = p.id;
            estado.color = p.primario;
            $id('ms_color_pick').value = p.primario;
            $id('ms_color_hex').value = p.primario;
            agregaReciente(p.primario);
            render();
        });

        /* ---------------- Color a medida ---------------- */
        function setColor(hex, guardaSnap) {
            if (!esHex(hex)) { return; }
            if (guardaSnap) { snapshot(); }
            estado.color = hex;
            estado.paleta = '';
            $id('ms_color_pick').value = hex;
            $id('ms_color_hex').value = hex;
            agregaReciente(hex);
            render();
        }
        $id('ms_color_pick').addEventListener('input', debounce(function () {
            setColor($id('ms_color_pick').value, false);
        }, 120));
        $id('ms_color_pick').addEventListener('change', function () { snapshot(); });
        $id('ms_color_hex').addEventListener('change', function () {
            var v = $id('ms_color_hex').value.trim();
            if (v[0] !== '#') { v = '#' + v; }
            if (esHex(v)) { setColor(v, true); } else { $id('ms_color_hex').value = estado.color; }
        });

        function agregaReciente(hex) {
            recientes = recientes.filter(function (x) { return x !== hex; });
            recientes.unshift(hex);
            recientes = recientes.slice(0, 8);
            try { localStorage.setItem('ms_recientes', JSON.stringify(recientes)); } catch (e) {}
            pintaRecientes();
        }
        function pintaRecientes() {
            $id('ms_recientes').innerHTML = recientes.map(function (c) {
                return '<button type="button" class="ms-icon-btn" data-c="' + c +
                       '" style="width:24px;height:24px;background:' + c + ';border-color:' + c + ';" title="' + c + '"></button>';
            }).join('') || '<span class="ms-ayuda">Aún no has usado colores propios.</span>';
        }
        $id('ms_recientes').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-c]');
            if (b) { setColor(b.getAttribute('data-c'), true); }
        });

        /* Extrae el color dominante del logo */
        $id('ms_color_logo').addEventListener('click', function () {
            if (!estado.logo) {
                swal({ title: 'Sin logo', text: 'Primero sube tu logo para extraer sus colores.', icon: 'info', button: 'Aceptar' });
                return;
            }
            var img = new Image();
            img.onload = function () {
                var c = document.createElement('canvas'), n = 72;
                c.width = n; c.height = n;
                var ctx = c.getContext('2d');
                ctx.drawImage(img, 0, 0, n, n);
                var d;
                try { d = ctx.getImageData(0, 0, n, n).data; } catch (err) { return; }

                var mapa = {};
                for (var i = 0; i < d.length; i += 4) {
                    if (d[i + 3] < 140) { continue; }                  /* transparente */
                    var r = d[i], g = d[i + 1], b = d[i + 2];
                    var mx = Math.max(r, g, b), mn = Math.min(r, g, b);
                    var lum = (r * 299 + g * 587 + b * 114) / 1000;
                    var sat = mx === 0 ? 0 : (mx - mn) / mx;

                    if (lum > 238 || lum < 22) { continue; }           /* blancos y negros */
                    if (sat < 0.16 && (mx - mn) < 26) { continue; }    /* grises planos */

                    var k = (r >> 4) + '-' + (g >> 4) + '-' + (b >> 4);
                    if (!mapa[k]) { mapa[k] = { n: 0, peso: 0, r: 0, g: 0, b: 0 }; }
                    /* Se pondera por saturación: un color vivo pesa más que
                       uno lavado, aunque ocupe menos píxeles. */
                    var peso = 1 + sat * 2.2;
                    mapa[k].n++;
                    mapa[k].peso += peso;
                    mapa[k].r += r; mapa[k].g += g; mapa[k].b += b;
                }

                var mejor = null;
                Object.keys(mapa).forEach(function (k) {
                    if (!mejor || mapa[k].peso > mejor.peso) { mejor = mapa[k]; }
                });

                if (!mejor) {
                    swal({ title: 'Sin color dominante', text: 'Tu logo parece ser solo blanco, negro o gris. Elige un color a mano.', icon: 'info', button: 'Aceptar' });
                    return;
                }

                var rr = Math.round(mejor.r / mejor.n);
                var gg = Math.round(mejor.g / mejor.n);
                var bb = Math.round(mejor.b / mejor.n);

                /* Si el color quedó muy claro, se oscurece para que se lea
                   bien impreso sobre papel blanco. */
                var l = (rr * 299 + gg * 587 + bb * 114) / 1000;
                if (l > 175) {
                    var f = 175 / l;
                    rr = Math.round(rr * f); gg = Math.round(gg * f); bb = Math.round(bb * f);
                }

                var hex = '#' + [rr, gg, bb].map(function (x) {
                    return ('0' + Math.max(0, Math.min(255, x)).toString(16)).slice(-2);
                }).join('');
                setColor(hex, true);
            };
            img.src = estado.logo;
        });

        /* CMYK: se muestra, no se pide */
        function pintaCmyk() {
            var o = hexToRgb(estado.color), k = rgbToCmyk(o.r, o.g, o.b);
            var sim = simulaCmyk(estado.color);
            var lejos = distanciaColor(o, hexToRgb(sim.replace(/rgb\((\d+),(\d+),(\d+)\)/, function (m, r, g, b) {
                return '#' + [r, g, b].map(function (x) { return ('0' + parseInt(x, 10).toString(16)).slice(-2); }).join('');
            }))) > 60;

            $id('ms_cmyk_box').innerHTML =
                '<div style="background:#f7f9fc;border:1px solid #e6eaf1;border-radius:9px;padding:9px 11px;">' +
                    '<div style="font-size:.72rem;color:#6b7688;margin-bottom:7px;">' +
                        esc(estado.color.toUpperCase()) + ' &nbsp;→&nbsp; C:' + k.c + ' M:' + k.m + ' Y:' + k.y + ' K:' + k.k +
                    '</div>' +
                    '<div style="display:flex;gap:9px;align-items:center;">' +
                        '<div style="text-align:center;"><div style="width:40px;height:26px;border-radius:5px;background:' + estado.color + ';"></div><div style="font-size:.62rem;color:#8b93a7;margin-top:2px;">Pantalla</div></div>' +
                        '<div style="text-align:center;"><div style="width:40px;height:26px;border-radius:5px;background:' + sim + ';"></div><div style="font-size:.62rem;color:#8b93a7;margin-top:2px;">Impreso</div></div>' +
                        (lejos ? '<div style="font-size:.7rem;color:#d99a2b;line-height:1.35;flex:1;"><i class="feather icon-alert-triangle"></i> Este color se verá más apagado al imprimir.</div>' : '') +
                    '</div>' +
                '</div>';
        }

        /* ---------------- Tipografias ---------------- */
        (function pintaFuentes() {
            $id('ms_fuentes').innerHTML = FUENTES.map(function (f) {
                return '<div class="ms-fuente" data-f="' + esc(f) + '">' +
                    '<div class="ms-fuente-nom">' + esc(f) + '</div>' +
                    '<div class="ms-fuente-demo" style="font-family:\'' + esc(f) + '\',sans-serif;">' +
                        esc(PROF.nombre || 'Dr. Nombre Apellido') +
                    '</div>' +
                '</div>';
            }).join('');
        })();
        $id('ms_fuentes').addEventListener('click', function (e) {
            var d = e.target.closest('.ms-fuente');
            if (!d) { return; }
            snapshot();
            estado.fuente = d.getAttribute('data-f');
            render();
        });

        /* ---------------- Carga de imagenes ---------------- */
        function conectaDrop(idDrop, idInput, cb) {
            var drop = $id(idDrop), input = $id(idInput);
            drop.addEventListener('click', function () { input.click(); });
            ['dragenter', 'dragover'].forEach(function (ev) {
                drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.add('sobre'); });
            });
            ['dragleave', 'drop'].forEach(function (ev) {
                drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.remove('sobre'); });
            });
            drop.addEventListener('drop', function (e) {
                if (e.dataTransfer.files && e.dataTransfer.files[0]) { lee(e.dataTransfer.files[0]); }
            });
            input.addEventListener('change', function () {
                if (input.files && input.files[0]) { lee(input.files[0]); }
                input.value = '';
            });
            function lee(file) {
                if (!/^image\//.test(file.type)) {
                    swal({ title: 'Archivo no válido', text: 'Sube una imagen PNG, JPG o SVG.', icon: 'error', button: 'Aceptar' });
                    return;
                }
                if (file.size > 4 * 1024 * 1024) {
                    swal({ title: 'Imagen muy pesada', text: 'El máximo es 4 MB.', icon: 'error', button: 'Aceptar' });
                    return;
                }
                var fr = new FileReader();
                fr.onload = function () { cb(fr.result, file); };
                fr.readAsDataURL(file);
            }
        }

        conectaDrop('ms_logo_drop', 'ms_logo_input', function (dataUrl, file) {
            snapshot();
            estado.logo = dataUrl;
            var img = new Image();
            img.onload = function () {
                $id('ms_logo_preview').style.display = '';
                $id('ms_logo_preview').innerHTML =
                    '<div class="ms-preview-img">' +
                        '<img src="' + dataUrl + '" alt="">' +
                        '<div class="ms-info">' + esc(file.name) + '<br>' + img.naturalWidth + ' × ' + img.naturalHeight + ' px</div>' +
                        '<button type="button" class="ms-quitar" id="ms_logo_quitar" title="Quitar"><i class="feather icon-x"></i></button>' +
                    '</div>';
                $id('ms_logo_quitar').addEventListener('click', function () {
                    snapshot();
                    estado.logo = null;
                    $id('ms_logo_preview').style.display = 'none';
                    $id('ms_logo_opts').style.display = 'none';
                    $id('ms_logo_alerta').innerHTML = '';
                    $id('ms_logo_drop').style.display = '';
                    render();
                });
                $id('ms_logo_drop').style.display = 'none';
                $id('ms_logo_opts').style.display = '';
                $id('ms_logo_alerta').innerHTML = (img.naturalWidth < 600 && file.type !== 'image/svg+xml')
                    ? '<div class="alert alert-warning py-2 px-3 mb-0" style="font-size:.74rem;">' +
                      '<i class="feather icon-alert-triangle mr-1"></i>Tu logo mide ' + img.naturalWidth +
                      'px de ancho. Para impresión recomendamos al menos 600px, si no se verá pixelado.</div>'
                    : '';
                render();
            };
            img.src = dataUrl;
        });

        conectaDrop('ms_mw_drop', 'ms_mw_input', function (dataUrl, file) {
            snapshot();
            estado.mw = dataUrl;
            $id('ms_mw_preview').style.display = '';
            $id('ms_mw_preview').innerHTML =
                '<div class="ms-preview-img">' +
                    '<img src="' + dataUrl + '" alt="">' +
                    '<div class="ms-info">' + esc(file.name) + '</div>' +
                    '<button type="button" class="ms-quitar" id="ms_mw_quitar" title="Quitar"><i class="feather icon-x"></i></button>' +
                '</div>';
            $id('ms_mw_quitar').addEventListener('click', function () {
                snapshot();
                estado.mw = null;
                $id('ms_mw_preview').style.display = 'none';
                $id('ms_mw_opts').style.display = 'none';
                $id('ms_mw_drop').style.display = '';
                render();
            });
            $id('ms_mw_drop').style.display = 'none';
            $id('ms_mw_opts').style.display = '';
            render();
        });

        $id('ms_mw_opacidad').addEventListener('input', function () {
            estado.mwOpacidad = parseInt(this.value, 10);
            $id('ms_mw_op_val').textContent = estado.mwOpacidad + '%';
            $id('ms_mw_op_aviso').innerHTML = estado.mwOpacidad > 15
                ? '<span style="color:#d99a2b;"><i class="feather icon-alert-triangle"></i> Una marca de agua muy visible dificulta leer lo que escribas a mano encima.</span>'
                : 'Recomendado: entre 4% y 10%.';
            render();
        });
        $id('ms_mw_opacidad').addEventListener('change', function () { snapshot(); });

        /* Selector de 9 posiciones */
        (function pintaPos9() {
            var filas = ['arriba', 'centro', 'abajo'], cols = ['izq', 'centro', 'der'], h = '';
            filas.forEach(function (f) {
                cols.forEach(function (c) {
                    var v = f + '-' + c;
                    h += '<button type="button" data-v="' + v + '"' + (v === 'centro-centro' ? ' class="activo"' : '') + '></button>';
                });
            });
            $id('ms_mw_pos').innerHTML = h;
        })();
        $id('ms_mw_pos').addEventListener('click', function (e) {
            var b = e.target.closest('button');
            if (!b) { return; }
            snapshot();
            Array.prototype.forEach.call(this.querySelectorAll('button'), function (x) { x.classList.remove('activo'); });
            b.classList.add('activo');
            estado.mwPos = b.getAttribute('data-v');
            render();
        });

        /* ---------------- Campos del paciente ---------------- */
        /* Dibuja Estándar + la especialidad del profesional. La píldora
           «Personalizado» aparece sola cuando el usuario arma su propio set. */
        function pintaConjuntos() {
            var lista = conjuntosVisibles();
            var html = lista.map(function (k) {
                var activo = (estado.conjuntoActivo === k);
                return '<button type="button" class="ms-chip" data-c="' + esc(k) + '"' +
                       (activo ? ' style="border-style:solid;border-color:#1a49a3;color:#1a49a3;"' : '') +
                       '>' + esc(k) + '</button>';
            }).join('');

            if (estado.camposCustom && estado.camposCustom.length) {
                var act = (estado.conjuntoActivo === '__custom');
                html += '<button type="button" class="ms-chip" data-c="__custom"' +
                        (act ? ' style="border-style:solid;border-color:#1a49a3;color:#1a49a3;"' : '') +
                        '><i class="feather icon-sliders"></i> Personalizado</button>';
            }
            $id('ms_conjuntos').innerHTML = html;
        }

        $id('ms_conjuntos').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-c]');
            if (!b) { return; }
            snapshot();
            var k = b.getAttribute('data-c');

            if (k === '__custom') {
                estado.campos = JSON.parse(JSON.stringify(estado.camposCustom));
            } else {
                var c = CONJUNTOS[k];
                if (!c) { return; }
                estado.campos = camposDesde(c.campos);
                /* Si la especialidad trae estructura de cuerpo, se aplica */
                if (c.bloques) {
                    estado.bloques = JSON.parse(JSON.stringify(c.bloques));
                    pintaBloques();
                }
            }
            estado.conjuntoActivo = k;
            pintaConjuntos();
            pintaCampos();
            render();
        });

        /* Guarda el set propio del usuario y marca el conjunto como personalizado */
        function marcaPersonalizado() {
            estado.camposCustom = JSON.parse(JSON.stringify(estado.campos));
            estado.conjuntoActivo = '__custom';
            pintaConjuntos();
        }

        function pintaCampos() {
            $id('ms_campos_activos').innerHTML = estado.campos.map(function (c, i) {
                return '<div class="ms-activo-fila" data-i="' + i + '">' +
                    '<i class="feather icon-menu ms-mover"></i>' +
                    '<input type="text" class="form-control form-control-sm ms-lab" value="' + esc(c.label) + '" maxlength="34" style="width:118px;">' +
                    '<select class="form-control form-control-sm ms-ancho" style="width:100px;">' +
                        '<option value="full"' + (c.ancho === 'full' ? ' selected' : '') + '>Completa</option>' +
                        '<option value="half"' + (c.ancho === 'half' ? ' selected' : '') + '>Media</option>' +
                    '</select>' +
                    '<button type="button" class="ms-quitar" data-a="sube" title="Subir"><i class="feather icon-chevron-up"></i></button>' +
                    '<button type="button" class="ms-quitar" data-a="del" title="Quitar"><i class="feather icon-x"></i></button>' +
                '</div>';
            }).join('') || '<div class="ms-ayuda">Sin campos. El documento tendrá área libre completa.</div>';

            var usados = estado.campos.map(function (c) { return c.id; });
            $id('ms_campos_disp').innerHTML = Object.keys(CAMPOS_CAT).filter(function (id) {
                return usados.indexOf(id) === -1;
            }).map(function (id) {
                return '<button type="button" class="ms-chip" data-add="' + id + '">+ ' + esc(CAMPOS_CAT[id].label) + '</button>';
            }).join('') || '<span class="ms-ayuda">Ya agregaste todos los campos del catálogo.</span>';
        }

        $id('ms_campos_disp').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-add]');
            if (!b) { return; }
            snapshot();
            estado.campos.push(camposDesde([b.getAttribute('data-add')])[0]);
            marcaPersonalizado();
            pintaCampos();
            render();
        });

        /* Campo personalizado */
        function agregaCampoPersonalizado() {
            var txt = $id('ms_campo_nuevo').value.trim();
            if (!txt) {
                swal({ title: 'Falta el nombre', text: 'Escribe cómo se llamará el campo.', icon: 'info', button: 'Aceptar' });
                return;
            }
            snapshot();
            estado.campos.push({
                id: 'p_' + Date.now(),
                label: txt,
                ancho: $id('ms_campo_nuevo_ancho').value
            });
            $id('ms_campo_nuevo').value = '';
            marcaPersonalizado();
            pintaCampos();
            render();
        }
        $id('ms_campo_add').addEventListener('click', agregaCampoPersonalizado);
        $id('ms_campo_nuevo').addEventListener('keydown', function (e) {
            if (e.key === 'Enter') { e.preventDefault(); agregaCampoPersonalizado(); }
        });

        $id('ms_campos_activos').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-a]');
            if (!b) { return; }
            snapshot();
            var i = parseInt(b.closest('.ms-activo-fila').getAttribute('data-i'), 10);
            if (b.getAttribute('data-a') === 'del') {
                estado.campos.splice(i, 1);
            } else if (i > 0) {
                var tmp = estado.campos[i - 1];
                estado.campos[i - 1] = estado.campos[i];
                estado.campos[i] = tmp;
            }
            marcaPersonalizado();
            pintaCampos();
            render();
        });
        $id('ms_campos_activos').addEventListener('change', function (e) {
            var fila = e.target.closest('.ms-activo-fila');
            if (!fila) { return; }
            var i = parseInt(fila.getAttribute('data-i'), 10);
            if (e.target.classList.contains('ms-ancho')) {
                snapshot();
                estado.campos[i].ancho = e.target.value;
                render();
            }
        });
        $id('ms_campos_activos').addEventListener('input', debounce(function (e) {
            var fila = e.target.closest('.ms-activo-fila');
            if (!fila || !e.target.classList.contains('ms-lab')) { return; }
            var i = parseInt(fila.getAttribute('data-i'), 10);
            estado.campos[i].label = e.target.value;
            render();
        }, 250));

        /* =====================================================================
           TITULO DEL DOCUMENTO
           ===================================================================== */
        $id('ms_sw_titulo').addEventListener('change', function () {
            snapshot(); estado.titulo = this.checked; render();
        });
        $id('ms_titulo_txt').addEventListener('input', debounce(function () {
            estado.tituloTxt = this.value; render();
        }, 200));
        $id('ms_titulo_sub').addEventListener('input', debounce(function () {
            estado.tituloSub = this.value; render();
        }, 200));
        seg('ms_seg_titulo_align', function (v) { estado.tituloAlign = v; });

        /* =====================================================================
           CAMBIO DE TIPO DE DOCUMENTO
           ===================================================================== */
        function aplicaDocumento(id, conPlantilla) {
            var d = DOCS[id];
            if (!d) { return; }
            estado.doc = id;
            estado.tituloTxt = d.titulo;
            estado.verRp = d.rp;
            if (conPlantilla) {
                aplicaPlantilla(d.plantilla, true);
            }
            $id('ms_titulo_txt').value = estado.tituloTxt;
            pintaPlantillas();
            pintaBloques();
            pintaCampos();
            pintaConjuntos();
            render();
        }

        function conectaSelectorDoc() {
            var sel = $id('ms_documento');
            function alCambiar() {
                var v = sel.value;
                if (!DOCS[v]) { sel.value = estado.doc; return; }
                snapshot();
                aplicaDocumento(v, true);
            }
            sel.addEventListener('change', alCambiar);
            if (window.jQuery) { jQuery(sel).on('select2:select', alCambiar); }
        }

        /* =====================================================================
           EDITOR DE BLOQUES DEL CUERPO
           ===================================================================== */
        function pintaPlantillas() {
            var set = PLANTILLAS[estado.doc] || {};
            $id('ms_cuerpo_plantillas').innerHTML = Object.keys(set).map(function (k) {
                var activa = (estado.plantillaActiva === k);
                var ocultaDatos = set[k].sinCampos ? ' title="Esta plantilla lleva los datos del paciente dentro del cuerpo"' : '';
                return '<button type="button" class="ms-chip" data-pl="' + esc(k) + '"' + ocultaDatos +
                       (activa ? ' style="border-style:solid;border-color:#1a49a3;color:#1a49a3;"' : '') +
                       '>' + esc(k) + (set[k].sinCampos ? ' <i class="feather icon-user-x" style="font-size:.7rem;"></i>' : '') +
                       '</button>';
            }).join('');
        }
        /* Aplica una plantilla de cuerpo. Si la plantilla trae los datos del
           paciente dentro del cuerpo, se limpian los campos de la cabecera
           para que no aparezcan duplicados. */
        function aplicaPlantilla(nombre, silencioso) {
            var p = (PLANTILLAS[estado.doc] || {})[nombre];
            if (!p) { estado.bloques = []; return; }

            estado.bloques = JSON.parse(JSON.stringify(p.bloques || []));
            estado.plantillaActiva = nombre;

            if (p.sinCampos) {
                if (!silencioso && estado.campos.length) {
                    estado.camposCustom = JSON.parse(JSON.stringify(estado.campos));
                }
                estado.campos = [];
            }
        }

        $id('ms_cuerpo_plantillas').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-pl]');
            if (!b) { return; }
            snapshot();
            aplicaPlantilla(b.getAttribute('data-pl'), false);
            pintaPlantillas();
            pintaBloques();
            pintaCampos();
            pintaConjuntos();
            render();
        });

        (function pintaTiposBloque() {
            $id('ms_bloques_add').innerHTML = BLOQUES_AGREGABLES.map(function (t) {
                return '<button type="button" class="ms-chip" data-bt="' + t + '">+ ' + esc(BLOQUE_TIPOS[t].label) + '</button>';
            }).join('');
        })();
        $id('ms_bloques_add').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-bt]');
            if (!b) { return; }
            snapshot();
            estado.bloques.push(bloqueNuevo(b.getAttribute('data-bt')));
            pintaBloques();
            render();
        });

        function pintaBloques() {
            if (!estado.bloques.length) {
                $id('ms_bloques').innerHTML =
                    '<div class="ms-bloque-vacio">Sin bloques. El cuerpo queda como área libre para escribir a mano.</div>';
                return;
            }
            $id('ms_bloques').innerHTML = estado.bloques.map(function (b, i) {
                var tipo = BLOQUE_TIPOS[b.t] || { label: b.t, ico: 'square' };
                var cuerpo = '';

                if (b.t === 'parrafo') {
                    cuerpo = '<textarea class="form-control form-control-sm ms-bt" rows="3">' + esc(b.texto) + '</textarea>';
                }
                if (b.t === 'subtitulo') {
                    cuerpo = '<input type="text" class="form-control form-control-sm ms-bt" value="' + esc(b.texto) + '" maxlength="60">';
                }
                if (b.t === 'campos') {
                    cuerpo = b.items.map(function (it, j) {
                        return '<div class="ms-bloque-item" data-j="' + j + '">' +
                            '<input type="text" class="form-control form-control-sm ms-bi-label" value="' + esc(it.label) + '" maxlength="34">' +
                            '<select class="form-control form-control-sm ms-bi-ancho" style="width:96px;">' +
                                '<option value="full"' + (it.ancho === 'full' ? ' selected' : '') + '>Completa</option>' +
                                '<option value="half"' + (it.ancho === 'half' ? ' selected' : '') + '>Media</option>' +
                            '</select>' +
                            '<button type="button" class="ms-quitar" data-bi="del" title="Quitar"><i class="feather icon-x"></i></button>' +
                        '</div>';
                    }).join('') +
                    '<button type="button" class="ms-chip" data-bi="add">+ Campo</button>';
                }
                if (b.t === 'lineas') {
                    cuerpo = '<div class="d-flex" style="gap:6px;">' +
                        '<input type="number" class="form-control form-control-sm ms-bn" min="1" max="14" value="' + b.n + '" style="width:74px;">' +
                        '<select class="form-control form-control-sm ms-be">' +
                            '<option value="continua"' + (b.estilo === 'continua' ? ' selected' : '') + '>Continua</option>' +
                            '<option value="punteada"' + (b.estilo === 'punteada' ? ' selected' : '') + '>Punteada</option>' +
                        '</select></div>';
                }
                if (b.t === 'tabla') {
                    cuerpo = '<label class="ms-lbl">Columnas (separadas por coma)</label>' +
                        '<input type="text" class="form-control form-control-sm ms-bcols" value="' + esc(b.cols.join(', ')) + '">' +
                        '<label class="ms-lbl mt-2">Filas (separadas por coma)</label>' +
                        '<input type="text" class="form-control form-control-sm ms-bfilas" value="' + esc(b.filas.join(', ')) + '">' +
                        '<div class="ms-ayuda">Deja la primera columna vacía si quieres una cabecera de fila (ej: OD / OI).</div>';
                }
                if (b.t === 'espacio') {
                    cuerpo = '<div class="d-flex align-items-center" style="gap:8px;">' +
                        '<input type="range" class="form-control-range ms-ba" min="6" max="140" value="' + b.alto + '">' +
                        '<span style="font-size:.72rem;color:#8b93a7;min-width:38px;">' + b.alto + ' px</span></div>';
                }

                return '<div class="ms-bloque" data-i="' + i + '">' +
                    '<div class="ms-bloque-top">' +
                        '<i class="feather icon-' + tipo.ico + ' tipo"></i>' +
                        '<span>' + esc(tipo.label) + '</span>' +
                        '<button type="button" class="ms-quitar" data-b="sube" title="Subir"><i class="feather icon-chevron-up"></i></button>' +
                        '<button type="button" class="ms-quitar" data-b="baja" title="Bajar"><i class="feather icon-chevron-down"></i></button>' +
                        '<button type="button" class="ms-quitar" data-b="del" title="Quitar"><i class="feather icon-x"></i></button>' +
                    '</div>' +
                    '<div class="ms-bloque-body">' + cuerpo + '</div>' +
                '</div>';
            }).join('');
        }

        /* Acciones sobre bloques */
        $id('ms_bloques').addEventListener('click', function (e) {
            var cont = e.target.closest('.ms-bloque');
            if (!cont) { return; }
            var i = parseInt(cont.getAttribute('data-i'), 10);

            var bAcc = e.target.closest('button[data-b]');
            if (bAcc) {
                snapshot();
                var a = bAcc.getAttribute('data-b');
                if (a === 'del') { estado.bloques.splice(i, 1); }
                if (a === 'sube' && i > 0) {
                    var t1 = estado.bloques[i - 1]; estado.bloques[i - 1] = estado.bloques[i]; estado.bloques[i] = t1;
                }
                if (a === 'baja' && i < estado.bloques.length - 1) {
                    var t2 = estado.bloques[i + 1]; estado.bloques[i + 1] = estado.bloques[i]; estado.bloques[i] = t2;
                }
                pintaBloques(); render();
                return;
            }

            var bItem = e.target.closest('[data-bi]');
            if (bItem) {
                snapshot();
                if (bItem.getAttribute('data-bi') === 'add') {
                    estado.bloques[i].items.push({ label: 'Campo', ancho: 'full' });
                } else {
                    var j = parseInt(bItem.closest('.ms-bloque-item').getAttribute('data-j'), 10);
                    estado.bloques[i].items.splice(j, 1);
                }
                pintaBloques(); render();
            }
        });

        /* Edicion de contenido de bloques */
        $id('ms_bloques').addEventListener('input', debounce(function (e) {
            var cont = e.target.closest('.ms-bloque');
            if (!cont) { return; }
            var i = parseInt(cont.getAttribute('data-i'), 10);
            var b = estado.bloques[i];
            if (!b) { return; }
            var t = e.target;

            if (t.classList.contains('ms-bt'))    { b.texto = t.value; }
            if (t.classList.contains('ms-bn'))    { b.n = Math.max(1, Math.min(14, parseInt(t.value, 10) || 1)); }
            if (t.classList.contains('ms-bcols')) { b.cols = t.value.split(',').map(function (x) { return x.trim(); }); }
            if (t.classList.contains('ms-bfilas')){ b.filas = t.value.split(',').map(function (x) { return x.trim(); }).filter(Boolean); }
            if (t.classList.contains('ms-ba'))    {
                b.alto = parseInt(t.value, 10);
                var sp = t.parentNode.querySelector('span');
                if (sp) { sp.textContent = b.alto + ' px'; }
            }
            if (t.classList.contains('ms-bi-label')) {
                var j = parseInt(t.closest('.ms-bloque-item').getAttribute('data-j'), 10);
                b.items[j].label = t.value;
            }
            render();
        }, 220));

        $id('ms_bloques').addEventListener('change', function (e) {
            var cont = e.target.closest('.ms-bloque');
            if (!cont) { return; }
            var i = parseInt(cont.getAttribute('data-i'), 10);
            var b = estado.bloques[i];
            if (!b) { return; }
            if (e.target.classList.contains('ms-be')) { snapshot(); b.estilo = e.target.value; render(); }
            if (e.target.classList.contains('ms-bi-ancho')) {
                snapshot();
                var j = parseInt(e.target.closest('.ms-bloque-item').getAttribute('data-j'), 10);
                b.items[j].ancho = e.target.value;
                render();
            }
        });

        /* ---------------- Contacto ---------------- */
        function pintaContacto() {
            $id('ms_contacto_activos').innerHTML = estado.contacto.map(function (c) {
                var cat = CONTACTO_CAT[c.id];
                return '<div class="ms-activo-fila" data-id="' + c.id + '">' +
                    '<i class="feather icon-menu ms-mover"></i>' +
                    '<span class="ms-nom">' + esc(cat.label) + '</span>' +
                    '<input type="text" class="form-control form-control-sm ms-val" value="' + esc(c.valor) + '" placeholder="' + esc(cat.ph) + '">' +
                    '<button type="button" class="ms-quitar" title="Quitar"><i class="feather icon-x"></i></button>' +
                '</div>';
            }).join('');

            var usados = estado.contacto.map(function (c) { return c.id; });
            $id('ms_contacto_disp').innerHTML = Object.keys(CONTACTO_CAT).filter(function (id) {
                return usados.indexOf(id) === -1;
            }).map(function (id) {
                return '<button type="button" class="ms-chip" data-add="' + id + '">+ ' + esc(CONTACTO_CAT[id].label) + '</button>';
            }).join('') || '<span class="ms-ayuda">Ya agregaste todos los datos disponibles.</span>';

            var n = estado.contacto.length, cls = 'ok', txt = 'buen equilibrio ✓';
            if (n >= 6 && n <= 7) { cls = 'medio'; txt = 'el documento se ve cargado'; }
            if (n >= 8) { cls = 'alto'; txt = '⚠ demasiada información resta legibilidad'; }
            $id('ms_contacto_contador').className = 'ms-contador ' + cls;
            $id('ms_contacto_contador').textContent = n + ' de 8 datos · ' + txt;
            $id('ms_res_contacto').textContent = n + ' de 8 datos';
        }
        $id('ms_contacto_disp').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-add]');
            if (!b) { return; }
            snapshot();
            estado.contacto.push({ id: b.getAttribute('data-add'), valor: '' });
            pintaContacto();
            render();
        });
        $id('ms_contacto_activos').addEventListener('click', function (e) {
            var q = e.target.closest('.ms-quitar');
            if (!q) { return; }
            snapshot();
            var id = q.closest('.ms-activo-fila').getAttribute('data-id');
            estado.contacto = estado.contacto.filter(function (x) { return x.id !== id; });
            pintaContacto();
            render();
        });
        $id('ms_contacto_activos').addEventListener('input', debounce(function (e) {
            if (!e.target.classList.contains('ms-val')) { return; }
            var id = e.target.closest('.ms-activo-fila').getAttribute('data-id');
            estado.contacto.forEach(function (c) { if (c.id === id) { c.valor = e.target.value; } });
            render();
        }, 200));

        /* ---------------- QR ---------------- */
        (function pintaQrTipos() {
            $id('ms_qr_tipos').innerHTML = Object.keys(QR_TIPOS).map(function (k) {
                return '<button type="button" class="ms-chip" data-t="' + k + '"' +
                       (k === 'enlace' ? ' style="border-style:solid;border-color:#1a49a3;color:#1a49a3;"' : '') +
                       '>' + esc(QR_TIPOS[k].label) + '</button>';
            }).join('');
        })();
        $id('ms_qr_tipos').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-t]');
            if (!b) { return; }
            snapshot();
            estado.qrTipo = b.getAttribute('data-t');
            Array.prototype.forEach.call(this.querySelectorAll('.ms-chip'), function (x) {
                x.style.cssText = '';
            });
            b.style.cssText = 'border-style:solid;border-color:#1a49a3;color:#1a49a3;';
            $id('ms_qr_valor').placeholder = QR_TIPOS[estado.qrTipo].ph;
            $id('ms_qr_ayuda').textContent = QR_TIPOS[estado.qrTipo].ayuda;
            render();
        });
        $id('ms_qr_valor').addEventListener('input', debounce(function () {
            estado.qrValor = this.value;
            render();
        }, 250));
        $id('ms_qr_leyenda').addEventListener('input', debounce(function () {
            estado.qrLeyenda = this.value;
            render();
        }, 250));

        var QR_POS_AYUDA = {
            head:    'Queda arriba a la derecha, junto a tus datos.',
            pie:     'Queda al lado del área de firma y timbre.',
            esquina: 'Flota en la esquina inferior derecha del área de escritura.',
            barra:   'Requiere activar la barra inferior de contacto en «Documento».'
        };
        seg('ms_seg_qr_pos', function (v) {
            estado.qrPos = v;
            $id('ms_qr_pos_ayuda').textContent = QR_POS_AYUDA[v] || '';
            if (v === 'barra' && !estado.barra) {
                estado.barra = true;
                $id('ms_sw_barra').checked = true;
            }
        });
        seg('ms_seg_qr_size', function (v) { estado.qrSize = v; });

        var QR_PX = { s: 34, m: 46, l: 62 };

        /* Construye el contenido real del QR segun el tipo elegido */
        function qrPayload() {
            var v = (estado.qrValor || '').trim();
            if (!v) { return ''; }
            var soloNum = v.replace(/[^\d+]/g, '');
            if (estado.qrTipo === 'telefono') { return 'tel:' + soloNum; }
            if (estado.qrTipo === 'whatsapp') { return 'https://wa.me/' + soloNum.replace(/^\+/, ''); }
            if (/^https?:\/\//i.test(v)) { return v; }
            return 'https://' + v;
        }
        function dibujaQr(cont, texto, tam) {
            cont.innerHTML = '';
            if (!texto || typeof QRCode === 'undefined') { return; }
            try {
                new QRCode(cont, {
                    text: texto, width: tam, height: tam,
                    correctLevel: QRCode.CorrectLevel.H
                });
            } catch (e) {}
        }
        $id('ms_qr_probar').addEventListener('click', function () {
            var p = qrPayload();
            if (!p) {
                swal({ title: 'QR vacío', text: 'Escribe primero el enlace o número.', icon: 'info', button: 'Aceptar' });
                return;
            }
            dibujaQr($id('ms_qr_grande'), p, 200);
            $('#ms_modal_qr').modal('show');
        });

        /* =====================================================================
           RENDER — dibuja el documento desde el estado
           ===================================================================== */
        var render = debounce(function () { renderYa(); }, 90);

        /* Multiplicadores de los tamaños de texto que el usuario puede ajustar */
        var MULT = { chico: 0.86, normal: 1, grande: 1.16 };
        /* Los campos del paciente arrancan mas chicos: en las recetas reales
           las etiquetas son notoriamente menores que el resto del texto. */
        var MULT_CAMPOS = { normal: 0.82, grande: 1 };
        /* Separación entre bloques del cuerpo, en px */
        var ESPACIO_BLOQUES = { normal: 7, separado: 16 };

        function renderYa() {
            var base = ESCALAS[estado.escala] || ESCALAS.normal;
            var mCampo = MULT_CAMPOS[estado.camposEscala] || MULT_CAMPOS.normal;
            var mCont = MULT[estado.contactoEscala] || 1;

            /* Copia con los ajustes finos aplicados */
            var e = {};
            Object.keys(base).forEach(function (k) { e[k] = base[k]; });
            e.campo = base.campo * mCampo;
            e.cuerpo = base.cuerpo * mCampo;
            e.datos = base.datos * mCont;
            e.barra = base.barra * mCont;

            var paper = $id('ms_paper');

            paper.style.fontFamily = "'" + estado.fuente + "', sans-serif";

            /* --- Encabezado --- */
            var head = $id('ms_doc_head');
            head.className = 'ms-zona ms-doc-head ' + estado.headPos;

            var logoBox = $id('ms_doc_logo');
            logoBox.className = 'ms-doc-logo ' + estado.logoSize;
            logoBox.innerHTML = estado.logo
                ? '<img src="' + estado.logo + '" alt="">'
                : '<div class="ms-doc-logo-vacio"><i class="feather icon-image"></i></div>';

            var nom = $id('ms_doc_nombre');
            nom.textContent = PROF.nombre || 'Nombre del profesional';
            nom.style.fontSize = e.nombre + 'px';
            nom.style.color = estado.color;

            var espEl = $id('ms_doc_esp');
            espEl.textContent = estado.especialidad || '';
            espEl.style.fontSize = e.esp + 'px';
            espEl.style.color = '#555';
            espEl.style.display = estado.especialidad ? '' : 'none';

            var linsDatos = [];
            if (estado.verRut && PROF.rut) { linsDatos.push('R.U.T.: ' + PROF.rut); }
            if (estado.verRegistro && PROF.registro) { linsDatos.push('Reg. SIS: ' + PROF.registro); }
            if (estado.verColegio && PROF.colegio) { linsDatos.push('R.C.M.: ' + PROF.colegio); }
            estado.contacto.forEach(function (c) {
                if (c.valor && !estado.barra) { linsDatos.push(esc(c.valor)); }
            });
            var datosEl = $id('ms_doc_datos');
            datosEl.innerHTML = linsDatos.join('<br>');
            datosEl.style.fontSize = e.datos + 'px';

            /* --- Etiqueta de esquina --- */
            var et = $id('ms_doc_etiqueta');
            et.style.display = estado.etiqueta ? '' : 'none';
            et.style.background = estado.color;

            /* --- Banda --- */
            var banda = $id('ms_doc_banda');
            banda.style.display = estado.banda ? '' : 'none';
            banda.style.background = estado.color;

            /* --- Titulo del documento --- */
            var tit = $id('ms_doc_titulo');
            if (estado.titulo && (estado.tituloTxt || estado.tituloSub)) {
                tit.style.display = '';
                tit.className = 'ms-zona ms-doc-titulo ' + estado.tituloAlign;
                tit.style.fontSize = e.tit + 'px';
                tit.style.color = estado.color;
                tit.innerHTML = esc(estado.tituloTxt) +
                    (estado.tituloSub ? '<span class="sub" style="font-size:' + (e.tit * .58) + 'px;">' + esc(estado.tituloSub) + '</span>' : '');
            } else {
                tit.style.display = 'none';
                tit.innerHTML = '';
            }

            /* --- Campos del paciente --- */
            var altoCampo = Math.round(e.campo * 2.5);
            $id('ms_doc_campos').innerHTML = estado.campos.map(function (c) {
                return '<div class="ms-doc-campo ' + c.ancho + '" style="font-size:' + e.campo + 'px;min-height:' + altoCampo + 'px;">' +
                    '<label style="font-size:' + e.campo + 'px;line-height:1.25;">' + esc(c.label) + ':</label>' +
                    '<div class="ms-doc-linea ' + estado.linea + '"></div>' +
                '</div>';
            }).join('');

            /* --- Rp. (convencion chilena) --- */
            var rp = $id('ms_doc_rp');
            rp.style.display = estado.verRp ? '' : 'none';
            rp.style.fontSize = e.rp + 'px';
            rp.style.color = estado.color;

            /* --- Cuerpo del documento (bloques) --- */
            var sep = ESPACIO_BLOQUES[estado.espacioBloques];
            if (sep === undefined) { sep = 7; }
            $id('ms_doc_cuerpo').style.setProperty('--ms-sep', sep + 'px');
            $id('ms_doc_cuerpo').innerHTML = estado.bloques.map(function (b) {
                if (b.t === 'parrafo') {
                    /* Los ___ se transforman en lineas para completar a mano */
                    var html = esc(b.texto).replace(/_{3,}/g, '<span class="hueco"></span>');
                    return '<div class="ms-b ms-b-parrafo" style="font-size:' + e.cuerpo + 'px;">' + html + '</div>';
                }
                if (b.t === 'subtitulo') {
                    return '<div class="ms-b ms-b-subtitulo" style="font-size:' + (e.cuerpo * 1.05) + 'px;color:' + estado.color + ';">' +
                        esc(b.texto) + '</div>';
                }
                if (b.t === 'campos') {
                    return '<div class="ms-b ms-b-campos">' + b.items.map(function (it) {
                        return '<div class="ms-doc-campo ' + it.ancho + '" style="font-size:' + e.cuerpo + 'px;">' +
                            '<label>' + esc(it.label) + ':</label>' +
                            '<div class="ms-doc-linea ' + estado.linea + '"></div>' +
                        '</div>';
                    }).join('') + '</div>';
                }
                if (b.t === 'lineas') {
                    var ln = '';
                    for (var i = 0; i < b.n; i++) { ln += '<div class="ln"></div>'; }
                    return '<div class="ms-b ms-b-lineas ' + (b.estilo || 'continua') + '">' + ln + '</div>';
                }
                if (b.t === 'tabla') {
                    var th = b.cols.map(function (c) { return '<th>' + esc(c) + '</th>'; }).join('');
                    var tr = b.filas.map(function (f) {
                        var celdas = '<td class="rot">' + esc(f) + '</td>';
                        for (var k = 1; k < b.cols.length; k++) { celdas += '<td>&nbsp;</td>'; }
                        return '<tr>' + celdas + '</tr>';
                    }).join('');
                    return '<table class="ms-b ms-b-tabla" style="font-size:' + (e.cuerpo * .92) + 'px;">' +
                        '<thead><tr>' + th + '</tr></thead><tbody>' + tr + '</tbody></table>';
                }
                if (b.t === 'espacio') {
                    return '<div class="ms-b" style="height:' + b.alto + 'px;"></div>';
                }
                return '';
            }).join('');

            /* --- Marca de agua --- */
            var mw = $id('ms_doc_marca');
            if (estado.mw) {
                var p = estado.mwPos.split('-');
                mw.style.display = 'flex';
                mw.className = 'ms-doc-marca ' + estado.mwSize;
                mw.style.alignItems = p[0] === 'arriba' ? 'flex-start' : (p[0] === 'abajo' ? 'flex-end' : 'center');
                mw.style.justifyContent = p[1] === 'izq' ? 'flex-start' : (p[1] === 'der' ? 'flex-end' : 'center');
                mw.style.opacity = estado.mwOpacidad / 100;
                mw.innerHTML = '<img src="' + estado.mw + '" alt="">';
            } else {
                mw.style.display = 'none';
                mw.innerHTML = '';
            }

            /* --- Pie --- */
            var pie = $id('ms_doc_pie');
            pie.className = 'ms-zona ms-doc-pie';
            var hPie = '';
            if (estado.pieFecha) {
                hPie += '<div class="ms-doc-firma" style="font-size:' + e.pie + 'px;min-width:96px;">' +
                            '<div class="l"></div><div class="t">Fecha</div>' +
                        '</div>';
            }
            hPie += '<div class="ms-doc-firma" style="font-size:' + e.pie + 'px;margin-left:auto;">' +
                        '<div class="l"></div><div class="t">Firma y Timbre Profesional</div>' +
                    '</div>';
            pie.innerHTML = hPie;

            /* --- Barra inferior --- */
            var barra = $id('ms_doc_barra');
            if (estado.barra) {
                barra.style.display = 'flex';
                barra.style.background = estado.color;
                barra.style.fontSize = e.barra + 'px';
                var vals = estado.contacto.filter(function (c) { return c.valor; })
                    .map(function (c) { return esc(c.valor); });
                var cont;
                if (!vals.length) {
                    cont = 'Agrega datos de contacto para mostrarlos aquí';
                } else if (estado.contactoEstilo === 'columna') {
                    cont = '<div class="ms-barra-cols">' +
                        vals.map(function (v) { return '<span>' + v + '</span>'; }).join('') + '</div>';
                } else {
                    cont = vals.join(' · ');
                }
                barra.innerHTML = '<div class="cont ' + estado.contactoAlign + '">' + cont + '</div>';
            } else {
                barra.style.display = 'none';
                barra.innerHTML = '';
            }

            /* --- QR: se coloca en la zona elegida --- */
            colocaQr(e);

            /* --- QR de muestra en el panel --- */
            if (estado.qr) { dibujaQr($id('ms_qr_muestra'), qrPayload(), 62); }
            else { $id('ms_qr_muestra').innerHTML = ''; }

            /* --- Resumenes del acordeon --- */
            var pal = PALETAS.filter(function (x) { return x.id === estado.paleta; })[0];
            $id('ms_res_marca').textContent = (pal ? pal.nombre : estado.color.toUpperCase()) + ' · ' + estado.fuente;
            $id('ms_res_campos').textContent = estado.campos.length + ' campo' + (estado.campos.length === 1 ? '' : 's') + ' · Firma y timbre';
            $id('ms_res_extras').textContent = (estado.qr ? 'QR activo' : 'Sin QR') + ' · ' + (estado.mw ? 'Con marca de agua' : 'Sin marca de agua');
            $id('ms_res_exportar').textContent = estado.formato.toUpperCase() + ' · ' + (estado.dist === 'a5' ? 'A5 individual' : '2 en A4');
            $id('ms_res_documento').textContent = 'Talonario A5 · 14 × 21 cm';

            pintaCmyk();
            pintaPreflight();
            marcaFuenteActiva();
            marcaPaletaActiva();
            guardar();

            $id('ms_guardado').innerHTML = '<i class="feather icon-loader"></i> Guardando…';
        }

        /* Coloca el QR en la zona elegida por el usuario */
        function colocaQr(e) {
            /* Limpia cualquier QR dibujado antes */
            var previos = $id('ms_paper').querySelectorAll('.ms-doc-qr-head, .ms-doc-qr-pie, .qr');
            Array.prototype.forEach.call(previos, function (n) { n.parentNode.removeChild(n); });
            var flot = $id('ms_doc_qr_flot');
            flot.style.display = 'none';
            flot.innerHTML = '';

            var payload = qrPayload();
            if (!estado.qr || !payload) { return; }

            var px = QR_PX[estado.qrSize] || QR_PX.m;
            var leyenda = estado.qrLeyenda
                ? '<div class="ms-qr-cap" style="max-width:' + (px + 14) + 'px;">' + esc(estado.qrLeyenda) + '</div>'
                : '';

            if (estado.qrPos === 'head') {
                var d = document.createElement('div');
                d.className = 'ms-doc-qr-head';
                d.innerHTML = '<div class="cod"></div>' + leyenda;
                $id('ms_doc_head').appendChild(d);
                dibujaQr(d.querySelector('.cod'), payload, px);
                return;
            }

            if (estado.qrPos === 'pie') {
                var p = document.createElement('div');
                p.className = 'ms-doc-qr-pie';
                p.innerHTML = '<div class="cod"></div>' + leyenda;
                $id('ms_doc_pie').insertBefore(p, $id('ms_doc_pie').firstChild);
                dibujaQr(p.querySelector('.cod'), payload, px);
                return;
            }

            if (estado.qrPos === 'esquina') {
                flot.style.display = '';
                flot.style.right = '0';
                flot.style.bottom = '0';
                flot.innerHTML = '<div class="cod"></div>' + leyenda;
                dibujaQr(flot.querySelector('.cod'), payload, px);
                return;
            }

            if (estado.qrPos === 'barra' && estado.barra) {
                var b = document.createElement('div');
                b.className = 'qr';
                $id('ms_doc_barra').insertBefore(b, $id('ms_doc_barra').firstChild);
                dibujaQr(b, payload, Math.min(px, 46));
            }
        }

        function marcaFuenteActiva() {
            Array.prototype.forEach.call($id('ms_fuentes').querySelectorAll('.ms-fuente'), function (d) {
                d.classList.toggle('activa', d.getAttribute('data-f') === estado.fuente);
            });
        }
        function marcaPaletaActiva() {
            Array.prototype.forEach.call($id('ms_paletas').querySelectorAll('.ms-paleta'), function (d) {
                d.classList.toggle('activa', d.getAttribute('data-p') === estado.paleta);
            });
        }

        /* ---------------- Revision previa (preflight) ---------------- */
        function pintaPreflight() {
            var items = [];

            if (estado.logo) {
                items.push({ ok: true, txt: 'Logo cargado' });
            } else {
                items.push({ ok: false, txt: 'Sin logo. El documento se verá más simple.' });
            }

            var o = hexToRgb(estado.color), k = rgbToCmyk(o.r, o.g, o.b);
            var sat = Math.max(o.r, o.g, o.b) - Math.min(o.r, o.g, o.b);
            if (sat > 150 && k.k < 20) {
                items.push({ ok: false, txt: 'El color elegido se verá más apagado impreso en CMYK.' });
            } else {
                items.push({ ok: true, txt: 'Color apto para impresión' });
            }

            var lum = (o.r * 299 + o.g * 587 + o.b * 114) / 1000;
            if (lum > 190) {
                items.push({ ok: false, txt: 'El color es muy claro: puede leerse mal sobre papel blanco.' });
            } else {
                items.push({ ok: true, txt: 'Contraste adecuado sobre papel blanco' });
            }

            if (estado.mw && estado.mwOpacidad > 15) {
                items.push({ ok: false, txt: 'La marca de agua está muy visible y dificulta escribir encima.' });
            }

            if (estado.qr && !qrPayload()) {
                items.push({ ok: false, txt: 'El QR está activo pero sin contenido.' });
            }

            $id('ms_preflight').innerHTML = items.map(function (i) {
                return '<div class="ms-check ' + (i.ok ? 'ok' : 'warn') + '">' +
                    '<i class="feather icon-' + (i.ok ? 'check-circle' : 'alert-triangle') + '"></i>' +
                    '<span>' + esc(i.txt) + '</span></div>';
            }).join('');
        }

        /* ---------------- Zoom y vistas ---------------- */
        function aplicaZoom() {
            $id('ms_paper_outer').style.transform = 'scale(' + zoom + ')';
            $id('ms_zoom_val').textContent = Math.round(zoom * 100) + '%';
            /* Reserva el alto real para que el contenedor no se solape */
            $id('ms_paper_outer').style.height = (630 * zoom) + 'px';
        }
        $id('ms_zoom_mas').addEventListener('click', function () { zoom = Math.min(2, zoom + .1); aplicaZoom(); });
        $id('ms_zoom_menos').addEventListener('click', function () { zoom = Math.max(.3, zoom - .1); aplicaZoom(); });
        $id('ms_zoom_fit').addEventListener('click', function () {
            var disp = raiz.querySelector('.ms-canvas').clientHeight - 52;
            zoom = Math.max(.3, Math.min(1.4, disp / 630));
            aplicaZoom();
        });
        $id('ms_ver_guias').addEventListener('click', function () {
            this.classList.toggle('activo');
            $id('ms_paper').classList.toggle('con-guias');
        });
        $id('ms_ver_gris').addEventListener('click', function () {
            this.classList.toggle('activo');
            $id('ms_paper').classList.toggle('gris');
        });

        /* =====================================================================
           EXPORTACION
           ===================================================================== */
        function capturar(escala) {
            var paper = $id('ms_paper');
            var outer = $id('ms_paper_outer');
            var zPrev = outer.style.transform;
            var guias = paper.classList.contains('con-guias');
            var gris = paper.classList.contains('gris');

            outer.style.transform = 'scale(1)';
            paper.classList.remove('con-guias', 'gris');

            return html2canvas(paper, {
                scale: escala,
                backgroundColor: '#ffffff',
                useCORS: true,
                logging: false
            }).then(function (canvas) {
                outer.style.transform = zPrev;
                if (guias) { paper.classList.add('con-guias'); }
                if (gris) { paper.classList.add('gris'); }
                return canvas;
            }).catch(function (err) {
                outer.style.transform = zPrev;
                if (guias) { paper.classList.add('con-guias'); }
                if (gris) { paper.classList.add('gris'); }
                throw err;
            });
        }

        function descarga(dataUrl, nombre) {
            var a = document.createElement('a');
            a.href = dataUrl;
            a.download = nombre;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function nombreArchivo(ext) {
            var n = (PROF.nombre || 'talonario').toLowerCase()
                .replace(/[áàä]/g, 'a').replace(/[éèë]/g, 'e').replace(/[íìï]/g, 'i')
                .replace(/[óòö]/g, 'o').replace(/[úùü]/g, 'u').replace(/ñ/g, 'n')
                .replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            return 'talonario-' + n + '.' + ext;
        }

        $id('ms_btn_exportar').addEventListener('click', function () { abreSeccion('exportar'); });

        $id('ms_generar').addEventListener('click', function () {
            var btn = this, txtOrig = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="feather icon-loader"></i> Generando…';

            /* Escala 4 -> 420px * 4 = 1680px para 140mm ≈ 305 DPI */
            capturar(4).then(function (canvas) {
                if (estado.formato === 'jpeg' || estado.formato === 'png') {
                    var tipo = estado.formato === 'jpeg' ? 'image/jpeg' : 'image/png';
                    descarga(canvas.toDataURL(tipo, 0.95), nombreArchivo(estado.formato === 'jpeg' ? 'jpg' : 'png'));
                    exito();
                    return;
                }

                /* PDF con jsPDF (ya viene cargado en la plantilla) */
                var JsPDF = (window.jspdf && window.jspdf.jsPDF) ? window.jspdf.jsPDF : window.jsPDF;
                if (!JsPDF) {
                    swal({ title: 'No se pudo generar el PDF', text: 'La librería de PDF no está disponible.', icon: 'error', button: 'Aceptar' });
                    restaura();
                    return;
                }

                var img = canvas.toDataURL('image/jpeg', 0.95);
                var pdf;

                if (estado.dist === 'a5') {
                    pdf = new JsPDF({ orientation: 'portrait', unit: 'mm', format: [140, 210] });
                    pdf.addImage(img, 'JPEG', 0, 0, 140, 210);
                } else {
                    /* Dos documentos de 140x210 en una A4 horizontal (297x210) */
                    pdf = new JsPDF({ orientation: 'landscape', unit: 'mm', format: 'a4' });
                    var margen = (297 - 280) / 2;   /* 8.5 mm a cada lado */
                    pdf.addImage(img, 'JPEG', margen, 0, 140, 210);
                    pdf.addImage(img, 'JPEG', margen + 140, 0, 140, 210);
                    /* Linea de corte punteada al centro */
                    if (pdf.setLineDashPattern) { pdf.setLineDashPattern([2, 2], 0); }
                    pdf.setDrawColor(150);
                    pdf.line(margen + 140, 0, margen + 140, 210);
                }

                pdf.save(nombreArchivo('pdf'));
                exito();

            }).catch(function (err) {
                console.log('MedStudio export:', err);
                swal({ title: 'No se pudo generar', text: 'Ocurrió un error al generar el documento.', icon: 'error', button: 'Aceptar' });
                restaura();
            });

            function exito() {
                restaura();
                guardarEnHistorial(true);
                swal({ title: '¡Listo!', text: 'Tu documento se descargó correctamente.', icon: 'success', button: 'Aceptar' });
            }
            function restaura() {
                btn.disabled = false;
                btn.innerHTML = txtOrig;
            }
        });

        /* =====================================================================
           HISTORIAL (localStorage)
           ===================================================================== */
        function leeHistorial() {
            try { return JSON.parse(localStorage.getItem('ms_historial') || '[]'); }
            catch (e) { return []; }
        }
        function escribeHistorial(a) {
            try { localStorage.setItem('ms_historial', JSON.stringify(a.slice(0, 3))); } catch (e) {}
        }

        function guardarEnHistorial(silencioso) {
            capturar(0.55).then(function (canvas) {
                var lista = leeHistorial();
                lista.unshift({
                    id: Date.now(),
                    nombre: 'Talonario ' + new Date().toLocaleDateString('es-CL'),
                    fecha: new Date().toLocaleDateString('es-CL', { day: '2-digit', month: 'short', year: 'numeric' }),
                    tipo: 'Talonario A5',
                    thumb: canvas.toDataURL('image/jpeg', 0.6),
                    estado: JSON.stringify(estado)
                });
                escribeHistorial(lista);
                pintaHistorial();
                if (!silencioso) {
                    swal({ title: 'Guardado', text: 'Tu diseño quedó en «Tus últimos diseños».', icon: 'success', button: 'Aceptar' });
                }
            }).catch(function () {});
        }
        $id('ms_guardar_hist').addEventListener('click', function () { guardarEnHistorial(false); });

        function pintaHistorial() {
            var lista = leeHistorial();
            if (!lista.length) {
                $id('ms_historial').innerHTML =
                    '<div class="ms-vacio">' +
                        '<i class="feather icon-edit"></i>' +
                        '<p><strong>Aún no has guardado diseños</strong></p>' +
                        '<p>Cuando exportes o guardes, tus últimos 3 diseños aparecerán aquí.</p>' +
                    '</div>';
                return;
            }
            $id('ms_historial').innerHTML = '<div class="ms-hist">' + lista.map(function (h) {
                return '<div class="ms-hist-card" data-id="' + h.id + '">' +
                    '<div class="ms-hist-thumb"><img src="' + h.thumb + '" alt=""></div>' +
                    '<div class="ms-hist-info">' +
                        '<div class="ms-hist-nom">' + esc(h.nombre) + '</div>' +
                        '<div class="ms-hist-meta">' + esc(h.tipo) + ' · ' + esc(h.fecha) + '</div>' +
                    '</div>' +
                    '<div class="ms-hist-acc">' +
                        '<button type="button" data-a="usar">Usar</button>' +
                        '<button type="button" data-a="dup">Duplicar</button>' +
                        '<button type="button" data-a="del">Eliminar</button>' +
                    '</div>' +
                '</div>';
            }).join('') + '</div>';
        }

        $id('ms_historial').addEventListener('click', function (e) {
            var b = e.target.closest('button[data-a]');
            if (!b) { return; }
            var card = b.closest('.ms-hist-card');
            var id = parseInt(card.getAttribute('data-id'), 10);
            var lista = leeHistorial();
            var item = lista.filter(function (x) { return x.id === id; })[0];
            if (!item) { return; }
            var acc = b.getAttribute('data-a');

            if (acc === 'usar') {
                snapshot();
                aplicaEstado(item.estado);
                swal({ title: 'Diseño cargado', text: 'Puedes seguir editándolo.', icon: 'success', button: 'Aceptar' });
            }
            if (acc === 'dup') {
                var copia = JSON.parse(JSON.stringify(item));
                copia.id = Date.now();
                copia.nombre = item.nombre + ' (copia)';
                lista.unshift(copia);
                escribeHistorial(lista);
                pintaHistorial();
            }
            if (acc === 'del') {
                escribeHistorial(lista.filter(function (x) { return x.id !== id; }));
                pintaHistorial();
            }
        });

        /* =====================================================================
           SINCRONIZAR CONTROLES CON EL ESTADO (tras undo o cargar diseño)
           ===================================================================== */
        function sincronizaControles() {
            segMarca('ms_seg_head', estado.headPos);
            segMarca('ms_seg_escala', estado.escala);
            segMarca('ms_seg_logo_size', estado.logoSize);
            segMarca('ms_seg_linea', estado.linea);
            segMarca('ms_seg_campos_escala', estado.camposEscala);
            segMarca('ms_seg_contacto_escala', estado.contactoEscala);
            segMarca('ms_seg_contacto_estilo', estado.contactoEstilo);
            segMarca('ms_seg_contacto_align', estado.contactoAlign);
            segMarca('ms_seg_espacio_bloques', estado.espacioBloques);
            segMarca('ms_seg_mw_size', estado.mwSize);
            segMarca('ms_seg_formato', estado.formato);
            segMarca('ms_seg_dist', estado.dist);
            segMarca('ms_seg_titulo_align', estado.tituloAlign);
            segMarca('ms_seg_qr_pos', estado.qrPos);
            segMarca('ms_seg_qr_size', estado.qrSize);

            $id('ms_sw_banda').checked = estado.banda;
            $id('ms_sw_etiqueta').checked = estado.etiqueta;
            $id('ms_sw_barra').checked = estado.barra;
            $id('ms_sw_rut').checked = estado.verRut;
            $id('ms_sw_registro').checked = estado.verRegistro;
            $id('ms_sw_colegio').checked = estado.verColegio;
            $id('ms_sw_fecha').checked = estado.pieFecha;
            $id('ms_sw_qr').checked = estado.qr;
            $id('ms_sw_titulo').checked = estado.titulo;

            $id('ms_documento').value = estado.doc;
            if (window.jQuery && jQuery.fn && jQuery.fn.select2) {
                try { jQuery('#ms_documento').trigger('change.select2'); } catch (er) {}
            }

            $id('ms_titulo_txt').value = estado.tituloTxt || '';
            $id('ms_titulo_sub').value = estado.tituloSub || '';
            $id('ms_qr_opts').style.display = estado.qr ? '' : 'none';
            $id('ms_qr_valor').value = estado.qrValor || '';
            $id('ms_qr_leyenda').value = estado.qrLeyenda || '';
            $id('ms_qr_pos_ayuda').textContent = QR_POS_AYUDA[estado.qrPos] || '';
            $id('ms_especialidad').value = estado.especialidad || '';
            $id('ms_color_pick').value = estado.color;
            $id('ms_color_hex').value = estado.color;
            $id('ms_mw_opacidad').value = estado.mwOpacidad;
            $id('ms_mw_op_val').textContent = estado.mwOpacidad + '%';

            $id('ms_logo_drop').style.display = estado.logo ? 'none' : '';
            $id('ms_logo_opts').style.display = estado.logo ? '' : 'none';
            $id('ms_logo_preview').style.display = estado.logo ? '' : 'none';
            if (estado.logo) {
                $id('ms_logo_preview').innerHTML =
                    '<div class="ms-preview-img"><img src="' + estado.logo + '" alt="">' +
                    '<div class="ms-info">Logo cargado</div></div>';
            }

            $id('ms_mw_drop').style.display = estado.mw ? 'none' : '';
            $id('ms_mw_opts').style.display = estado.mw ? '' : 'none';
            $id('ms_mw_preview').style.display = estado.mw ? '' : 'none';
            if (estado.mw) {
                $id('ms_mw_preview').innerHTML =
                    '<div class="ms-preview-img"><img src="' + estado.mw + '" alt="">' +
                    '<div class="ms-info">Marca de agua cargada</div></div>';
            }

            Array.prototype.forEach.call($id('ms_mw_pos').querySelectorAll('button'), function (x) {
                x.classList.toggle('activo', x.getAttribute('data-v') === estado.mwPos);
            });

            pintaCampos();
            pintaConjuntos();
            pintaContacto();
            pintaPlantillas();
            pintaBloques();
        }

        /* =====================================================================
           ARRANQUE
           ===================================================================== */
        try {
            var rec = JSON.parse(localStorage.getItem('ms_recientes') || '[]');
            if (Array.isArray(rec)) { recientes = rec; }
        } catch (e) {}

        var hayBorrador = false;
        try {
            var borrador = localStorage.getItem('ms_borrador');
            if (borrador) {
                var b = JSON.parse(borrador);
                Object.keys(estado).forEach(function (k) {
                    if (b[k] !== undefined) { estado[k] = b[k]; }
                });
                hayBorrador = true;
            }
        } catch (e) {}

        /* Borradores viejos guardaban los campos como texto. Se convierten. */
        if (estado.campos.length && typeof estado.campos[0] === 'string') {
            estado.campos = camposDesde(estado.campos.filter(function (id) { return CAMPOS_CAT[id]; }));
        }
        if (!Array.isArray(estado.bloques)) { estado.bloques = []; }
        if (!DOCS[estado.doc]) { estado.doc = 'receta_simple'; }

        /* Select2 en el selector de documento, si esta disponible */
        if (window.jQuery && jQuery.fn && jQuery.fn.select2) {
            try {
                jQuery('#ms_documento').select2({ minimumResultsForSearch: Infinity, width: '100%' });
            } catch (e) {}
        }
        conectaSelectorDoc();

        /* Primera visita: carga la plantilla por defecto del documento */
        if (!hayBorrador) {
            aplicaDocumento(estado.doc, true);
        }

        pintaRecientes();
        ignorarCambio = true;
        sincronizaControles();
        ignorarCambio = false;
        renderYa();
        pintaHistorial();
        aplicaZoom();

        /* Ajusta el zoom al espacio disponible en pantallas chicas */
        if (window.innerWidth < 1200) {
            setTimeout(function () { $id('ms_zoom_fit').click(); }, 120);
        }

    })();
    </script>
@endsection
