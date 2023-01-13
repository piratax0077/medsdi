<?php

namespace App\Http\Controllers;

use App\Mail\CorreoGenerico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{


    public function envioCorreoR(Request $request)
    {
        return static::envioCorreo($request->blade, $request->to, $request->cc, $request->bcc, $request->asunto, $request->body, $request->archivo, $request->id_institucion);
    }

    /**
     * ENVIO DE CORREO
     *
     * @param string $blade -> 'registrar_app'
     * @param array $to -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param array $cc -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param array $bcc -> array(['email'=>'demo@demo.com','name'=>'name'],...,['email'=>'demo@demo.com','name'=>'name'])
     * @param string $asunto
     * @param array $body -> array('nombre'=>'demo','usuario'=>'demo344','contrasena'=>'sindem0',...)
     * @param array $archivo -> array('url'=>'../pdf/documento.pdf','mime'=>'application/pdf')
     * @param int $id_institucion -> 13
     * @return array
     */
    static public function envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion)
    {

        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($blade))
        {
            $error['blade'] = 'campo requerido';
            $valido = 0;
        }
        if(count($to)==0)
        {
            $error['to'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $data = array(
                'blade' => $blade,
                'asunto' => $asunto,
                'body' => $body,
                'url_archivo' => $archivo,
                'id_institucion' => $id_institucion,
            );

            $correo = new CorreoGenerico($data);

            // desarrollo
            $to = array(['email'=>'contacto@med-sdi.cl','name'=>'Contacto MED-SDI']);

            Mail::to($to)
                    ->cc($cc)
                    ->bcc($bcc)
                    ->send($correo);



            if (Mail::failures())
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'falla en envio de correo';
            }
            else
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'email enviado';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'campos requeridos';
            $datos['error'] = $error;
        }


        return $datos;
    }

    public function envioCorreoTest()
    {
        $blade = 'registrar_app';
        $to = array(
                array('email' => 'jkriman@gmail.com','name' => 'jaime'),
                array('email' => 'j2edavila@gmail.com','name' => 'johan'),
                array('email' => 'contacto@med-sdi.cl','name' => 'Contacto MED-sdi'),
                // array('email' => 'paul_baeza@hotmail.com','name' => 'paul')
            );
        $cc = array();
        $bcc = array();
        $asunto = 'MED-SDI - Codigo Registro APP';
        $body = array('CODIGO'=>'12345', 'nombre_cliente'=> 'demo demo');
        $archivo = '';/** pendiente */
        $id_institucion = '';

        return static::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

    }
}

