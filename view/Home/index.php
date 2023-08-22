<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])){ 
?>
<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<title>Inicio</title>
</head>
<body class="with-side-menu">
    <?php require_once("../MainHeader/header.php");?>
    <div class="mobile-menu-left-overlay"></div>
    <?php require_once("../MainNav/nav.php");?>
	<!-- Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-4">
	                        <article class="statistic-box green">
	                            <div>
	                                <div class="number" id="lbltotal"></div>
	                                <div class="caption"><div>Total de Tickets</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box yellow">
	                            <div>
	                                <div class="number" id="lbltotalabierto"></div>
	                                <div class="caption"><div>Total de Tickets Abiertos</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-4">
	                        <article class="statistic-box red">
	                            <div>
	                                <div class="number" id="lbltotalcerrado"></div>
	                                <div class="caption"><div>Total de Tickets Cerrados</div></div>
	                            </div>
	                        </article>
	                    </div>
						<?php
						if ($_SESSION["rol_id"]==2){							
							?>
						<div class="col-sm-6">
	                        <article class="statistic-box" style="background-color: #00008B;">
	                            <div>
	                                <div class="number" id="lbltotalpreventivos"></div>
	                                <div class="caption"><div>Total Preventivos Realizados</div></div>
	                            </div>
	                        </article>
	                    </div>
						<div class="col-sm-6">
	                        <article class="statistic-box" style="background-color: #008B8B;">
	                            <div>
	                                <div class="number" id="lbltotalcorrectivos"></div>
	                                <div class="caption"><div>Total Correctivos Atendidos</div></div>
	                            </div>
	                        </article>
	                    </div>
						<?php
						}
						?>						
					</div>
				</div>
			</div>
			<section class="card">
				<header class="card-header">
					Grafico Estadístico de Tickets
				</header>
				<div class="card-block">
					<div id="divgrafico" style="height: 250px;"></div>
				</div>
			</section>
		</div>
	</div>
	<!-- Contenido -->
	<?php require_once("../MainJs/js.php");?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="home.js"></script>
	<script type="text/javascript" src="../notificacion.js"></script>
</body>
</html>
<?php
  } else {
    header("Location:".Conectar::ruta()."index.php");
  }
?>