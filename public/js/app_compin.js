const qs = s => document.querySelector(s);

function setText(sel, val){
    const el = qs(sel);
    if(el) el.textContent = val;
}

function setHTML(sel, val){
    const el = qs(sel);
    if(el) el.innerHTML = val;
}

function setClass(sel, val){
    const el = qs(sel);
    if(el) el.className = val;
}

function setDisabled(sel, val){
    const el = qs(sel);
    if(el) el.disabled = val;
}

function onEvent(sel, event, callback){
    const el = qs(sel);
    if(el) el.addEventListener(event, callback);
}

function onAll(sel, event, callback){
    document.querySelectorAll(sel)
        .forEach(el=>el.addEventListener(event, callback));
}
const money = new Intl.NumberFormat('es-CL', { style:'currency', currency:'CLP', maximumFractionDigits:0 });
const license = { worker:'Sebastián Núñez', rut:'20.112.664-9', number:'LM-2026-0021', start:'17-06-2026', end:'20-06-2026', days:4, entity:'Isapre Colmena', amount:96000, state:'received', history:['20-06-2026 09:10 · COMPIN recibió la licencia con informe del contador.'] };
const titles = { recepcion:'Recepción COMPIN', comision:'Comisión médica', 'visto-bueno':'Visto bueno controlador', pago:'Pago subsidio', trazabilidad:'Trazabilidad completa' };
const states = { received:['Recibida','blue',0], commission:['En comisión','amber',1], reviewed:['Comisión aprobada','amber',2], controller_ok:['Visto bueno controlador','green',3], payment:['Enviada a pago','green',4], rejected:['Observada','red',1] };
const steps = ['Recepción COMPIN','Comisión médica','Revisión técnica','Visto bueno controlador','Pago subsidio'];
function go(view){ document.querySelectorAll('.view').forEach(v=>v.classList.toggle('active',v.id===view)); document.querySelectorAll('nav button').forEach(b=>b.classList.toggle('active',b.dataset.view===view)); document.querySelector('#page-title').textContent=titles[view]; }
function setState(state,msg){ license.state=state; license.history.unshift(`20-06-2026 ${new Date().toLocaleTimeString('es-CL',{hour:'2-digit',minute:'2-digit'})} · ${msg}`); render(); }
function can(action){ return { commission:license.state==='received', review:license.state==='commission', controller:license.state==='reviewed', payment:license.state==='controller_ok' }[action]; }
function badge(){ const s=states[license.state]; return `<span class="badge ${s[1]}">${s[0]}</span>`; }
function render(){

    const s = states[license.state];

    setClass('#global-status',`badge ${s[1]}`);
    setText('#global-status',s[0]);
    setText('#side-status',`Estado: ${s[0]}`);

    setText(
        '#hero-text',
        license.state==='payment'
        ? 'Licencia con visto bueno del controlador enviada a pago.'
        : license.state==='rejected'
        ? 'Licencia observada. Debe corregirse antes de pago.'
        : 'La licencia avanza por las vistas separadas del flujo COMPIN.'
    );

    setText('#m-received',
        ['received','commission','reviewed','controller_ok','payment']
        .includes(license.state)?1:0);

    setText('#m-commission',
        ['commission','reviewed']
        .includes(license.state)?1:0);

    setText('#m-ok',
        ['controller_ok','payment']
        .includes(license.state)?1:0);

    setText('#m-pay',
        license.state==='payment'?1:0);

    setHTML('#reception-table',
        `<tr>
            <td>
                <strong>${license.worker}</strong>
                <br>
                <small class="muted">${license.rut}</small>
            </td>
            <td><strong>${license.number}</strong></td>
            <td>
                ${license.start} al ${license.end}
                <br>
                <small class="muted">${license.days} días</small>
            </td>
            <td>Informe remuneraciones PDF</td>
            <td>${badge()}</td>
        </tr>`
    );

    setHTML('#payment-table',
        `<tr>
            <td>${license.worker}</td>
            <td>${license.entity}</td>
            <td>${money.format(license.amount)}</td>
            <td>${badge()}</td>
        </tr>`
    );

    setHTML(
        '#reception-checks',
        '<div class="review-row"><span>Licencia recibida</span><strong>Sí</strong></div>'+
        '<div class="review-row"><span>Informe contador adjunto</span><strong>Sí</strong></div>'+
        '<div class="review-row"><span>Datos trabajador</span><strong>Coinciden</strong></div>'
    );

    setText(
        '#medical-check',
        ['reviewed','controller_ok','payment']
        .includes(license.state)
        ? 'Aprobado'
        : 'Pendiente'
    );

    setText(
        '#commission-observation',
        license.state==='rejected'
        ? 'Observada'
        : 'Sin observaciones'
    );

    setText(
        '#summary-commission',
        ['reviewed','controller_ok','payment']
        .includes(license.state)
        ? 'Sí'
        : 'No'
    );

    setText(
        '#summary-controller',
        ['controller_ok','payment']
        .includes(license.state)
        ? 'Sí'
        : 'No'
    );

    setText(
        '#summary-payment',
        license.state==='payment'
        ? 'Enviado'
        : 'No enviado'
    );

    setText(
        '#payment-result',
        license.state==='payment'
        ? 'Expediente liberado para pago del subsidio.'
        : 'Aún falta visto bueno del controlador.'
    );

    setHTML(
        '#flow-steps',
        steps.map((step,i)=>`
        <div class="step">
            <span class="step-number ${
                i<s[2]||license.state==='payment'
                ? 'green'
                : i===s[2]
                ? 'amber'
                : 'blue'
            }">${i+1}</span>

            <div>
                <strong>${step}</strong>
                <br>
                <small>${
                    i<s[2]||license.state==='payment'
                    ? 'Completado'
                    : i===s[2]
                    ? 'Etapa actual'
                    : 'Pendiente'
                }</small>
            </div>
        </div>
        `).join('')
    );

    setHTML(
        '#audit-log',
        license.history
        .map(h=>`<div class="log-item">${h}</div>`)
        .join('')
    );

    setDisabled('#send-commission',!can('commission'));
    setDisabled('#commission-approve',!can('review'));
    setDisabled('#commission-reject',!can('review'));
    setDisabled('#controller-approve',!can('controller'));
    setDisabled('#controller-reject',!can('controller'));
    setDisabled('#send-payment',!can('payment'));
}
onAll('nav button','click',e=>{
    go(e.currentTarget.dataset.view);
});

onEvent('#send-commission','click',()=>setState('commission','Expediente enviado a comisión médica.'));
onEvent('#commission-approve','click',()=>setState('reviewed','Comisión médica aprobó la revisión.'));
onEvent('#commission-reject','click',()=>setState('rejected','Comisión observó el expediente.'));
onEvent('#controller-approve','click',()=>setState('controller_ok','Controlador otorgó visto bueno.'));
onEvent('#controller-reject','click',()=>setState('commission','Controlador devolvió expediente a comisión.'));
onEvent('#send-payment','click',()=>setState('payment','Licencia enviada a pago del subsidio.'));
onEvent('#reset-flow','click',()=>{
    license.state='received';
    license.history=['20-06-2026 09:10 · COMPIN recibió la licencia con informe del contador.'];
    render();
    go('recepcion');
});

render();
