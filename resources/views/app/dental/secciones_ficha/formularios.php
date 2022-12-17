  <div  id="form"   class="tab-pane fade"  role="tabpanel" aria-labelledby="form-tab" style="border: 1px solid #6699FF" >
		<div class="modal-header">
				<ul class="nav nav-tabs" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link text-uppercase has-ripple" id="pills-form_gen-tab" data-toggle="tab" href="#pills-form_gen" role="tab" aria-controls="pills-form_gen-tab" aria-selected="false">FORMULARIOS GENERALES<span class="ripple ripple-animate" style="height: 71.6719px; width: 71.6719px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -16.8359px; left: 0.16405px;"></span></a>
					</li>														
																
					<li class="nav-item">
						<a class="nav-link text-uppercase has-ripple" id="pills-_form_consent-tab" data-toggle="pill" href="#pills-_form_consent" role="tab" aria-controls="pills-_form_consent-tab" aria-selected="true">CONSENTIMIENTOS INFORMADOS<span class="ripple ripple-animate" style="height: 82.2188px; width: 82.2188px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255); opacity: 0.4; top: -29.1094px; left: 22.9375px;"></span></a>
					</li>
				</ul>
		</div>
		<div class="tab-content" id="pills-tabContent">
				<div id="pills-form_gen"  class="tab-pane fade"  role="tabpanel" aria-labelledby="pills-form_gen-tab">
					<div class="card-body">
								<div class="row">
									<div class="col-xl-12">
										<div class="row">
											<div class="col-sm-12 col-md-6">
												<label class="modal-header bg-info" style="text-align:center;font-size: 1.3rem; color: white;">FORMULARIOS GENERALES</label>
												<hr>
												<div class="card text-center">
													<div class="card-body">
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary" style="width:95%;max-width:350px;tex-align:left" data-toggle="modal" data-target="#m_reposo">FORM DE REPOSO</button>
															</div>
														</div>
														<div id="m_reposo" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="m_reposolLabel" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered" role="document">
																		<div class="modal-content"><!--Acá va el encabezado de la identificación del profesional (nombre dir desde la consulta que emite el examen, tel ciudad etc.)-->
																			<div class="modal-header bg-info">
																			<h5 class="modal-title text-white" id="m_reposoLabel" style="font-size: 1.3rem; color: #3366CC;">Certificado Reposo </h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																			</div>
																			<div class="modal-body">
																				<form> <!--autollenado-->
																					<div class="form-group row">
																						<div class="col-sm-5">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Nombre</label>
																								<input id="nombre" type="text" class="form-control" >
																							</div>
																						</div>
																						<div class="col-sm-4">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Rut</label>
																								<input id="rut-pcte" type="text" class="form-control">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Edad</label>
																								<input id="Edad" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-sm-12">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Dirección</label>
																								<input id="direccion" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form><!--fin autollenado-->
																				<form>
																					<div class="form-group row">
																						<div class="col-sm-12">
																							<p><b>El Profesional que suscribe certifica que este paciente debe permanecer en reposo:</b></p>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<label for="validation-t-name" class="col-sm-2 col-form-label">Desde</label>
																						<div class="col-sm-4">
																							<input name="reposodesde" type="date" id="reposodesde" class="form-control" value="dd-mm-aaaa">
																						</div>
																						<label for="validation-t-name" class="col-sm-2 col-form-label">Hasta</label>
																						<div class="col-sm-4">
																							<input name="reposohasta" type="date" id="reposohasta" class="form-control" value="dd-mm-aaaa">
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row mt-4">
																						<div class="col-sm-12">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Hipótesis Diagnóstica</label>
																								<input id="diagnostico" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-sm-12">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Comentarios</label>
																								<input id="comentarios" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-sm-12">
																							<p>Lo saluda Atte.</p> <!--Firma digital, certificado de comprobación del certificado y código QR-->
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row my-2">
																						<div class="col-sm-12 text-center">
																							<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Documento en PDF</button>
																						</div>
																					</div>
																				</form>
																			</div>
																			<div class="modal-footer">
																			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																			<button type="button" class="btn btn-info">Guardar Certificado</button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																			</div>
																		</div>
																	</div>
															</div>
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#m_interconsulta">INTERCONSULTA</button>
															</div>
														</div>
														<div id="m_interconsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_interconsultaLabel" aria-hidden="true">
																	<div class="modal-dialog modal-lg" role="document">
																		<div class="modal-content">
																			<div class="modal-header bg-info">
																				<h5 class="modal-title text-white" id="m_interconsultaLabel" style="font-size: 1.3rem; color: #3366CC;">Interconsulta </h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<form> <!--autollenado-->
																					<div class="form-group row">
																						<div class="col-sm-5">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Nombre</label>
																								<input id="nombre" type="text" class="form-control" >
																							</div>
																						</div>
																						<div class="col-sm-4">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Rut</label>
																								<input id="rut-pcte" type="text" class="form-control">
																							</div>
																						</div>
																						<div class="col-sm-3">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Edad</label>
																								<input id="Edad" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-sm-12">
																							<div class="form-group fill">
																								<label class="floating-label" for="name">Dirección</label>
																								<input id="direccion" type="text" class="form-control" >
																							</div>
																						</div>
																					</div>
																				</form><!--fin autollenado-->
																				<form>
																					<div class="form-group row">
																						<div class="col-md-12">
																							<H5>Interconsulta a la Especialidad: </h5>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group fill">
																								<input id="ic_esp"name="ic_esp"class="mb-3 form-control" type="text" placeholder="Ingrese Nombre especialidad o especialista">
																							</div>
																						</div>
																						<div class="col-md-6">
																								<div class="form-group fill">
																								<input id="ic_dg"name="ic_dg"class="mb-3 form-control" type="text" placeholder="Hipótesis diagnóstica">
																								</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-md-12">	
																								<div class="form-group fill">
																								<input id="ic_mot"name="ic_mot" class="mb-12 form-control" type="text" placeholder="se desea saber:">
																								</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row">
																						<div class="col-md-12">
																							<div class="form-group fill">
																								Lo Saluda Atte.  <!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																							</div>
																						</div>
																					</div>
																				</form>
																				<form>
																					<div class="form-group row my-2">
																						<div class="col-sm-12 text-center">
																							<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Interconsulta en PDF</button>
																						</div>
																					</div>
																				</form>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																					<button type="button" class="btn btn-info">Guardar Interconsulta</button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																				</div>
																				<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" /><label style= "padding:10px">Responder Interconsulta</label>
																				<div id="content" style="display: none;">
																					<div class="modal-body">
																						<form>
																							<div class="form-group row">
																								<div class="col-md-6">	
																									<input id="resp_ic_dg"name="resp_ic_dg"class="mb-3 form-control" type="text" placeholder="Diagnóstico">	
																								</div>
																								<div class="col-md-6">
																								<textarea id="resp_ic_tto"name="resp_ic_tto" class="mb-3 form-control" type="text" row="2" placeholder="Tratamiento"></textarea>
										                              
																								</div>
																							</div>
																							<div class="form-group row">
																								<div class="col-md-8">	
																									<input id="resp_ic_com"name="resp_ic_com"class="mb-3 form-control" type="text" placeholder="Comentario">
																								</div>
																								<div class="col-md-4">	
																									<input id="resp_ic_cont"name="resp_ic_cont" class="mb-3 form-control" type="text" placeholder="Fecha "><!--hoy-->
																								</div>
																							</div>
																							<div class="form-group row">
																								<div class="col-md-4">	
																									<input id="resp_ic_com"name="resp_ic_com"class="mb-3 form-control" type="text" placeholder="Nombre Profesional">
																								</div>
																								<div class="col-md-4">	
																									<input id="resp_ic_cont"name="resp_ic_cont" class="mb-3 form-control" type="text" placeholder="Email">
																								</div>
																								<div class="col-md-4">	
																									<input id="resp_ic_com"name="resp_ic_com"class="mb-3 form-control" type="text" placeholder="  Fecha Control(dd-mm-aaaa)">
																								</div>
																							</div>
																							<div class="form-group row">
																								<div class="col-md-12">
																									Lo Saluda Atte.     <!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																								</div>
																							</div>
																						</form>
																						<form>
																							<div class="form-group row my-2">
																								<div class="col-sm-12 text-center">
																									<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Respuesta en PDF</button>
																								</div>
																							</div>
																						</form>
																						<div class="modal-footer">
																							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																							<button type="button" class="btn btn-info">Guardar Respuesta</button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<script type="text/javascript">
																		function showContent() 
																		{
																			element = document.getElementById("content");
																			check = document.getElementById("check");
																			if (check.checked) {
																				element.style.display='block';
																			}
																			else {
																				element.style.display='none';
																			}
																		}
																	</script>
														</div>
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"   data-toggle="modal" data-target="#m_informe">INFORME MEDICO</button>
															</div>
														</div>
														<div id="m_informe" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_informeLabel" aria-hidden="true">
																	<div class="modal-dialog modal-lg" role="document">
																		<div class="modal-content ">
																				<div class="modal-header bg-info">
																					<h5 class="modal-title text-white" id="m_informeLabel" style="font-size: 1.3rem; color: #3366CC;">Informe Médico </h5>
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																					</button>
																				</div>
																				<div class="modal-body">	
																					<form>
																						<div class="form-group row">
																							<div class="col-md-6"><!--autocompletar-->
																								<input id="nom_pcte"name="nom_pcte" class="mb-3 form-control" type="text" placeholder="Nombre">
																							</div>
																							<div class="col-md-3"> 
																								<input id="rut_pcte"name="rut_pcte"class="mb-3 form-control" type="text" placeholder="Rut">
																							</div>
																							<div class="col-md-3"> 
																								<input id="ed_pcte"name="ed_pcte"class="mb-3 form-control" type="text" placeholder="Edad">
																							</div>
																						</div>
																						<div class="form-group row">
																							<div class="col-md-9">
																								<input id="dir_pcte"name="dir_pcte" class="mb-3 form-control" type="text" placeholder="Direccion">
																							</div> 
																							<div class="col-md-3">
																								<input id="hoy"name="hoy" class="mb-3 form-control" type="text" placeholder="fecha"><!-- hoy-->
																							</div> <!-- fin autocompletar-->
																						</div>
																						<div class="form-group row">
																							<div class="col-md-12">
																								<H6>El Profesional que suscribe informa que :</h6>
							                            
																							</div>																		
																						</div>				
																						<div class="form-group row">
																							<div class="col-md-12">
																							<textarea id"Informe" row="3" class="form-control" placeholder="Informe"></textarea>
							                            
																							</div>
																						</div>
																						<div class="form-group row">
																							<div class="col-md-12">
																								Lo Saluda Atte.    <!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																							</div>
																						</div>
																						<div class="form-group row my-2">
																							<div class="col-sm-12 text-center">
																								<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Informe en PDF</button>
																							</div>
																						</div>
                                               
																						<div class="modal-footer">
																							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																							<button type="button" class="btn btn-info">Guardar </button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																						</div>
																					</form>
																				</div>
																		</div>
																	</div>
														</div>

														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"   data-toggle="modal" href="#m_up" role="tab" aria-controls="up" aria-selected="false">USO PERSONAL</a></li>
															</div>
														</div>
														<div  id="m_up" class="modal fade" role="tabpanel" aria-labelledby="m_upLabel">
																	<div class="modal-dialog modal-lg">
																		<div class="modal-content">
																			<div class="modal-header bg-info">
																					<h5 class="modal-title text-white" id="m_upLabel" style="font-size: 1.3rem; color: #3366CC;">USO PERSONAL </h5>
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																					</button>
																			</div>										
																			<div class="modal-body">
																				<div class="form-group row">
																					<div class="col-md-10">			                                
																						<input class="mb-3 form-control" type="text" placeholder="DIRIGIDO A:">
																					</div>
																					<div class="col-md-8">			                                
																						<input class="mb-3 form-control" type="text" placeholder="CARGO">
																					</div>
																					<div class="col-md-6">			                                
																						<label class="mb-3 form-control">Presente </label>
																					</div>
																				</div>
																				<div class="form-group row">
																						<div class="col-md-12">			                                
																							<textarea class="form-control" id="progress-t-1" rows="3" spellcheck="true"></textarea>
																						</div>
																						<div class="col-md-12">			                                
																							<textarea class="form-control" id="progress-t-2" rows="3" spellcheck="true"></textarea>
																						</div>
																						<div class="col-md-12">			                                
																							<textarea class="form-control" id="progress-t-3" rows="3" spellcheck="true"></textarea>
																						</div>
																						<div class="col-md-12">			                                
																							<textarea class="form-control" id="progress-t-3" rows="3" spellcheck="true"></textarea>
																						</div>
																						<div class="col-md-12">			                                
																							<textarea class="form-control" id="progress-t-4" rows="3" spellcheck="true"></textarea>
																						</div>
																					</div>
															
																				<div class="form-group row">
																						<div class="col-md-12">
																							Lo Saluda Atte.   <!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																						</div>
																				</div>
																				<form>
																					<div class="form-group row my-2">
																						<div class="col-sm-12 text-center">
																							<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Respuesta en PDF</button>
																						</div>
																					</div>
																				</form>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																					<button type="button" class="btn btn-info">Guardar Respuesta</button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																				</div>
																													
																			</div>
																		</div>			
																	</div>
														</div>	
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<label class="modal-header bg-info" style="text-align:center;font-size: 1.3rem; color: white;">FORMULARIOS DE NOTIFICACIÓN</label>
												<hr>
												<div class="card text-center">
													<div class="card-body">
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"   data-toggle="modal" data-target="#m_ges">CONSTANCIA GES</button>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#m_eno">ENF.  NOT.OBLIGATORIA</button>
															</div>
														</div>
														<div id="m_eno" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_enoLabel" aria-hidden="true">
																<div class="modal-dialog modal-lg" role="document">
																		<div class="modal-content"><!--Acá va el encabezado de la identificación del profesional (nombre dir desde la consulta que emite el examen, tel ciudad etc.)-->
																		<div class="modal-header bg-info">
																			<h5 class="modal-title text-white" id="m_enoLabel" style="font-size: 1.3rem; color: #3366CC;">NOTIFICACIÓN ENFERMEDADES DE DECLARACIÓN OBLIGATORIA (ENO) </h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body" style="overflow: auto;max-height: 820px; width: 100%;">
																			</form>
																				<div class="card-body">
																					<div class="form-group row">
																						<div class="col-md-12"> 
																							<div class="dt-responsive table-responsive">
																								<table id="tabla_ENO" class="table table-striped table-bordered nowrap">
																									<tbody>
																											<tr>
																											<th colspan="2"> IDENTIFICACION DEL ESTABLECIMIENTO</th>
																											</tr>          	 																			                                         
																									</tbody>
																								</table>
																							</div>
																						</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="nom_estab" class="mb-3 form-control" type="text" placeholder="NOMBRE ESTABLECIMIENTO">
																							</div>
																							<div class="col-md-6">			                                
																								<input id="cod_est" class="mb-3 form-control" type="text" placeholder="CÓDIGO ESTABLECIMIENTO">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="n_of" class="mb-3 form-control" type="text" placeholder="NOMBRE OFICINA PROVINCIAL">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="cod_of" class="mb-3 form-control" type="text" placeholder="CÓDIGO OFICINA PROVINCIAL">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="num-fic" class="mb-3 form-control" type="text" placeholder="Nº de Ficha Clínica o Código Control"><!-- debe autorizar el paciente con código de verificación al médico para imprimir sino, pasa directamente a la tabla del servicio de salud-->
																							</div>
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">DATOS DE IDENTIFICACION DEL PACIENTE</th> <!-- autollenado-->
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="rut_pac" class="mb-3 form-control" type="text" placeholder="RUT">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="sex" class="mb-3 form-control" type="text" placeholder="SEXO">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="f_nac" class="mb-3 form-control" type="text" placeholder="FECHA DE NACIMIENTO">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="edad"  class="mb-3 form-control" type="text" placeholder="EDAD">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-5">
																								<input id="nom_pcte" class="mb-3 form-control" type="text" placeholder="NOMBRE ">
																							</div>
																							<div class="col-md-5">			                                
																								<input id="dir_pcte" class="mb-3 form-control" type="text" placeholder="DIRECCION">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="tel_pac" class="mb-3 form-control" type="text" placeholder="TELEFONO">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="reg_pcte" class="mb-3 form-control" type="text" placeholder="REGION">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="comuna_pcte" class="mb-3 form-control" type="text" placeholder="COMUNA">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="nac_pac"  class="mb-3 form-control" type="text" placeholder="NACIONALIDAD">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="cod_nac" class="mb-3 form-control" type="text" placeholder="COD-NACIONALIDAD">
																							</div>
																					</div><!--fin  autollenado-->
																					<div class="form-group row">
																							<div class="col-md-12" data-select2-id="60">                              
																							<select id="p_o" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
																								<optgroup>
																									<option value="S" data-select2-id="0">SELECCIONE PUEBLO ORIGINARIO </option>
																									<option value="AL" data-select2-id="1">Alacalufe (Kawashkar)</option>
																									<option value="AT" data-select2-id="2">Atacameño</option>
																									<option value="AY" data-select2-id="3">Aimara</option>
																									<option value="CO" data-select2-id="4">Colla</option>
																									<option value="DI" data-select2-id="5">Diaguita</option>
																									<option value="MA" data-select2-id="6">Mapuche</option>
																									<option value="QU" data-select2-id="7">Quechua</option>
																									<option value="RN" data-select2-id="8">Rapa Nui</option>
																									<option value="YA" data-select2-id="9">Yagán</option>
																									<option value="NI" data-select2-id="10">Ninguna</option>
																								</optgroup>
																							</select>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="prof_ofic" class="mb-3 form-control" type="text" placeholder="OCUPACION ">
																							</div>
																							<div class="col-md-4">
																								<select id="con_trab" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">SELECCIONE CONDICION</option>
																										<option value=" 0 "> Inactivo/a  </option>
																										<option value=" 1 "> 1 activo/a</option>
																									</optgroup>
																								</select>
																							</div>
																							<div class="col-md-4"> 
																								<select id="cat_trab" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">SELECCIONE CATEGORIA</option>
																										<option value="  "> Seleccione categoria </option>
																										<option value=" 1">  Patrón/Empresario </option>
																										<option value=" 2 "> Empleado</option>
																										<option value=" 3">  Obrero</option>
																										<option value=" 4 "> Trabajador independiente</option>
																									</optgroup>
																								</select>
																							</div>
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">DATOS CLINICOS DEL PACIENTE</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="con_dg" class="mb-3 form-control" type="text" placeholder="DIAGNOSTICO CONFIRMADO">
																							</div>
																							<div class="col-md-6">			                                
																								<input id="con_dgcie10" class="mb-3 form-control" type="text" placeholder="CIE-10">
																							</div>												
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">			                                
																								<input id="o_dg" class="mb-3 form-control" type="text" placeholder="OTRO DIAGN.CONF.(Solo si ant es TBC)">
																							</div>
																							<div class="col-md-6">			                                
																								<input id="o_dgcie10" class="mb-3 form-control" type="text" placeholder="CIE-10 (Segundo Diagnostico)">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-5">
																								<input id="fec-ps" class="mb-3 form-control" type="text" placeholder="FECHA PRIMEROS SINTOMAS(dd/mm/aaaa) ">
																							</div>
																							<div class="col-md-4">			                                
																								<select id="l_cont" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">PAIS DE CONTAGIO</option>
																										<option value=" 0 "> CHILE  </option>
																										<option value=" 1 "> EXTRANJERO</option>
																									</optgroup>
																								</select>
																							</div>
																							<div class="col-md-3">			                                
																								<input id="p_cont" class="mb-3 form-control" type="text" placeholder="PAIS">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">			                                
																								<h6>ANTECEDENTES DE VACUNACION</h6>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																							<select id="vac" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">SELECCIONE</option>
																										<option value=" 0 "> SI</option>
																										<option value=" 1 "> NO</option>
																										<option value=" 0 "> IGNORADO </option>
																										<option value=" 1 "> NO CORRESPONDE</option>
																									</optgroup>
																							</select>
																							</div>
																							<div class="col-md-5">			                                
																								<input id="vac_ud" class="mb-3 form-control" type="text" placeholder="FECHA ULTIMA DOSIS (dd/mm/aaaa)">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="vac_nd" class="mb-3 form-control" type="text" placeholder="NUMERO DE DOSIS">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">			                                
																								<h6>COMPLETAR SOLO SI LA DECLARACION CORRESPONDE A TBC</h6>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">			                                
																								<input id="tbc_tip" class=" form-control" type="text" placeholder="Solo para TBC(1= C.Nuevo; 2= Recaída)">
																							</div>
																							<div class="col-md-6">			                                
																								<input id="tbc_loc" class="mb-3 form-control" type="text" placeholder="RECAIDAS(1= Igual Localización; 2= Otra)">
																							</div>
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">DATOS DEL PROFESIONAL QUE NOTIFICA</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row"> <!-- autocompletar-->
																							<div class="col-md-3">
																								<input id="rut_medico" class="mb-3 form-control" type="text" placeholder="RUT">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="nombre_medico" class="mb-3 form-control" type="text" placeholder="NOMBRE">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="tel_medico" class="mb-3 form-control" type="text" placeholder="TELEFONO">
																							</div>
																							<div class="col-md-3">			                                
																								<input id="email_medico" class="mb-3 form-control" type="text" placeholder="EMAIL">
																							</div> <!--fin autocompletar-->
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">			                                
																								<h6>FECHA DE NOTIFICACION</h6><!-- hoy-->
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="f_not_est" class="mb-3 form-control" type="text" placeholder="NOTIFICACION AL ESTABLECIMIENTO(dd/mm/aaaa)"> <!-- al escritorio de recetaonline institución-->
																							</div>
																							<div class="col-md-6">			                                
																								<input id="f_not_minsal" class="mb-3 form-control" type="text" placeholder="NOTIFICACION SEREMI A MINSAL(dd/mm/aaaa)"><!-- al escritorio de recetaonline MINSAL-->
																							</div>							
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">
																							<H5>INSTRUCTIVO BOLETIN NOTIFICACIÓN DE ENFERMEDADES DE DECLARACIÓN OBLIGATORIA (BOLETÍN E.N.O.)</H5>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">
																								<p style="border: 1px solid #808080; background-color: #F5F5F5;padding:45px">
																								1.Los Items <strong>Nombre Establecimiento</strong>;<strong>Oficina Provincial</strong>;<strong>Codigos Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo originario declarado</strong>;<strong> Comuna de residencia</strong>, etc. <a href="https://deis.minsal.cl"> Los puede Consultar aca </a><br>
																								2.Para el(la) enfermo(a) que presente 2 o más afecciones de declaración obligatoria, éstas deberán ser registradas en <span class="auto-style1"><strong>FORMULARIOS SEPARADOS</strong></span> para
																								cada una. Sólo en caso de Tuberculosis se registrará en la 2da. línea otro diagnóstico relacionado con esta afección.
																								</p>
																							</div>
																					</div>
																
																				</div>		
																			</form>
																		</div>
																		<form>
																			<div class="form-group row my-2">
																				<div class="col-sm-12 text-center">
																					<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Documento en PDF</button>
																				</div>
																			</div>
																		</form>
                                                
																		<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																		<button type="button" class="btn btn-info">Guardar </button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																		</div>
																</div>
														</div>
													
														<div id="m_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_gesLabel" style="display: none;" aria-hidden="true">
																<div class="modal-dialog modal-lg" role="document">
																	<div class="modal-content"><!--Acá va el encabezado de la identificación del profesional (nombre dir desde la consulta que emite el examen, tel ciudad etc.)-->
																		<div class="modal-header bg-info">
																			<h5 class="modal-title text-white" id="m_gesLabel" style="font-size: 1.3rem; color: #3366CC;">INFORMACION AL PACIENTE GES </h5>
																			<h6 class="modal-title text-white" id="m_ges" style="font-size: 1.3rem; color: #3366CC;text-align:center"><br />( Articulo 24 Ley 19.966 ) </h6>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body" style="overflow: auto;max-height: 820px; width: 100%;">
																			<form>
																				<div class="form-group row">
																					<div class="col-md-12"> 
																						<div class="dt-responsive table-responsive">
																							<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																								<tbody>
																									<tr>
																									<th colspan="2">DATOS DEL PRESTADOR</th>
																									</tr>
																									<tr>			                                       
																									<th>Nombre Institucion</th>
																									<td><input id="nom_inst" name="nom_inst" class="mb-3 form-control" type="text" placeholder="Nombre Institución(desde donde se emite)"></td>	<!--(autollenado)-->			                                       
																									</tr>
																									<tr>			                                       
																										<th>Direccion</th>
																										<td><input id="dir_inst" name="dir_inst" class="mb-3 form-control" type="text" placeholder="Dirección Institución(desde donde se emite)"></td>	<!--(autollenado)-->		                                       
																									</tr>
																									<tr>			                                       
																										<th>Nombre del responsable</th>
																										<td><input id="n_prof" name="n_prof" class="mb-3 form-control" type="text" placeholder="Nombre Profesional"></td>	<!--(autollenado)-->	                                       
																									</tr>
																									<tr>			                                       
																										<th>Rut Responsable</th>
																										<td><input id="rut_resp" name="rut_prof" class="mb-3 form-control" type="text" placeholder="Rut Profesional"></td>	<!--(autollenado)-->		                                       
																									</tr>																			                                         
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-12"> 
																						<div class="dt-responsive table-responsive">
																							<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																								<tbody>
																									<tr>
																									<th colspan="2">DATOS DEL PACIENTE</th>
																									</tr>
																									<tr>			                                       
																									<th>Nombre </th>
																									<td><input id="n_pcte" name="n_pcte" class="mb-3 form-control" type="text" placeholder="Nombre"></td>		<!--(autollenado)-->	                                       
																									</tr>
																									<tr>			                                       
																										<th>Rut</th>
																										<td><input id="rut_pcte" name="rut_pcte" class="mb-3 form-control" type="text" placeholder="Rut"></td>	<!--(autollenado)-->		                                       
																									</tr>
																									<tr>			                                       
																										<th>Prevision</th>
																										<td><input id="prev_pcte" name="prev_pcte" class="mb-3 form-control" type="text" placeholder="Previsión"></td>	<!--(autollenado)-->		                                       
																									</tr>
																									<tr>			                                       
																										<th>Direccion</th>
																										<td><input id="dir_pcte" name="dir_pcte" class="mb-3 form-control" type="text" placeholder="Dirección"></td>	<!--(autollenado)-->		                                       
																									</tr>
																									<tr>			                                       
																										<th>Telefono de Contacto</th>
																										<td><input id="tel_pcte" name="tel_pcte" class="mb-3 form-control" type="text" placeholder="Teléfono"></td>		 <!--(autollenado)-->                                      
																									</tr>
																									<tr>			                                       
																										<th>Email</th>
																										<td><input id="email_pcte" name="email_pcte" class="mb-3 form-control" type="text" placeholder="Email"></td>	<!--(autollenado)-->		                                       
																									</tr>			                                         
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-12"> 
																						<div class="dt-responsive table-responsive">
																							<table id="tabla_mis_recetas" class="table table-striped table-bordered nowrap">
																								<tbody>
																										<tr>
																										<th colspan="2">INFORMACION MEDICA</th>
																										</tr>		                                         
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-10">
																						<input class="mb-4 form-control" type="text" placeholder="Confirmacion Diagnostica GES">
																						<input class="mb-4 form-control" type="text" placeholder="¿Confirmacion Diagnostica? ">
																						<input class="mb-4 form-control" type="text" placeholder="¿Paciente en tratamiento?">
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-12">
																						<H5>NOTIFICACION</H5>
																					</div>
																					<div class="col-md-6">			                                
																						<label>Fecha y hora de Notificacion:</label> <!--Hoy-->
																					</div>
																					<div class="col-md-6">			                                
																						<input class="form-control" type="text" />
																					</div>
																				</div>									
																				<div class="form-group row">
																					<div class="col-md-12"> 
																						<div class="dt-responsive table-responsive">
																							<table id="CONS" class="table table-striped table-bordered nowrap">
																								<tbody>
																									<tr>
																									<th colspan="2">CONSTANCIA</th>
																									</tr>		                                         
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-12">
																						<label class="control-label" for="leyenda" style="border: 1px solid #999999; padding: 25px">
																							Declaro que, con esta fecha y hora, he tomado
																							conocimiento que tengo derecho a acceder a las
																							“Garantías Explícitas en Salud”, GES, siempre que la
																							atención sea otorgada en la “Red de Prestadores” que
																							me corresponde según Fonasa o la Isapre, a la que me
																							encuentro adscrito.
																						</label>             
																					</div>
																				</div>
																				<div class="form-group row">
																					<div class="col-md-10">
																						<p><!--Firma digital, certificado de comprobación del certificado y código QR--></p>
																					</div>
																				</div>			
																			</form>
																			<form>
																				<div class="form-group row my-2">
																					<div class="col-sm-12 text-center">
																						<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Documento en PDF</button>
																					</div>
																				</div>
																			</form>
                                                
																			<div class="modal-footer">
																				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button><!--(ojo modal de codigo verificación )--><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																				<button type="button" class="btn btn-info">Guardar </button> <!--(va a recetaonline escritorio de pcte y al email del paciente)--><!--(copia a dir de salud?? y al email de dir de salud??)-->
																			</div>
																		</div>
																	</div>										
																</div>
														</div>
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#m_gastos_med">REEMBOLSO MEDICOS</button>
															</div>
														</div>
														<div class="row">
																<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																	<button type="button" class="btn btn-secondary "style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#m_gastos_dent"> REEMBOLSO  DENTALES</button>
																</div>
														</div>
														<div id="m_gastos_dent" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_gastos_dentLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg" role="document">
																<div class="modal-content ">
																	<div class="modal-header bg-info">
																		<h5 class="modal-title text-white" id="m_gastos_dentLabel" style="font-size: 1.3rem; color: #3366CC;">FORMULARIO DE REEMBOLSO GASTOS DENTALES</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body" style="overflow: auto;max-height: 820px; width: 100%;">
																		<form id="tabla_gastos dent">
																				<div class="card-body">
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="tabla_gastos dent" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">DATOS DE IDENTIFICACION DEL ASEGURADO O CARGA</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="aseguradora" class="mb-3 form-control" type="text" placeholder="Aseguradora">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="num_poliza" class="mb-3 form-control" type="text" placeholder="Nª Poliza">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="emp_asoc" class="mb-3 form-control" type="text" placeholder="Empresa Asociada">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="Nomb_aseg"  class="mb-3 form-control" type="text" placeholder="Nombre Asegurado">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="rut_aseg"  class="mb-3 form-control" type="text" placeholder="Rut Asegurado">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="prevision" class="mb-3 form-control" type="text" placeholder="Previsión">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="nom_pcte" class="mb-3 form-control" type="text" placeholder="Nombre Paciente"> <!-- autollenado-->
																							</div>
																							<div class="col-md-2">			                                
																								<input id="t_carga" class="mb-3 form-control" type="text" placeholder="Tipo de Carga">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="edad" class="mb-3 form-control" type="text" placeholder="Edad"><!-- autollenado-->
																							</div>
																							<div class="col-md-2">			                                
																								<input  id="n_carga" class="mb-3 form-control" type="text" placeholder="Nº Carga">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12"> 
																								<div class="dt-responsive table-responsive">
																									<table id="tabla_seguro_dent" class="table table-striped table-bordered nowrap">
																										<tbody>
																												<tr>
																												<th colspan="2">CAUSA DE LA SOLICITUD</th>
																												</tr>          	 																			                                         
																										</tbody>
																									</table>
																								</div>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<select id="t_solic" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="10" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">SELECCIONE CAUSA</option>
																										<option value="1"> Accidente</option>
																										<option value="2"> Continuidad de Tratamiento</option>
																										<option value="3"> Enfermedad</option>
																										<option value="4"> Embarazo</option>
																										<option value="5"> Otro</option>
																									</optgroup>
																								</select>
																							</div>
																							<div class="col-md-6">			                                
																								<input id="otro" class="mb-3 form-control" type="text" placeholder="Especifíque Otro">
																							</div>																	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">			                                
																								<input id="dg" class="mb-3 form-control" type="text" placeholder="Diagnóstico">
																							</div>	
																							<div class="col-md-6">			                                
																								<select id="cont_tto" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">¿Continuidad de Tratamiento?</option>
																										<option value="1"> Si</option>
																										<option value="2"> No</option>
																									</optgroup>
																								</select>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">			                                
																								<input id="f_acc" class="mb-3 form-control" type="text" placeholder="F. Accidente (dd/mm/aaaa)">
																							</div>	
																							<div class="col-md-6">			                                
																								<select id="l_acc" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">Lugar del accidente</option>
																										<option value="1"> Vía Pública</option>
																										<option value="2"> Hogar</option>
																										<option value="3"> Trayecto al trabajo</option>
																										<option value="4"> Trayecto al Hogar</option>
																										<option value="5"> Trabajo</option>
																										<option value="5"> Tránsito</option>
																									</optgroup>
																								</select>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">
																								<p style="border: 1px solid #666666; padding: 20px; margin: 3px; color:#666666; font-family: Arial; font-size: small;">
																									Por este medio certifico que los datos aportados son verdaderos y autorizo al médico tratante hospitales o cualquier otra institución de salud , para que suministre la información requerida de mi persona o beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del código Sanitario declaro también conocer y autorizar a que todos los antecedentes en esta solicitud de reembolso serán del conocimiento de las diferentes personas que participan en la evaluación, liquidación y traslado de la misma , por lo que libero a la compañía aseguradora de toda responsabilidad en el manejo de la misma.
																									En el caso de requerir confidencialidad, rogamos enviar en sobre cerrado al departamento de salud con el rotulo de confidencial.
																									Recuerde que en el caso de accidente del tránsito, <span class="auto-style2"><strong>deberá presentar la liquidación del seguro obligatorio de accidentes personales</strong></span>.
																								</p>
																							</div>									
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">ANTECEDENTES DEL REEMBOLSO</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="f_pres" class="mb-3 form-control" type="text" placeholder="F. Presentación(dd/mm/aaaa)"><!-- -->
																							</div>
																							<div class="col-md-4">			                                
																								<input id="n_bonos" class="mb-3 form-control" type="text" placeholder="Bonos">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="t_doc" class="mb-3 form-control" type="text" placeholder="Total de Documentos">
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="boletas" class="mb-3 form-control" type="text" placeholder="Boletas">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="recetas" class="mb-3 form-control" type="text" placeholder="Recetas">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="dif_rec" class="mb-3 form-control" type="text" placeholder="Diferencia Reclamada">
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="otros_rec" class="mb-3 form-control" type="text" placeholder="Otros">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="n_rec" class="mb-3 form-control" type="text" placeholder="Nº Reclamo">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="f_ing" class="mb-3 form-control" type="text" placeholder="F.de Ingreso(dd/mm/aaaa)">
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="otros_1" class="mb-3 form-control" type="text" placeholder="Otros">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="rec_ant" class="mb-3 form-control" type="text" placeholder="Reclamo Anterior">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="aut_usuario" class="mb-3 form-control" type="text" placeholder="Autorización del Usuario"><!--cod_verificación-->
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12"> 
																								<div class="dt-responsive table-responsive">
																									<table id="tabla_seguros_dent" class="table table-striped table-bordered nowrap">
																										<tbody>
																												<tr>
																												<th colspan="2">INFORME MEDICO TRATANTE</th>
																												</tr>          	 																			                                         
																										</tbody>
																									</table>
																								</div>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="f_com" class="mb-3 form-control" type="text" placeholder="F.de Comienzo Enfermedad(dd/mm/aaaa)">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="f_cons1" class="mb-3 form-control" type="text" placeholder="F. de Primera Consulta(dd/mm/aaaa)">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="f_cons" class="mb-3 form-control" type="text" placeholder="F. de Consulta(dd/mm/aaaa)">
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="nomb_pcte" class="mb-3 form-control" type="text" placeholder="Nombre del Paciente"><!-- autollenado-->
																							</div>
																							<div class="col-md-2">			                                
																								<input id="edad"  class="mb-3 form-control" type="text" placeholder="Edad"><!-- autollenado-->
																							</div>
																							<div class="col-md-6">			                                
																								<input id="dir" class="mb-3 form-control" type="text" placeholder="Dirección"><!-- autollenado-->
																							</div>	
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="dg" class="mb-3 form-control" type="text" placeholder="Diagnóstico"><!-- autollenado-->
																							</div>
																							<div class="col-md-6">			                                
																								<select id="dg_cont" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="12" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">¿Control?</option>
																										<option value="1"> Si</option>
																										<option value="2"> No</option>
																									</optgroup>
																								</select>
																							</div>	
																					</div>						
																					<div class="form-group row">
																							<div class="col-md-4">			                                
																								<select id="acc" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="15" tabindex="-1" aria-hidden="true">
																									<optgroup>
																										<option value="S" data-select2-id="0">¿Accidente?</option>
																										<option value="1"> Si</option>
																										<option value="2"> No</option>
																										<option value="3"> Otro</option>
																									</optgroup>
																								</select>
																							</div>	
																							<div class="col-md-4">			                                
																								<input id="fec_acc" class="mb-3 form-control" type="text" placeholder="F. de Accidente(dd/mm/aaaa)">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="t_acc" class="mb-3 form-control" type="text" placeholder="Tipo Acc.">
																							</div>
																							<div class="col-md-10">	
																							<input id="l_acc" class="mb-3 form-control" type="text" placeholder="Lugar del Accidente">
																							</div>
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">TRATAMIENTOS DENTALES</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="t_p1" class="mb-3 form-control" type="text" placeholder="Prestación">
																							</div>
																							<div class="col-md-1">			                                
																								<input id="p_num" class="mb-3 form-control" type="text" placeholder="P Nº">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="cant1" class="mb-3 form-control" type="text" placeholder="Cant">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="fech_1" class="mb-3 form-control" type="text" placeholder="Fecha">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="val_unit1" class="mb-3 form-control" type="text" placeholder="Valor Unit">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="total1" class="mb-3 form-control" type="text" placeholder="Total">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="t_p2" class="mb-3 form-control" type="text" placeholder="Prestación">
																							</div>
																							<div class="col-md-1">			                                
																								<input id="p_num" class="mb-3 form-control" type="text" placeholder="P Nº">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="cant2" class="mb-3 form-control" type="text" placeholder="Cant">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="fech_2" class="mb-3 form-control" type="text" placeholder="Fecha">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="val_unit2" class="mb-3 form-control" type="text" placeholder="Valor Unit">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="total2" class="mb-3 form-control" type="text" placeholder="Total">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="t_p3" class="mb-3 form-control" type="text" placeholder="Prestación">
																							</div>
																							<div class="col-md-1">			                                
																								<input id="p_num" class="mb-3 form-control" type="text" placeholder="P Nº">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="cant3" class="mb-3 form-control" type="text" placeholder="Cant">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="fech_3" class="mb-3 form-control" type="text" placeholder="Fecha">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="val_unit3" class="mb-3 form-control" type="text" placeholder="Valor Unit">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="total3" class="mb-3 form-control" type="text" placeholder="Total">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="t_p4" class="mb-3 form-control" type="text" placeholder="Prestación">
																							</div>
																							<div class="col-md-1">			                                
																								<input id="p_num" class="mb-3 form-control" type="text" placeholder="P Nº">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="cant4" class="mb-3 form-control" type="text" placeholder="Cant">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="fech_4" class="mb-3 form-control" type="text" placeholder="Fecha">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="val_unit4" class="mb-3 form-control" type="text" placeholder="Valor Unit">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="total4" class="mb-3 form-control" type="text" placeholder="Total">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="t_p5" class="mb-3 form-control" type="text" placeholder="Prestación">
																							</div>
																							<div class="col-md-1">			                                
																								<input id="p_num" class="mb-3 form-control" type="text" placeholder="P Nº">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="cant5" class="mb-3 form-control" type="text" placeholder="Cant">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="fech_15" class="mb-3 form-control" type="text" placeholder="Fecha">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="val_unit5" class="mb-3 form-control" type="text" placeholder="Valor Unit">
																							</div>
																							<div class="col-md-2">			                                
																								<input id="total5" class="mb-3 form-control" type="text" placeholder="Total">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="lab" class="mb-3 form-control" type="text" placeholder="Laboratorio">
																							</div>
																							<div class="col-md-6">
																								<input id="lab" class="mb-3 form-control" type="text" placeholder="Val.Total Reclamo">
																							</div>
																					</div>
																					<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">ORTODONCIA</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="t_apar" class="mb-3 form-control" type="text" placeholder="Tipo de Aparato">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="f_inst" class="mb-3 form-control" type="text" placeholder="F.Instalación">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="f_cont" class="mb-3 form-control" type="text" placeholder="F. 1º Control">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-4">
																								<input id="dur_tto" class="mb-3 form-control" type="text" placeholder="Duración del Tto.">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="valor_ap" class="mb-3 form-control" type="text" placeholder="Valor Clínico Aparato">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="valor_cont" class="mb-3 form-control" type="text" placeholder="Valor Clínico Controles">
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12"> 
																								<div class="dt-responsive table-responsive">
																									<table id="" class="table table-striped table-bordered nowrap">
																										<tbody>
																												<tr>
																												<th colspan="2">DATOS DEL PROFESIONAL TRATANTE</th>
																												</tr>          	 																			                                         
																										</tbody>
																									</table>
																								</div>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-3">
																								<input id="" class="mb-3 form-control" type="text" placeholder="RUT"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id=""  class="mb-3 form-control" type="text" placeholder="NOMBRE"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id="" class="mb-3 form-control" type="text" placeholder="TELEFONO"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id="" class="mb-3 form-control" type="text" placeholder="EMAIL"><!-- autollenado-->
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-12">			                                
																								<h6>FECHA DEL INFORME</h6>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																								<input id="fecha_inf" class="mb-3 form-control" type="text" placeholder="FECHA(dd/mm/aaaa)"><!--hoy-->
																							</div>															
																					</div>
																					<div class="form-group row">
																							<div class="col-md-6">
																									<!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																							</div>	
																					</div>	
																					<div class="form-group row">
																						<div class="form-group row my-2">
																							<div class="col-sm-12 text-center">
																								<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Formulario PDF</button>
																							</div>
																						</div>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																						<button type="button" class="btn btn-info">Guardar </button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																					</div>
																				</div>	
																		</form>
																	</div>
																</div>
															</div>
														</div>
														<div id="m_gastos_med" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_gastos_medLabel" aria-hidden="true">
															<div class="modal-dialog modal-lg" role="document">
																<div class="modal-content">
																	<div class="modal-header bg-info">
																		<h5 class="modal-title text-white" id="m_gastos_medLabel" style="font-size: 1.3rem; color: #3366CC;">FORMULARIO DE REEMBOLSO GASTOS MÉDICOS</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body" style="overflow: auto;max-height: 820px; width: 100%;">
																		<div class="card-body">
																				<form id="tabla_gastos med">
																						<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">DATOS DE IDENTIFICACION DEL ASEGURADO O CARGA</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																						</div>
																						<div class="form-group row">
																							<div class="col-md-4">
																								<input id="aseguradora" class="mb-3 form-control" type="text" placeholder="Aseguradora">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="num_poliza" class="mb-3 form-control" type="text" placeholder="Nª Poliza">
																							</div>
																							<div class="col-md-4">			                                
																								<input id="emp_asoc" class="mb-3 form-control" type="text" placeholder="Empresa Asociada">
																							</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="Nomb_aseg"  class="mb-3 form-control" type="text" placeholder="Nombre Asegurado">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="rut_aseg"  class="mb-3 form-control" type="text" placeholder="Rut Asegurado">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="prevision" class="mb-3 form-control" type="text" placeholder="Previsión">
																								</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<input id="nom_pcte" class="mb-3 form-control" type="text" placeholder="Nombre Paciente"> <!-- autollenado-->
																								</div>
																								<div class="col-md-2">			                                
																									<input id="t_carga" class="mb-3 form-control" type="text" placeholder="Tipo de Carga">
																								</div>
																								<div class="col-md-2">			                                
																									<input id="edad" class="mb-3 form-control" type="text" placeholder="Edad"><!-- autollenado-->
																								</div>
																								<div class="col-md-2">			                                
																									<input  id="n_carga" class="mb-3 form-control" type="text" placeholder="Nº Carga">
																								</div>
																						</div>
																						<div class="form-group row">
																							<div class="col-md-12"> 
																								<div class="dt-responsive table-responsive">
																									<table id="tabla_seguro_dent" class="table table-striped table-bordered nowrap">
																										<tbody>
																												<tr>
																												<th colspan="2">CAUSA DE LA SOLICITUD</th>
																												</tr>          	 																			                                         
																										</tbody>
																									</table>
																								</div>
																							</div>
																					    </div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<select id="t_solic" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="10" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">SELECCIONE CAUSA</option>
																											<option value="1"> Accidente</option>
																											<option value="2"> Continuidad de Tratamiento</option>
																											<option value="3"> Enfermedad</option>
																											<option value="4"> Embarazo</option>
																											<option value="5"> Otro</option>
																										</optgroup>
																									</select>
																								</div>
																								<div class="col-md-6">			                                
																									<input id="otro" class="mb-3 form-control" type="text" placeholder="Especifíque Otro">
																								</div>																	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">			                                
																									<input id="dg" class="mb-3 form-control" type="text" placeholder="Diagnóstico">
																								</div>	
																								<div class="col-md-6">			                                
																									<select id="cont_tto" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">¿Continuidad de Tratamiento?</option>
																											<option value="1"> Si</option>
																											<option value="2"> No</option>
																										</optgroup>
																									</select>
																								</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">			                                
																									<input id="f_acc" class="mb-3 form-control" type="text" placeholder="F. Accidente (dd/mm/aaaa)">
																								</div>	
																								<div class="col-md-6">			                                
																									<select id="l_acc" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">Lugar del accidente</option>
																											<option value="1"> Vía Pública</option>
																											<option value="2"> Hogar</option>
																											<option value="3"> Trayecto al trabajo</option>
																											<option value="4"> Trayecto al Hogar</option>
																											<option value="5"> Trabajo</option>
																											<option value="5"> Tránsito</option>
																										</optgroup>
																									</select>
																								</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-12">
																									<p style="border: 1px solid #666666; padding: 20px; margin: 3px; color:#666666; font-family: Arial; font-size: small;">
																										Por este medio certifico que los datos aportados son verdaderos y autorizo al médico tratante hospitales o cualquier otra institución de salud , para que suministre la información requerida de mi persona o beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del código Sanitario declaro también conocer y autorizar a que todos los antecedentes en esta solicitud de reembolso serán del conocimiento de las diferentes personas que participan en la evaluación, liquidación y traslado de la misma , por lo que libero a la compañía aseguradora de toda responsabilidad en el manejo de la misma.
																										En el caso de requerir confidencialidad, rogamos enviar en sobre cerrado al departamento de salud con el rotulo de confidencial.
																										Recuerde que en el caso de accidente del tránsito, <span class="auto-style2"><strong>deberá presentar la liquidación del seguro obligatorio de accidentes personales</strong></span>.
																									</p>
																								</div>									
																						</div>
																						<div class="form-group row">
																									<div class="col-md-12"> 
																										<div class="dt-responsive table-responsive">
																											<table id="" class="table table-striped table-bordered nowrap">
																												<tbody>
																														<tr>
																														<th colspan="2">ANTECEDENTES DEL REEMBOLSO</th>
																														</tr>          	 																			                                         
																												</tbody>
																											</table>
																										</div>
																									</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="f_pres" class="mb-3 form-control" type="text" placeholder="F. Presentación(dd/mm/aaaa)"><!-- -->
																								</div>
																								<div class="col-md-4">			                                
																									<input id="n_bonos" class="mb-3 form-control" type="text" placeholder="Bonos">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="t_doc" class="mb-3 form-control" type="text" placeholder="Total de Documentos">
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="boletas" class="mb-3 form-control" type="text" placeholder="Boletas">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="recetas" class="mb-3 form-control" type="text" placeholder="Recetas">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="dif_rec" class="mb-3 form-control" type="text" placeholder="Diferencia Reclamada">
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="otros_rec" class="mb-3 form-control" type="text" placeholder="Otros">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="n_rec" class="mb-3 form-control" type="text" placeholder="Nº Reclamo">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="f_ing" class="mb-3 form-control" type="text" placeholder="F. de Ingreso(dd/mm/aaaa)">
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="otros_1" class="mb-3 form-control" type="text" placeholder="Otros">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="rec_ant" class="mb-3 form-control" type="text" placeholder="Reclamo Anterior">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="aut_usuario" class="mb-3 form-control" type="text" placeholder="Autorización del Usuario"><!--cod_verificación-->
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-12"> 
																									<div class="dt-responsive table-responsive">
																										<table id="tabla_seguros_dent" class="table table-striped table-bordered nowrap">
																											<tbody>
																													<tr>
																													<th colspan="2">INFORME MEDICO TRATANTE</th>
																													</tr>          	 																			                                         
																											</tbody>
																										</table>
																									</div>
																								</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="f_com_enf" class="mb-3 form-control" type="text" placeholder="F. Comienzo Enfermedad(dd/mm/aaaa)">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="f_prim_cons" class="mb-3 form-control" type="text" placeholder="F. Primera Consulta(dd/mm/aaaa)">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="F_cons" class="mb-3 form-control" type="text" placeholder="F. Consulta(dd/mm/aaaa)">
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">
																									<input id="n_pcte" class="mb-3 form-control" type="text" placeholder="Nombre del Paciente"><!--autollenado-->
																								</div>
																								<div class="col-md-2">			                                
																									<input id="ed_pcte" class="mb-3 form-control" type="text" placeholder="Edad"><!--autollenado-->
																								</div>
																								<div class="col-md-6">			                                
																									<input id="dir_pcte" class="mb-3 form-control" type="text" placeholder="Dirección"><!--autollenado-->
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<input id="dg" class="mb-3 form-control" type="text" placeholder="Diagnóstico"><!--autollenado-->
																								</div>
																								<div class="col-md-6">			                                
																									<select id="cont" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="12" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">¿Control?</option>
																											<option value="1"> Si</option>
																											<option value="2"> No</option>
																										</optgroup>
																									</select>
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<select id="emb" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="13" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">Embarazo</option>
																											<option value="1"> Si</option>
																											<option value="2"> No</option>
																											<option value="3"> Otro</option>
																										</optgroup>
																									</select>
																								</div>	
																								<div class="col-md-6">
																									<select id="n_sem" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="12" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">Nº Semanas</option>
																											<option value="1"> 1</option>
																											<option value="2"> 2</option>
																											<option value="3"> 3</option>
																											<option value="4"> 4</option>
																											<option value="5"> 5</option>
																											<option value="6"> 6</option>
																											<option value="7"> 7</option>
																											<option value="8"> 8</option>
																											<option value="9"> 9</option>
																											<option value="10">10</option>
																											<option value="11">11</option>
																											<option value="12">12</option>
																											<option value="13">13</option>
																											<option value="14">14</option>
																											<option value="15">15</option>
																											<option value="16">16</option>
																											<option value="17">17</option>
																											<option value="18">18</option>
																											<option value="19">19</option>
																											<option value="20">20</option>
																											<option value="21">21</option>
																											<option value="22">22</option>
																											<option value="23">23</option>
																											<option value="24">24</option>
																											<option value="25">25</option>
																											<option value="26">26</option>
																											<option value="27">27</option>
																											<option value="28">28</option>
																											<option value="29">29</option>
																											<option value="30">30</option>
																											<option value="31">31</option>
																											<option value="32">32</option>
																											<option value="34">34</option>
																											<option value="35">35</option>
																											<option value="36">36</option>
																											<option value="37">37</option>
																											<option value="38">38</option>
																											<option value="39">39</option>
																											<option value="40">40</option>
																											<option value="41">Más</option>												
																										</optgroup>
																									</select>
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<input id="fur" class="mb-3 form-control" type="text" placeholder="Fur(dd/mm/aaaa)">
																								</div>				                                		                                
																								<div class="col-md-6">			                                
																									<select id="comp_emb" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="14" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">¿Complicación Embarazo?</option>
																											<option value="1"> Si</option>
																											<option value="2"> No</option>
																											<option value="3"> Otro</option>
																										</optgroup>
																									</select>
																								</div>	
																						</div>
																						<div class="form-group row">
																								<div class="col-md-4">			                                
																									<select id="acc" class="js-example-basic-single form-control select2-hidden-accessible" data-select2-id="15" tabindex="-1" aria-hidden="true">
																										<optgroup>
																											<option value="S" data-select2-id="0">¿Accidente?</option>
																											<option value="1"> Si</option>
																											<option value="2"> No</option>
																											<option value="3"> Otro</option>
																										</optgroup>
																									</select>
																								</div>	
																								<div class="col-md-4">			                                
																									<input id="f_acc" class="mb-3 form-control" type="text" placeholder="F. Accidente(dd/mm/aaaa)">
																								</div>
																								<div class="col-md-4">			                                
																									<input id="t_acc" class="mb-3 form-control" type="text" placeholder="Tipo Acc.">
																								</div>
																								<div class="col-md-10">	
																								<input id="l_acc" class="mb-3 form-control" type="text" placeholder="Lugar del Accidente">
																								</div>
																						</div>
																						<div class="form-group row">
																									<div class="col-md-12"> 
																										<div class="dt-responsive table-responsive">
																											<table id="" class="table table-striped table-bordered nowrap">
																												<tbody>
																														<tr>
																														<th colspan="2">DATOS DEL PROFESIONAL TRATANTE</th>
																														</tr>          	 																			                                         
																												</tbody>
																											</table>
																										</div>
																									</div>
																						</div>
																						<div class="form-group row">
																							<div class="col-md-3">
																								<input id="" class="mb-3 form-control" type="text" placeholder="RUT"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id=""  class="mb-3 form-control" type="text" placeholder="NOMBRE"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id="" class="mb-3 form-control" type="text" placeholder="TELEFONO"><!-- autollenado-->
																							</div>
																							<div class="col-md-3">			                                
																								<input id="" class="mb-3 form-control" type="text" placeholder="EMAIL"><!-- autollenado-->
																							</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-12">			                                
																									<h6>FECHA DEL INFORME</h6>
																								</div>
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																									<input id="fecha_inf" class="mb-3 form-control" type="text" placeholder="FECHA"><!--hoy-->
																								</div>															
																						</div>
																						<div class="form-group row">
																								<div class="col-md-6">
																										<!--  firma digital     certificado de comprobacion del certificado y codigo QR-->
																								</div>	
																						</div>	
																						<div class="form-group row">
																							<div class="form-group row my-2">
																								<div class="col-sm-12 text-center">
																									<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Formulario PDF</button>
																								</div>
																							</div>
																						</div
																						<div class="modal-footer">
																							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																							<button type="button" class="btn btn-info">Guardar </button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
																						</div>
																				</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>											 
								</div>
					</div>
				</div>
													
															
				<div id="pills-_form_consent"  class="tab-pane fade"  role="tabpanel" aria-labelledby="pills-_form_consent-tab" >
						<div class="card-body">
								<div class="row">
									<div class="col-xl-12">
										<div class="row">
											<div class="col-sm-12 col-md-6">
																					
												<div class="card text-center">
													<label class="modal-header bg-info" style="text-align:center;font-size: 1.3rem; color: white;">CONSENTIMIENTOS INFORMADOS GENERALES</label>
													<hr>
													<div class="card-body">
																							
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"   data-toggle="modal" data-target="#m_consent_anest">ANESTÉSIA</button>
															</div>
														</div>
														
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#m_consent_procgo">PROCEDIMIENTOS </button>
															</div>
														</div>
														
																					
													</div>
												</div>
											</div>
											<div class="col-sm-12 col-md-6">
												<div class="card text-center">
												<label class="modal-header bg-info" style="text-align:center;font-size: 1.3rem; color: white;">CONSENTIMIENTOS INFORMADOS ESPECIALIDAD </label>
												<hr>
																					
													<div class="card-body">
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary" style="width:95%;max-width:350px;tex-align:left" data-toggle="modal" data-target="#m_consent_fetal">OTRO</button>
															</div>
														</div>
																			                  
														<div class="row">
															<div class="col-md-12" style="background-color:white;padding:5px 5px 5px 10px">
																<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left"  data-toggle="modal" data-target="#interconsulta">OTROS</button>
															</div>
														</div>
														
																							
																					
													</div>
												</div>
											</div>
										</div>
									</div>											 
								</div>
						</div>
						<div id="m_consent_anest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consentLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content ">
										<div class="modal-header bg-info">
											<h5 class="modal-title text-white" id="m_consentLabel" style="font-size: 1.3rem; color: #3366CC;">CONSENTIMIENTO INFORMADO ANESTÉSIA </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">	
											<form> 
												<div class="form-group row">
													<div class="col-md-6"><!--autocompletar-->
														<input id="nom_pcte"name="nom_pcte" class="mb-3 form-control" type="text" placeholder="Nombre">
													</div>
													<div class="col-md-3"> 
														<input id="rut_pcte"name="rut_pcte"class="mb-3 form-control" type="text" placeholder="Rut">
													</div>
													<div class="col-md-3"> 
														<input id="ed_pcte"name="ed_pcte"class="mb-3 form-control" type="text" placeholder="Edad">
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-9">
														<input id="dir_pcte"name="dir_pcte" class="mb-3 form-control" type="text" placeholder="Direccion">
													</div> 
													<div class="col-md-3">
														<input id="hoy"name="hoy" class="mb-3 form-control" type="text" placeholder="fecha"><!-- hoy-->
													</div> <!-- fin autocompletar-->
												</div>
												<div class="form-group row">
													<div class="col-md-12">
														<H6>En representación de:</h6>
														<input id="hoy"name="hoy" class="mb-3 form-control" type="text" placeholder="Nombre del Paciente"> 
														<p> Incapacitado en este momento por:</p>
														<input id="hoy"name="hoy" class="mb-3 form-control" type="text" placeholder="ej. menor de edad"> 
													</div>																		
												</div>
												<div class="form-group row">
													<div class="col-md-12">
														<H6> CERTIFICO QUE, El Profesional:</h6>
														<input id="n_prof_C"name="hoy" class="mb-3 form-control" type="text" placeholder="Nombre del Profesional"> <!--  autocompletado -->
														<p> Me ha informado acerca de los riesgos; y el porqué considera necesario realizar el procedimiento:</p>
														<input id="hoy"name="hoy" class="mb-3 form-control" type="text" placeholder="Nombre y Tipo de Anestésia"> <!--  autocompletado -->
													</div>																		
												</div>		
					                                   
												<div class="form-group row my-2">
													<div class="col-sm-12 text-center">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Informe en PDF</button>
													</div>
												</div>
                                               
												<div class="modal-footer">
													<button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal_auth">Autentificación</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
													<button type="button" class="btn btn-info">Guardar </button><!--en todos los modals poner un alert de guardar si no lo ha guardado-->
												</div>
											</form>
											<div id="modal_auth" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_authLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<h5 class="modal-title">Código de verificación </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
														</div>
														<div class="modal-body">
																<input id="cod_auth"name="cod_auth" class="mb-3 form-control" type="text" placeholder="Ingrese código de Verificación">
														</div>
														<div class="modal-footer">
															<button type="button" class="btn  btn-secondary" data-dismiss="modal">Cerrar</button>
															<button type="button" class="btn  btn-primary">Ingresar</button>
														</div>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
														
				</div>
		</div> 					  
  </div>

</div>