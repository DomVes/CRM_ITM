<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>Consultar Preventivos</title>
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
							<h3>Consultar Preventivos</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Consultar Mantenimientos Preventivos</li>
							</ol>
						</div>
					</div>
				</div>
			</header>
			<div class="box-typical box-typical-padding">				
				<div class="row" id="viewuser">
					<div class="col-lg-2">
								<label class="form-label semibold" for="sede_id">Sede</label>
								<select class="select2" id="sede_id" name="sede_id" >
                        		</select>
					</div>
					<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label" for="p_placa">Placa</label>
							<input type="number" class="form-control" id="p_placa" name="p_placa" placeholder="Ingrese Placa" >
						</fieldset>
					</div>
					<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label" for="p_nomb">Nombre de equipo</label>
							<input type="search" class="form-control" id="p_nomb" name="p_nomb" placeholder="Ingrese Nombre de Equipo" >
						</fieldset>
					</div>
					<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label" for="btnfiltrar_p">&nbsp;</label>
							<button type="submit" class="btn btn-rounded btn-secondary btn-block" id="btnfiltrar_p">Filtrar</button>
						</fieldset>
					</div>
					<div class="col-lg-2">
						<fieldset class="form-group">
							<label class="form-label" for="btntodo_p">&nbsp;</label>
							<button class="btn btn-rounded btn-secondary btn-block" id="btntodo_p">Ver Todo</button>
						</fieldset>
					</div>
				</div>
				<div class="box-typical box-typical-padding">						
					<div class="box-typical box-typical-padding" id="table">
						<table id="mto_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
							<thead>
								<tr>									
									<th class="d-none d-sm-table-cell" style="width: auto;">Sede</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Ubicación</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Marca</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Referencia</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Tipo de Equipo</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Serial</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Nombre de equipo</th>									
									<th class="d-none d-sm-table-cell" style="width: auto;">Placa</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Dirección IP</th>								
									<th class="d-none d-sm-table-cell" style="width: auto;">Procesador</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Disco duro</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Ram</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Sistema Operativo</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">% Vida Disco duro</th>
									<th class='d-none d-sm-table-cell' style='width: auto;'>Fecha de Registro</th>                                
									<th class="d-none d-sm-table-cell" style="width: auto;">Tecnico Responsable</th>
									<th class="d-none d-sm-table-cell" style="width: auto;">Observaciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="consultarmtopreinformes.js"></script>	
	<script type="text/javascript" src="../notificacion.js"></script>
</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>