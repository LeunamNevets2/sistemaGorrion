<?php

session_start();
if(empty($_SESSION['usuario'])) header("location: login.php");
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
$nombreUsuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['idUsuario'];

$cartas = [
    ["titulo" => "Total ventas", "icono" => "fa fa-money-bill", "total" => "S/. ".obtenerTotalVentas($idUsuario), "color" => "#000000"],
    ["titulo" => "Ventas hoy", "icono" => "fa fa-calendar-day", "total" => "S/. ".obtenerTotalVentasHoy($idUsuario), "color" => "#000000"],
    ["titulo" => "Ventas semana", "icono" => "fa fa-calendar-week", "total" => "S/. ".obtenerTotalVentasSemana($idUsuario), "color" => "#000000"],
    ["titulo" => "Ventas mes", "icono" => "fa fa-calendar-alt", "total" => "S/. ".obtenerTotalVentasMes($idUsuario), "color" => "#000000"],
];
?>

<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:12%; padding-left:5%; padding-right:5%;">
	<div class="alert alert-primary text-center shadow-sm rounded" role="alert" style="background-color:#B7B9B9; margin-bottom:2%">
		<h1>
		<h1 style="color:#000000"><?= $nombreUsuario?></h1>
		</h1>
	</div>
	
	<?php include_once "cartas_totales.php"?>
	<div class="text-center mt-3" >
		<a href="cambiar_password.php" class="btn btn-lg btn-primary" style="margin-top:2%">
			<i class="fa fa-key"></i>
			Cambiar contraseña
		</a>
	</div>
</div>