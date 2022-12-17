<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Ciudad;
class LaboratorioController extends Controller
{
    /** ADMINISTRACION GENERAL  */
    public function home(){
        return view('app.laboratorio.adm_general.home');
    }
    public function adm_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
	 public function adm_laboratorio_local(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }
     public function asistentes_laboratorio(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }
   
    public function perfil_admin(){
        return view('app.laboratorio.adm_general.perfil_admin');
    }
	public function perfil_laboratorio(){
        return view('app.laboratorio.adm_general.perfil_laboratorio');
    }

    public function sucursales_laboratorio(){
        return view('app.laboratorio.adm_general.sucursales_laboratorio');
    }
    public function admin_laboratorio(){
        return view('app.laboratorio.adm_general.admin_laboratorio');
    }
    public function administracion(){
        return view('app.laboratorio.adm_general.administracion');
    }
    public function administracion_agregar_asistente(){
        return view('app.laboratorio.adm_general.asistentes_laboratorio');
    }
    public function gastos_laboratorio_admin(){
        return view('app.laboratorio.adm_general.gastos_laboratorio_admin');
    }
    public function inventario_laboratorio_admin(){
        return view('app.laboratorio.adm_general.inventario_laboratorio_admin');
    }
    public function lista_exam(){
        return view('app.laboratorio.adm_general.lista_exam');
    }
    public function personal_laboratorio(){
        return view('app.laboratorio.adm_general.personal_laboratorio');
    }
    public function profesionales_laboratorio(){
        return view('app.laboratorio.adm_general.profesionales_laboratorio');
    }
    public function proveedores_laboratorio_admin(){
        return view('app.laboratorio.adm_general.proveedores_laboratorio_admin');
    }
    public function suscripcion_pago_laboratorio(){
        return view('app.laboratorio.adm_general.suscripcion_pago_laboratorio');
    }
    /** ADMINISTRACION LOCAL  */

    public function perfil_administrador_local(){
        return view('app.laboratorio.administrador_local.perfil_admin');
    }

    public function adm_local_laboratorio(){
        return view('app.laboratorio.administrador_local.administracion_admin');
    }


    public function asistente_laboratorio_Local(){
        return view('app.laboratorio.administrador_local.asistentes_laboratorio');
    }
    public function profesional_laboratorio_local(){
        return view('app.laboratorio.administrador_local.profesionales_laboratorio');
    }
    public function inventario_lab_local(){
        return view('app.laboratorio.administrador_local.inventario_laboratorio_admin');
    }
    public function examenes_agregar_local(){
        return view('app.laboratorio.administrador_local.lista_exam');
    }
    public function proveedores_laboratorio_local(){
        return view('app.laboratorio.administrador_local.proveedores_laboratorio_admin');
    }

    public function sucursales_laboratorio_local(){
        return view('app.laboratorio.administrador_local.sucursales_laboratorio');
    }
    public function gastos_laboratorio_local(){
        return view('app.laboratorio.administrador_local.gastos_laboratorio_admin');

    }
    public function sub_administracion_laboratorio(){
        return view('app.laboratorio.administrador_local.subadmin_laboratorio');
    }

    public function suscripcion_laboratorio_local(){
        return view('app.laboratorio.administrador_local.suscripcion_pago_laboratorio');
    }

    /** ASISTENTE LABORATORIO  */
    public function perfil_asistente(){
        return view('app.laboratorio.lab_asistente.perfil');
    }
    public function agenda_laboratorio(){
        return view('app.laboratorio.lab_asistente.agenda_laboratorio');
    }
    public function cotizar_laboratorio(){
        return view('app.laboratorio.lab_asistente.cotizar_laboratorio');
    }
    public function orden_laboratorio(){
        return view('app.laboratorio.lab_asistente.orden_laboratorio');
    }
    public function pacientes_laboratorio(){
        return view('app.laboratorio.lab_asistente.pacientes_laboratorio');
    }
    public function resultados_examenes_laboratorio(){
        return view('app.laboratorio.lab_asistente.resultados_examenes_laboratorio');
    }
    public function resultados_lab(){
        return view('app.laboratorio.lab_asistente.resultados_laboratorio');
    }
	public function escritorio_asistente_laboratorio(){
        return view('app.laboratorio.lab_asistente.escritorio_asistente_laboratorio');
    }
/** PROFESIONALES LABORATORIO  */

public function perfil_profesional(){
    return view('app.laboratorio.lab_profesional.perfil');
}
public function escritorio_profesional_laboratorio(){
        return view('app.laboratorio.lab_profesional.escritorio_profesional_laboratorio');
    }
public function gastos_laboratorio(){
    return view('app.laboratorio.lab_profesional.gastos_laboratorio');
}
public function inventario_laboratorio(){
    return view('app.laboratorio.lab_profesional.inventario_laboratorio');
}
public function pacientes_laboratoriop(){
    return view('app.laboratorio.lab_profesional.pacientes_laboratorio');
}
public function procesos_laboratorio(){
    return view('app.laboratorio.lab_profesional.procesos_laboratorio');
}
public function proveedores_laboratorio(){
    return view('app.laboratorio.lab_profesional.proveedores_laboratorio');
}
public function recepcion_muestras(){
    return view('app.laboratorio.lab_profesional.recepcion_muestras');
}
public function resultados(){
    return view('app.laboratorio.lab_profesional.resultados');
}
public function solicitud_exam_laboratorio_profesional(){
    return view('app.laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional');
}

	public function buscar_ciudad_region(Request $request)
    {
        $ciudad = Ciudad::where('id_region', $request->region)->orderBy('nombre')->get();

        return json_encode($ciudad);
    }
}
