<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Nuevo Correctivo</title>
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
							<h3>Nuevo Correctivo</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Nuevo Correctivo</li>
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
					<form method="post" id="correct_form">
						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">
						<div class="col-lg-6">
								<label class="form-label semibold" for="sede_id">Sede</label>
								<select class="select2" id="sede_id" name="sede_id" required>
                        		</select>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_ubicacion" >Ubicación</label>
								<input type="text" class="form-control" id="c_ubicacion" name="c_ubicacion" placeholder="Ingrese Ubicación">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_tipoequipo" >Tipo de Equipo</label>
								<input type="text" class="form-control" id="c_tipoequipo" name="c_tipoequipo" placeholder="Tipo de Equipo">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_placa" >Placa</label>
								<input type="number" class="form-control" id="c_placa" name="c_placa" placeholder="Ingrese Placa">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_nomb">Nombre de equipo</label>
								<input type="text" class="form-control" id="c_nomb" name="c_nomb" placeholder="Ingrese nombre de equipo">
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_ip" >Dirección IP</label>
								<input type="text" class="form-control" id="c_ip" name="c_ip" placeholder="Ingrese Dirección IP">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_serial" >Serial</label>
								<input type="text" class="form-control" id="c_serial" name="c_serial" placeholder="Ingrese Serial">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_marca" >Marca</label>
								<input type="text" class="form-control" id="c_marca" name="c_marca" placeholder="Ingrese Marca">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_referencia" >Referencia</label>
								<input type="text" class="form-control" id="c_referencia" name="c_referencia" placeholder="Ingrese Referencia">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_procesador" >Procesador</label>
								<input type="text" class="form-control" id="c_procesador" name="c_procesador" placeholder="Ingrese Procesador">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_disco" >Almacenamiento</label>
								<input type="text" class="form-control" id="c_disco" name="c_disco" placeholder="Ingrese Almacenamiento">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_ram" >Ram</label>
								<input type="text" class="form-control" id="c_ram" name="c_ram" placeholder="Ingrese Ram">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_so" >Sistema Operativo</label>
								<input type="text" class="form-control" id="c_so" name="c_so" placeholder="Ingrese Sistema Operativo">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_vidadisco" >Porcentaje V. Almacenamiento</label>
								<input type="text" class="form-control" id="c_vidadisco" name="c_vidadisco" placeholder="Ingrese Porcentaje V. Almacenamiento">
  								</input>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_tecnico" >Técnico responsable</label>
								<input type="text" class="form-control" id="c_tecnico" name="c_tecnico" placeholder="Ingrese Técnico responsable">
  								</input>
							</fieldset>
						</div>				
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="c_descrip">Observaciones</label>
								<div class="summernote-theme-1">
									<textarea id="c_descrip" name="c_descrip" class="summernote" name="name"></textarea>
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

	<script type="text/javascript" src="nuevomtocorrect.js"></script>
	

</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>