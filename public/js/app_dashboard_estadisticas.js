// Dashboard de estadísticas reales (sin simulación)
// Este archivo usa datos del backend en window.dashboardStats
// NO usa el objeto state con datos simulados

const money = new Intl.NumberFormat('es-CL', { style: 'currency', currency: 'CLP', maximumFractionDigits: 0 });

function formatDate(date) {
    return new Date(`${date}T12:00:00`).toLocaleDateString('es-CL');
}

function adminText(selector, value) {
    const element = document.querySelector(selector);
    if (element) element.textContent = value;
}

// Navegación entre vistas
function navigate(view) {
    document.querySelectorAll('.view').forEach(item => item.classList.toggle('active', item.id === view));
    document.querySelectorAll('.nav-item').forEach(item => item.classList.toggle('active', item.dataset.view === view));
}

// Event listeners para navegación
const mainNav = document.querySelector('#main-nav');
if (mainNav) {
    mainNav.addEventListener('click', event => {
        const button = event.target.closest('[data-view]');
        if (button) navigate(button.dataset.view);
    });
}

document.querySelectorAll('[data-go]').forEach(button => {
    button.addEventListener('click', () => navigate(button.dataset.go));
});

// Renderizar datos reales desde window.dashboardStats
function renderRealStats() {
    const stats = window.dashboardStats || {};

    console.log('Dashboard Stats:', stats); // Debug
    console.log('Horas totales:', stats.horas_medicas_total_mes);
    console.log('Movimientos:', stats.ultimos_movimientos);
    console.log('Cajas:', stats.cajas_abiertas);
    console.log('Flujo 6 meses:', stats.flujo_6_meses);

    // Ingresos y egresos
    const ingresos = parseFloat(stats.ingresos_mes || stats.total_ventas_mes || 0);
    const egresos = parseFloat(stats.egresos_mes || stats.total_compras_mes || 0);
    const resultado = ingresos - egresos;

    adminText('#admin-income', money.format(ingresos));
    adminText('#admin-expense', money.format(egresos));
    adminText('#admin-result', money.format(resultado));
    adminText('#admin-result-status', resultado >= 0 ? 'Balance positivo del periodo' : 'Balance negativo del periodo');

    // Detalles de ingresos y egresos
    const countIngresos = parseInt(stats.count_ingresos || 0);
    const countEgresos = parseInt(stats.count_egresos || 0);
    adminText('#admin-income-detail', countIngresos > 0 ? `${countIngresos} movimientos registrados` : 'Sin movimientos');
    adminText('#admin-expense-detail', countEgresos > 0 ? `${countEgresos} pagos registrados` : 'Sin pagos');

    // FONASA y copagos
    const totalFonasa = parseFloat(stats.total_bonificacion_fonasa || 0);
    const totalCopagos = parseFloat(stats.total_copagos || 0);
    const countBonos = parseInt(stats.count_bonos || 0);
    const countProfesionales = parseInt(stats.count_profesionales || 0);

    adminText('#admin-fonasa', money.format(totalFonasa));
    adminText('#admin-copays', money.format(totalCopagos));
    adminText('#admin-fonasa-detail', `${countBonos} bonos incluidos`);
    adminText('#admin-copays-detail', countProfesionales > 0 ? `${countProfesionales} profesionales` : '');

    // Personal activo
    const personalActivo = parseInt(stats.personal_activo || 0);
    const totalPersonal = parseInt(stats.total_personal || personalActivo);
    adminText('#admin-workers', personalActivo);
    adminText('#admin-workers-detail', `${totalPersonal} fichas registradas`);

    // Remuneraciones pendientes
    const sueldosPendientes = parseFloat(stats.sueldos_pendientes || 0);
    const countPendientes = parseInt(stats.count_remuneraciones_pendientes || 0);
    adminText('#admin-payroll', money.format(sueldosPendientes));
    adminText('#admin-payroll-detail', `${countPendientes} liquidaciones por pagar`);

    // Caja disponible
    if (stats.caja_disponible !== undefined) {
        adminText('#admin-cash', money.format(parseFloat(stats.caja_disponible)));
    }

    // Cajas activas
    const cajasActivas = parseInt(stats.cajas_activas || 0);
    const totalRecaudado = parseFloat(stats.total_recaudado_cajas || 0);
    const cajasAbiertas = parseInt(stats.cajas_abiertas || 0);
    const cajasPorCerrar = parseInt(stats.cajas_por_cerrar || 0);

    adminText('#admin-active-registers', cajasActivas);
    adminText('#admin-register-total', `${money.format(totalRecaudado)} recaudado`);

    if (cajasAbiertas > 0 || cajasPorCerrar > 0) {
        adminText('#admin-registers-detail', `${cajasAbiertas} abiertas · ${cajasPorCerrar} por cerrar`);
    } else {
        adminText('#admin-registers-detail', 'Turnos abiertos');
    }

    // Ausencias y solicitudes
    const solicitudesPendientes = parseInt(stats.solicitudes_pendientes || 0);
    adminText('#admin-absences', solicitudesPendientes);
    adminText('#admin-task-absences', `${solicitudesPendientes} solicitudes por autorizar`);

    // Documentos requeridos
    const docRequeridos = parseInt(stats.documentos_requeridos || 0);
    adminText('#admin-documents', docRequeridos);

    // Tareas pendientes
    adminText('#admin-task-payroll', `${countPendientes} liquidaciones pendientes`);
    adminText('#admin-task-fonasa', countProfesionales > 0 ? `${countProfesionales} planillas por profesional` : 'Generar planillas');

    // IMPORTANTE: NO tocar la tabla #admin-professionals - viene renderizada desde el servidor con @forelse

    // Progreso de estados de reserva/atención (si existen)
    const totalReservas = parseInt(stats.horas_medicas_total_mes || 0);

    if (totalReservas > 0) {
        // Mapeo de estados a nombres del backend
        const estadosMap = {
            'reservada': 'horas_medicas_reservadas',
            'confirmada': 'horas_medicas_confirmadas',
            'rechazada': 'horas_medicas_rechazadas',
            'llamando': 'horas_medicas_llamando',
            'realizando': 'horas_medicas_realizando',
            'realizada': 'horas_medicas_realizadas'
        };

        Object.entries(estadosMap).forEach(([estado, statKey]) => {
            const count = parseInt(stats[statKey] || 0);
            const porcentaje = Math.round((count * 100) / totalReservas);

            const progressEl = document.querySelector(`#admin-status-${estado}-progress`);
            const barEl = document.querySelector(`#admin-status-${estado}-bar`);

            if (progressEl) progressEl.textContent = `${porcentaje}%`;
            if (barEl) barEl.style.width = `${porcentaje}%`;
        });
    }

    // Gráfico de flujo mensual
    renderChartFromStats(stats);

    // Últimos movimientos
    renderRecentMovements(stats);

    // Cajas registradoras activas
    renderCashRegisters(stats);
}

function renderChartFromStats(stats) {
    const adminChart = document.querySelector('#admin-cash-chart');
    if (!adminChart) return;

    // Si el backend proporciona datos históricos mensuales
    const monthlyData = stats.flujo_6_meses || [];

    if (monthlyData.length > 0) {
        const maxValue = Math.max(
            ...monthlyData.map(m => Math.max(parseFloat(m.ingresos || 0), parseFloat(m.egresos || 0)))
        );

        adminChart.innerHTML = monthlyData.map(month => {
            const ingresosVal = parseFloat(month.ingresos || 0);
            const egresosVal = parseFloat(month.egresos || 0);
            const incomeHeight = maxValue > 0 ? Math.round((ingresosVal * 100) / maxValue) : 0;
            const expenseHeight = maxValue > 0 ? Math.round((egresosVal * 100) / maxValue) : 0;

            return `<div class="month-bars">
                <span class="income" style="height:${incomeHeight}%"></span>
                <span class="expense" style="height:${expenseHeight}%"></span>
                <small>${month.mes || ''}</small>
            </div>`;
        }).join('');
    } else {
        // Datos por defecto si no hay histórico
        const months = [
            ['Ene', 0, 0], ['Feb', 0, 0], ['Mar', 0, 0],
            ['Abr', 0, 0], ['May', 0, 0], ['Jun', 0, 0]
        ];
        adminChart.innerHTML = months.map(([month]) =>
            `<div class="month-bars">
                <span class="income" style="height:0%"></span>
                <span class="expense" style="height:0%"></span>
                <small>${month}</small>
            </div>`
        ).join('');
    }
}

function renderRecentMovements(stats) {
    const movementsContainer = document.querySelector('#admin-movements');
    if (!movementsContainer) return;

    const movements = stats.ultimos_movimientos || [];

    if (movements.length === 0) {
        movementsContainer.innerHTML = '<p style="text-align:center;padding:20px;color:#999;">No hay movimientos recientes</p>';
        return;
    }

    movementsContainer.innerHTML = movements.map(item => `
        <div class="recent-movement">
            <span class="movement-symbol ${item.type}">${item.type === 'ingreso' ? '+' : '-'}</span>
            <div>
                <strong>${item.description || 'Movimiento'}</strong>
                <small>${formatDate(item.date)} · ${item.category || ''}</small>
            </div>
            <b class="${item.type === 'ingreso' ? 'text-green' : 'text-red'}">
                ${item.type === 'ingreso' ? '+' : '-'} ${money.format(parseFloat(item.amount || 0))}
            </b>
        </div>
    `).join('');
}

function renderCashRegisters(stats) {
    const container = document.querySelector('#admin-cash-registers');
    if (!container) return;

    const registers = stats.cajas_abiertas || [];

    if (registers.length === 0) {
        container.innerHTML = '<p style="text-align:center;padding:20px;color:#999;">No hay cajas activas</p>';
        return;
    }

    container.innerHTML = registers.map(register => {
        const montoInicial = parseFloat(register.monto_inicial || 0);
        const montoFinal = parseFloat(register.monto_final || 0);
        const montoEntregado = parseFloat(register.monto_entregado || 0);
        const diferencia = montoFinal - montoEntregado;

        return `<article class="cash-register-card">
            <div class="cash-register-head">
                <span class="cash-register-icon">C${register.id_caja || register.id}</span>
                <div>
                    <strong>${register.nombre_caja || 'Caja'}</strong>
                    <small>${register.ubicacion || 'Sin ubicación'}</small>
                </div>
                <span class="badge green">Abierta</span>
            </div>
            <div class="cash-register-total">
                <small>Monto final registrado</small>
                <strong>${money.format(montoFinal)}</strong>
            </div>
            <div class="cash-register-footer">
                <span>Fondo inicial: <strong>${money.format(montoInicial)}</strong></span>
                <span>Monto entregado: <strong>${money.format(montoEntregado)}</strong></span>
                <span class="${diferencia === 0 ? 'text-green' : 'text-red'}">
                    Diferencia: <strong>${money.format(diferencia)}</strong>
                </span>
            </div>
        </article>`;
    }).join('');
}

// Modal y backdrop básico
function closeModal(modal) {
    if (modal) {
        modal.close();
        const backdrop = document.querySelector('#modal-backdrop');
        if (backdrop) backdrop.classList.remove('active');
    }
}

const modalBackdrop = document.querySelector('#modal-backdrop');
if (modalBackdrop) {
    modalBackdrop.addEventListener('click', () => {
        document.querySelectorAll('dialog[open]').forEach(closeModal);
    });
}

document.querySelectorAll('dialog .close').forEach(button => {
    button.addEventListener('click', () => closeModal(button.closest('dialog')));
});

// Ejecutar renderizado cuando la página cargue
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', renderRealStats);
} else {
    renderRealStats();
}
