<div id="modalpreventivo" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulop"></h4>
            </div>
            <form method="post" id="prev_form">
                <div class="modal-body">  
						<input type="hidden" id="p_id" name="p_id">                	
                    	<div class="col-lg-6">							
								<label class="form-label semibold" for="sede_id" >Sede</label>
								<input type="text" class="form-control" id="sede_id" name="sede_id"  disabled="disabled"> 
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_ubicacion" >Ubicación</label>
								<input type="text" class="form-control" id="p_ubicacion" name="p_ubicacion" placeholder="Ingrese Ubicación" >  								
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_tipoequipo" >Tipo de Equipo</label>
								<input type="text" class="form-control" id="p_tipoequipo" name="p_tipoequipo" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_placa" >Placa</label>
								<input type="number" class="form-control" id="p_placa" name="p_placa" placeholder="Ingrese Placa" disabled="disabled">
						</div>												
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_nomb">Nombre de equipo</label>
								<input type="text" class="form-control" id="p_nomb" name="p_nomb" placeholder="Ingrese nombre de equipo" required>
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_ip" >Dirección IP</label>
								<input type="text" class="form-control" id="p_ip" name="p_ip" placeholder="Ingrese Dirección IP" required>
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_serial" >Serial</label>
								<input type="text" class="form-control" id="p_serial" name="p_serial" placeholder="Ingrese Serial" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_marca" >Marca</label>
								<input type="text" class="form-control" id="p_marca" name="p_marca" placeholder="Ingrese Marca" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_referencia" >Referencia</label>
								<input type="text" class="form-control" id="p_referencia" name="p_referencia" placeholder="Ingrese Referencia" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_procesador" >Procesador</label>
								<input type="text" class="form-control" id="p_procesador" name="p_procesador" placeholder="Ingrese Procesador" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_disco" >Almacenamiento</label>
								<input type="text" class="form-control" id="p_disco" name="p_disco" placeholder="Ingrese Almacenamiento" required>
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_ram" >Ram</label>
								<input type="text" class="form-control" id="p_ram" name="p_ram" placeholder="Ingrese Ram" disabled="disabled">
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_so" >Sistema Operativo</label>
								<input type="text" class="form-control" id="p_so" name="p_so" placeholder="Ingrese Sistema Operativo" required>
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_vidadisco" >Porcentaje V. Almacenamiento</label>
								<input type="text" class="form-control" id="p_vidadisco" name="p_vidadisco" placeholder="Ingrese Porcentaje V. Almacenamiento" required>
						</div>
						<div class="col-lg-6">
								<label class="form-label semibold" for="p_tecnico" >Técnico responsable</label>
								<input type="text" class="form-control" id="p_tecnico" name="p_tecnico" placeholder="Ingrese Técnico responsable" required>
						</div>				
						<div class="col-lg-12">
								<label class="form-label semibold" for="p_descrip">Observaciones</label>
								<div class="summernote-theme-6">
									<textarea id="p_descrip" name="p_descrip" class="summernote"></textarea>
								</div>
						</div>
						<div class="modal-footer">
							<div class="col-lg-12">
								<button type="button" class="btn btn-rounded btn-inline btn-danger" data-dismiss="modal">Cerrar</button>	
								<button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-success">Guardar</button>					
							</div>					
						</div>
                </div>               
            </form>
        </div>
    </div>
</div>