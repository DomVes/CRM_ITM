<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Nuevo Preventivo</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Nuevo Preventivo</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Nuevo mantenimiento preventivo</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podrá resgistrar un nuevo mantenimiento.
				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>

				<div class="row">
					<form method="post" id="prev_form">
						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">
						<div class="col-lg-6">
								<label class="form-label semibold" for="sede_id">Sede</label>
								<select class="select2" id="sede_id" name="sede_id" required>
                        		</select>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_ubicacion" >Ubicación</label>
								<input type="text" class="form-control" id="p_ubicacion" name="p_ubicacion" placeholder="Ingrese Ubicación">
  								</input>
							</fieldset>							
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_tipoequipo" >Tipo de Equipo</label>
								<input type="text" class="form-control" id="p_tipoequipo" name="p_tipoequipo" placeholder="Tipo de Equipo">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_placa" >Placa</label>
								<input type="number" class="form-control" id="p_placa" name="p_placa" placeholder="Ingrese Placa">
  								</input>
							</fieldset>
						</div>												
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_nomb">Nombre de equipo</label>
								<input type="text" class="form-control" id="p_nomb" name="p_nomb" placeholder="Ingrese nombre de equipo">
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_ip" >Dirección IP</label>
								<input type="text" class="form-control" id="p_ip" name="p_ip" placeholder="Ingrese Dirección IP">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_serial" >Serial</label>
								<input type="text" class="form-control" id="p_serial" name="p_serial" placeholder="Ingrese Serial">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_marca" >Marca</label>
								<input type="text" class="form-control" id="p_marca" name="p_marca" placeholder="Ingrese Marca">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_referencia" >Referencia</label>
								<input type="text" class="form-control" id="p_referencia" name="p_referencia" placeholder="Ingrese Referencia">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_procesador" >Procesador</label>
								<input type="text" class="form-control" id="p_procesador" name="p_procesador" placeholder="Ingrese Procesador">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_disco" >Almacenamiento</label>
								<input type="text" class="form-control" id="p_disco" name="p_disco" placeholder="Ingrese Almacenamiento">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_ram" >Ram</label>
								<input type="text" class="form-control" id="p_ram" name="p_ram" placeholder="Ingrese Ram">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_so" >Sistema Operativo</label>
								<input type="text" class="form-control" id="p_so" name="p_so" placeholder="Ingrese Sistema Operativo">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_vidadisco" >Porcentaje V. Almacenamiento</label>
								<input type="text" class="form-control" id="p_vidadisco" name="p_vidadisco" placeholder="Ingrese Porcentaje V. Almacenamiento">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_tecnico" >Técnico responsable</label>
								<input type="text" class="form-control" id="p_tecnico" name="p_tecnico" placeholder="Ingrese Técnico responsable">
  								</input>
							</fieldset>
						</div>				
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="p_descrip">Observaciones</label>
								<div class="summernote-theme-6">
									<textarea id="p_descrip" name="p_descrip" class="summernote" name="name"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="nuevomto.js"></script>
	

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>