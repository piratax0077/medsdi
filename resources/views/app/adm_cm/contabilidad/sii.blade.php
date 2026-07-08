@extends('template.contabilidad.template')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/styles_dashboard.css') }}">
    <style>
        :root {
            --sii-blue: #1a3a5c;
            --sii-mid: #1e5799;
            --sii-accent: #2980b9;
            --sii-light: #eaf4fb;
            --sii-green: #27ae60;
            --sii-amber: #f39c12;
            --sii-red: #e74c3c;
            --sii-gray: #95a5a6;
            --sii-dark: #2c3e50;
            --radius: 10px;
            --shadow: 0 4px 24px rgba(26, 58, 92, .10);
            --shadow-hover: 0 8px 32px rgba(26, 58, 92, .18);
            --transition: all .25s cubic-bezier(.4, 0, .2, 1);
        }

        /* ── TOOLBAR ── */
        .sii-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1.5rem 0 1rem;
        }

        .sii-toolbar .eyebrow {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .12em;
            color: var(--sii-accent);
            text-transform: uppercase;
            margin: 0 0 .2rem;
        }

        .sii-toolbar h2 {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--sii-blue);
            margin: 0 0 .25rem;
        }

        .sii-toolbar p {
            font-size: .85rem;
            color: var(--sii-gray);
            margin: 0;
        }

        .legal-badge {
            background: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            border-radius: 20px;
            padding: .35rem .9rem;
            font-size: .75rem;
            font-weight: 600;
            white-space: nowrap;
        }

        /* ── STATS ── */
        .sii-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(155px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1rem 1.2rem;
            display: flex;
            align-items: center;
            gap: .9rem;
            transition: var(--transition);
        }

        .stat-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .stat-icon.blue {
            background: #dbeafe;
            color: var(--sii-mid);
        }

        .stat-icon.green {
            background: #dcfce7;
            color: var(--sii-green);
        }

        .stat-icon.amber {
            background: #fef3c7;
            color: var(--sii-amber);
        }

        .stat-icon.red {
            background: #fee2e2;
            color: var(--sii-red);
        }

        .stat-info p {
            margin: 0;
            font-size: .75rem;
            color: var(--sii-gray);
        }

        .stat-info strong {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--sii-dark);
            line-height: 1;
        }

        /* ── ALERT BAR ── */
        .sii-alert-bar {
            background: linear-gradient(135deg, #fff3cd, #fef9e7);
            border: 1px solid #ffc107;
            border-radius: var(--radius);
            padding: .9rem 1.2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .sii-alert-bar .alert-icon {
            font-size: 1.3rem;
        }

        .sii-alert-bar .alert-text {
            flex: 1;
            font-size: .83rem;
            color: #856404;
            font-weight: 600;
        }

        .alert-chip {
            background: #fff;
            border: 1px solid #ffc107;
            border-radius: 20px;
            padding: .2rem .7rem;
            font-size: .75rem;
            font-weight: 700;
            color: #856404;
            cursor: pointer;
            transition: var(--transition);
        }

        .alert-chip:hover {
            background: #ffc107;
            color: #fff;
        }

        /* ── TABS ── */
        .sii-tabs {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
            margin-bottom: 1.25rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: .5rem;
        }

        .sii-tab {
            padding: .45rem 1rem;
            border-radius: 20px;
            border: 1.5px solid transparent;
            font-size: .82rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            background: transparent;
            color: var(--sii-gray);
        }

        .sii-tab:hover {
            background: var(--sii-light);
            color: var(--sii-accent);
        }

        .sii-tab.active {
            background: var(--sii-blue);
            color: #fff;
            border-color: var(--sii-blue);
        }

        /* ── DOCUMENT GRID ── */
        .sii-doc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(265px, 1fr));
            gap: 1.1rem;
            margin-bottom: 2rem;
        }

        .sii-doc-card {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1.3rem;
            display: flex;
            flex-direction: column;
            gap: .8rem;
            border-left: 4px solid transparent;
            transition: var(--transition);
        }

        .sii-doc-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-3px);
        }

        .sii-doc-card.blue {
            border-left-color: var(--sii-mid);
        }

        .sii-doc-card.green {
            border-left-color: var(--sii-green);
        }

        .sii-doc-card.red {
            border-left-color: var(--sii-red);
        }

        .sii-doc-card.amber {
            border-left-color: var(--sii-amber);
        }

        .sii-doc-card.purple {
            border-left-color: #8b5cf6;
        }

        .sii-doc-card.teal {
            border-left-color: #0d9488;
        }

        .sii-doc-card.pink {
            border-left-color: #ec4899;
        }

        .sii-doc-card.indigo {
            border-left-color: #6366f1;
        }

        .card-head {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .doc-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            font-weight: 800;
            flex-shrink: 0;
            letter-spacing: .02em;
        }

        .doc-icon.blue {
            background: #dbeafe;
            color: var(--sii-mid);
        }

        .doc-icon.green {
            background: #dcfce7;
            color: var(--sii-green);
        }

        .doc-icon.red {
            background: #fee2e2;
            color: var(--sii-red);
        }

        .doc-icon.amber {
            background: #fef3c7;
            color: #92400e;
        }

        .doc-icon.purple {
            background: #ede9fe;
            color: #7c3aed;
        }

        .doc-icon.teal {
            background: #ccfbf1;
            color: #0f766e;
        }

        .doc-icon.pink {
            background: #fce7f3;
            color: #be185d;
        }

        .doc-icon.indigo {
            background: #e0e7ff;
            color: #4338ca;
        }

        .card-title h3 {
            font-size: .93rem;
            font-weight: 700;
            color: var(--sii-dark);
            margin: 0 0 .15rem;
        }

        .card-title p {
            font-size: .77rem;
            color: var(--sii-gray);
            margin: 0;
            line-height: 1.4;
        }

        .card-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: .75rem;
            color: var(--sii-gray);
        }

        .pill {
            padding: .2rem .65rem;
            border-radius: 20px;
            font-size: .7rem;
            font-weight: 700;
        }

        .pill.mensual {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .pill.anual {
            background: #dcfce7;
            color: #166534;
        }

        .pill.puntual {
            background: #fef3c7;
            color: #92400e;
        }

        .pill.continuo {
            background: #ede9fe;
            color: #5b21b6;
        }

        .btn-crear {
            width: 100%;
            padding: .5rem;
            border-radius: 8px;
            border: none;
            font-size: .82rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            margin-top: auto;
        }

        .btn-crear.blue {
            background: #dbeafe;
            color: var(--sii-mid);
        }

        .btn-crear.green {
            background: #dcfce7;
            color: var(--sii-green);
        }

        .btn-crear.red {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-crear.amber {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-crear.purple {
            background: #ede9fe;
            color: #7c3aed;
        }

        .btn-crear.teal {
            background: #ccfbf1;
            color: #0f766e;
        }

        .btn-crear.pink {
            background: #fce7f3;
            color: #be185d;
        }

        .btn-crear.indigo {
            background: #e0e7ff;
            color: #4338ca;
        }

        .btn-crear:hover {
            filter: brightness(.92);
            transform: translateY(-1px);
        }

        /* ── TABLE PANEL ── */
        .sii-table-panel {
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table-panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1.2rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table-panel-head .eyebrow {
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .1em;
            color: var(--sii-accent);
            text-transform: uppercase;
            margin: 0 0 .15rem;
        }

        .table-panel-head h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--sii-dark);
            margin: 0;
        }

        .table-actions {
            display: flex;
            gap: .5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: .38rem .75rem .38rem 2rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: .82rem;
            outline: none;
            transition: var(--transition);
            width: 200px;
        }

        .search-box input:focus {
            border-color: var(--sii-accent);
            box-shadow: 0 0 0 3px rgba(41, 128, 185, .12);
        }

        .search-box::before {
            content: '🔍';
            position: absolute;
            left: .5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: .75rem;
        }

        .count-pill {
            background: var(--sii-light);
            color: var(--sii-blue);
            border-radius: 20px;
            padding: .3rem .85rem;
            font-size: .78rem;
            font-weight: 700;
        }

        .sii-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .83rem;
        }

        .sii-table thead th {
            background: #f8fafc;
            color: var(--sii-gray);
            font-weight: 700;
            font-size: .72rem;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: .75rem 1.2rem;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        .sii-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: var(--transition);
        }

        .sii-table tbody tr:hover {
            background: var(--sii-light);
        }

        .sii-table tbody td {
            padding: .8rem 1.2rem;
            color: var(--sii-dark);
            vertical-align: middle;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            padding: .25rem .7rem;
            border-radius: 20px;
            font-size: .72rem;
            font-weight: 700;
        }

        .status-badge.generado {
            background: #dcfce7;
            color: #166534;
        }

        .status-badge.pendiente {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.vencido {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-badge.enviado {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .action-btn {
            padding: .28rem .6rem;
            border-radius: 6px;
            border: none;
            font-size: .73rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-right: .2rem;
        }

        .action-btn.view {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .action-btn.print {
            background: #dcfce7;
            color: #166534;
        }

        .action-btn.upload {
            background: #ede9fe;
            color: #7c3aed;
        }

        .action-btn.delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btn:hover {
            filter: brightness(.9);
        }

        /* ── MODAL ── */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(26, 58, 92, .45);
            backdrop-filter: blur(3px);
            z-index: 1040;
        }

        .modal-backdrop.active {
            display: block;
        }

        dialog.sii-modal {
            border: none;
            border-radius: 14px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
            padding: 0;
            width: min(700px, 95vw);
            max-height: 90vh;
            overflow-y: auto;
            z-index: 1050;
        }

        dialog.sii-modal::backdrop {
            background: transparent;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.3rem 1.5rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            position: sticky;
            top: 0;
            background: #fff;
            z-index: 2;
        }

        .modal-header .eyebrow {
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .1em;
            color: var(--sii-accent);
            text-transform: uppercase;
            margin: 0 0 .2rem;
        }

        .modal-header h3 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--sii-dark);
            margin: 0;
        }

        .btn-close {
            background: #f1f5f9;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-size: 1.1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .btn-close:hover {
            background: #fee2e2;
            color: #dc2626;
        }

        .modal-body {
            padding: 1.3rem 1.5rem;
        }

        .form-note {
            background: var(--sii-light);
            border-left: 3px solid var(--sii-accent);
            padding: .65rem .9rem;
            border-radius: 0 8px 8px 0;
            font-size: .8rem;
            color: #1e5799;
            margin-bottom: 1.2rem;
        }

        .sii-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .9rem;
        }

        .sii-form-grid .wide {
            grid-column: 1/-1;
        }

        .sii-form-grid label {
            display: flex;
            flex-direction: column;
            gap: .35rem;
            font-size: .82rem;
            font-weight: 600;
            color: var(--sii-dark);
        }

        .sii-form-grid input,
        .sii-form-grid select,
        .sii-form-grid textarea {
            padding: .45rem .75rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: .85rem;
            outline: none;
            transition: var(--transition);
            font-family: inherit;
        }

        .sii-form-grid input:focus,
        .sii-form-grid select:focus,
        .sii-form-grid textarea:focus {
            border-color: var(--sii-accent);
            box-shadow: 0 0 0 3px rgba(41, 128, 185, .12);
        }

        .modal-footer {
            display: flex;
            gap: .75rem;
            justify-content: flex-end;
            padding: 1rem 1.5rem 1.3rem;
            border-top: 1px solid #f1f5f9;
            flex-wrap: wrap;
        }

        .btn-sii {
            padding: .55rem 1.3rem;
            border-radius: 8px;
            border: none;
            font-size: .85rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-sii.primary {
            background: var(--sii-blue);
            color: #fff;
        }

        .btn-sii.primary:hover {
            background: var(--sii-mid);
        }

        .btn-sii.secondary {
            background: #f1f5f9;
            color: var(--sii-dark);
        }

        .btn-sii.secondary:hover {
            background: #e2e8f0;
        }

        .btn-sii.success {
            background: var(--sii-green);
            color: #fff;
        }

        .btn-sii.success:hover {
            filter: brightness(.9);
        }

        /* ── PREVIEW ── */
        dialog.sii-preview {
            border: none;
            border-radius: 14px;
            padding: 0;
            width: min(860px, 97vw);
            max-height: 95vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
            z-index: 1060;
        }

        dialog.sii-preview::backdrop {
            background: transparent;
        }

        .preview-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            background: var(--sii-blue);
            color: #fff;
            border-radius: 14px 14px 0 0;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .preview-toolbar .eyebrow {
            color: #90caf9;
            margin: 0 0 .15rem;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .preview-toolbar h3 {
            color: #fff;
            margin: 0;
            font-size: 1rem;
            font-weight: 700;
        }

        .pdf-page {
            background: #fff;
            padding: 3rem;
            min-height: 27cm;
            font-family: 'Times New Roman', serif;
            font-size: 11pt;
            color: #111;
            line-height: 1.6;
        }

        .pdf-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            border-bottom: 2px solid var(--sii-blue);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        .pdf-company {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--sii-blue);
        }

        .pdf-rut {
            font-size: .85rem;
            color: #555;
            margin-top: .2rem;
        }

        .pdf-doc-type {
            text-align: center;
            margin: 1.5rem 0;
        }

        .pdf-doc-type h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--sii-blue);
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .pdf-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .5rem 2rem;
            margin: 1rem 0 1.5rem;
            font-size: 10.5pt;
        }

        .pdf-meta span {
            color: #555;
        }

        .pdf-meta strong {
            color: #111;
        }

        .pdf-body {
            margin: 1.5rem 0;
        }

        .pdf-body p {
            text-align: justify;
        }

        .pdf-sigs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 3rem;
        }

        .sig-line {
            border-top: 1px solid #333;
            padding-top: .5rem;
            font-size: 9.5pt;
            color: #555;
            text-align: center;
        }

        /* ── TOAST ── */
        #sii-toast {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }

        .toast-item {
            background: var(--sii-dark);
            color: #fff;
            padding: .75rem 1.2rem;
            border-radius: 10px;
            font-size: .85rem;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .2);
            animation: toastIn .3s ease;
            display: flex;
            align-items: center;
            gap: .5rem;
            min-width: 260px;
        }

        .toast-item.success {
            border-left: 4px solid var(--sii-green);
        }

        .toast-item.error {
            border-left: 4px solid var(--sii-red);
        }

        .toast-item.warning {
            border-left: 4px solid var(--sii-amber);
        }

        /* Ocultar cards que no corresponden al tab activo */
        .sii-doc-card.hidden {
            display: none;
        }


        @keyframes toastIn {
            from {
                transform: translateX(110%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media(max-width:768px) {
            .sii-doc-grid {
                grid-template-columns: 1fr;
            }

            .sii-form-grid {
                grid-template-columns: 1fr;
            }

            .sii-form-grid .wide {
                grid-column: 1;
            }

            .pdf-page {
                padding: 1.5rem;
            }

            .pdf-meta {
                grid-template-columns: 1fr;
            }

            .pdf-sigs {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="page-header-title">
        <h5 class="m-b-10 font-weight-bold">SII — Gestión Tributaria</h5>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('adm_cm.home') }}" data-toggle="tooltip" title="Escritorio">
                <i class="feather icon-home"></i>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('contabilidad.home') }}">Contabilidad</a>
        </li>
        <li class="breadcrumb-item active">Gestión Tributaria SII</li>
    </ul>
@endsection

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <!-- TOOLBAR -->
                        <div class="sii-toolbar">
                            <div>
                                <p class="eyebrow">SERVICIO DE IMPUESTOS INTERNOS</p>
                                <h2>Gestión Tributaria</h2>
                                <p>Administre, genere y archive documentos tributarios en un solo lugar.</p>
                            </div>
                            <span class="legal-badge">⚖️ Normativa SII vigente</span>
                        </div>

                        <!-- ALERT BAR -->
                        <div class="sii-alert-bar">
                            <span class="alert-icon">⚠️</span>
                            <span class="alert-text">Próximos vencimientos:</span>
                            <div id="alert-chips"></div>
                        </div>

                        <!-- STATS -->
                        <div class="sii-stats">
                            <div class="stat-card">
                                <div class="stat-icon blue">📄</div>
                                <div class="stat-info">
                                    <p>Total documentos</p><strong id="stat-total">0</strong>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon green">✅</div>
                                <div class="stat-info">
                                    <p>Generados</p><strong id="stat-generados">0</strong>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon amber">⏳</div>
                                <div class="stat-info">
                                    <p>Pendientes</p><strong id="stat-pendientes">0</strong>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon red">🔴</div>
                                <div class="stat-info">
                                    <p>Vencidos</p><strong id="stat-vencidos">0</strong>
                                </div>
                            </div>
                        </div>

                        <!-- TABS -->
                        <div class="sii-tabs">
                            <button class="sii-tab active" data-tab="todos">Todos</button>
                            <button class="sii-tab" data-tab="iva">IVA</button>
                            <button class="sii-tab" data-tab="renta">Renta</button>
                            <button class="sii-tab" data-tab="dte">DTE</button>
                            <button class="sii-tab" data-tab="honorarios">Honorarios</button>
                            <button class="sii-tab" data-tab="libros">Libros</button>
                            <button class="sii-tab" data-tab="certificados">Certificados</button>
                        </div>

                        <!-- DOCUMENT GRID -->
                        <div class="sii-doc-grid" id="doc-grid">

                            <!-- F29 -->
                            <div class="sii-doc-card blue" data-category="iva">
                                <div class="card-head">
                                    <div class="doc-icon blue">F29</div>
                                    <div class="card-title">
                                        <h3>Declaración de IVA</h3>
                                        <p>Formulario 29 — Declaración mensual de IVA y PPM.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Vence día 12 de cada mes</span>
                                    <span class="pill mensual">Mensual</span>
                                </div>
                                <button class="btn-crear blue" data-doc="f29">➕ Crear F29</button>
                            </div>

                            <!-- F22 -->
                            <div class="sii-doc-card green" data-category="renta">
                                <div class="card-head">
                                    <div class="doc-icon green">F22</div>
                                    <div class="card-title">
                                        <h3>Declaración de Renta</h3>
                                        <p>Formulario 22 — Declaración anual de impuesto a la renta.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Vence en Abril de cada año</span>
                                    <span class="pill anual">Anual</span>
                                </div>
                                <button class="btn-crear green" data-doc="f22">➕ Crear F22</button>
                            </div>

                            <!-- FACTURA ELECTRÓNICA -->
                            <div class="sii-doc-card teal" data-category="dte">
                                <div class="card-head">
                                    <div class="doc-icon teal">FE</div>
                                    <div class="card-title">
                                        <h3>Factura Electrónica</h3>
                                        <p>DTE Tipo 33 — Factura electrónica de venta.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Emisión en tiempo real</span>
                                    <span class="pill continuo">Continuo</span>
                                </div>
                                <button class="btn-crear teal" data-doc="factura">➕ Crear Factura</button>
                            </div>

                            <!-- BOLETA HONORARIOS -->
                            <div class="sii-doc-card amber" data-category="honorarios">
                                <div class="card-head">
                                    <div class="doc-icon amber">BH</div>
                                    <div class="card-title">
                                        <h3>Boleta de Honorarios</h3>
                                        <p>DTE Tipo 39 — Boleta de honorarios electrónica.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Emisión en tiempo real</span>
                                    <span class="pill continuo">Continuo</span>
                                </div>
                                <button class="btn-crear amber" data-doc="honorarios">➕ Crear Boleta</button>
                            </div>
                            <!-- LIBROS CONTABLES -->
                            <div class="sii-doc-card purple" data-category="libros">
                                <div class="card-head">
                                    <div class="doc-icon purple">LC</div>
                                    <div class="card-title">
                                        <h3>Libros Contables</h3>
                                        <p>Registro de operaciones contables para SII.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Actualización mensual</span>
                                    <span class="pill mensual">Mensual</span>
                                </div>
                                <button class="btn-crear purple" data-doc="libros">➕ Crear Libro</button>
                            </div>
                            <!-- CERTIFICADOS -->
                            <div class="sii-doc-card pink" data-category="certificados">
                                <div class="card-head">
                                    <div class="doc-icon pink">CE</div>
                                    <div class="card-title">
                                        <h3>Certificados</h3>
                                        <p>Certificados de retención, donaciones, etc.</p>
                                    </div>
                                </div>
                                <div class="card-meta">
                                    <span>Emisión en tiempo real</span>
                                    <span class="pill puntual">Puntual</span>
                                </div>
                                <button class="btn-crear pink" data-doc="certificado">➕ Crear Certificado</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL BACKDROP -->
    <div class="modal-backdrop" id="modal-backdrop"></div>
    <!-- DOCUMENT FORM MODAL -->
    <dialog class="sii-modal" id="doc-modal">
        <div class="modal-header">
            <div>
                <p class="eyebrow" id="modal-eyebrow">CREAR DOCUMENTO</p>
                <h3 id="modal-title">Nuevo Documento Tributario</h3>
            </div>
            <button class="btn-close" id="modal-close">✖️</button>
        </div>
        <div class="modal-body">
            <p class="form-note">Complete los campos requeridos para generar el documento. Asegúrese de revisar la
                información antes de guardar.</p>
            <form id="doc-form">
                <div class="sii-form-grid">
                    <label>
                        RUT Emisor
                        <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                    </label>
                    <label>
                        RUT Receptor
                        <input type="text" name="rut_receptor" placeholder="Ej: 98765432-1" required>
                    </label>
                    <label>
                        Razón Social Receptor
                        <input type="text" name="razon_receptor" placeholder="Ej: ACME S.A." required>
                    </label>
                    <label>
                        Monto Total
                        <input type="number" name="monto_total" placeholder="Ej: 150000" required>
                    </label>
                    <label class="wide">
                        Descripción
                        <textarea name="descripcion" rows="3" placeholder="Descripción detallada del documento"></textarea>
                    </label>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn-sii secondary" id="modal-cancel">Cancelar</button>
            <button class="btn-sii primary" id="modal-save">Guardar</button>
        </div>
    </dialog>
    <!-- PDF PREVIEW MODAL -->
    <dialog class="sii-preview" id="pdf-preview">
        <div class="preview-toolbar">
            <div>
                <p class="eyebrow">VISTA PREVIA</p>
                <h3>Factura Electrónica - ACME S.A.</h3>
            </div>
            <button class="btn-close" id="preview-close">✖️</button>
        </div>
        <div class="pdf-page">
            <div class="pdf-header">
                <div>
                    <div class="pdf-company">ACME S.A.</div>
                    <div class="pdf-rut">RUT: 12345678-9</div>
                </div>
                <div class="pdf-doc-type">
                    <h2>Factura Electrónica</h2>
                </div>
            </div>
            <div class="pdf-meta">
                <div><strong>Fecha Emisión:</strong> 15/09/2024</div>
                <div><strong>N° Documento:</strong> 000123</div>
                <div><strong>RUT Receptor:</strong> 98765432-1</div>
                <div><strong>Razón Social:</strong> ACME S.A.</div>
            </div>
            <div class="pdf-body">
                <p>Detalle de productos o servicios facturados, incluyendo cantidades, precios unitarios y totales. Este
                    documento cumple con la normativa vigente del Servicio de Impuestos Internos (SII) y es válido para
                    efectos tributarios.</p>
            </div>
            <div class="pdf-sigs">
                <div class="sig-line">Firma Emisor</div>
                <div class="sig-line">Firma Receptor</div>
            </div>
        </div>
    </dialog>
    <!-- TOAST CONTAINER -->
    <div id="sii-toast"></div>
@endsection

@section('page-script')
    <script src="{{ asset('js/app_dashboard.js') }}"></script>
    <script>
        (function () {

    // ══════════════════════════════════════════════════
    // CONFIGURACIÓN DE DOCUMENTOS
    // Aquí defines título, eyebrow y campos por tipo
    // ══════════════════════════════════════════════════
    const DOCUMENTOS = {

        f29: {
            eyebrow : 'FORMULARIO 29 — IVA',
            titulo  : 'Declaración Mensual de IVA',
            campos  : `
                <label>
                    RUT Contribuyente
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    Período Tributario
                    <input type="month" name="periodo" required>
                </label>
                <label>
                    Débito Fiscal (IVA Ventas)
                    <input type="number" name="debito_fiscal" placeholder="Ej: 150000" required>
                </label>
                <label>
                    Crédito Fiscal (IVA Compras)
                    <input type="number" name="credito_fiscal" placeholder="Ej: 80000" required>
                </label>
                <label>
                    PPM (Pago Provisional Mensual)
                    <input type="number" name="ppm" placeholder="Ej: 25000">
                </label>
                <label>
                    Monto a Pagar
                    <input type="number" name="monto_total" placeholder="Ej: 70000" required>
                </label>
                <label class="wide">
                    Observaciones
                    <textarea name="descripcion" rows="3" placeholder="Observaciones adicionales..."></textarea>
                </label>
            `
        },

        f22: {
            eyebrow : 'FORMULARIO 22 — RENTA',
            titulo  : 'Declaración Anual de Renta',
            campos  : `
                <label>
                    RUT Contribuyente
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    Año Tributario
                    <input type="number" name="anio" placeholder="Ej: 2025" min="2000" max="2100" required>
                </label>
                <label>
                    Renta Bruta
                    <input type="number" name="renta_bruta" placeholder="Ej: 12000000" required>
                </label>
                <label>
                    Impuesto Determinado
                    <input type="number" name="impuesto" placeholder="Ej: 1800000" required>
                </label>
                <label>
                    PPM Imputados
                    <input type="number" name="ppm_imputados" placeholder="Ej: 900000">
                </label>
                <label>
                    Diferencia a Pagar / Devolver
                    <input type="number" name="monto_total" placeholder="Ej: 900000" required>
                </label>
                <label class="wide">
                    Observaciones
                    <textarea name="descripcion" rows="3" placeholder="Observaciones adicionales..."></textarea>
                </label>
            `
        },

        factura: {
            eyebrow : 'DTE TIPO 33 — FACTURA',
            titulo  : 'Factura Electrónica de Venta',
            campos  : `
                <label>
                    RUT Emisor
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    RUT Receptor
                    <input type="text" name="rut_receptor" placeholder="Ej: 98765432-1" required>
                </label>
                <label>
                    Razón Social Receptor
                    <input type="text" name="razon_receptor" placeholder="Ej: ACME S.A." required>
                </label>
                <label>
                    Fecha Emisión
                    <input type="date" name="fecha_emision" required>
                </label>
                <label>
                    Neto
                    <input type="number" name="neto" placeholder="Ej: 126050" required>
                </label>
                <label>
                    IVA (19%)
                    <input type="number" name="iva" placeholder="Calculado automático" readonly>
                </label>
                <label>
                    Total
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Descripción / Glosa
                    <textarea name="descripcion" rows="3" placeholder="Detalle de productos o servicios..."></textarea>
                </label>
            `
        },

        boleta_honorarios: {
            eyebrow : 'BOLETA DE HONORARIOS',
            titulo  : 'Boleta de Honorarios Electrónica',
            campos  : `
                <label>
                    RUT Emisor (Prestador)
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    RUT Receptor (Pagador)
                    <input type="text" name="rut_receptor" placeholder="Ej: 98765432-1" required>
                </label>
                <label>
                    Razón Social Receptor
                    <input type="text" name="razon_receptor" placeholder="Ej: ACME S.A." required>
                </label>
                <label>
                    Fecha Emisión
                    <input type="date" name="fecha_emision" required>
                </label>
                <label>
                    Monto Bruto
                    <input type="number" name="monto_bruto" placeholder="Ej: 500000" required>
                </label>
                <label>
                    Retención (10.75%)
                    <input type="number" name="retencion" placeholder="Calculado automático" readonly>
                </label>
                <label>
                    Monto Líquido
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Descripción del Servicio
                    <textarea name="descripcion" rows="3" placeholder="Descripción del servicio prestado..."></textarea>
                </label>
            `
        },

        libro_compras: {
            eyebrow : 'LIBRO DE COMPRAS',
            titulo  : 'Registro Libro de Compras',
            campos  : `
                <label>
                    RUT Empresa
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    Período
                    <input type="month" name="periodo" required>
                </label>
                <label>
                    Total Neto Compras
                    <input type="number" name="neto_compras" placeholder="Ej: 5000000" required>
                </label>
                <label>
                    Total IVA Recuperable
                    <input type="number" name="iva_recuperable" placeholder="Ej: 950000" required>
                </label>
                <label>
                    Total IVA No Recuperable
                    <input type="number" name="iva_no_recuperable" placeholder="Ej: 0">
                </label>
                <label>
                    Monto Total
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Observaciones
                    <textarea name="descripcion" rows="3" placeholder="Observaciones del período..."></textarea>
                </label>
            `
        },

        libro_ventas: {
            eyebrow : 'LIBRO DE VENTAS',
            titulo  : 'Registro Libro de Ventas',
            campos  : `
                <label>
                    RUT Empresa
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    Período
                    <input type="month" name="periodo" required>
                </label>
                <label>
                    Total Neto Ventas
                    <input type="number" name="neto_ventas" placeholder="Ej: 8000000" required>
                </label>
                <label>
                    Total IVA Débito
                    <input type="number" name="iva_debito" placeholder="Ej: 1520000" required>
                </label>
                <label>
                    Ventas Exentas
                    <input type="number" name="ventas_exentas" placeholder="Ej: 0">
                </label>
                <label>
                    Monto Total
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Observaciones
                    <textarea name="descripcion" rows="3" placeholder="Observaciones del período..."></textarea>
                </label>
            `
        },

        certificado: {
            eyebrow : 'CERTIFICADO SII',
            titulo  : 'Certificado de Situación Tributaria',
            campos  : `
                <label>
                    RUT Solicitante
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    Razón Social
                    <input type="text" name="razon_receptor" placeholder="Ej: ACME S.A." required>
                </label>
                <label>
                    Tipo de Certificado
                    <select name="tipo_certificado" required>
                        <option value="">Seleccione...</option>
                        <option value="situacion_tributaria">Situación Tributaria</option>
                        <option value="inicio_actividades">Inicio de Actividades</option>
                        <option value="termino_giro">Término de Giro</option>
                        <option value="timbraje">Timbraje Electrónico</option>
                    </select>
                </label>
                <label>
                    Fecha Solicitud
                    <input type="date" name="fecha_emision" required>
                </label>
                <label class="wide">
                    Observaciones
                    <textarea name="descripcion" rows="3" placeholder="Información adicional..."></textarea>
                </label>
            `
        },

        nota_debito: {
            eyebrow : 'DTE TIPO 56 — NOTA DÉBITO',
            titulo  : 'Nota de Débito Electrónica',
            campos  : `
                <label>
                    RUT Emisor
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    RUT Receptor
                    <input type="text" name="rut_receptor" placeholder="Ej: 98765432-1" required>
                </label>
                <label>
                    N° Documento Referenciado
                    <input type="text" name="doc_ref" placeholder="Ej: Factura N° 1234" required>
                </label>
                <label>
                    Fecha Emisión
                    <input type="date" name="fecha_emision" required>
                </label>
                <label>
                    Monto Neto
                    <input type="number" name="neto" placeholder="Ej: 50000" required>
                </label>
                <label>
                    IVA (19%)
                    <input type="number" name="iva" placeholder="Calculado automático" readonly>
                </label>
                <label>
                    Total
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Motivo
                    <textarea name="descripcion" rows="3" placeholder="Motivo de la nota de débito..."></textarea>
                </label>
            `
        },

        nota_credito: {
            eyebrow : 'DTE TIPO 61 — NOTA CRÉDITO',
            titulo  : 'Nota de Crédito Electrónica',
            campos  : `
                <label>
                    RUT Emisor
                    <input type="text" name="rut_emisor" placeholder="Ej: 12345678-9" required>
                </label>
                <label>
                    RUT Receptor
                    <input type="text" name="rut_receptor" placeholder="Ej: 98765432-1" required>
                </label>
                <label>
                    N° Documento Referenciado
                    <input type="text" name="doc_ref" placeholder="Ej: Factura N° 1234" required>
                </label>
                <label>
                    Fecha Emisión
                    <input type="date" name="fecha_emision" required>
                </label>
                <label>
                    Monto Neto
                    <input type="number" name="neto" placeholder="Ej: 50000" required>
                </label>
                <label>
                    IVA (19%)
                    <input type="number" name="iva" placeholder="Calculado automático" readonly>
                </label>
                <label>
                    Total
                    <input type="number" name="monto_total" placeholder="Calculado automático" readonly>
                </label>
                <label class="wide">
                    Motivo
                    <textarea name="descripcion" rows="3" placeholder="Motivo de la nota de crédito..."></textarea>
                </label>
            `
        },
    };

    // ══════════════════════════════════════════════════
    // CALCULOS AUTOMÁTICOS
    // ══════════════════════════════════════════════════
    function inicializarCalculos(docType) {

        // ── Factura / Nota Débito / Nota Crédito — IVA 19% ──
        if (['factura', 'nota_debito', 'nota_credito'].includes(docType)) {
            const inputNeto  = document.querySelector('#doc-form [name="neto"]');
            const inputIva   = document.querySelector('#doc-form [name="iva"]');
            const inputTotal = document.querySelector('#doc-form [name="monto_total"]');

            if (inputNeto) {
                inputNeto.addEventListener('input', function () {
                    const neto  = parseFloat(this.value) || 0;
                    const iva   = Math.round(neto * 0.19);
                    const total = neto + iva;
                    if (inputIva)   inputIva.value   = iva;
                    if (inputTotal) inputTotal.value = total;
                });
            }
        }

        // ── Boleta Honorarios — Retención 10.75% ──
        if (docType === 'boleta_honorarios') {
            const inputBruto   = document.querySelector('#doc-form [name="monto_bruto"]');
            const inputRet     = document.querySelector('#doc-form [name="retencion"]');
            const inputLiquido = document.querySelector('#doc-form [name="monto_total"]');

            if (inputBruto) {
                inputBruto.addEventListener('input', function () {
                    const bruto    = parseFloat(this.value) || 0;
                    const ret      = Math.round(bruto * 0.1075);
                    const liquido  = bruto - ret;
                    if (inputRet)     inputRet.value     = ret;
                    if (inputLiquido) inputLiquido.value = liquido;
                });
            }
        }

        // ── Libro Compras — Total automático ──
        if (docType === 'libro_compras') {
            const campos = ['neto_compras', 'iva_recuperable', 'iva_no_recuperable'];
            campos.forEach(function (campo) {
                const el = document.querySelector(`#doc-form [name="${campo}"]`);
                if (el) el.addEventListener('input', calcularTotalLibroCompras);
            });
        }

        // ── Libro Ventas — Total automático ──
        if (docType === 'libro_ventas') {
            const campos = ['neto_ventas', 'iva_debito', 'ventas_exentas'];
            campos.forEach(function (campo) {
                const el = document.querySelector(`#doc-form [name="${campo}"]`);
                if (el) el.addEventListener('input', calcularTotalLibroVentas);
            });
        }
    }

    function calcularTotalLibroCompras() {
        const neto    = parseFloat(document.querySelector('#doc-form [name="neto_compras"]')?.value)      || 0;
        const ivaRec  = parseFloat(document.querySelector('#doc-form [name="iva_recuperable"]')?.value)   || 0;
        const ivaNoRec= parseFloat(document.querySelector('#doc-form [name="iva_no_recuperable"]')?.value)|| 0;
        const total   = document.querySelector('#doc-form [name="monto_total"]');
        if (total) total.value = neto + ivaRec + ivaNoRec;
    }

    function calcularTotalLibroVentas() {
        const neto    = parseFloat(document.querySelector('#doc-form [name="neto_ventas"]')?.value)  || 0;
        const iva     = parseFloat(document.querySelector('#doc-form [name="iva_debito"]')?.value)   || 0;
        const exentas = parseFloat(document.querySelector('#doc-form [name="ventas_exentas"]')?.value)|| 0;
        const total   = document.querySelector('#doc-form [name="monto_total"]');
        if (total) total.value = neto + iva + exentas;
    }

    // ══════════════════════════════════════════════════
    // ABRIR MODAL
    // ══════════════════════════════════════════════════
    function abrirModal(docType) {
        const config = DOCUMENTOS[docType];
        if (!config) {
            console.warn('Tipo de documento no configurado:', docType);
            return;
        }

        // Actualizar header
        document.getElementById('modal-eyebrow').textContent = config.eyebrow;
        document.getElementById('modal-title').textContent   = config.titulo;

        // Inyectar campos dinámicos
        document.querySelector('#doc-form .sii-form-grid').innerHTML = config.campos;

        // Guardar tipo activo en el form
        document.getElementById('doc-form').setAttribute('data-doc-type', docType);

        // Inicializar cálculos automáticos
        inicializarCalculos(docType);

        // Mostrar backdrop y modal
        document.getElementById('modal-backdrop').classList.add('active');
        document.getElementById('doc-modal').showModal();
    }

    // ══════════════════════════════════════════════════
    // CERRAR MODAL
    // ══════════════════════════════════════════════════
    function cerrarModal() {
        document.getElementById('modal-backdrop').classList.remove('active');
        document.getElementById('doc-modal').close();
        document.getElementById('doc-form').reset();
    }

    // ══════════════════════════════════════════════════
    // EVENTOS
    // ══════════════════════════════════════════════════
    function inicializarEventos() {

        // ── Botones "Crear" en las cards ──
        document.querySelectorAll('.btn-crear[data-doc]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                abrirModal(this.getAttribute('data-doc'));
            });
        });

        // ── Cerrar con botón ✖️ ──
        document.getElementById('modal-close')?.addEventListener('click', cerrarModal);

        // ── Cerrar con botón Cancelar ──
        document.getElementById('modal-cancel')?.addEventListener('click', cerrarModal);

        // ── Cerrar clickeando el backdrop ──
        document.getElementById('modal-backdrop')?.addEventListener('click', cerrarModal);

        // ── Cerrar con tecla Escape ──
        document.getElementById('doc-modal')?.addEventListener('cancel', function (e) {
            e.preventDefault();
            cerrarModal();
        });

        // ── Botón Guardar ──
        document.getElementById('modal-save')?.addEventListener('click', function () {
            const form    = document.getElementById('doc-form');
            const docType = form.getAttribute('data-doc-type');

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Aquí puedes enviar por fetch/axios o guardar localmente
            console.info('Guardando documento tipo:', docType);
            mostrarToast('✅ Documento guardado correctamente', 'success');
            cerrarModal();
        });
    }

    // ══════════════════════════════════════════════════
    // TOAST
    // ══════════════════════════════════════════════════
    function mostrarToast(mensaje, tipo = 'success') {
        const container = document.getElementById('sii-toast');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `toast-item ${tipo}`;
        toast.textContent = mensaje;
        container.appendChild(toast);

        setTimeout(function () {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity .4s ease';
            setTimeout(function () { toast.remove(); }, 400);
        }, 3500);
    }

    // ══════════════════════════════════════════════════
    // INIT
    // ══════════════════════════════════════════════════
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', inicializarEventos);
    } else {
        inicializarEventos();
    }

})();

    </script>
@endsection
