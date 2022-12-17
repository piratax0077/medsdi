
<style>
.titulo_fc1 {
	font-size: 1 rem;
	color: #3366CC;
	max-height:15px
}
.bg-fichat{background-color: #00BCD4; color: white; height: 50px; text-align: center; padding-top: 10px}
			.bg-fichai{background-color: #00BCD4; color: white; height: 30px; text-align: center; padding-top: 1px;margin-top:7px;margin-left:7px;margin-right:7px;}
			.bg-int{padding:10px;color:#000000;border: 1px solid #CCCCCC;margin:3px;margin-left:7px;margin-right:7px;}
			.btn-int{background-color: #666666; color:white}
</style>
 <script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript">
					function mostrar(id) {
						if (id == "cpeso") {
							$("#cpeso").show();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}

						if (id == "chipertension") {
							$("#cpeso").hide();
							$("#chipertension").show();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}

						if (id == "cinsufren") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").show();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}
						if (id == "nc") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}
						if (id == "creumato") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").show();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}
						if (id == "cmtumorales") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").show();
							$("#clitemia").hide();
							$("#cdiabet").hide();
						}
						if (id == "clitemia") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").show();
							$("#cdiabet").hide();
						}
						if (id == "cdiabet") {
							$("#cpeso").hide();
							$("#chipertension").hide();
							$("#cinsufren").hide();
							$("#creumato").hide();
						    $("#cmtumorales").hide();
							$("#clitemia").hide();
							$("#cdiabet").show();
						}
					}
		</script>
		  <div id="fc" class="tab-pane fade"  role="tabpanel" aria-labelledby="fc-tab">
		<div class="card"  style=" border: 1px solid #CCCCCC;margin:5px ">
		   <div class="row">
                <div class="col-sm-12">
 
			<div class="modal-header bg-fichat">
				<h5 class="modal-title text-white" id="titulo" style="font-size: 1.3rem; color: #3366CC;max-height:15px">Ficha Clínica  </h5>
				<div class="col-md-2">
					<div class="form-group fill">
						<label id="fecha_cont" class="mb-3 form-control" style="color:white" type="text">Fecha (hoy)</label>
					</div>
				</div>
			</div>
			<div class="modal-header bg-fichai">
				<h5 class="modal-title text-white titulo_fc1" id="titulo">Motivo de Consulta </h5>
			</div>
			<div class="form-group row bg-int">																
				<div class="col-md-12">
					<div class="form-group fill">
						<textarea class="form-control" id="anamnesis_obt" rows="2" onfocus="9" placeholder="Motivo de Consulta"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-header bg-fichai">
				<h5 class="modal-title text-white titulo_fc1" id="titulo">Antecedentes </h5>
			</div>

			<div class="form-group row bg-int">	 
				<div class="col-md-12">
					<div class="form-group fill">
						<textarea class="form-control" id="antecedentes_obt" rows="1" placeholder="Ingrese Antecedentes Nuevos" ></textarea>
					</div>
				</div>
			</div>
			<div class="modal-header bg-fichai">
				<h5 class="modal-title text-white" id="titulo" style="font-size: 1 rem; color: #3366CC;max-height:15px">Examen Físico </h5>
			</div>
			<div class="form-group row bg-int">		
				<div class="col-md-12">
					<div class="form-group fill">
						<textarea class="form-control" id="ex_fisico_general_obt" rows="1"placeholder="Ex_Físico_General" ></textarea>
					</div>
				</div>
			</div>
			<div class="modal-header bg-fichai">
				<h5 class="modal-title text-white" id="titulo" style="font-size: 1 rem; color: #3366CC;max-height:15px">Hipótesis Diagnóstica </h5>
			</div>
			<div class="form-group row bg-int">		
				<div class="col-md-6">
					<div class="form-group fill">
						<input id="fur_op_obt" class="mb-3 form-control" type="text" placeholder="Hipótesis Diagnóstica">
					</div>
				</div>	
				<div class="col-md-6">
					<div class="form-group fill">
						<input id="fpp_obt" class="mb-3 form-control" type="text" placeholder="Diagnóstico CIE-10">
					</div>	
				</div>		
			</div>
			
			<div class="modal-header bg-fichai">
						
						<div class="col-md-12">
				
					       <div class="form-group row">
						     
												<div class="col-md-4">
													<input type="checkbox" name="check" id="checkcr" value="1" onchange="javascript:showContentcr()" /><label  id="titulo" style="font-size: 1 rem; color: white;margin-left:30px">Enfermo Crónico ?</label>
												</div>

												<div class="col-md-4">
													<input type="checkbox" name="check" id="checkges" value="1"   onchange="javascript:showContentges()" /><label  id="titulo" style="font-size: 1 rem; color: white;margin-left:30px">GES</label>
												</div>
												<div class="col-md-4">
													<input type="checkbox" name="check" id="checkges" value="1"  /><label  id="titulo" style="font-size: 1 rem; color: white;margin-left:30px">Confidencial</label>
												</div>
							 
					       </div>
				 		</div>																												
			</div>	
			<div class="form-group fill" >
				<div id="contentcr" style="display: none;">
					<div class="col-md-12">
						<label class=" form-control">Listado de Enfermedades Crónicas<label>
						
					</div>
					<div class="form-group row bg-int">	
						
						<div class="col-md-12">
							<form action="index.php" method="post">
								Listado de Enfermedades Crónicas: 
								<select id="cronicos" name="cronicos" onChange="mostrar(this.value);">
									<option value="nc">NO CRONICO</option>
									<option value="cpeso">OBESIDAD</option>
									<option value="chipertension">HIPERTENSIÓN ARTERIAL</option>
									<option value="cdiabet">DIABETES</option>
									<option value="cinsufren">INSUFICIENCIA RENAL</option>
									<option value="cmtumorales">MARCADORES TUMORALES</option>
									<option value="creumato">REUMATOLOGÍA</option>
									<option value="clitemia">LITEMIA</option>
								</select>	
							</form>
						</div>
					</div>
					<div class="form-group row bg-int">	
						<form id= "form_cr"> 
						  <?php
									include("form_cronicos/index.php");	
									
						  ?>
						</form>
					</div>
				</div>
			</div>
			<div class="form-group fill" >
				<div id="contentges" style="display: none;">
					
					<div class="form-group row bg-int">	
						<div class="col-md-12">
							<select name="@cbges" id="cbges_23684" style="width: 608px; height: 25px !important; visibility: visible;"><optgroup><option value="232">NO GES</option><option value="145">PS 01. Enfermedad renal crónica etapa 4 y 5</option><option value="146">PS 02. Cardiopatías congénitas operables en menores de 15 años</option><option value="147">PS 03. Cáncer cérvico-uterino</option><option value="148">PS 04. Alivio del dolor y cuidados paliativos por cáncer avanzado</option><option value="149">PS 05. Infarto agudo del miocardio</option><option value="150">PS 06. Diabetes Mellitus tipo I</option><option value="151">PS 07. Diabetes Mellitus tipo II</option><option value="152">PS 08. Cáncer de mama en personas de 15 años y más</option><option value="153">PS 09. Disrafias espinales</option><option value="154">PS 10. Tratamiento quirúrgico de escoliosis en personas menores de 25 años</option><option value="155">PS 11. Tratamiento quirúrgico de cataratas</option><option value="156">PS 12. Endoprótesis total de cadera en personas de 65 años y más con artrosis de cadera con limitación funcional severa</option><option value="157">PS 13. Fisura Labiopalatina</option><option value="158">PS 14. Cáncer en personas menores de 15 años</option><option value="159">PS 15. Esquizofrenia</option><option value="160">PS 16. Cáncer de testículo en personas de 15 años y más</option><option value="161">PS 17. Linfomas en personas de 15 años y más</option><option value="162">PS 18. Síndrome de la inmunodeficiencia adquirida VIH/SIDA</option><option value="163">PS 19. Infección respiratoria aguda (IRA) de manejo ambulatorio en personas menores de 5 años</option><option value="164">PS 20. Neumonia adquirida en la comunidad de manejo ambulatorio en personas de 65 años y más</option><option value="165">PS 21. Hipertensión arterial primaria o esencial en personas de 15 años y más</option><option value="166">PS 22. Epilepsia no refractaria en personas desde 1 año y menores de 15 años</option><option value="167">PS 23. Salud oral integral para niños y niñas de 6 años</option><option value="168">PS 24. Prevención de parto prematuro</option><option value="169">PS 25. Trastornos de generación del impulso y conducción en personas de 15 años y más, que requieren marcapaso</option><option value="170">PS 26. Colecistectomía preventiva del cáncer de vesícula en personas de 35 a 49 años</option><option value="171">PS 27. Cáncer gástrico</option><option value="172">PS 28. Cáncer de próstata en personas de 15 años y más</option><option value="173">PS 29. Vicios de refracción en personas de 65 años y más</option><option value="174">PS 30. Estrabismo en personas menores de 9 años</option><option value="175">PS 31. Retinopatía diabética</option><option value="176">PS 32. Desprendimiento de retina regmatógeno no traumático</option><option value="177">PS 33. Hemofilia</option><option value="178">PS 34. Depresión en personas de 15 años y más</option><option value="179">PS 35. Tratamiento de la hiperplasia benigna de la próstata en personas sintomáticas</option><option value="180">PS 36. Órtesis (o ayudas técnicas) para personas de 65 años y más</option><option value="181">PS 37. Accidente cerebrovascular isquémico en personas de 15 años y más</option><option value="182">PS 38. Enfermedad pulmonar obstructiva crónica de tratamiento ambulatorio</option><option value="183">PS 39. Asma bronquial moderada y grave en menores de 15 años</option><option value="184">PS 40. Síndrome de dificultad respiratoria en el recién nacido</option><option value="185">PS 41. Tratamiento médico en personas de 55 años y más con artrosis de cadera y/o rodilla, leve o moderada</option><option value="186">PS 42. Hemorragia subaracnoidea secundaria a ruptura de aneurismas cerebrales</option><option value="187">PS 43. Tumores primarios del sistema nervioso central en personas de 15 años y más</option><option value="188">PS 44. Tratamiento quirúrgico de hernia del núcleo pulposo lumbar</option><option value="189">PS 45. Leucemia en personas de 15 años y más</option><option value="190">PS 46. Urgencia odontológica ambulatoria</option><option value="191">PS 47. Salud oral integral del adulto de 60 años</option><option value="192">PS 48. Politraumatizado grave</option><option value="193">PS 49. Traumatismo cráneo encefálico moderado o grave</option><option value="194">PS 50. Trauma ocular grave</option><option value="195">PS 51. Fibrosis quística</option><option value="196">PS 52. Artritis reumatoidea</option><option value="197">PS 53. Consumo perjudicial o dependencia de riesgo bajo a moderado de alcohol y drogas en personas menores de 20 años</option><option value="198">PS 54. Analgesia del parto</option><option value="199">PS 55. Gran quemado</option><option value="200">PS 56. Hipoacusia bilateral en personas de 65 años y más que requieren uso de audífono</option><option value="201">PS 57. Retinopatía del prematuro</option><option value="202">PS 58. Displasia broncopulmonar del prematuro</option><option value="203">PS 59. Hipoacusia neurosensorial bilateral del prematuro</option><option value="204">PS 60. Epilepsia no refractaria en personas de 15 años y más</option><option value="205">PS 61. Asma bronquial en personas de 15 años y más</option><option value="206">PS 62. Enfermedad de parkinson</option><option value="207">PS 63. Artritis idiopática juvenil</option><option value="208">PS 64. Prevención secundaria enfermedad renal crónica terminal</option><option value="209">PS 65. Displasia luxante de caderas</option><option value="210">PS 66. Salud oral integral de la embarazada</option><option value="211">PS 67. Esclerosis múltiple remitente recurrente</option><option value="212">PS 68. Hepatitis crónica por virus hepatitis B</option><option value="213">PS 69. Hepatitis C</option><option value="214">PS 70. Cáncer colorectal en personas de 15 años y más</option><option value="215">PS 71. Cáncer de ovario epitelial</option><option value="216">PS 72. Cáncer vesical en personas de 15 años y más</option><option value="217">PS 73. Osteosarcoma en personas de 15 años y más</option><option value="218">PS 74. Tratamiento quirúrgico de lesiones crónicas de la válvula aórtica en personas de 15 años y más</option><option value="219">PS 75. Trastorno bipolar en personas de 15 años y más</option><option value="220">PS 76. Hipotiroidismo en personas de 15 años y más</option><option value="221">PS 77. Tratamiento de hipoacusia moderada en menores de 2 años</option><option value="222">PS 78. Lupus eritematoso sistémico</option><option value="223">PS 79. Tratamiento quirúrgico de lesiones crónicas de las válvulas mitral y tricuspide en personas de 15 años y más</option><option value="224">PS 80. Tratamiento de erradicación del helicobacter pylori</option><option value="252">PS 81. Cáncer de Pulmón</option><option value="253">PS 82. Cáncer de Tiroides</option><option value="254">PS 83. Cáncer Renal</option><option value="255">PS 84. Mieloma Múltiple</option><option value="256">PS 85. Enfermedad de Alzheimer y otras demencias</option></optgroup></select>
						</div>
						<div class="col-md-6">
							
							<button type="button" class="btn btn-secondary"style="width:95%;max-width:350px;tex-align:left;margin-top:15px"   data-toggle="modal" data-target="#m_ges1">CONSTANCIA GES</button>
							
						</div>
						<div class="row">
							<?php
								include("modals/m_ges1.php");
							?>
																									
				        </div>
																								
					</div>
					
				</div>	 
			</div>

			<div class="form-group row bg-int">		
					<div class="col-md-6">
						<div class="form-group fill">
							<input id="fur_op_obt" class="mb-3 form-control" type="text" placeholder="Hipótesis Diagnóstica">
						</div>
					</div>	
					<div class="col-md-6">
						<div class="form-group fill">
							<input id="fpp_obt" class="mb-3 form-control" type="text" placeholder="Diagnóstico CIE-10">
						</div>	
					</div>		
			</div>
			
			<div class="form-group fill">
					<button type="button" class="btn btn-primary m-1 has-ripple" data-toggle="modal" data-target="#m_rec">RECETARIO</button>
					<button type="button" class="btn btn-primary m-1 has-ripple"data-toggle="modal" data-target="#m_ex">EXAMENES</button>
					<button type="reset" class="btn  btn-primary">ELIMINAR</button>  													
					<button type="bottom" class="btn  btn-primary">GUARDAR E IR A LA AGENDA</button> 
			</div> 
		</div>
		<div id="m_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_exLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header bg-info">
								<h5 class="modal-title text-white" id="m_exLabel" style="font-size: 1.3rem; color: #3366CC;">SOLICITUD EXAMENES</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div  class="modal-body">
								<div class="form-group-row">
									<div class="row" >
										<div class="col-md-6">
											<h5 class="form-control">Tipo Examen:</h5>
										</div>
										<div class="col-md-6">
											<select id="cod_exalab_parent" name="@cod_exalab_parent" class="form-control"  onchange="loadExamen2('#cod_exalab_subparent',this.value,-1);">
													<option value="-1">Seleccione Tipo Examen</option>
													<option value="4">SANGRE</option>
													<option value="295">ORINA</option>
													<option value="362">IMAGENOLOGIA</option>
													<option value="540">EXAMENES OFTALMOLOGÍA</option>
													<option value="540">EXAMENES OTORRINOLARINGOLOGÍA</option>
													<option value="573">EXAMENES ELECTROFISICOS</option>
													<option value="591">KINESIOLOGIA</option>
													<option value="699">NEUROLOGIA Y NEUROCIRUGIA</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-row">
		
								<div class="row" >
									<div class="col-md-6">
										<h5 class="form-control">SubTipo Examen:</h5>
									</div>
									<div class="col-md-6">
										<select id="cod_exalab_parent" name="@cod_exalab_parent" class="form-control"  onchange="loadExamen2('#cod_exalab_subparent',this.value,-1);">
												<option value="-1">Seleccione SubTipo Examen</option>
									  
										</select>
									</div>
								</div>
								</div>
								<div class="form-group-row">
		
								<div class="row" >
									<div class="col-md-6">
										<h5 class="form-control">Nombre del Examen:</h5>
									</div>
									<div class="col-md-6">
										<div name="@cod_exalab" id="cod_exalab" style="height:100px;overflow:auto;"></div>
											<input type="hidden" id="examen_nombre"  value="">
											<input type="hidden" id="cod_exa" value="00">
									</div>
								</div>
								</div>
								<div class="form-group-row">
								<div class="row" >
									<div class="col-md-6">
										<select id="cod_exalab_parent" name="@cod_exalab_parent" class="form-control"  onchange="loadExamen2('#cod_exalab_subparent',this.value,-1);">
												<option value="-1">Seleccione Urgencia</option>
												<option value="1">URGENTE</option>
												<option value="2">HOY</option>
												<option value="3">NORMAL</option>
										
										</select>
									</div>
									<div class="col-md-6">
										<textarea rows="2" class="form-control" id="examen_comentarios" placeholder="Solicitud especial"></textarea>
									</div>
								</div>
								</div>
								<div class="form-group row my-2">
									<div class="col-sm-12 text-center">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Ver Documento en PDF</button>
									</div>
								</div>
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-success">Guardar</button>
						</div>	
					</div>
				</div>
		</div>
		
 </div>
 				</div>
		</div>