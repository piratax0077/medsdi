/** CREACION DE USUARIO  */
                    if( (\Carbon\Carbon::parse($fechaConvertida)->age) >= 18)
                    {
                        // $user = User::where('email', $paciente->email)->first();
                        if( $request->reserva_result_codigo_validacion == 1 )
                        {
                            $temp_rut = $paciente->rut;
                            $temp_rut = str_replace('.','' , $temp_rut);
                            $temp_rut = str_replace('-','' , $temp_rut);
                            $temp_rut = str_replace(' ','' , $temp_rut);
                            /** buscar por rut */
                            $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($temp_rut))->first();
                        }
                        else
                        {
                            /** buscar por correo */
                            $user = User::where(DB::raw('UPPER(email)'), mb_strtoupper($paciente->email))->first();
                        }

                        if($user == NULL)
                        {
                            $user = new User();
                            $user->name = $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos;

                            if( $request->reserva_result_codigo_validacion == 1 )
                            {
                                $temp_rut = $paciente->rut;
                                $temp_rut = str_replace('.','' , $temp_rut);
                                $temp_rut = str_replace('-','' , $temp_rut);
                                $temp_rut = str_replace(' ','' , $temp_rut);
                                $user->email = $temp_rut;
                            }
                            else
                            {
                                if( strpos($paciente->email, $temp) !== false )
                                {
                                    $temp_rut = $paciente->rut;
                                    $temp_rut = str_replace('.','' , $temp_rut);
                                    $temp_rut = str_replace('-','' , $temp_rut);
                                    $temp_rut = str_replace(' ','' , $temp_rut);
                                    $user->email = $temp_rut;
                                }
                                else
                                    $user->email = $paciente->email;

                            }

                            $pass_temp = random_int(1111,9999);
                            $user->password = Hash::make($pass_temp);

                            if($user->save())
                            {
                                $user->assignRole('Paciente');
                                $paciente->id_usuario = $user->id;
                                if($paciente->save())
                                {
                                    $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                                    if( $request->reserva_result_codigo_validacion == 1 )
                                    {
                                        /** envio de sms */
                                    }
                                    else
                                    {
                                        /** envio de correo de confirmacion  */
                                        $blade = 'bienvenida_paciente_usuario';
                                        $to = array(
                                                array('email' => $paciente->email,'name' => $paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos),
                                            );
                                        $cc = array();
                                        $bcc = array();
                                        $asunto = 'MED-SDI - Bienvenido!';
                                        $body = array(
                                                    'nombre'=>$paciente->nombres . ' ' .$paciente->apellido_uno . ' ' .$paciente->apellido_dos,
                                                    'user' => $paciente->email,
                                                    'pass' => $pass_temp
                                                    );
                                        $archivo = '';/** pendiente */
                                        $id_institucion = '';

                                        $result_mail =  SendMailController::envioCorreo($blade, $to, $cc, $bcc, $asunto, $body, $archivo, $id_institucion);

                                        if($result_mail['estado'])
                                        {
                                            $datos['paciente']['user']['mail']['estado'] = 1;
                                            $datos['paciente']['user']['mail']['msj'] = 'Notificacion de bienvenida enviado';
                                        }
                                        else
                                        {
                                            $datos['paciente']['user']['mail']['estado'] = 0;
                                            $datos['paciente']['user']['mail']['msj'] = 'Falle en envio de Notificacion de bienvenida';
                                        }
                                        /** cerrar envio de correo de confirmacion  */
                                    }
                                }
                            }
                        }
                        else
                        {
                            $user->assignRole('Paciente');
                            $paciente->id_usuario = $user->id;
                            if($paciente->save())
                            {
                                $datos['paciente']['user']['update_paciente'] = 'Paciente actualizado con Usuario.';
                            }
                        }
                    }
                    /** CIERRE CREACION DE USUARIO  */
