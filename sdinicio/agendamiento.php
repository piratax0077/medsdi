<!DOCTYPE html>
<html lang="es">
<head>

	<?php
	require_once('include/head.php');
	?>	

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Agenda tu hora médica · Salud Digital Integrada</title>


</head>
<body>

	<?php
	require_once('include/header.php');
	?>	

<div class="shell" style="margin-top: 150px;">

  <div class="hero-line">
    <h1>Reserva de horas</h1>
    <p>Encuentra el servicio de salud que necesitas y confirma tu reserva.</p>
  </div>

  <div class="stepper" id="stepper"></div>

  <!-- STEP 1: RUT / DATOS -->
  <div class="panel" data-step="1">
    <div class="card card-pad">
      <div class="panel-title"><span class="eyebrow">Paso 1</span></div>
      <h2>Identifícate</h2>
      <p class="sub">Ingresa el RUT del paciente. Si ya estás registrado en SDI, cargaremos los datos automáticamente.</p>

      <div class="field" id="field-rut">
        <label for="rut">RUT</label>
        <div class="rut-input-wrap">
          <input type="text" id="rut" placeholder="12.345.678-5" maxlength="12" autocomplete="off">
          <span class="rut-status" id="rutStatus"></span>
        </div>
        <div class="error-msg">El RUT ingresado no es válido. Revisa el dígito verificador.</div>
        <div class="hint">Prueba con <span class="mono">12.345.678-5</span> o <span class="mono">87.654.321-4</span> para simular un paciente ya registrado.</div>
      </div>

      <div id="patientFoundBox" style="display:none;"></div>

      <div id="newPatientFields" style="display:none;margin-top:8px;">
        <div class="row2">
          <div class="field" id="field-nombre">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" placeholder="Nombre y apellidos">
            <div class="error-msg">Ingresa tu nombre completo.</div>
          </div>
          <div class="field" id="field-sexo">
            <label for="sexo">Sexo</label>
            <select id="sexo">
              <option value="">Selecciona</option>
              <option>Femenino</option>
              <option>Masculino</option>
            </select>
            <div class="error-msg">Selecciona una opción.</div>
          </div>
        </div>
        <div class="row2">
          <div class="field" id="field-fnac">
            <label for="fnac">Fecha de nacimiento</label>
            <input type="date" id="fnac">
            <div class="error-msg">Ingresa fecha de nacimiento del paciente</div>
          </div>
          <div class="field" id="field-prevision">
            <label for="prevision">Previsión</label>
            <select id="prevision"></select>
            <div class="error-msg">Selecciona la previsión.</div>
          </div>
        </div>
        <div class="row2">
          <div class="field" id="field-correo">
            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" placeholder="nombre@correo.cl">
            <div class="error-msg">Ingresa un correo válido de contacto.</div>
          </div>
          <div class="field" id="field-telefono">
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" placeholder="+56 9 1234 5678">
            <div class="error-msg">Ingresa un teléfono válido de contacto.</div>
          </div>
        </div>
        <p class="hint" style="margin:-6px 0 20px;">Debes completar correo y/o teléfono, para enviarte la confirmación de tu hora.</p>
      </div>

      <div class="actions-row">
        <span></span>
        <button class="btn btn-primary" id="toStep2" disabled>Continuar →</button>
      </div>
    </div>
  </div>

  <!-- STEP 2: TIPO DE CONSULTA -->
  <div class="panel" data-step="2">
    <div class="card card-pad">
      <div class="panel-title"><span class="eyebrow">Paso 2</span></div>
      <h2>¿Qué tipo de atención buscas?</h2>
      <p class="sub">Selecciona una opción para mostrarte especialidades y profesionales relacionados.</p>

      <div class="tipo-grid" id="tipoGrid"></div>

      <div class="actions-row">
        <button class="btn btn-ghost" data-back="1">← Atrás</button>
        <button class="btn btn-primary" id="toStep3" disabled>Continuar →</button>
      </div>
    </div>
  </div>

  <!-- STEP 3: BUSCAR PROFESIONAL -->
  <div class="panel" data-step="3">
    <div class="card card-pad">
      <div class="panel-title"><span class="eyebrow">Paso 3</span></div>
      <h2>Busca a tu profesional</h2>
      <p class="sub">Elige la especialidad y la región de tu preferencia.</p>

      <div class="filters-grid">
        <div class="field" id="field-especialidad">
          <label for="especialidad">Especialidad</label>
          <select id="especialidad"><option value="">Selecciona el tipo de atención primero</option></select>
        </div>
        <div class="field" id="field-region">
          <label for="region">Región de preferencia</label>
          <select id="region"></select>
        </div>
      </div>

      <div class="actions-row">
        <button class="btn btn-ghost" data-back="2">← Atrás</button>
        <button class="btn btn-primary" id="toStep4" disabled>Buscar profesionales →</button>
      </div>
    </div>
  </div>

  <!-- STEP 4: RESULTADOS -->
  <div class="panel" data-step="4">
    <div class="card card-pad">
      <div class="panel-title"><span class="eyebrow">Paso 4</span></div>
      <h2>Elige día y hora</h2>
      <p class="sub">Selecciona un día de la semana para ver disponibilidad y agendar al instante.</p>

      <div class="week-strip" id="weekStrip"></div>
      <div class="results-meta" id="resultsMeta"></div>
      <div class="prof-list" id="profList"></div>

      <div class="actions-row">
        <button class="btn btn-ghost" data-back="3">← Atrás</button>
        <span></span>
      </div>
    </div>
  </div>

  <!-- STEP 5: CONFIRMAR -->
  <div class="panel" data-step="5">
    <div class="card card-pad">
      <div class="panel-title"><span class="eyebrow">Paso 5</span></div>
      <h2 id="confirmTitle">Confirmar hora médica</h2>
      <p class="sub" id="confirmSub">Revisa que los datos estén correctos antes de agendar.</p>

      <div id="confirmView">
        <div class="confirm-card" id="confirmCard"></div>
        <div class="actions-row">
          <button class="btn btn-ghost" data-back="4">← Elegir otra hora</button>
          <button class="btn btn-primary" id="confirmBtn">Confirmar y agendar hora</button>
        </div>
      </div>

      <div id="successView" style="display:none;">
        <div class="success-wrap">
          <div class="success-ring">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none"><path d="M4 12.5L9.5 18L20 6" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h2>¡Hora agendada con éxito!</h2>
          <p id="successText"></p>
          <div class="notify-chip" id="notifyChip"></div>
          <div>
            <button class="btn btn-primary" id="restartBtn">Agendar otra hora</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
(function(){
  "use strict";

  /* ===================== DATA ===================== */
  const STEP_LABELS = ["Tus datos","Tipo de atención","Profesional","Elegir hora","Confirmar"];

  const PREVISIONES = ["Fonasa","Isapre Banmédica","Isapre Consalud","Isapre Cruz Blanca","Isapre Colmena","Isapre Vida Tres","Isapre Nueva Masvida","Particular"];

  const REGIONES = ["Región de Arica y Parinacota","Región de Tarapacá","Región de Antofagasta","Región de Atacama","Región de Coquimbo","Región de Valparaíso","Región Metropolitana","Región del Libertador Bernardo O'Higgins","Región del Maule","Región de Ñuble","Región del Biobío","Región de La Araucanía","Región de Los Ríos","Región de Los Lagos","Región de Aysén","Región de Magallanes"];

  const TIPOS = [
    {id:"medica", nombre:"Consulta médica", desc:"Atención presencial con un especialista", icon:iconStethoscope()},
    {id:"telemedicina", nombre:"Telemedicina", desc:"Consulta por videollamada desde donde estés", icon:iconVideo()},
    {id:"dental", nombre:"Dental", desc:"Atención odontológica general y de especialidad", icon:iconTooth()},
    {id:"imagenes", nombre:"Imágenes y procedimientos", desc:"Exámenes, ecografías y procedimientos", icon:iconScan()},
  ];

  const ESPECIALIDADES_POR_TIPO = {
    medica: ["Medicina General","Pediatría","Ginecología y Obstetricia","Cardiología","Dermatología","Traumatología","Endocrinología","Nutrición y Dietética"],
    telemedicina: ["Medicina General","Psicología","Nutrición y Dietética","Psiquiatría","Endocrinología"],
    dental: ["Odontología General","Ortodoncia","Endodoncia","Periodoncia","Odontopediatría"],
    imagenes: ["Ecografía","Radiología General","Mamografía","Resonancia Magnética","Electrocardiograma"],
  };

  const REGISTERED = {
    "12345678": {nombre:"María José Fuentes Vidal", sexo:"Femenino", fechaNacimiento:"1988-04-12", prevision:"Isapre Consalud", correo:"mariajose.fuentes@gmail.com", telefono:"+56 9 8123 4567"},
    "87654321": {nombre:"Pedro Antonio Salinas Roa", sexo:"Masculino", fechaNacimiento:"1975-11-02", prevision:"Fonasa B", correo:"", telefono:"+56 9 7745 2210"},
  };

  // profesionales: region null = disponible para cualquier región (ej. telemedicina)
  const PROFESIONALES = [
    {id:"p1", nombre:"Dr. Andrés Salinas Rojas", especialidad:"Medicina General", region:"Región Metropolitana", color:"#0C7C92",
      sucursales:[
        {nombre:"Centro Médico Providencia", direccion:"Av. Providencia 1250, Providencia"},
        {nombre:"Centro Médico Ñuñoa", direccion:"Irarrázaval 2980, Ñuñoa"}]},
    {id:"p2", nombre:"Dra. Camila Reyes Toro", especialidad:"Medicina General", region:"Región de Valparaíso", color:"#14A6A6",
      sucursales:[{nombre:"Clínica Viña del Mar", direccion:"Av. San Martín 560, Viña del Mar"}]},
    {id:"p3", nombre:"Dra. Fernanda Ortiz Muñoz", especialidad:"Pediatría", region:"Región Metropolitana", color:"#E0876B",
      sucursales:[
        {nombre:"Centro Médico Las Condes", direccion:"Av. Apoquindo 4500, Las Condes"},
        {nombre:"Centro Médico La Reina", direccion:"Av. Larraín 6750, La Reina"}]},
    {id:"p4", nombre:"Dr. Ignacio Vergara Paz", especialidad:"Cardiología", region:"Región Metropolitana", color:"#0A333C",
      sucursales:[{nombre:"Centro Médico Providencia", direccion:"Av. Providencia 1250, Providencia"}]},
    {id:"p5", nombre:"Dra. Valentina Soto Bravo", especialidad:"Ginecología y Obstetricia", region:"Región Metropolitana", color:"#B8608F",
      sucursales:[{nombre:"Centro Médico Ñuñoa", direccion:"Irarrázaval 2980, Ñuñoa"}]},
    {id:"p6", nombre:"Dr. Rodrigo Fuentes Lira", especialidad:"Dermatología", region:"Región del Biobío", color:"#9C7A3C",
      sucursales:[{nombre:"Centro Médico Concepción", direccion:"O'Higgins 640, Concepción"}]},
    {id:"p7", nombre:"Dra. Josefina Álvarez Cruz", especialidad:"Odontología General", region:"Región Metropolitana", color:"#3C7A9C",
      sucursales:[
        {nombre:"Clínica Dental Maipú", direccion:"Av. Pajaritos 2100, Maipú"},
        {nombre:"Clínica Dental Santiago Centro", direccion:"Huérfanos 1234, Santiago"}]},
    {id:"p8", nombre:"Dr. Matías Contreras Silva", especialidad:"Ortodoncia", region:"Región Metropolitana", color:"#5C7A3C",
      sucursales:[{nombre:"Clínica Dental Providencia", direccion:"Av. Providencia 2300, Providencia"}]},
    {id:"p9", nombre:"Dra. Trinidad Muñoz Espinoza", especialidad:"Psicología", region:null, color:"#7A5CAF",
      sucursales:[{nombre:"Atención por Telemedicina", direccion:"Videollamada · enlace enviado por correo"}]},
    {id:"p10", nombre:"Dra. Antonia Peña Vidal", especialidad:"Ecografía", region:"Región Metropolitana", color:"#AF5C5C",
      sucursales:[{nombre:"Centro de Imágenes Providencia", direccion:"Av. Providencia 1780, Providencia"}]},
    {id:"p11", nombre:"Dr. Sebastián Rojas Díaz", especialidad:"Nutrición y Dietética", region:"Región Metropolitana", color:"#3C9C6E",
      sucursales:[{nombre:"Centro Médico Ñuñoa", direccion:"Irarrázaval 2980, Ñuñoa"}]},
    {id:"p12", nombre:"Dra. Carolina Espinoza Le", especialidad:"Endocrinología", region:null, color:"#2E8B9E",
      sucursales:[{nombre:"Atención por Telemedicina", direccion:"Videollamada · enlace enviado por correo"}]},
  ];

  /* ===================== STATE ===================== */
  const state = {
    step: 1,
    rutRaw: "",
    rutValid: false,
    isRegistered: false,
    patient: {},
    tipoConsulta: null,
    especialidad: "",
    region: "",
    selectedDay: 0, // 0 = hoy
    openCards: {},
    openBranches: {},
    visibleSlots: {},
    booking: null, // {prof, sucursal, day, time}
  };

  const today = new Date();
  today.setHours(0,0,0,0);

  /* ===================== ICONS ===================== */
  function iconStethoscope(){return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M5 3v6a4 4 0 0 0 8 0V3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><path d="M17 12v2a5 5 0 0 1-10 0v-2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="19" cy="10" r="2" stroke="currentColor" stroke-width="1.8"/><path d="M19 12v1a5 5 0 0 1-2 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>';}
  function iconVideo(){return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="12" height="12" rx="2.5" stroke="currentColor" stroke-width="1.8"/><path d="M15 10l6-3v10l-6-3" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>';}
  function iconTooth(){return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M12 4c-2 0-3 1.3-4.5 1.3S5 4 3.8 5.5C2.5 7 3 9.5 3.6 12c.6 2.6 1.4 7 3.1 7 1.5 0 1.3-3.2 2.6-3.2s1.1 3.2 2.6 3.2c1.7 0 2.5-4.4 3.1-7 .6-2.5 1.1-5-.2-6.5C13.8 4 12 4 12 4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>';}
  function iconScan(){return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 8V5a1 1 0 0 1 1-1h3M20 8V5a1 1 0 0 0-1-1h-3M4 16v3a1 1 0 0 0 1 1h3M20 16v3a1 1 0 0 1-1 1h-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/><circle cx="12" cy="12" r="3.2" stroke="currentColor" stroke-width="1.8"/></svg>';}
  function iconCalendar(){return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="16" rx="2.5" stroke="currentColor" stroke-width="1.8"/><path d="M8 3v4M16 3v4M3 10h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>';}
  function iconPin(){return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M12 21s7-6.4 7-11.5A7 7 0 0 0 5 9.5C5 14.6 12 21 12 21z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><circle cx="12" cy="9.5" r="2.3" stroke="currentColor" stroke-width="1.8"/></svg>';}
  function iconUser(){return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.6" stroke="currentColor" stroke-width="1.8"/><path d="M4.5 20c1.4-3.6 4.4-5.5 7.5-5.5s6.1 1.9 7.5 5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>';}
  function iconChevron(){return '<svg width="13" height="13" viewBox="0 0 24 24" fill="none"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';}
  function iconEmpty(){return '<svg width="46" height="46" viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/><path d="M21 21l-4.3-4.3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>';}

  /* ===================== RUT UTILS ===================== */
  function cleanRut(v){ return v.replace(/[^0-9kK]/g,"").toUpperCase(); }
  function formatRut(v){
    let c = cleanRut(v);
    if(c.length===0) return "";
    let dv = c.slice(-1);
    let body = c.slice(0,-1);
    if(body.length===0) return dv;
    body = body.replace(/\B(?=(\d{3})+(?!\d))/g,".");
    return body + "-" + dv;
  }
  function computeDV(body){
    let sum=0, mul=2;
    for(let i=body.length-1;i>=0;i--){
      sum += parseInt(body[i],10)*mul;
      mul = mul===7?2:mul+1;
    }
    let res = 11 - (sum%11);
    if(res===11) return "0";
    if(res===10) return "K";
    return String(res);
  }
  function validateRut(v){
    let c = cleanRut(v);
    if(c.length<2) return false;
    let body = c.slice(0,-1), dv = c.slice(-1);
    if(!/^\d+$/.test(body)) return false;
    return computeDV(body)===dv;
  }
  function rutBody(v){ return cleanRut(v).slice(0,-1); }

  /* ===================== SCHEDULE GENERATOR (deterministic) ===================== */
  function hashCode(str){
    let h=0;
    for(let i=0;i<str.length;i++){ h = (Math.imul(31,h) + str.charCodeAt(i))|0; }
    return h>>>0;
  }
  function mulberry32(seed){
    return function(){
      seed |= 0; seed = (seed + 0x6D2B79F5)|0;
      let t = Math.imul(seed ^ seed>>>15, 1|seed);
      t = (t + Math.imul(t ^ t>>>7, 61|t)) ^ t;
      return ((t ^ t>>>14) >>> 0) / 4294967296;
    };
  }
  function pad(n){ return n<10 ? "0"+n : ""+n; }

  function slotsFor(profId, sucIndex, dayOffset){
    const rnd = mulberry32(hashCode(profId+"|"+sucIndex+"|"+dayOffset));
    if(rnd() < 0.18) return [];
    const count = 4 + Math.floor(rnd()*6);
    const slots = [];
    let hour = 9 + Math.floor(rnd()*2);
    let minute = rnd()<0.5 ? 0 : 30;
    let guard=0;
    while(slots.length<count && guard<40){
      guard++;
      if(hour===13){ hour=14; minute=0; }
      if(hour>=18) break;
      slots.push(pad(hour)+":"+pad(minute));
      minute += 30;
      if(minute>=60){ minute=0; hour++; }
    }
    // filtrar horas pasadas si es hoy
    if(dayOffset===0){
      const now = new Date();
      const nowMin = now.getHours()*60+now.getMinutes();
      return slots.filter(s=>{
        const [h,m] = s.split(":").map(Number);
        return h*60+m > nowMin+20;
      });
    }
    return slots;
  }

  function dateForOffset(offset){
    const d = new Date(today);
    d.setDate(d.getDate()+offset);
    return d;
  }
  const DIAS_CORTOS = ["dom","lun","mar","mié","jué","vie","sáb"];
  const MESES_CORTOS = ["ene","feb","mar","abr","may","jun","jul","ago","sep","oct","nov","dic"];
  function formatDayLabel(offset){
    const d = dateForOffset(offset);
    return DIAS_CORTOS[d.getDay()] + " " + d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
  }

  /* ===================== RENDER: STEPPER ===================== */
  function renderStepper(){
    const el = document.getElementById("stepper");
    el.innerHTML = "";
    STEP_LABELS.forEach((label,i)=>{
      const n = i+1;
      const wrap = document.createElement("div");
      wrap.className = "step-item" + (state.step===n?" active":"") + (state.step>n?" done":"");
      wrap.innerHTML = '<div class="step-dot">'+(state.step>n ? '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M4 12.5L9.5 18L20 6" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>' : n)+'</div><div class="step-label">'+label+'</div>';
      el.appendChild(wrap);
      if(n<STEP_LABELS.length){
        const conn = document.createElement("div");
        conn.className = "step-connector" + (state.step>n?" done":"");
        el.appendChild(conn);
      }
    });
  }

  function goToStep(n){
    state.step = n;
    document.querySelectorAll(".panel").forEach(p=>{
      p.classList.toggle("active", parseInt(p.dataset.step,10)===n);
    });
    renderStepper();
    window.scrollTo({top:0,behavior:"smooth"});
    if(n===3) renderStep3();
    if(n===4) renderStep4();
    if(n===5) renderStep5();
  }

  document.querySelectorAll("[data-back]").forEach(btn=>{
    btn.addEventListener("click", ()=> goToStep(parseInt(btn.dataset.back,10)));
  });

  /* ===================== STEP 1 ===================== */
  const rutInput = document.getElementById("rut");
  const rutStatus = document.getElementById("rutStatus");
  const patientFoundBox = document.getElementById("patientFoundBox");
  const newPatientFields = document.getElementById("newPatientFields");
  const toStep2Btn = document.getElementById("toStep2");

  const previsionSelect = document.getElementById("prevision");
  previsionSelect.innerHTML = '<option value="">Selecciona</option>' + PREVISIONES.map(p=>`<option>${p}</option>`).join("");

  function initialsOf(name){
    return name.replace(/^(Dr\.|Dra\.)\s*/,"").split(" ").filter(Boolean).slice(0,2).map(w=>w[0]).join("").toUpperCase();
  }
  function avatarHtml(name,color,size){
    size = size||52;
    return `<div class="avatar" style="width:${size}px;height:${size}px;font-size:${Math.round(size*0.32)}px;background:linear-gradient(135deg, ${color}, ${shade(color,-18)})">${initialsOf(name)}</div>`;
  }
  function shade(hex, percent){
    const num = parseInt(hex.slice(1),16);
    let r=(num>>16)+percent, g=((num>>8)&0xff)+percent, b=(num&0xff)+percent;
    r=Math.max(Math.min(255,r),0); g=Math.max(Math.min(255,g),0); b=Math.max(Math.min(255,b),0);
    return "#"+(1<<24 | r<<16 | g<<8 | b).toString(16).slice(1);
  }

  rutInput.addEventListener("input", (e)=>{
    const cursorAtEnd = e.target.selectionStart === e.target.value.length;
    const formatted = formatRut(e.target.value);
    e.target.value = formatted;
    if(cursorAtEnd) e.target.setSelectionRange(formatted.length, formatted.length);
    evaluateRut();
  });

  function evaluateRut(){
    const val = rutInput.value;
    document.getElementById("field-rut").classList.remove("has-error");
    if(val.length < 3){
      rutStatus.className = "rut-status";
      patientFoundBox.style.display="none";
      newPatientFields.style.display="none";
      state.rutValid = false;
      updateStep1Btn();
      return;
    }
    const valid = validateRut(val);
    state.rutValid = valid;
    if(!valid){
      rutStatus.className = "rut-status show bad";
      rutStatus.textContent = "✕ inválido";
      patientFoundBox.style.display="none";
      newPatientFields.style.display="none";
      updateStep1Btn();
      return;
    }
    rutStatus.className = "rut-status show ok";
    rutStatus.textContent = "✓ válido";
    const body = rutBody(val);
    if(REGISTERED[body]){
      state.isRegistered = true;
      state.patient = Object.assign({rut: formatRut(val)}, REGISTERED[body]);
      newPatientFields.style.display = "none";
      clearNewPatientRequiredState();
      const p = state.patient;
      patientFoundBox.innerHTML = `<div class="patient-found">
        ${avatarHtml(p.nombre, "#0C7C92", 44)}
        <div class="pf-info"><b>${p.nombre}</b><span>${p.prevision} · ${p.correo || p.telefono}</span></div>
        <div class="pf-badge">Datos cargados</div>
      </div>`;
      patientFoundBox.style.display = "block";
    } else {
      state.isRegistered = false;
      patientFoundBox.style.display = "none";
      newPatientFields.style.display = "block";
    }
    updateStep1Btn();
  }

  function clearNewPatientRequiredState(){
    ["nombre","sexo","fnac","prevision"].forEach(id=>document.getElementById("field-"+id).classList.remove("has-error"));
  }

  ["nombre","sexo","fnac","prevision","correo","telefono"].forEach(id=>{
    document.getElementById(id).addEventListener("input", updateStep1Btn);
    document.getElementById(id).addEventListener("change", updateStep1Btn);
  });

  function newPatientComplete(){
    const nombre = document.getElementById("nombre").value.trim();
    const sexo = document.getElementById("sexo").value;
    const fnac = document.getElementById("fnac").value;
    const prevision = document.getElementById("prevision").value;
    const correo = document.getElementById("correo").value.trim();
    const telefono = document.getElementById("telefono").value.trim();
    const contactoOk = (correo.length>3 && correo.includes("@")) || telefono.length>=8;
    return nombre.length>3 && sexo && fnac && prevision && contactoOk;
  }

  function updateStep1Btn(){
    let ok = state.rutValid;
    if(ok && !state.isRegistered){
      ok = newPatientComplete();
    }
    toStep2Btn.disabled = !ok;
  }

  toStep2Btn.addEventListener("click", ()=>{
    if(!state.isRegistered){
      state.patient = {
        rut: rutInput.value,
        nombre: document.getElementById("nombre").value.trim(),
        sexo: document.getElementById("sexo").value,
        fechaNacimiento: document.getElementById("fnac").value,
        prevision: document.getElementById("prevision").value,
        correo: document.getElementById("correo").value.trim(),
        telefono: document.getElementById("telefono").value.trim(),
      };
    }
    goToStep(2);
  });

  /* ===================== STEP 2 ===================== */
  const tipoGrid = document.getElementById("tipoGrid");
  function renderTipoGrid(){
    tipoGrid.innerHTML = TIPOS.map(t=>`
      <button type="button" class="tipo-card${state.tipoConsulta===t.id?" selected":""}" data-tipo="${t.id}">
        <div class="check"></div>
        <div class="ic">${t.icon}</div>
        <b>${t.nombre}</b>
        <span>${t.desc}</span>
      </button>
    `).join("");
    tipoGrid.querySelectorAll(".tipo-card").forEach(card=>{
      card.addEventListener("click", ()=>{
        state.tipoConsulta = card.dataset.tipo;
        state.especialidad = "";
        renderTipoGrid();
        document.getElementById("toStep3").disabled = false;
      });
    });
  }
  renderTipoGrid();

  document.getElementById("toStep3").addEventListener("click", ()=> goToStep(3));

  /* ===================== STEP 3 ===================== */
  const especialidadSelect = document.getElementById("especialidad");
  const regionSelect = document.getElementById("region");
  regionSelect.innerHTML = '<option value="">Todas las regiones</option>' + REGIONES.map(r=>`<option>${r}</option>`).join("");

  function renderStep3(){
    const list = ESPECIALIDADES_POR_TIPO[state.tipoConsulta] || [];
    especialidadSelect.innerHTML = '<option value="">Selecciona una especialidad</option>' + list.map(e=>`<option ${state.especialidad===e?"selected":""}>${e}</option>`).join("");
    checkStep3Ready();
  }
  especialidadSelect.addEventListener("change", ()=>{ state.especialidad = especialidadSelect.value; checkStep3Ready(); });
  regionSelect.addEventListener("change", ()=>{ state.region = regionSelect.value; checkStep3Ready(); });
  function checkStep3Ready(){
    document.getElementById("toStep4").disabled = !especialidadSelect.value;
  }
  document.getElementById("toStep4").addEventListener("click", ()=>{
    state.selectedDay = 0;
    state.openCards = {}; state.openBranches = {}; state.visibleSlots = {};
    goToStep(4);
  });

  /* ===================== STEP 4 ===================== */
  const weekStrip = document.getElementById("weekStrip");
  const resultsMeta = document.getElementById("resultsMeta");
  const profList = document.getElementById("profList");

  function renderWeekStrip(){
    weekStrip.innerHTML = "";
    for(let i=0;i<7;i++){
      const d = dateForOffset(i);
      const pill = document.createElement("button");
      pill.type = "button";
      pill.className = "day-pill" + (i===0?" today":"") + (state.selectedDay===i?" selected":"");
      pill.innerHTML = `<span class="dname">${DIAS_CORTOS[d.getDay()]}</span><span class="dnum">${d.getDate()}</span>`;
      pill.addEventListener("click", ()=>{
        state.selectedDay = i;
        state.openCards = {}; state.openBranches = {}; state.visibleSlots = {};
        renderStep4();
      });
      weekStrip.appendChild(pill);
    }
  }

  function matchingProfessionals(){
    return PROFESIONALES.filter(p=>{
      if(p.especialidad !== state.especialidad) return false;
      if(state.region && p.region!==null && p.region!==state.region) return false;
      return true;
    });
  }

  function profAvailabilityForDay(prof, day){
    // devuelve [{sucIndex, sucursal, slots}] con slots.length>0
    return prof.sucursales.map((suc,idx)=>({
      sucIndex: idx, sucursal: suc, slots: slotsFor(prof.id, idx, day)
    })).filter(x=>x.slots.length>0);
  }

  function renderStep4(){
    renderWeekStrip();
    const all = matchingProfessionals();
    const day = state.selectedDay;
    const withAvail = all.map(p=>({prof:p, avail: profAvailabilityForDay(p, day)})).filter(x=>x.avail.length>0);

    resultsMeta.innerHTML = `Mostrando disponibilidad para <b>${formatDayLabel(day)}</b> · <b>${state.especialidad}</b>${state.region ? " · "+state.region : ""} — ${withAvail.length} profesional${withAvail.length===1?"":"es"} disponible${withAvail.length===1?"":"s"}`;

    if(all.length===0){
      profList.innerHTML = emptyStateHtml("No encontramos profesionales", "No hay profesionales de "+ (state.especialidad||"esta especialidad") + " en "+(state.region||"esa región")+". Prueba ampliando la búsqueda a todas las regiones.");
      return;
    }
    if(withAvail.length===0){
      profList.innerHTML = emptyStateHtml("Sin horas para este día", "No hay disponibilidad para "+formatDayLabel(day)+". Prueba seleccionando otro día en el calendario.");
      return;
    }

    profList.innerHTML = withAvail.map(({prof,avail})=>profCardHtml(prof, avail, day)).join("");
    attachProfListEvents(withAvail, day);
  }

  function emptyStateHtml(title, text){
    return `<div class="empty-state">${iconEmpty()}<b>${title}</b><p>${text}</p></div>`;
  }

  function profCardHtml(prof, avail, day){
    const primary = avail[0];
    const firstSlot = primary.slots[0];
    const others = avail.length - 1;
    const cardKey = prof.id+"-"+day;
    return `
    <div class="prof-card" data-cardkey="${cardKey}">
      <div class="prof-top">
        ${avatarHtml(prof.nombre, prof.color, 52)}
        <div class="prof-info">
          <p class="pname">${prof.nombre}</p>
          <p class="pspec">${prof.especialidad}</p>
          <div class="next-slot">
            <span class="when">${iconCalendar()} ${formatDayLabel(day)} · ${firstSlot} hrs</span>
            <span>${iconPin()} ${primary.sucursal.nombre}</span>
          </div>
        </div>
        <div class="prof-side">
          <button class="btn btn-primary btn-sm" data-book="${prof.id}|${primary.sucIndex}|${day}|${firstSlot}">Agendar esta hora</button>
        </div>
      </div>
      <div class="prof-actions">
        ${others>0 ? `<button type="button" class="see-more-link" data-toggle="${cardKey}">${iconChevron()} Ver otros lugares de atención (${others})</button>` : `<span class="no-day" style="opacity:.7">Único lugar con horas este día</span>`}
        <div class="branches" data-branches="${cardKey}">
          ${avail.map(a=>branchHtml(prof, a, day, cardKey)).join("")}
        </div>
      </div>
    </div>`;
  }

  function branchHtml(prof, a, day, cardKey){
    const branchKey = cardKey+"-"+a.sucIndex;
    const visible = state.visibleSlots[branchKey] || 4;
    const shown = a.slots.slice(0, visible);
    const remaining = a.slots.length - shown.length;
    return `
    <div class="branch">
      <p class="bname">${a.sucursal.nombre}</p>
      <p class="baddr">${iconPin()} ${a.sucursal.direccion}</p>
      <div class="slot-grid">
        ${shown.map(s=>`<button type="button" class="slot-btn" data-book="${prof.id}|${a.sucIndex}|${day}|${s}">${s}</button>`).join("")}
        ${remaining>0 ? `<button type="button" class="slot-more" data-moreslots="${branchKey}">+${remaining} horas más</button>` : ""}
      </div>
    </div>`;
  }

  function attachProfListEvents(withAvail, day){
    profList.querySelectorAll("[data-toggle]").forEach(btn=>{
      btn.addEventListener("click", ()=>{
        const key = btn.dataset.toggle;
        state.openCards[key] = !state.openCards[key];
        const branchesEl = profList.querySelector(`[data-branches="${key}"]`);
        branchesEl.classList.toggle("open", state.openCards[key]);
        btn.classList.toggle("open", state.openCards[key]);
      });
    });
    profList.querySelectorAll("[data-moreslots]").forEach(btn=>{
      btn.addEventListener("click", ()=>{
        const key = btn.dataset.moreslots;
        state.visibleSlots[key] = 999;
        renderStep4();
        const cardKey = key.split("-").slice(0,2).join("-");
        state.openCards[cardKey]=true;
      });
    });
    profList.querySelectorAll("[data-book]").forEach(btn=>{
      btn.addEventListener("click", ()=>{
        const [profId, sucIndex, d, time] = btn.dataset.book.split("|");
        const prof = PROFESIONALES.find(p=>p.id===profId);
        const suc = prof.sucursales[parseInt(sucIndex,10)];
        state.booking = { prof, sucursal: suc, day: parseInt(d,10), time };
        goToStep(5);
      });
    });
    // reabrir estado de cards que ya estaban abiertos (tras "ver mas horas")
    Object.keys(state.openCards).forEach(key=>{
      if(state.openCards[key]){
        const branchesEl = profList.querySelector(`[data-branches="${key}"]`);
        const toggleBtn = profList.querySelector(`[data-toggle="${key}"]`);
        if(branchesEl) branchesEl.classList.add("open");
        if(toggleBtn) toggleBtn.classList.add("open");
      }
    });
  }

  /* ===================== STEP 5 ===================== */
  const confirmCard = document.getElementById("confirmCard");
  const confirmView = document.getElementById("confirmView");
  const successView = document.getElementById("successView");

  function renderStep5(){
    confirmView.style.display = "block";
    successView.style.display = "none";
    document.getElementById("confirmTitle").textContent = "Confirma tu hora";
    document.getElementById("confirmSub").textContent = "Revisa que los datos estén correctos antes de agendar.";
    const b = state.booking;
    confirmCard.innerHTML = `
      <div class="confirm-row">
        <div class="ic">${iconUser()}</div>
        <div><div class="clabel">Profesional</div><div class="cval">${b.prof.nombre}<small>${b.prof.especialidad}</small></div></div>
      </div>
      <div class="confirm-row">
        <div class="ic">${iconCalendar()}</div>
        <div><div class="clabel">Fecha y hora</div><div class="cval">${formatDayLabel(b.day)}<small>${b.time} hrs</small></div></div>
      </div>
      <div class="confirm-row">
        <div class="ic">${iconPin()}</div>
        <div><div class="clabel">Lugar de atención</div><div class="cval">${b.sucursal.nombre}<small>${b.sucursal.direccion}</small></div></div>
      </div>
      <div class="confirm-row">
        <div class="ic">${iconUser()}</div>
        <div><div class="clabel">Paciente</div><div class="cval">${state.patient.nombre}<small>${state.patient.prevision||""}</small></div></div>
      </div>
    `;
  }

  document.getElementById("confirmBtn").addEventListener("click", ()=>{
    const p = state.patient;
    const btn = document.getElementById("confirmBtn");
    btn.disabled = true;
    btn.textContent = "Agendando...";
    setTimeout(()=>{
      confirmView.style.display = "none";
      successView.style.display = "block";
      const b = state.booking;
      document.getElementById("successText").textContent =
        `Tu hora con ${b.prof.nombre} quedó agendada para el ${formatDayLabel(b.day)} a las ${b.time} hrs en ${b.sucursal.nombre}.`;
      const chip = document.getElementById("notifyChip");
      if(p.correo){
        chip.innerHTML = `✉️ Confirmación enviada a <strong style="margin-left:4px">${p.correo}</strong>`;
      } else if(p.telefono){
        chip.innerHTML = `📱 Confirmación enviada por SMS a <strong style="margin-left:4px">${p.telefono}</strong>`;
      } else {
        chip.innerHTML = `✅ Hora registrada en el sistema`;
      }
      btn.disabled = false;
      btn.textContent = "Confirmar y agendar hora";
    }, 650);
  });

  document.getElementById("restartBtn").addEventListener("click", ()=>{
    state.tipoConsulta = null;
    state.especialidad = "";
    state.region = "";
    state.booking = null;
    especialidadSelect.value = "";
    regionSelect.value = "";
    document.getElementById("toStep3").disabled = true;
    renderTipoGrid();
    goToStep(2);
  });

  /* ===================== INIT ===================== */
  renderStepper();
  goToStep(1);

})();
</script>
</body>
</html>