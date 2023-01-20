# ESTADOS DE CONTRATOS DEPENDIENTES
1. Nuevo
2. Activo
3. Vencido
4. Finalizado
5. Anulado

# TIPOS DE CONTRATOS DEPENDIENTES
1. CONTRATO INDEFINIDO
2. CONTRATO DEFINIDO

# DETALLE DE TABLA LIQUIDACION RECIBO (INFO CUENTA BANCARIA)
## liquidacion_recibo = cuentas banco
* id_seccion = id_usuario
* serie  = rut
* autor = nombre
* casa = banco
* numero_control = cuenta
* email = email
* principal = principal (indica si es cuenta principal con 1)
* otro = comodin
* estado = 1|0

# BONOS 
## TIPO DE PAGO (ID CLASE BONO)
* 1->Bono Fisico
* 2->Sencillito
* 3->Caja Vecina
* 4->Bono Web
* 5->Bono Web Pre-Pago
* 6->Particular

# ESTADO DE RENDICIONES 
0. NUEVO
1. EN PROCESO
2. APROBADA
3. RECHAZADA
4. DESISTIDA


# TIPO MENSAJE APP
1. rendicion -> Recibe conforme Rendición de Caja N°{id_rendicion} de la Asistente {nombre_asistente} de fecha {fecha_rendicion}
2. permiso visualizar ficha unica -> El Profesional {nombre_profesional} esta solicitando ver su ficha unica 
3. confirmacion hora medica -> Ud tiene una Hora {evento} por Confirmar, para el dia {fecha} a las {hora} 

# LOG USERS DEVICES "TIPO"
1. RENDICION
2. CONFIRMACION DE HORA

# APP log_users_devices
## ESTADOS log_users_devices
0. ESPERA
1. VALIDO
2. VENCIDO
3. RECHAZADO

## tipo
1. rendicion


# LISTA DE BLADE PARA CORREOS
1.  CORREO PACIENTE AUTORIZACION DE DISPOSITIVO APP -> registrar_app
2.  CORREO PACIENTE HORA AGENDADA -> hora_agendada


# ESTADOS DE HORA DE ATENCION
1.  Reservada -> celeste
2.  CONFIRMADO -> verde
3.  Rechazada -> Rojo
4.  Espera -> morado
5.  Realizando-> rosa
6.  Realizada -> Azul
7.  Inasistida -> naranjo
8.  Llamando -> morado (monitor sala espera)


# NOTIFICACION CONFIRMACION
## TIPOS DE NOTIFICACION CONFIRMACION
1.  HORA MEDICA
2.  OTROS
## ESTADOS DE NOTIFICACION CONFIRMACION
0.  NOTIFICADO
1.  SEGUNDA NOTIFICACION
2.  CONFIRMADO
3.  RECHAZADO
4.  CANCELADO


# LICENCIAS
## TIPOS DE LICENCIAS
1. Tipo 1: enfermedad o accidente común.
2. Tipo 2: medicina preventiva.
3. Tipo 3: pre y postnatal.
4. Tipo 4: enfermedad grave del niño menor del año





