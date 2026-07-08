const money = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP', maximumFractionDigits: 0 });

// Helper function para agregar event listeners de forma segura
function safeAddListener(selector, event, handler) {
    const element = typeof selector === 'string' ? document.querySelector(selector) : selector;
    if (element) {
        element.addEventListener(event, handler);
    }
}

// Función para formatear datos de Laravel a formato de state
function formatWorkersData() {
    const workers = [];

    // Profesionales
    if (window.profesionalesData && Array.isArray(window.profesionalesData)) {
        window.profesionalesData.forEach(prof => {
            // Laravel serializa las relaciones manteniendo el nombre o como snake_case
            const especialidad = prof.especialidad || prof.Especialidad;
            const tipoEspecialidad = prof.tipo_especialidad || prof.TipoEspecialidad;
            const subTipoEspecialidad = prof.sub_tipo_especialidad || prof.SubTipoEspecialidad;

            // Construir nombre completo usando apellido_uno y apellido_dos si existen
            const nombre = prof.nombre || '';
            const apellido1 = prof.apellido_uno || prof.apellido || '';
            const apellido2 = prof.apellido_dos || '';
            const nombreCompleto = `${nombre} ${apellido1} ${apellido2}`.trim();

            // Construir descripción de especialidad completa
            let specialtyText = [];
            if (tipoEspecialidad?.nombre) specialtyText.push(tipoEspecialidad.nombre);
            if (subTipoEspecialidad?.nombre) specialtyText.push(subTipoEspecialidad.nombre);
            if (especialidad?.nombre) specialtyText.push(especialidad.nombre);

            const specialtyFull = specialtyText.length > 0 ? specialtyText.join(' - ') : 'Sin especialidad';
            const roleText = especialidad?.nombre || tipoEspecialidad?.nombre || 'Profesional de salud';

            // Determinar tipo de contrato
            const contratoTipo = prof.contrato_tipo || 'Convenio';
            const tieneContrato = prof.tiene_contrato || false;
            const convenioDetalle = prof.convenio_detalle || prof.convenioDetalle;

            workers.push({
                id: `prof-${prof.id}`,
                idOriginal: prof.id,
                name: nombreCompleto,
                rut: prof.rut || 'Sin RUT',
                type: 'profesional',
                role: roleText,
                specialty: specialtyFull,
                contract: contratoTipo,
                tieneContrato: tieneContrato,
                convenioDetalle: convenioDetalle,
                start: prof.created_at || '2024-01-01',
                salary: 0,
                status: 'Activo'
            });
        });
    }

    // Asistentes
    if (window.asistentesData && Array.isArray(window.asistentesData)) {
        window.asistentesData.forEach(asis => {
            // Laravel serializa las relaciones manteniendo el nombre o como snake_case
            const asistenteTipo = asis.asistente_tipo || asis.AsistenteTipo;

            // Determinar tipo de contrato
            const contratoTipo = asis.contrato_tipo || 'Convenio';
            const tieneContrato = asis.tiene_contrato || false;

            workers.push({
                id: `asis-${asis.id}`,
                idOriginal: asis.id,
                name: `${asis.nombres || ''} ${asis.apellido_uno || ''} ${asis.apellido_dos || ''}`.trim(),
                rut: asis.rut || 'Sin RUT',
                type: 'administrativo',
                role: asistenteTipo?.nombre || 'Asistente',
                specialty: asistenteTipo?.nombre || 'Administrativo',
                contract: contratoTipo,
                tieneContrato: tieneContrato,
                start: asis.created_at || '2024-01-01',
                salary: 0,
                status: 'Activo'
            });
        });
    }

    console.log('Workers cargados:', workers.length, workers);
    return workers;
}

const state = {
    workers: formatWorkersData(),
    payroll: [
        { workerId: 1, base: 1850000, gross: 2035000, afpName: 'Habitat', afpRate: 11.27, afp: 208495, healthName: 'Fonasa', healthRate: 7, health: 129500, healthExtra: 0, unemploymentRate: 0.6, unemployment: 11100, compensationName: 'Los Andes', compensation: 18000, apv: 0, advance: 0, loan: 18105, otherDiscount: 0, discounts: 385200, net: 1649800, status: 'Calculada' },
        { workerId: 2, base: 2100000, gross: 2100000, afpName: 'Modelo', afpRate: 10.58, afp: 222180, healthName: 'Isapre', healthRate: 7, health: 147000, healthExtra: 45000, unemploymentRate: 0, unemployment: 0, compensationName: 'Sin caja', compensation: 0, apv: 50000, advance: 0, loan: 0, otherDiscount: 0, discounts: 464180, net: 1635820, status: 'Pagada' },
        { workerId: 3, base: 980000, gross: 1080000, afpName: 'Provida', afpRate: 11.45, afp: 112210, healthName: 'Fonasa', healthRate: 7, health: 68600, healthExtra: 0, unemploymentRate: 0.6, unemployment: 5880, compensationName: 'La Araucana', compensation: 15000, apv: 0, advance: 0, loan: 8900, otherDiscount: 0, discounts: 210590, net: 869410, status: 'Calculada' },
        { workerId: 4, base: 760000, gross: 840000, afpName: 'Uno', afpRate: 10.49, afp: 79724, healthName: 'Fonasa', healthRate: 7, health: 53200, healthExtra: 0, unemploymentRate: 0.6, unemployment: 4560, compensationName: 'Sin caja', compensation: 0, apv: 0, advance: 20000, loan: 0, otherDiscount: 936, discounts: 158420, net: 681580, status: 'Borrador' },
        { workerId: 5, base: 620000, gross: 690000, afpName: 'Capital', afpRate: 11.44, afp: 70928, healthName: 'Fonasa', healthRate: 7, health: 43400, healthExtra: 0, unemploymentRate: 0.6, unemployment: 3720, compensationName: 'Los Héroes', compensation: 10852, apv: 0, advance: 0, loan: 0, otherDiscount: 0, discounts: 128900, net: 561100, status: 'Pagada' }
    ],
    absences: [
        { id: 1, workerId: 3, type: 'Vacaciones legales', start: '2026-06-22', end: '2026-07-03', days: 10, status: 'Pendiente' },
        { id: 2, workerId: 7, type: 'Permiso con goce', start: '2026-06-15', end: '2026-06-16', days: 2, status: 'Pendiente' },
        { id: 3, workerId: 1, type: 'Vacaciones legales', start: '2026-05-18', end: '2026-05-22', days: 5, status: 'Autorizada' },
        { id: 4, workerId: 5, type: 'Licencia médica', start: '2026-06-08', end: '2026-06-12', days: 5, status: 'Procesada' }
    ],
    movements: (window.movimientosData && Array.isArray(window.movimientosData)) ? window.movimientosData : [],
    cashRegisters: [
        { id: 1, name: 'Caja Recepción Principal', cashier: 'Ignacio Soto', openedAt: '08:02', openingBalance: 120000, cash: 684500, card: 1254000, transfer: 286000, status: 'Activa', difference: 0 },
        { id: 2, name: 'Caja Imagenología', cashier: 'Paula Méndez', openedAt: '08:15', openingBalance: 80000, cash: 315000, card: 892000, transfer: 145000, status: 'Activa', difference: 0 },
        { id: 3, name: 'Caja Dental', cashier: 'Claudia Vera', openedAt: '09:00', openingBalance: 100000, cash: 248000, card: 574500, transfer: 0, status: 'Por cerrar', difference: -2500 }
    ],
    taxDocuments: [
        { id: 1, nature: 'venta', documentType: 'Factura', folio: 'F-000124', issueDate: '2026-06-02', dueDate: '2026-06-30', rut: '76.445.210-3', businessName: 'Empresa Portuaria Pacifico', businessActivity: 'Servicios portuarios', email: 'pagos@pacifico.cl', address: 'Valparaiso', code: 'CONV-01', description: 'Convenio de atenciones medicas junio', quantity: 1, unitPrice: 2350000, discount: 0, net: 2350000, tax: 446500, total: 2796500, status: 'Pendiente' },
        { id: 2, nature: 'compra', documentType: 'Factura', folio: 'FC-8841', issueDate: '2026-05-20', dueDate: '2026-06-10', rut: '77.120.880-9', businessName: 'Insumos Clinicos SpA', businessActivity: 'Insumos medicos', email: 'cobranza@insumos.cl', address: 'Santiago', code: 'INS-04', description: 'Guantes, mascarillas y material dental', quantity: 1, unitPrice: 1058824, discount: 0, net: 1058824, tax: 201176, total: 1260000, status: 'Vencido' },
        { id: 3, nature: 'venta', documentType: 'Boleta', folio: 'B-003581', issueDate: '2026-06-09', dueDate: '2026-06-09', rut: '15.332.110-4', businessName: 'Paciente particular', businessActivity: 'Particular', email: '', address: 'Vina del Mar', code: 'MED-01', description: 'Consulta medica particular', quantity: 1, unitPrice: 42017, discount: 0, net: 42017, tax: 7983, total: 50000, status: 'Pagado', paidDate: '2026-06-09' },
        { id: 4, nature: 'compra', documentType: 'Factura', folio: 'FC-19022', issueDate: '2026-06-03', dueDate: '2026-06-25', rut: '96.800.570-7', businessName: 'Energia Regional S.A.', businessActivity: 'Electricidad', email: 'clientes@energia.cl', address: 'Quilpue', code: 'SERV-EL', description: 'Consumo electrico mayo 2026', quantity: 1, unitPrice: 401681, discount: 0, net: 401681, tax: 76319, total: 478000, status: 'Pendiente' },
        { id: 5, nature: 'venta', documentType: 'Guia de despacho', folio: 'GD-000041', issueDate: '2026-06-11', dueDate: '', rut: '76.445.210-3', businessName: 'Empresa Portuaria Pacifico', businessActivity: 'Servicios portuarios', email: 'pagos@pacifico.cl', address: 'Valparaiso', code: 'DOC-01', description: 'Entrega de respaldos de prestaciones', quantity: 1, unitPrice: 0, discount: 0, net: 0, tax: 0, total: 0, status: 'Emitido' }
    ],
    documents: [
        { id: 1, date: '2026-06-04', type: 'Contrato de trabajo', workerId: 7, status: 'Emitido', data: null },
        { id: 2, date: '2026-06-08', type: 'Comprobante de vacaciones', workerId: 3, status: 'Firmado', data: null }
    ],
    copays: [
        { id: 1, date: '2026-05-05', professionalId: 1, basNumber: '975103421', value: 27310, bonus: 10240, copay: 17070, specialCondition: 0, toCollect: 10240, requiresDocument: 'No' },
        { id: 2, date: '2026-05-07', professionalId: 1, basNumber: '975108552', value: 27310, bonus: 10240, copay: 17070, specialCondition: 0, toCollect: 10240, requiresDocument: 'No' },
        { id: 3, date: '2026-05-10', professionalId: 1, basNumber: '975114890', value: 27310, bonus: 10240, copay: 17070, specialCondition: 0, toCollect: 10240, requiresDocument: 'No' },
        { id: 4, date: '2026-05-06', professionalId: 2, basNumber: '975205114', value: 31980, bonus: 12800, copay: 19180, specialCondition: 0, toCollect: 12800, requiresDocument: 'No' },
        { id: 5, date: '2026-05-14', professionalId: 2, basNumber: '975216732', value: 31980, bonus: 12800, copay: 19180, specialCondition: 0, toCollect: 12800, requiresDocument: 'Sí' },
        { id: 6, date: '2026-05-12', professionalId: 6, basNumber: '975309881', value: 45500, bonus: 25700, copay: 19800, specialCondition: 0, toCollect: 25700, requiresDocument: 'No' },
        { id: 7, date: '2026-05-20', professionalId: 6, basNumber: '975327445', value: 45500, bonus: 25700, copay: 19800, specialCondition: 0, toCollect: 25700, requiresDocument: 'No' }
    ]
};

const titles = {
    'admin-dashboard': 'Dashboard del administrador',
    dashboard: 'Escritorio contable',
    libro: 'Libro contable y facturacion',
    rrhh: 'Recursos humanos',
    remuneraciones: 'Pago de remuneraciones',
    ausencias: 'Vacaciones y licencias',
    movimientos: 'Libro contable',
    documentos: 'Documentos laborales',
    copagos: 'Copagos y cobranza FONASA'
};

function worker(id) { return state.workers.find(item => item.id === Number(id)); }
function initials(name) { return name.split(' ').filter(word => word.length > 2).slice(0, 2).map(word => word[0]).join('').toUpperCase(); }
function formatDate(date) { return new Date(`${date}T12:00:00`).toLocaleDateString('es-CL'); }
function badge(status) {
    const color = ['Activo', 'Pagada', 'Autorizada', 'Conciliado', 'Pagado', 'Procesada'].includes(status) ? 'green'
        : ['Pendiente', 'Calculada'].includes(status) ? 'amber' : ['Borrador', 'Emitido'].includes(status) ? 'blue' : 'red';
    return `<span class="badge ${color}">${status}</span>`;
}

function navigate(view) {
    document.querySelectorAll('.view').forEach(item => item.classList.toggle('active', item.id === view));
    document.querySelectorAll('.nav-item').forEach(item => item.classList.toggle('active', item.dataset.view === view));
    const pageTitle = document.querySelector('#page-title');
    if (pageTitle) pageTitle.textContent = titles[view];
}

function renderChart() {
    // Usar datos reales de flujo_6_meses si están disponibles
    let months = [
        ['Ene', 72, 49], ['Feb', 65, 45], ['Mar', 83, 54],
        ['Abr', 76, 50], ['May', 91, 61], ['Jun', 88, 57]
    ];

    if (window.flujoMeses && Array.isArray(window.flujoMeses) && window.flujoMeses.length > 0) {
        // Calcular el máximo para normalizar las alturas
        const maxIngresos = Math.max(...window.flujoMeses.map(m => m.ingresos));
        const maxEgresos = Math.max(...window.flujoMeses.map(m => m.egresos));
        const maxValue = Math.max(maxIngresos, maxEgresos);

        months = window.flujoMeses.map(m => {
            const incomeHeight = maxValue > 0 ? Math.round((m.ingresos / maxValue) * 100) : 0;
            const expenseHeight = maxValue > 0 ? Math.round((m.egresos / maxValue) * 100) : 0;
            return [m.mes, incomeHeight, expenseHeight];
        });
    }

    const cashChart = document.querySelector('#cash-chart');
    if (cashChart) {
        cashChart.innerHTML = months.map(([month, income, expense]) =>
            `<div class="month-bars"><span class="income" style="height:${income}%"></span><span class="expense" style="height:${expense}%"></span><small>${month}</small></div>`
        ).join('');
    }
    const adminChart = document.querySelector('#admin-cash-chart');
    if (adminChart) {
        adminChart.innerHTML = months.map(([month, income, expense]) =>
            `<div class="month-bars"><span class="income" style="height:${income}%"></span><span class="expense" style="height:${expense}%"></span><small>${month}</small></div>`
        ).join('');
    }
}

// Variables globales para DataTable y filtros
let workerFilter = 'all';
let workersTable = null;
let currentFilteredWorkers = []; // Para acceder a los datos desde eventos de botones

function renderWorkers() {
    const workersTableElement = document.querySelector('#workers-table');
    const workerCount = document.querySelector('#worker-count');

    if (!workersTableElement) return;

    // Destruir DataTable existente si existe
    if (workersTable) {
        workersTable.destroy();
    }

    // Filtrar datos según el filtro activo
    const filteredWorkers = workerFilter === 'all'
        ? state.workers
        : state.workers.filter(item => item.type === workerFilter);

    // Guardar en variable global para acceso desde eventos
    currentFilteredWorkers = filteredWorkers;

    console.log('Filtered Workers:', filteredWorkers);

    // Preparar datos para DataTables
    const tableData = filteredWorkers.map((item, index) => {
        // Crear badge para tipo de contrato
        let contractBadge = '';
        let contractActions = '';

        if (item.contract === 'Contrato Institucional') {
            contractBadge = '<span class="badge green">Contrato</span>';
        } else {
            contractBadge = '<span class="badge blue">Convenio</span>';
            // Agregar botón para ver convenio si tiene detalle
            if (item.convenioDetalle) {
                console.log('Worker con convenio:', item.name, item.convenioDetalle);
                contractActions = `<br><button class="btn btn-sm btn-outline-info mt-1" onclick="verConvenio(${index})" style="font-size: 11px; padding: 2px 8px;">Ver convenio</button>`;
            }
        }

        return [
            `<div class="person"><span class="person-avatar">${initials(item.name)}</span><div><strong>${item.name}</strong><small>${item.rut}</small></div></div>`,
            `<strong>${item.role}</strong><div class="subtle">${item.specialty || 'Sin especialidad'}</div>`,
            `${contractBadge}<div class="subtle">Desde ${formatDate(item.start)}</div>${contractActions}`,
            `<strong>${money.format(item.salary)}</strong>`,
            badge(item.status),
            `<button class="icon-button" title="Ver ficha">•••</button>`
        ];
    });

    // Inicializar DataTable
    workersTable = $(workersTableElement).DataTable({
        data: tableData,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        columnDefs: [
            { orderable: false, targets: 5 }
        ],
        drawCallback: function() {
            if (workerCount) {
                const info = workersTable.page.info();
                workerCount.textContent = `${info.recordsDisplay} trabajadores`;
            }
        }
    });

    // Actualizar contador inicial
    if (workerCount) workerCount.textContent = `${filteredWorkers.length} trabajadores`;

    fillWorkerSelects();
}

// Función para mostrar detalle del convenio
function verConvenio(index) {
    const worker = currentFilteredWorkers[index];
    if (!worker || !worker.convenioDetalle) {
        if (typeof swal !== 'undefined') {
            swal('Sin información', 'No hay información de convenio disponible para este profesional', 'info');
        } else {
            alert('No hay información de convenio disponible');
        }
        return;
    }

    const convenio = worker.convenioDetalle;

    // Determinar estado del convenio
    const hoy = new Date();
    let estadoConvenio = 'activo';
    let estadoTexto = 'Activo';
    let estadoColor = '#1ca66c';

    if (convenio.fecha_fin) {
        const fechaFin = new Date(convenio.fecha_fin);
        if (fechaFin < hoy) {
            estadoConvenio = 'vencido';
            estadoTexto = 'Vencido';
            estadoColor = '#df5c61';
        }
    }

    if (convenio.fecha_inicio) {
        const fechaInicio = new Date(convenio.fecha_inicio);
        if (fechaInicio > hoy) {
            estadoConvenio = 'pendiente';
            estadoTexto = 'Por iniciar';
            estadoColor = '#e5a42f';
        }
    }

    // Crear contenido del modal
    let contenido = `
        <div style="text-align: left; padding: 0;">
            <!-- Header del convenio -->
            <div style="background: linear-gradient(135deg, #1d8eb1 0%, #43b9ce 100%); padding: 20px; margin: -20px -20px 20px -20px; color: white; border-radius: 8px 8px 0 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <h4 style="margin: 0; font-size: 16px; font-weight: 600;">
                        <i data-feather="file-text" style="width: 18px; height: 18px; vertical-align: middle; margin-right: 8px;"></i>
                        ${convenio.nombre_convenio || 'Sin nombre asignado'}
                    </h4>
                    <span style="background: rgba(255,255,255,0.25); padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: 600;">
                        ${estadoTexto}
                    </span>
                </div>
                <div style="font-size: 13px; opacity: 0.9;">
                    <i data-feather="user" style="width: 14px; height: 14px; vertical-align: middle; margin-right: 5px;"></i>
                    ${worker.name}
                </div>
            </div>

            <!-- Información principal -->
            <div style="padding: 0 5px;">
                <!-- Tipo de atención -->
                <div style="background: #f8fbfc; border-left: 3px solid #43b9ce; padding: 15px; margin-bottom: 15px; border-radius: 4px;">
                    <div style="color: #748493; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 5px;">
                        <i data-feather="briefcase" style="width: 12px; height: 12px; vertical-align: middle; margin-right: 5px;"></i>
                        Tipo de Atención
                    </div>
                    <div style="color: #102b3f; font-size: 15px; font-weight: 600;">
                        ${convenio.tipo_atencion || '<span style="color: #9cb5c5;">No especificado</span>'}
                    </div>
                </div>

                <!-- Valores económicos -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 15px;">
                    <div style="background: #e4f6ee; padding: 15px; border-radius: 8px; text-align: center;">
                        <div style="color: #1ca66c; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                            <i data-feather="percent" style="width: 12px; height: 12px; vertical-align: middle; margin-right: 3px;"></i>
                            Porcentaje
                        </div>
                        <div style="color: #1ca66c; font-size: 22px; font-weight: 700;">
                            ${convenio.porcentaje ? convenio.porcentaje + '%' : '<span style="font-size: 14px; opacity: 0.6;">—</span>'}
                        </div>
                    </div>
                    <div style="background: #e4f3f7; padding: 15px; border-radius: 8px; text-align: center;">
                        <div style="color: #1d8eb1; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                            <i data-feather="dollar-sign" style="width: 12px; height: 12px; vertical-align: middle; margin-right: 3px;"></i>
                            Valor Fijo
                        </div>
                        <div style="color: #1d8eb1; font-size: 22px; font-weight: 700;">
                            ${convenio.valor ? money.format(convenio.valor) : '<span style="font-size: 14px; opacity: 0.6;">—</span>'}
                        </div>
                    </div>
                </div>

                <!-- Periodo de vigencia -->
                <div style="background: white; border: 1px solid #e6edf1; padding: 15px; border-radius: 8px; margin-bottom: 15px;">
                    <div style="color: #748493; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px;">
                        <i data-feather="calendar" style="width: 12px; height: 12px; vertical-align: middle; margin-right: 5px;"></i>
                        Periodo de Vigencia
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 10px; align-items: center;">
                        <div>
                            <div style="color: #748493; font-size: 10px; margin-bottom: 3px;">Inicio</div>
                            <div style="color: #102b3f; font-weight: 600; font-size: 13px;">
                                ${convenio.fecha_inicio ? formatDate(convenio.fecha_inicio) : '<span style="color: #9cb5c5;">Sin fecha</span>'}
                            </div>
                        </div>
                        <div style="color: #d1e7ec; font-size: 18px;">→</div>
                        <div>
                            <div style="color: #748493; font-size: 10px; margin-bottom: 3px;">Término</div>
                            <div style="color: #102b3f; font-weight: 600; font-size: 13px;">
                                ${convenio.fecha_fin ? formatDate(convenio.fecha_fin) : '<span style="color: #1ca66c;">Sin vencimiento</span>'}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Observaciones -->
                ${convenio.observaciones ? `
                <div style="background: #fff7e7; border-left: 3px solid #e5a42f; padding: 15px; border-radius: 4px;">
                    <div style="color: #80601f; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                        <i data-feather="alert-circle" style="width: 12px; height: 12px; vertical-align: middle; margin-right: 5px;"></i>
                        Observaciones
                    </div>
                    <div style="color: #5a4317; font-size: 13px; line-height: 1.5;">
                        ${convenio.observaciones}
                    </div>
                </div>
                ` : ''}
            </div>
        </div>
    `;

    // Mostrar con SweetAlert (versión antigua)
    if (typeof swal !== 'undefined') {
        swal({
            title: 'Detalle del Convenio',
            content: {
                element: 'div',
                attributes: {
                    innerHTML: contenido
                }
            },
            button: {
                text: 'Cerrar',
                className: 'swal-button-custom'
            },
            className: 'swal-convenio'
        }).then(() => {
            // Renderizar íconos Feather después de mostrar el modal
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        // Renderizar íconos inmediatamente
        setTimeout(() => {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        }, 100);
    } else {
        alert('Convenio: ' + (convenio.nombre_convenio || 'N/A'));
    }
}

function renderPayroll() {
    const payrollBody = document.querySelector('#payroll-body');
    if (!payrollBody) return;

    let gross = 0, discounts = 0, net = 0;
    payrollBody.innerHTML = state.payroll.map(item => {
        const person = worker(item.workerId);
        gross += item.gross; discounts += item.discounts; net += item.net;
        return `<tr>
            <td><div class="person"><span class="person-avatar">${initials(person.name)}</span><div><strong>${person.name}</strong><small>${person.rut}</small></div></div></td>
            <td><strong>${item.afpName}</strong><div class="subtle">${money.format(item.afp)}</div></td>
            <td><strong>${item.healthName}</strong><div class="subtle">${money.format(item.health + item.healthExtra)}</div></td>
            <td>${money.format(item.unemployment)}</td>
            <td><strong>${item.compensationName}</strong><div class="subtle">${money.format(item.compensation)}</div></td>
            <td><strong>${money.format(item.discounts)}</strong></td><td><strong>${money.format(item.net)}</strong></td>
            <td>${badge(item.status)}</td><td><button class="icon-button" data-detail="${item.workerId}">Detalle</button> ${item.status === 'Pagada' ? '' : `<button class="icon-button" data-pay="${item.workerId}">Pagar</button>`}</td>
        </tr>`;
    }).join('');
    const payrollGross = document.querySelector('#payroll-gross');
    const payrollDiscounts = document.querySelector('#payroll-discounts');
    const payrollNet = document.querySelector('#payroll-net');
    const metricPayroll = document.querySelector('#metric-payroll');

    if (payrollGross) payrollGross.textContent = money.format(gross);
    if (payrollDiscounts) payrollDiscounts.textContent = money.format(discounts);
    if (payrollNet) payrollNet.textContent = money.format(net);
    if (metricPayroll) metricPayroll.textContent = money.format(state.payroll.filter(p => p.status !== 'Pagada').reduce((sum, p) => sum + p.net, 0));
    renderAdminDashboard();
}

function renderAbsences() {
    const absenceBody = document.querySelector('#absence-body');
    if (!absenceBody) return;

    absenceBody.innerHTML = state.absences.map(item => {
        const person = worker(item.workerId);
        return `<tr>
            <td><div class="person"><span class="person-avatar">${initials(person.name)}</span><div><strong>${person.name}</strong><small>${person.rut}</small></div></div></td>
            <td>${item.type}</td><td>${formatDate(item.start)} al ${formatDate(item.end)}</td>
            <td>${item.days} días</td><td>${badge(item.status)}</td>
            <td>${item.status === 'Pendiente' ? `<button class="icon-button" data-authorize="${item.id}">Autorizar</button>` : ''}</td>
        </tr>`;
    }).join('');
    const pendingAbsences = document.querySelector('#pending-absences');
    if (pendingAbsences) pendingAbsences.textContent = state.absences.filter(item => item.status === 'Pendiente').length;
    renderAdminDashboard();
}

let movementFilter = 'all';
let bookFilter = 'all';
let currentTaxDocumentId = null;
function renderMovements() {
    const movementsBody = document.querySelector('#movements-body');
    if (!movementsBody) return;

    const rows = state.movements.filter(item => movementFilter === 'all' || item.type === movementFilter);
    movementsBody.innerHTML = rows.map(item => `
        <tr><td>${formatDate(item.date)}</td><td><span class="badge ${item.type === 'ingreso' ? 'green' : 'red'}">${item.type}</span></td>
        <td>${item.category}</td><td>${item.description}</td>
        <td><strong class="${item.type === 'ingreso' ? 'text-green' : ''}">${item.type === 'ingreso' ? '+' : '-'} ${money.format(item.amount)}</strong></td><td>${badge(item.status)}</td></tr>
    `).join('');

    // Usar estadísticas reales si están disponibles
    let income = 0;
    let expense = 0;
    let bonosCount = 0;
    let comprasCount = 0;
    let gastosCount = 0;

    if (window.movimientosStats && typeof window.movimientosStats === 'object') {
        income = parseFloat(window.movimientosStats.ingresos_periodo || 0);
        expense = parseFloat(window.movimientosStats.egresos_periodo || 0);
        bonosCount = parseInt(window.movimientosStats.cant_bonos || 0);
        comprasCount = parseInt(window.movimientosStats.cant_compras || 0);
        gastosCount = parseInt(window.movimientosStats.cant_gastos || 0);
    } else {
        // Calcular desde los movimientos si no hay estadísticas
        income = state.movements.filter(m => m.type === 'ingreso').reduce((sum, m) => sum + m.amount, 0);
        expense = state.movements.filter(m => m.type === 'egreso').reduce((sum, m) => sum + m.amount, 0);
    }

    const metricIncome = document.querySelector('#metric-income');
    const metricExpense = document.querySelector('#metric-expense');
    const heroResult = document.querySelector('#hero-result');
    const metricBonosCount = document.querySelector('#metric-bonos-count');
    const metricComprasCount = document.querySelector('#metric-compras-count');
    const metricGastosCount = document.querySelector('#metric-gastos-count');

    if (metricIncome) metricIncome.textContent = money.format(income);
    if (metricExpense) metricExpense.textContent = money.format(expense);
    if (heroResult) heroResult.textContent = money.format(income - expense);
    if (metricBonosCount) metricBonosCount.textContent = bonosCount;
    if (metricComprasCount) metricComprasCount.textContent = comprasCount;
    if (metricGastosCount) metricGastosCount.textContent = gastosCount;

    renderAdminDashboard();
}

function documentStatus(item) {
    if (item.status === 'Pendiente' && item.dueDate && item.dueDate < '2026-06-12') return 'Vencido';
    return item.status;
}

function renderBook() {
    const searchInput = document.querySelector('#book-search');
    const typeInput = document.querySelector('#book-document-type');
    const bookBody = document.querySelector('#book-body');
    if (!searchInput || !typeInput || !bookBody) return;
    const search = searchInput.value.trim().toLowerCase();
    const type = typeInput.value;
    const documents = state.taxDocuments.filter(item => {
        const status = documentStatus(item);
        const matchesTab = bookFilter === 'all'
            || (bookFilter === 'receivable' && item.nature === 'venta' && ['Pendiente', 'Vencido'].includes(status))
            || (bookFilter === 'payable' && item.nature === 'compra' && ['Pendiente', 'Vencido'].includes(status))
            || (bookFilter === 'sales' && item.nature === 'venta')
            || (bookFilter === 'purchases' && item.nature === 'compra')
            || (bookFilter === 'issued' && ['Emitido', 'Pagado'].includes(status));
        const matchesType = type === 'all' || item.documentType === type;
        const haystack = `${item.folio} ${item.rut} ${item.businessName} ${item.description}`.toLowerCase();
        return matchesTab && matchesType && haystack.includes(search);
    }).sort((a, b) => b.issueDate.localeCompare(a.issueDate));

    const receivable = state.taxDocuments.filter(item => item.nature === 'venta' && ['Pendiente', 'Vencido'].includes(documentStatus(item)));
    const payable = state.taxDocuments.filter(item => item.nature === 'compra' && ['Pendiente', 'Vencido'].includes(documentStatus(item)));
    const sales = state.taxDocuments.filter(item => item.nature === 'venta');
    adminText('#book-receivable', money.format(receivable.reduce((sum, item) => sum + item.total, 0)));
    adminText('#book-receivable-count', `${receivable.length} documentos`);
    adminText('#book-payable', money.format(payable.reduce((sum, item) => sum + item.total, 0)));
    adminText('#book-payable-count', `${payable.length} documentos`);
    adminText('#book-sales', money.format(sales.reduce((sum, item) => sum + item.total, 0)));
    adminText('#book-tax', money.format(sales.reduce((sum, item) => sum + item.tax, 0)));
    adminText('#book-result-count', `${documents.length} registros`);

    bookBody.innerHTML = documents.map(item => {
        const status = documentStatus(item);
        const actionLabel = item.nature === 'venta' ? 'Cobrar' : 'Pagar';
        const canSettle = ['Pendiente', 'Vencido'].includes(status);
        return `<tr>
            <td><strong>${item.folio}</strong><div class="subtle">${item.documentType} · ${item.nature === 'venta' ? 'Venta' : 'Compra'}</div></td>
            <td>${formatDate(item.issueDate)}<div class="subtle">${item.dueDate ? `Vence ${formatDate(item.dueDate)}` : 'Sin vencimiento'}</div></td>
            <td><strong>${item.businessName}</strong><div class="subtle">${item.rut}</div></td>
            <td>${item.description}</td><td>${money.format(item.net)}</td><td>${money.format(item.tax)}</td><td><strong>${money.format(item.total)}</strong></td>
            <td>${badge(status)}</td>
            <td><button class="icon-button" data-view-tax="${item.id}">Ver</button> ${canSettle ? `<button class="icon-button" data-settle-tax="${item.id}">${actionLabel}</button>` : ''}</td>
        </tr>`;
        }).join('');
}

function taxDocumentCalculation() {
    const form = document.querySelector('#tax-document-form');
    if (!form) return { net: 0, tax: 0, total: 0 };
    const quantity = Number(form.elements.quantity.value || 0);
    const unitPrice = Number(form.elements.unitPrice.value || 0);
    const discount = Number(form.elements.discount.value || 0);
    const documentType = form.elements.documentType.value;
    const net = Math.round(quantity * unitPrice * (1 - discount / 100));
    const tax = ['Factura', 'Boleta'].includes(documentType) ? Math.round(net * .19) : 0;
    const total = net + tax;
    adminText('#tax-preview-net', money.format(net));
    adminText('#tax-preview-tax', money.format(tax));
    adminText('#tax-preview-total', money.format(total));
    return { net, tax, total };
}

function buildTaxDocument(item) {
    return `<div class="tax-document-header">
        <div><p class="eyebrow">CENTRO MEDICO DEMO</p><h1>${item.documentType.toUpperCase()}</h1><p>RUT 76.000.000-0 · Servicios medicos</p></div>
        <div class="tax-folio"><strong>RUT 76.000.000-0</strong><span>${item.documentType}</span><b>N° ${item.folio}</b><small>S.I.I. - VALPARAISO</small></div>
    </div>
    <div class="tax-client-data"><p><strong>Fecha:</strong> ${formatDate(item.issueDate)}</p><p><strong>Vencimiento:</strong> ${item.dueDate ? formatDate(item.dueDate) : 'No aplica'}</p><p><strong>Razon social:</strong> ${item.businessName}</p><p><strong>RUT:</strong> ${item.rut}</p><p><strong>Giro:</strong> ${item.businessActivity || '-'}</p><p><strong>Direccion:</strong> ${item.address || '-'}</p></div>
    <table class="tax-detail-table"><thead><tr><th>Codigo</th><th>Descripcion</th><th>Cantidad</th><th>Precio unitario</th><th>Descuento</th><th>Total neto</th></tr></thead>
    <tbody><tr><td>${item.code || '-'}</td><td>${item.description}</td><td>${item.quantity}</td><td>${money.format(item.unitPrice)}</td><td>${item.discount}%</td><td>${money.format(item.net)}</td></tr></tbody></table>
    <div class="tax-totals"><p><span>Neto</span><strong>${money.format(item.net)}</strong></p><p><span>IVA 19%</span><strong>${money.format(item.tax)}</strong></p><p class="total"><span>Total</span><strong>${money.format(item.total)}</strong></p></div>
    <p class="document-warning">Documento de demostracion sin validez tributaria. La emision electronica oficial debe realizarse mediante SII o proveedor autorizado.</p>`;
}

function showTaxDocument(id) {
    currentTaxDocumentId = Number(id);
    const item = state.taxDocuments.find(document => document.id === currentTaxDocumentId);
    const preview = document.querySelector('#tax-document-preview');
    if (preview) preview.innerHTML = buildTaxDocument(item);
    openModal('tax-preview-modal');
}

function printTaxDocument() {
    const item = state.taxDocuments.find(document => document.id === currentTaxDocumentId);
    const printWindow = window.open('', '_blank', 'width=920,height=760');
    if (!printWindow) return toast('El navegador bloqueo la ventana de impresion');
    printWindow.document.write(`<!doctype html><html lang="es"><head><meta charset="utf-8"><title>${item.documentType} ${item.folio}</title><style>@page{size:A4;margin:12mm}body{font:12px Arial;color:#172c3b}.tax-document-header{display:flex;justify-content:space-between;gap:20px;border-bottom:2px solid #178aaa;padding-bottom:15px}.tax-document-header h1{margin:4px 0}.tax-folio{border:2px solid #c64e4e;padding:12px;text-align:center;display:grid;gap:4px}.tax-client-data{display:grid;grid-template-columns:1fr 1fr;gap:4px 20px;margin:22px 0;padding:14px;background:#f3f6f7}.tax-client-data p{margin:3px}.tax-detail-table{width:100%;border-collapse:collapse}.tax-detail-table th,.tax-detail-table td{border:1px solid #aaa;padding:8px;text-align:left}.tax-totals{width:280px;margin:25px 0 0 auto}.tax-totals p{display:flex;justify-content:space-between;padding:7px;border-bottom:1px solid #ddd;margin:0}.tax-totals .total{font-size:16px;background:#edf7f9}.document-warning{margin-top:45px;padding:10px;border:1px solid #ccc;font-size:10px}</style></head><body>${buildTaxDocument(item)}<script>window.onload=()=>window.print();<\/script></body></html>`);
    printWindow.document.close();
}

function fillWorkerSelects() {
    const options = state.workers.map(item => `<option value="${item.id}">${item.name} · ${item.rut}</option>`).join('');
    const payrollWorker = document.querySelector('#payroll-worker');
    const absenceWorker = document.querySelector('#absence-worker');
    const documentWorker = document.querySelector('#document-worker');
    if (payrollWorker) payrollWorker.innerHTML = options;
    if (absenceWorker) absenceWorker.innerHTML = options;
    if (documentWorker) documentWorker.innerHTML = options;
    const professionals = state.workers.filter(item => item.type === 'profesional');
    const professionalOptions = professionals.map(item => `<option value="${item.id}">${item.name} · ${item.rut}</option>`).join('');
    const copayProfessional = document.querySelector('#copay-professional');
    const copayProfessionalFilter = document.querySelector('#copay-professional-filter');
    if (copayProfessional) copayProfessional.innerHTML = professionalOptions;
    if (copayProfessionalFilter) copayProfessionalFilter.innerHTML = `<option value="all">Todos los profesionales</option>${professionalOptions}`;
}

let copayProfessionalFilter = 'all';
let currentFonasaProfessionalId = null;

function professionalCopayTotals(professionalId) {
    const records = state.copays.filter(item => item.professionalId === Number(professionalId));
    return {
        records,
        value: records.reduce((sum, item) => sum + item.value, 0),
        bonus: records.reduce((sum, item) => sum + item.bonus, 0),
        copay: records.reduce((sum, item) => sum + item.copay, 0),
        toCollect: records.reduce((sum, item) => sum + item.toCollect, 0)
    };
}

function renderCopays() {
    const copaysBody = document.querySelector('#copays-body');
    if (!copaysBody) return;

    const professionals = state.workers.filter(item => item.type === 'profesional');
    const rows = state.copays.filter(item => copayProfessionalFilter === 'all' || item.professionalId === Number(copayProfessionalFilter));
    const copayCount = document.querySelector('#copay-count');
    const copayBonus = document.querySelector('#copay-bonus');
    const copayTotal = document.querySelector('#copay-total');
    if (copayCount) copayCount.textContent = state.copays.length;
    if (copayBonus) copayBonus.textContent = money.format(state.copays.reduce((sum, item) => sum + item.bonus, 0));
    if (copayTotal) copayTotal.textContent = money.format(state.copays.reduce((sum, item) => sum + item.copay, 0));
    copaysBody.innerHTML = rows.map(item => {
        const professional = worker(item.professionalId);
        return `<tr><td>${formatDate(item.date)}</td><td><strong>${professional.name}</strong><div class="subtle">${professional.rut}</div></td>
            <td>${item.basNumber}</td><td>${money.format(item.value)}</td><td>${money.format(item.bonus)}</td>
            <td>${money.format(item.copay)}</td><td><strong>${money.format(item.toCollect)}</strong></td>
            <td>${item.requiresDocument === 'Sí' ? badge('Pendiente') : '<span class="badge green">Completo</span>'}</td></tr>`;
    }).join('');
    const professionalSummary = document.querySelector('#professional-copay-summary');
    if (professionalSummary) {
        professionalSummary.innerHTML = professionals.map(professional => {
            const totals = professionalCopayTotals(professional.id);
            return `<article class="professional-card">
            <div class="professional-card-head"><span class="person-avatar">${initials(professional.name)}</span><div><strong>${professional.name}</strong><small>${totals.records.length} atenciones · ${professional.rut}</small></div></div>
            <div class="professional-totals"><div><small>Copagos recibidos</small><strong>${money.format(totals.copay)}</strong></div><div><small>A cobrar FONASA</small><strong>${money.format(totals.toCollect)}</strong></div></div>
            <button class="primary" data-fonasa-report="${professional.id}">Generar planilla FONASA</button>
        </article>`;
        }).join('');
    }
    renderAdminDashboard();
}

function adminText(selector, value) {
    const element = document.querySelector(selector);
    if (element) element.textContent = value;
}

function renderAdminDashboard() {
    const incomes = state.movements.filter(item => item.type === 'ingreso');
    const expenses = state.movements.filter(item => item.type === 'egreso');
    const income = incomes.reduce((sum, item) => sum + item.amount, 0);
    const expense = expenses.reduce((sum, item) => sum + item.amount, 0);
    const result = income - expense;
    const pendingPayroll = state.payroll.filter(item => item.status !== 'Pagada');
    const pendingPayrollAmount = pendingPayroll.reduce((sum, item) => sum + item.net, 0);
    const pendingAbsences = state.absences.filter(item => item.status === 'Pendiente').length;
    const totalCopays = state.copays.reduce((sum, item) => sum + item.copay, 0);
    const totalFonasa = state.copays.reduce((sum, item) => sum + item.toCollect, 0);
    const requiredDocuments = state.copays.filter(item => item.requiresDocument !== 'No').length;
    const bondsProgress = state.copays.length ? Math.round((state.copays.length - requiredDocuments) * 100 / state.copays.length) : 0;
    const paidPayroll = state.payroll.filter(item => item.status === 'Pagada').length;
    const payrollProgress = state.payroll.length ? Math.round(paidPayroll * 100 / state.payroll.length) : 0;
    const professionals = state.workers.filter(item => item.type === 'profesional');
    const activeRegisters = state.cashRegisters.filter(item => item.status !== 'Cerrada');
    const registerTotal = activeRegisters.reduce((sum, item) => sum + item.cash + item.card + item.transfer, 0);

    adminText('#admin-income', money.format(income));
    adminText('#admin-expense', money.format(expense));
    adminText('#admin-result', money.format(result));
    adminText('#admin-result-status', result >= 0 ? 'Balance positivo del periodo' : 'Balance negativo del periodo');
    adminText('#admin-fonasa', money.format(totalFonasa));
    adminText('#admin-copays', money.format(totalCopays));
    adminText('#admin-workers', state.workers.filter(item => item.status === 'Activo').length);
    adminText('#admin-payroll', money.format(pendingPayrollAmount));
    adminText('#admin-income-detail', `${incomes.length} movimientos registrados`);
    adminText('#admin-expense-detail', `${expenses.length} pagos registrados`);
    adminText('#admin-fonasa-detail', `${state.copays.length} bonos incluidos`);
    adminText('#admin-copays-detail', `${professionals.length} profesionales`);
    adminText('#admin-workers-detail', `${state.workers.length} fichas registradas`);
    adminText('#admin-payroll-detail', `${pendingPayroll.length} liquidaciones por pagar`);
    adminText('#admin-cash', money.format(8000000 + result));
    adminText('#admin-active-registers', activeRegisters.length);
    adminText('#admin-registers-detail', `${activeRegisters.filter(item => item.status === 'Activa').length} abiertas · ${activeRegisters.filter(item => item.status === 'Por cerrar').length} por cerrar`);
    adminText('#admin-register-total', `${money.format(registerTotal)} recaudado`);
    adminText('#admin-absences', pendingAbsences);
    adminText('#admin-documents', requiredDocuments);
    adminText('#admin-bonds-progress', `${bondsProgress}%`);
    adminText('#admin-payroll-progress', `${payrollProgress}%`);
    adminText('#admin-task-payroll', `${pendingPayroll.length} liquidaciones pendientes`);
    adminText('#admin-task-absences', `${pendingAbsences} solicitudes por autorizar`);
    adminText('#admin-task-fonasa', `${professionals.length} planillas por profesional`);

    const bondsBar = document.querySelector('#admin-bonds-bar');
    const payrollBar = document.querySelector('#admin-payroll-bar');
    if (bondsBar) bondsBar.style.width = `${bondsProgress}%`;
    if (payrollBar) payrollBar.style.width = `${payrollProgress}%`;

    const professionalTable = document.querySelector('#admin-professionals');
    if (professionalTable) {
        professionalTable.innerHTML = professionals
            .map(professional => ({ professional, totals: professionalCopayTotals(professional.id) }))
            .sort((a, b) => b.totals.toCollect - a.totals.toCollect)
            .map(({ professional, totals }) => `<tr>
                <td><div class="person"><span class="person-avatar">${initials(professional.name)}</span><div><strong>${professional.name}</strong><small>${professional.specialty}</small></div></div></td>
                <td>${totals.records.length}</td><td>${money.format(totals.copay)}</td><td><strong>${money.format(totals.toCollect)}</strong></td>
            </tr>`).join('');
    }

    const movements = document.querySelector('#admin-movements');
    if (movements) {
        movements.innerHTML = state.movements.slice(0, 5).map(item => `<div class="recent-movement">
            <span class="movement-symbol ${item.type}">${item.type === 'ingreso' ? '+' : '-'}</span>
            <div><strong>${item.description}</strong><small>${formatDate(item.date)} · ${item.category}</small></div>
            <b class="${item.type === 'ingreso' ? 'text-green' : 'text-red'}">${item.type === 'ingreso' ? '+' : '-'} ${money.format(item.amount)}</b>
        </div>`).join('');
    }

    const cashRegisters = document.querySelector('#admin-cash-registers');
    if (cashRegisters) {
        cashRegisters.innerHTML = activeRegisters.map(register => {
            const collected = register.cash + register.card + register.transfer;
            const statusClass = register.status === 'Activa' ? 'green' : 'amber';
            return `<article class="cash-register-card">
                <div class="cash-register-head">
                    <span class="cash-register-icon">C${register.id}</span>
                    <div><strong>${register.name}</strong><small>${register.cashier} · Apertura ${register.openedAt}</small></div>
                    <span class="badge ${statusClass}">${register.status}</span>
                </div>
                <div class="cash-register-total"><small>Recaudacion del turno</small><strong>${money.format(collected)}</strong></div>
                <div class="cash-register-methods">
                    <span><small>Efectivo</small><strong>${money.format(register.cash)}</strong></span>
                    <span><small>Tarjetas</small><strong>${money.format(register.card)}</strong></span>
                    <span><small>Transferencias</small><strong>${money.format(register.transfer)}</strong></span>
                </div>
                <div class="cash-register-footer">
                    <span>Fondo inicial: <strong>${money.format(register.openingBalance)}</strong></span>
                    <span class="${register.difference === 0 ? 'text-green' : 'text-red'}">Diferencia: <strong>${money.format(register.difference)}</strong></span>
                </div>
            </article>`;
        }).join('');
    }
}

function buildFonasaReport(professionalId) {
    const professional = worker(professionalId);
    const totals = professionalCopayTotals(professionalId);
    const rows = totals.records.map(item => `<tr><td>${item.basNumber}</td><td>${money.format(item.value)}</td><td>${money.format(item.bonus)}</td><td>${money.format(item.copay)}</td><td>${money.format(item.specialCondition)}</td><td>${money.format(item.toCollect)}</td><td>${item.requiresDocument === 'Sí' ? 'S' : 'N'}</td></tr>`).join('');
    return `<div class="fonasa-header"><div><strong>COBRANZA</strong><h1>INFORME DE COBRANZA</h1><span>Centro Médico Demo</span></div><div><strong>FECHA:</strong> ${formatDate('2026-06-10')}<br><strong>PÁGINA:</strong> 1</div></div>
        <table class="fonasa-meta">
            <tr><td class="label">FINANCIADOR:</td><td>Fondo Nacional de Salud</td><td class="label">FECHA EMISIÓN:</td><td>${formatDate('2026-06-10')}</td></tr>
            <tr><td class="label">LUGAR:</td><td>Centro Médico Demo</td><td class="label">CAJERO:</td><td>Jaime Contador</td></tr>
            <tr><td class="label">PERÍODO:</td><td>Desde 01-05-2026 · Hasta 31-05-2026</td><td class="label">PRESTADOR:</td><td>${professional.rut} · ${professional.name}</td></tr>
            <tr><td class="label">NÚMERO COBRANZA:</td><td colspan="3">SIM-${professional.id}-202605</td></tr>
        </table>
        <table class="fonasa-report-table"><thead><tr><th>Nro BAS</th><th>Valor</th><th>Bonificación</th><th>Copago</th><th>Condición especial</th><th>A cobrar</th><th>Exige docum.</th></tr></thead>
        <tbody>${rows}</tbody><tfoot><tr><td>TOTALES</td><td>${money.format(totals.value)}</td><td>${money.format(totals.bonus)}</td><td>${money.format(totals.copay)}</td><td>-</td><td>${money.format(totals.toCollect)}</td><td>-</td></tr></tfoot></table>`;
}

function showFonasaReport(professionalId) {
    currentFonasaProfessionalId = Number(professionalId);
    const preview = document.querySelector('#fonasa-report-preview');
    if (preview) preview.innerHTML = buildFonasaReport(currentFonasaProfessionalId);
    openModal('fonasa-report-modal');
}

function printFonasaReport() {
    const report = buildFonasaReport(currentFonasaProfessionalId);
    const printWindow = window.open('', '_blank', 'width=1100,height=750');
    if (!printWindow) return toast('El navegador bloqueó la ventana de impresión');
    printWindow.document.write(`<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Informe de cobranza FONASA</title><style>@page{size:A4 landscape;margin:10mm}body{font-family:Arial,sans-serif;color:#111;font-size:10px}.fonasa-header{display:flex;justify-content:space-between;border-bottom:1px solid #222;padding-bottom:8px}.fonasa-header h1{margin:0;font-size:17px}.fonasa-meta{width:100%;border-collapse:collapse;margin:12px 0}.fonasa-meta td{padding:3px 5px}.label{width:14%;font-weight:700}.fonasa-report-table{width:100%;border-collapse:collapse;margin-top:12px}.fonasa-report-table th,.fonasa-report-table td{border:1px solid #555;padding:5px 4px;text-align:right;font-size:9px}.fonasa-report-table th{text-transform:uppercase;text-align:center}.fonasa-report-table td:first-child{text-align:center}.fonasa-report-table tfoot td{font-weight:800}</style></head><body>${report}<script>window.onload=()=>window.print();<\/script></body></html>`);
    printWindow.document.close();
}

const documentLabels = {
    vacaciones: { title: 'Comprobante de vacaciones', secondaryDate: 'Fecha de término', reason: 'Período / motivo', days: 'Días hábiles', amount: 'Saldo de vacaciones' },
    contrato: { title: 'Contrato de trabajo', secondaryDate: 'Fecha de inicio', reason: 'Funciones y cláusulas especiales', days: 'Horas semanales', amount: 'Remuneración mensual' },
    despido: { title: 'Carta de término de contrato', secondaryDate: 'Fecha efectiva de término', reason: 'Causal y fundamentos', days: 'Días de aviso', amount: 'Indemnización estimada' },
    finiquito: { title: 'Finiquito de trabajo', secondaryDate: 'Fecha de término', reason: 'Causal de término', days: 'Días de vacaciones pendientes', amount: 'Total del finiquito' }
};

let currentDocumentHtml = '';

function configureDocumentForm(type) {
    const config = documentLabels[type];
    const form = document.querySelector('#document-form');
    if (!form) return;
    form.reset();
    const documentType = document.querySelector('#document-type');
    const formTitle = document.querySelector('#document-form-title');
    const secondaryDateLabel = document.querySelector('#document-secondary-date-label');
    const reasonLabel = document.querySelector('#document-reason-label');
    const daysLabel = document.querySelector('#document-days-label');
    const amountLabel = document.querySelector('#document-amount-label');

    if (documentType) documentType.value = type;
    if (formTitle) formTitle.textContent = config.title;
    if (secondaryDateLabel) secondaryDateLabel.childNodes[0].textContent = config.secondaryDate;
    if (reasonLabel) reasonLabel.childNodes[0].textContent = config.reason;
    if (daysLabel) daysLabel.childNodes[0].textContent = config.days;
    if (amountLabel) amountLabel.childNodes[0].textContent = config.amount;

    form.elements.issueDate.value = '2026-06-10';
    form.elements.secondaryDate.value = '2026-06-30';
    const selectedWorker = worker(form.elements.workerId.value);
    if (type === 'contrato' && selectedWorker) {
        form.elements.amount.value = selectedWorker.salary;
        form.elements.days.value = 44;
    }
    openModal('document-modal');
}

function documentFormData() {
    const form = document.querySelector('#document-form');
    if (!form) return {};
    const data = Object.fromEntries(new FormData(form));
    data.worker = worker(data.workerId);
    data.amount = Number(data.amount || 0);
    data.days = Number(data.days || 0);
    return data;
}

function companyHeader() {
    return `<header class="pdf-header"><strong>CENTRO MÉDICO DEMO SpA</strong><h1>Documento laboral</h1><p>RUT 76.000.000-0 · Santiago de Chile</p></header>`;
}

function signatures(person) {
    return `<div class="signature-grid"><div class="signature">Centro Médico Demo SpA<br>Empleador</div><div class="signature">${person.name}<br>RUT ${person.rut}</div></div>`;
}

function legalWarning() {
    return `<div class="document-warning">Plantilla de demostración. Debe revisarse y adecuarse a los antecedentes reales, la causal aplicable y la normativa laboral vigente antes de su firma o envío.</div>`;
}

function buildDocument(data) {
    const person = data.worker;
    const issueDate = formatDate(data.issueDate);
    const secondaryDate = formatDate(data.secondaryDate);
    const note = data.notes ? `<p><strong>Observaciones:</strong> ${data.notes}</p>` : '';

    if (data.documentType === 'vacaciones') {
        return `${companyHeader()}<h2>Comprobante de vacaciones</h2>
            <p>En Santiago, a ${issueDate}, se deja constancia que el trabajador individualizado solicita y acepta hacer uso de su feriado legal.</p>
            <table class="pdf-data"><tr><td>Trabajador</td><td>${person.name}</td></tr><tr><td>RUT</td><td>${person.rut}</td></tr><tr><td>Cargo</td><td>${person.role}</td></tr><tr><td>Inicio</td><td>${issueDate}</td></tr><tr><td>Término</td><td>${secondaryDate}</td></tr><tr><td>Días hábiles</td><td>${data.days}</td></tr><tr><td>Período / motivo</td><td>${data.reason || 'Feriado legal'}</td></tr><tr><td>Saldo informado</td><td>${data.amount} días</td></tr></table>
            <p>El trabajador declara recibir copia de este comprobante y se compromete a reintegrarse a sus funciones al término del período señalado.</p>${note}${signatures(person)}${legalWarning()}`;
    }
    if (data.documentType === 'contrato') {
        return `${companyHeader()}<h2>Contrato individual de trabajo</h2>
            <p>En Santiago, a ${issueDate}, entre Centro Médico Demo SpA, en adelante “el empleador”, y don/doña ${person.name}, RUT ${person.rut}, en adelante “el trabajador”, se acuerda el siguiente contrato.</p>
            <table class="pdf-data"><tr><td>Cargo</td><td>${person.role}</td></tr><tr><td>Fecha de inicio</td><td>${secondaryDate}</td></tr><tr><td>Jornada semanal</td><td>${data.days} horas</td></tr><tr><td>Remuneración base</td><td>${money.format(data.amount)}</td></tr><tr><td>Tipo de contrato</td><td>${person.contract}</td></tr></table>
            <p><strong>Funciones.</strong> El trabajador realizará las labores propias de su cargo y las funciones compatibles que se acuerden dentro del marco legal.</p>
            <p><strong>Remuneración.</strong> El empleador pagará la remuneración indicada, con los descuentos legales y previsionales correspondientes.</p>
            <p><strong>Cláusulas adicionales.</strong> ${data.reason || 'Sin cláusulas especiales.'}</p>${note}${signatures(person)}${legalWarning()}`;
    }
    if (data.documentType === 'despido') {
        return `${companyHeader()}<h2>Carta de aviso de término de contrato</h2>
            <p>Señor(a) ${person.name}, RUT ${person.rut}:</p><p>Centro Médico Demo SpA comunica el término de su contrato de trabajo, efectivo a contar del ${secondaryDate}.</p>
            <table class="pdf-data"><tr><td>Cargo</td><td>${person.role}</td></tr><tr><td>Fecha de comunicación</td><td>${issueDate}</td></tr><tr><td>Fecha de término</td><td>${secondaryDate}</td></tr><tr><td>Días de aviso</td><td>${data.days}</td></tr><tr><td>Indemnización estimada</td><td>${money.format(data.amount)}</td></tr><tr><td>Causal y fundamentos</td><td>${data.reason || 'Debe indicar la causal legal y los hechos en que se funda.'}</td></tr></table>
            <p>Las cotizaciones previsionales deberán encontrarse pagadas conforme corresponda. El finiquito y las sumas procedentes serán puestos a disposición según la normativa aplicable.</p>${note}${signatures(person)}${legalWarning()}`;
    }
    return `${companyHeader()}<h2>Finiquito de contrato de trabajo</h2>
        <p>En Santiago, a ${issueDate}, comparecen Centro Médico Demo SpA y don/doña ${person.name}, RUT ${person.rut}, quienes dejan constancia del término de la relación laboral.</p>
        <table class="pdf-data"><tr><td>Cargo</td><td>${person.role}</td></tr><tr><td>Inicio de relación</td><td>${formatDate(person.start)}</td></tr><tr><td>Fecha de término</td><td>${secondaryDate}</td></tr><tr><td>Causal</td><td>${data.reason || 'Causal pendiente de especificar'}</td></tr><tr><td>Vacaciones pendientes</td><td>${data.days} días</td></tr><tr><td>Total finiquito</td><td>${money.format(data.amount)}</td></tr></table>
        <p>El monto señalado deberá corresponder al detalle definitivo de remuneraciones, feriado, indemnizaciones y descuentos legalmente procedentes.</p>${note}${signatures(person)}${legalWarning()}`;
}

function previewDocument() {
    const data = documentFormData();
    if (!data.worker || !data.issueDate || !data.secondaryDate) {
        toast('Complete trabajador y fechas');
        return false;
    }
    currentDocumentHtml = buildDocument(data);
    const documentPreview = document.querySelector('#document-preview');
    if (documentPreview) documentPreview.innerHTML = currentDocumentHtml;
    closeModal(document.querySelector('#document-modal'));
    openModal('document-preview-modal');
    return true;
}

function renderDocuments() {
    const documentCount = document.querySelector('#document-count');
    const documentsBody = document.querySelector('#documents-body');
    if (!documentsBody) return;

    if (documentCount) documentCount.textContent = `${state.documents.length} documentos`;
    documentsBody.innerHTML = state.documents.map(item => {
        const person = worker(item.workerId);
        return `<tr><td>${formatDate(item.date)}</td><td><strong>${item.type}</strong></td><td>${person.name}<div class="subtle">${person.rut}</div></td><td>${badge(item.status)}</td><td>${item.data ? `<button class="icon-button" data-view-document="${item.id}">Ver / PDF</button>` : '<span class="subtle">Archivo histórico</span>'}</td></tr>`;
    }).join('');
}

function printCurrentDocument() {
    const printWindow = window.open('', '_blank', 'width=900,height=700');
    if (!printWindow) return toast('El navegador bloqueó la ventana de impresión');
    printWindow.document.write(`<!doctype html><html lang="es"><head><meta charset="utf-8"><title>Documento laboral</title>
        <style>@page{size:A4;margin:0}body{margin:0;background:white;color:#111;font-family:Georgia,"Times New Roman",serif}.pdf-page{width:210mm;min-height:297mm;padding:22mm 20mm;box-sizing:border-box;font-size:13px;line-height:1.55}.pdf-header{text-align:center;border-bottom:2px solid #163e57;padding-bottom:15px;margin-bottom:25px}.pdf-header h1{margin:5px 0;font-size:21px;text-transform:uppercase}.pdf-header p{margin:0;color:#42515b}h2{text-align:center;font-size:17px;margin:24px 0;text-transform:uppercase}p{text-align:justify;margin:13px 0}.pdf-data{width:100%;border-collapse:collapse;margin:18px 0}.pdf-data td{border:1px solid #bbc5cb;padding:8px 10px;font-size:12px}.pdf-data td:first-child{width:35%;font-weight:700;background:#f2f5f6}.signature-grid{display:grid;grid-template-columns:1fr 1fr;gap:50px;margin-top:75px}.signature{border-top:1px solid #222;padding-top:7px;text-align:center;font-size:12px}.document-warning{border:1px solid #d5d5d5;background:#f7f7f7;padding:10px;font-size:10px;margin-top:40px}</style></head><body><article class="pdf-page">${currentDocumentHtml}</article><script>window.onload=()=>window.print();<\/script></body></html>`);
    printWindow.document.close();
}

function openModal(id) {
    const modal = document.querySelector(`#${id}`);
    if (!modal) return;
    const backdrop = document.querySelector('#modal-backdrop');
    if (backdrop) backdrop.classList.add('active');
    modal.showModal();
}
function closeModal(modal) {
    if (!modal) return;
    modal.close();
    const backdrop = document.querySelector('#modal-backdrop');
    if (backdrop) backdrop.classList.remove('active');
}
function toast(message) {
    const element = document.querySelector('#toast');
    if (!element) return;
    element.textContent = message;
    element.classList.add('show');
    setTimeout(() => element.classList.remove('show'), 2400);
}

// Event listeners con verificación de existencia
safeAddListener('#main-nav', 'click', event => {
    const button = event.target.closest('[data-view]');
    if (button) navigate(button.dataset.view);
});

document.querySelectorAll('[data-go]').forEach(button => button.addEventListener('click', () => navigate(button.dataset.go)));
document.querySelectorAll('[data-modal]').forEach(button => button.addEventListener('click', () => openModal(button.dataset.modal)));
document.querySelectorAll('[data-document-type]').forEach(button => button.addEventListener('click', () => configureDocumentForm(button.dataset.documentType)));
document.querySelectorAll('dialog .close').forEach(button => button.addEventListener('click', () => closeModal(button.closest('dialog'))));

safeAddListener('#modal-backdrop', 'click', () => document.querySelectorAll('dialog[open]').forEach(closeModal));

safeAddListener('[data-table-tabs]', 'click', event => {
    const button = event.target.closest('button');
    if (!button) return;
    event.currentTarget.querySelectorAll('button').forEach(item => item.classList.toggle('active', item === button));
    workerFilter = button.dataset.filter;
    renderWorkers();
});

safeAddListener('[data-movement-tabs]', 'click', event => {
    const button = event.target.closest('button');
    if (!button) return;
    event.currentTarget.querySelectorAll('button').forEach(item => item.classList.toggle('active', item === button));
    movementFilter = button.dataset.filter;
    renderMovements();
});

safeAddListener('#worker-form', 'submit', event => {
    event.preventDefault();
    const data = Object.fromEntries(new FormData(event.currentTarget));
    state.workers.push({
        id: Date.now(), name: data.name, rut: data.rut, type: data.type, role: data.role,
        specialty: data.specialty, contract: 'Indefinido', start: data.start,
        salary: Number(data.salary), status: 'Activo'
    });
    renderWorkers();
    const metricWorkers = document.querySelector('#metric-workers');
    if (metricWorkers) metricWorkers.textContent = state.workers.length;
    event.currentTarget.reset();
    closeModal(document.querySelector('#worker-modal'));
    toast('Trabajador registrado en la API simulada');
});

function payrollPreview() {
    const form = document.querySelector('#payroll-form');
    if (!form) return;
    const data = Object.fromEntries(new FormData(form));
    const base = Number(data.base || 0);
    const gross = base + Number(data.bonus || 0) + Number(data.meal || 0) + Number(data.transport || 0);
    const afp = Math.round(base * Number(data.afpRate || 0) / 100);
    const health = Math.round(base * Number(data.healthRate || 0) / 100) + Number(data.healthExtra || 0);
    const unemployment = Math.round(base * Number(data.unemploymentRate || 0) / 100);
    const discounts = afp + health + unemployment + Number(data.compensation || 0)
        + Number(data.apv || 0) + Number(data.advance || 0) + Number(data.loan || 0)
        + Number(data.otherDiscount || 0);
    const net = gross - discounts;
    const previewAfp = document.querySelector('#preview-afp');
    const previewHealth = document.querySelector('#preview-health');
    const previewUnemployment = document.querySelector('#preview-unemployment');
    const previewDiscounts = document.querySelector('#preview-discounts');
    const payrollPreviewEl = document.querySelector('#payroll-preview');
    if (previewAfp) previewAfp.textContent = money.format(afp);
    if (previewHealth) previewHealth.textContent = money.format(health);
    if (previewUnemployment) previewUnemployment.textContent = money.format(unemployment);
    if (previewDiscounts) previewDiscounts.textContent = money.format(discounts);
    if (payrollPreviewEl) payrollPreviewEl.textContent = money.format(Math.max(0, net));
}
document.querySelectorAll('#payroll-form input, #payroll-form select').forEach(input => input.addEventListener('input', payrollPreview));

safeAddListener('#payroll-afp', 'change', event => {
    const rateInput = document.querySelector('#payroll-afp-rate');
    if (rateInput) rateInput.value = event.target.selectedOptions[0].dataset.rate;
    payrollPreview();
});

safeAddListener('#payroll-worker', 'change', event => {
    const person = worker(event.target.value);
    const baseInput = document.querySelector('#payroll-form [name=base]');
    if (baseInput) baseInput.value = person.salary;
    payrollPreview();
});

safeAddListener('#payroll-form', 'submit', event => {
    event.preventDefault();
    const data = Object.fromEntries(new FormData(event.currentTarget));
    const base = Number(data.base);
    const gross = base + Number(data.bonus) + Number(data.meal) + Number(data.transport);
    const afp = Math.round(base * Number(data.afpRate) / 100);
    const health = Math.round(base * Number(data.healthRate) / 100);
    const healthExtra = Number(data.healthExtra);
    const unemployment = Math.round(base * Number(data.unemploymentRate) / 100);
    const compensation = Number(data.compensation);
    const apv = Number(data.apv);
    const advance = Number(data.advance);
    const loan = Number(data.loan);
    const otherDiscount = Number(data.otherDiscount);
    const discounts = afp + health + healthExtra + unemployment + compensation + apv + advance + loan + otherDiscount;
    const existing = state.payroll.find(item => item.workerId === Number(data.workerId));
    const record = {
        workerId: Number(data.workerId), base, gross,
        afpName: data.afpName, afpRate: Number(data.afpRate), afp,
        healthName: data.healthName, healthRate: Number(data.healthRate), health, healthExtra,
        unemploymentRate: Number(data.unemploymentRate), unemployment,
        compensationName: data.compensationName, compensation,
        apv, advance, loan, otherDiscount,
        discounts, net: Math.max(0, gross - discounts), status: 'Calculada'
    };
    existing ? Object.assign(existing, record) : state.payroll.push(record);
    renderPayroll();
    closeModal(document.querySelector('#payroll-modal'));
    toast('Remuneración calculada y guardada');
});

safeAddListener('#absence-form', 'submit', event => {
    event.preventDefault();
    const data = Object.fromEntries(new FormData(event.currentTarget));
    state.absences.unshift({ id: Date.now(), workerId: Number(data.workerId), type: data.type, start: data.start, end: data.end, days: Number(data.days), status: 'Pendiente' });
    renderAbsences();
    event.currentTarget.reset();
    closeModal(document.querySelector('#absence-modal'));
    toast('Solicitud registrada');
});

safeAddListener('#absence-body', 'click', event => {
    const button = event.target.closest('[data-authorize]');
    if (!button) return;
    state.absences.find(item => item.id === Number(button.dataset.authorize)).status = 'Autorizada';
    renderAbsences();
    toast('Solicitud autorizada');
});

safeAddListener('#movement-form', 'submit', event => {
    event.preventDefault();
    const data = Object.fromEntries(new FormData(event.currentTarget));
    state.movements.unshift({ date: data.date, type: data.type, category: data.category, description: data.description, amount: Number(data.amount), status: 'Pendiente' });
    renderMovements();
    event.currentTarget.reset();
    closeModal(document.querySelector('#movement-modal'));
    toast('Movimiento registrado');
});

const bookTabs = document.querySelector('#book-tabs');
if (bookTabs) {
    bookTabs.addEventListener('click', event => {
        const button = event.target.closest('[data-book-filter]');
        if (!button) return;
        bookFilter = button.dataset.bookFilter;
        document.querySelectorAll('[data-book-filter]').forEach(item => item.classList.toggle('active', item === button));
        renderBook();
    });
}

const bookSearch = document.querySelector('#book-search');
if (bookSearch) {
    bookSearch.addEventListener('input', renderBook);
}

const bookDocumentType = document.querySelector('#book-document-type');
if (bookDocumentType) {
    bookDocumentType.addEventListener('change', renderBook);
}
const taxDocumentForm = document.querySelector('#tax-document-form');
if (taxDocumentForm) {
    taxDocumentForm.querySelectorAll('[name=quantity], [name=unitPrice], [name=discount], [name=documentType]').forEach(input => {
        input.addEventListener('input', taxDocumentCalculation);
        input.addEventListener('change', taxDocumentCalculation);
    });

    taxDocumentForm.addEventListener('submit', event => {
        event.preventDefault();
        const data = Object.fromEntries(new FormData(event.currentTarget));
        const totals = taxDocumentCalculation();
        const item = {
            id: Date.now(),
            nature: data.nature,
            documentType: data.documentType,
            folio: data.folio,
            issueDate: data.issueDate,
            dueDate: data.dueDate,
            rut: data.rut,
            businessName: data.businessName,
            businessActivity: data.businessActivity,
            email: data.email,
            address: data.address,
            code: data.code,
            description: data.description,
            quantity: Number(data.quantity),
            unitPrice: Number(data.unitPrice),
            discount: Number(data.discount),
            ...totals,
            status: data.paymentCondition === 'pagado' ? 'Pagado' : (data.documentType === 'Guia de despacho' ? 'Emitido' : 'Pendiente'),
            paidDate: data.paymentCondition === 'pagado' ? data.issueDate : null
        };
        state.taxDocuments.unshift(item);
        if (item.status === 'Pagado' && item.total > 0) {
            state.movements.unshift({
                date: item.issueDate,
                type: item.nature === 'venta' ? 'ingreso' : 'egreso',
                category: item.documentType,
                description: `${item.folio} · ${item.businessName}`,
                amount: item.total,
                status: 'Pagado',
                taxDocumentId: item.id
            });
            renderMovements();
        }
        renderBook();
        event.currentTarget.reset();
        event.currentTarget.elements.issueDate.value = '2026-06-12';
        event.currentTarget.elements.quantity.value = 1;
        event.currentTarget.elements.unitPrice.value = 0;
        event.currentTarget.elements.discount.value = 0;
        taxDocumentCalculation();
        closeModal(document.querySelector('#tax-document-modal'));
        showTaxDocument(item.id);
        toast(`${item.documentType} ${item.folio} emitida y registrada`);
    });
}
const bookBody = document.querySelector('#book-body');
if (bookBody) {
    bookBody.addEventListener('click', event => {
        const viewButton = event.target.closest('[data-view-tax]');
        if (viewButton) return showTaxDocument(viewButton.dataset.viewTax);
        const settleButton = event.target.closest('[data-settle-tax]');
        if (!settleButton) return;
        const item = state.taxDocuments.find(document => document.id === Number(settleButton.dataset.settleTax));
        if (!item || item.status === 'Pagado') return;
        item.status = 'Pagado';
        item.paidDate = '2026-06-12';
        state.movements.unshift({
            date: item.paidDate,
            type: item.nature === 'venta' ? 'ingreso' : 'egreso',
            category: item.documentType,
            description: `${item.nature === 'venta' ? 'Cobro' : 'Pago'} ${item.folio} · ${item.businessName}`,
            amount: item.total,
            status: 'Pagado',
            taxDocumentId: item.id
        });
        renderBook();
        renderMovements();
        toast(item.nature === 'venta' ? 'Cobro registrado en el libro contable' : 'Pago registrado en el libro contable');
    });
}
const printTaxDocumentButton = document.querySelector('#print-tax-document');
if (printTaxDocumentButton) {
    printTaxDocumentButton.addEventListener('click', printTaxDocument);
}

safeAddListener('#copay-professional-filter', 'change', event => {
    copayProfessionalFilter = event.target.value;
    renderCopays();
});

safeAddListener('#professional-copay-summary', 'click', event => {
    const button = event.target.closest('[data-fonasa-report]');
    if (button) showFonasaReport(button.dataset.fonasaReport);
});

safeAddListener('#print-fonasa-report', 'click', printFonasaReport);

document.querySelectorAll('#copay-form [name=value], #copay-form [name=bonus], #copay-form [name=copay]').forEach(input => {
    input.addEventListener('input', () => {
        const form = document.querySelector('#copay-form');
        if (!form) return;
        const value = Number(form.elements.value.value || 0);
        const bonus = Number(form.elements.bonus.value || 0);
        if (!form.elements.copay.value || document.activeElement !== form.elements.copay) {
            form.elements.copay.value = Math.max(0, value - bonus);
        }
        form.elements.toCollect.value = bonus;
    });
});

safeAddListener('#copay-form', 'submit', event => {
    event.preventDefault();
    const data = Object.fromEntries(new FormData(event.currentTarget));
    state.copays.unshift({
        id: Date.now(),
        date: data.date,
        professionalId: Number(data.professionalId),
        basNumber: data.basNumber,
        value: Number(data.value),
        bonus: Number(data.bonus),
        copay: Number(data.copay),
        specialCondition: Number(data.specialCondition),
        toCollect: Number(data.toCollect),
        requiresDocument: data.requiresDocument
    });
    renderCopays();
    event.currentTarget.reset();
    event.currentTarget.elements.date.value = '2026-06-10';
    closeModal(document.querySelector('#copay-modal'));
    toast('Atención y copago registrados');
});

safeAddListener('#preview-document', 'click', previewDocument);
safeAddListener('#print-document', 'click', printCurrentDocument);

safeAddListener('#document-form', 'submit', event => {
    event.preventDefault();
    const data = documentFormData();
    if (!data.worker || !data.issueDate || !data.secondaryDate) return toast('Complete trabajador y fechas');
    currentDocumentHtml = buildDocument(data);
    state.documents.unshift({
        id: Date.now(),
        date: data.issueDate,
        type: documentLabels[data.documentType].title,
        workerId: Number(data.workerId),
        status: 'Emitido',
        data: { ...data, worker: undefined }
    });
    renderDocuments();
    closeModal(document.querySelector('#document-modal'));
    const documentPreview = document.querySelector('#document-preview');
    if (documentPreview) documentPreview.innerHTML = currentDocumentHtml;
    openModal('document-preview-modal');
    toast('Documento generado y archivado');
});

safeAddListener('#documents-body', 'click', event => {
    const button = event.target.closest('[data-view-document]');
    if (!button) return;
    const documentRecord = state.documents.find(item => item.id === Number(button.dataset.viewDocument));
    const data = { ...documentRecord.data, worker: worker(documentRecord.workerId) };
    currentDocumentHtml = buildDocument(data);
    const documentPreview = document.querySelector('#document-preview');
    if (documentPreview) documentPreview.innerHTML = currentDocumentHtml;
    openModal('document-preview-modal');
});

safeAddListener('#payroll-body', 'click', event => {
    const detailButton = event.target.closest('[data-detail]');
    if (detailButton) {
        showPayrollDetail(Number(detailButton.dataset.detail));
        return;
    }
    const button = event.target.closest('[data-pay]');
    if (!button) return;
    const item = state.payroll.find(record => record.workerId === Number(button.dataset.pay));
    if (item.status === 'Pagada') return toast('La remuneración ya se encuentra pagada');
    item.status = 'Pagada';
    renderPayroll();
    toast('Pago confirmado en la simulación');
});

function detailRow(label, value, total = false) {
    return `<div class="detail-row${total ? ' total' : ''}"><span>${label}</span><strong>${money.format(value)}</strong></div>`;
}

function showPayrollDetail(workerId) {
    const item = state.payroll.find(record => record.workerId === workerId);
    const person = worker(workerId);
    const detailWorkerName = document.querySelector('#detail-worker-name');
    const payrollDetail = document.querySelector('#payroll-detail');
    if (detailWorkerName) detailWorkerName.textContent = person.name;
    if (payrollDetail) payrollDetail.innerHTML = `
        <section class="detail-section">
            <h4>Haberes</h4>
            ${detailRow('Sueldo base', item.base)}
            ${detailRow('Otros haberes', item.gross - item.base)}
            ${detailRow('Total haberes', item.gross, true)}
        </section>
        <section class="detail-section">
            <h4>Descuentos previsionales</h4>
            ${detailRow(`AFP ${item.afpName} (${item.afpRate}%)`, item.afp)}
            ${detailRow(`${item.healthName} (${item.healthRate}%)`, item.health)}
            ${item.healthExtra ? detailRow('Adicional Isapre', item.healthExtra) : ''}
            ${detailRow(`Seguro de cesantía (${item.unemploymentRate}%)`, item.unemployment)}
            ${detailRow(`Caja de compensación · ${item.compensationName}`, item.compensation)}
            ${detailRow('APV / ahorro voluntario', item.apv)}
        </section>
        <section class="detail-section">
            <h4>Otros descuentos</h4>
            ${detailRow('Anticipos', item.advance)}
            ${detailRow('Préstamos', item.loan)}
            ${detailRow('Otros', item.otherDiscount)}
            ${detailRow('Total descuentos', item.discounts, true)}
            ${detailRow('Sueldo líquido', item.net, true)}
        </section>`;
    openModal('payroll-detail-modal');
}

// Establecer valores por defecto en formularios (solo si existen)
const movementDateField = document.querySelector('#movement-form [name=date]');
if (movementDateField) movementDateField.value = '2026-06-10';

const workerStartField = document.querySelector('#worker-form [name=start]');
if (workerStartField) workerStartField.value = '2026-06-10';

const absenceStartField = document.querySelector('#absence-form [name=start]');
if (absenceStartField) absenceStartField.value = '2026-06-15';

const absenceEndField = document.querySelector('#absence-form [name=end]');
if (absenceEndField) absenceEndField.value = '2026-06-16';

const copayDateField = document.querySelector('#copay-form [name=date]');
if (copayDateField) copayDateField.value = '2026-06-10';

if (taxDocumentForm) {
    taxDocumentForm.elements.issueDate.value = '2026-06-12';
}

// Renderizar todas las secciones (solo si los elementos existen)
renderChart();
renderWorkers();
renderPayroll();
renderAbsences();
renderMovements();
renderBook();
renderDocuments();
renderCopays();
renderAdminDashboard();
