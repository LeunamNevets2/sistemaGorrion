<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
include_once 'consulta_tipo_cambio.php';
session_start();
if(empty($_SESSION['usuario'])) header("location: login.php");

$ventasTotalUSD = obtenerTotalVentas() / $tipoCambioSunat->venta;
$ventasTotalUSDFormateado = "(USD " . number_format($ventasTotalUSD, 2) . ")";
$ventasHoyUSD = obtenerTotalVentasHoy() / $tipoCambioSunat->venta;
$ventasHoyUSDFormateado = "(USD " . number_format($ventasHoyUSD, 2) . ")";
$ventasSemanaUSD = obtenerTotalVentasSemana()/ $tipoCambioSunat->venta;
$ventasSemanaUSDFormateado = "(USD " . number_format($ventasSemanaUSD, 2) . ")";
$ventasMesUSD = obtenerTotalVentasMes()/ $tipoCambioSunat->venta;
$ventasMesUSDFormateado = "(USD " . number_format($ventasMesUSD, 2) . ")";
$cartas = [
    ["titulo" => "Total ventas", "icono" => "fa fa-money-bill", "total" => "S/ ".obtenerTotalVentas()."<br>".$ventasTotalUSDFormateado, "color" => "#000000"],
    ["titulo" => "Ventas hoy", "icono" => "fa fa-calendar-day", "total" => "S/ ".obtenerTotalVentasHoy()."<br>".$ventasHoyUSDFormateado, "color" => "#000000"],
    ["titulo" => "Ventas semana", "icono" => "fa fa-calendar-week", "total" => "S/ ".obtenerTotalVentasSemana()."<br>".$ventasSemanaUSDFormateado, "color" => "#000000"],
    ["titulo" => "Ventas mes", "icono" => "fa fa-calendar-alt", "total" => "S/ ".obtenerTotalVentasMes()."<br>".$ventasMesUSDFormateado, "color" => "#000000"],
];



$totales = [
	["nombre" => "Total productos", "total" => obtenerNumeroProductos(), "imagen" => "img/productos.png"],
	["nombre" => "Ventas registradas", "total" => obtenerNumeroVentas(), "imagen" => "img/ventas.png"],
	["nombre" => "Usuarios registrados", "total" => obtenerNumeroUsuarios(), "imagen" => "img/usuarios.png"],
	["nombre" => "Clientes registrados", "total" => obtenerNumeroClientes(), "imagen" => "img/clientes.png"],
];

$ventasUsuarios = obtenerVentasPorUsuario();
$ventasClientes = obtenerVentasPorCliente();
$productosMasVendidos = obtenerProductosMasVendidos();

?>

<div class="container" style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:2%; padding-left:5%; padding-right:5%;">
	<div class="alert alert-secondary " role="alert" style="background-color: #B7B9B9";>
		<h2>
			Hola, <?= $_SESSION['usuario']?>
		</h2>
	</div>
	<div class="card-deck row mb-2">
	<?php foreach($totales as $total){?>
		<div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom:2%">
			<div class="card text-center" style="background-color:rgba(217, 217, 217, 1)">
				<div class="card-body">
				<img class="img-thumbnail" src="<?= $total['imagen']?>" alt="<?= $total['nombre'] ?>" <?php if($total['nombre'] === 'Usuarios registrados'): ?> style="background-color: transparent; border: transparent; width: 72px;" <?php else: ?> style="background-color: transparent; border :transparent" <?php endif; ?>>
					<h4 class="card-title" style="font-size: 23px;margin-top:4% " >
						<?= $total['nombre']?>
					</h4>
					<h2 style="font-size: 25px;"><?= $total['total']?></h2>

				</div>

			</div>
		</div>
		<?php }?>
	</div>

	 <?php include_once "cartas_totales.php"?>

	 <div class="row mt-4">
	 	<div class="col">
		 <div class="card" style="background-color:rgba(217, 217, 217, 1)">
				<div class="card-body">
				<h4 style="font-size: 20px;">Ventas por usuarios</h4>
					<table class="table">
						<thead>
							<tr style="font-size: 13px;">
								<th>Nombre usuario</th>
								<th>Número ventas</th>
								<th>Total ventas</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($ventasUsuarios as $usuario) {?>
								<tr style="border-color:rgba(0, 0, 0, 0.6)">
									<td><?= $usuario->usuario?></td>
									<td><?= $usuario->numeroVentas?></td>
									<td>S/ <?= $usuario->total?></td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>	 		
	 	</div>
	 	<div class="col">
		 <div class="card"style="background-color:rgba(217, 217, 217, 1)">
				<div class="card-body">
				<h4 style="font-size: 20px;">Ventas por clientes</h4>
					<table class="table">
						<thead>
							<tr style="font-size: 13px;">
								<th>Nombre cliente</th>
								<th>Número compras</th>
								<th>Total ventas</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($ventasClientes as $cliente) {?>
								<tr style="border-color:rgba(0, 0, 0, 0.6)">
									<td><?= $cliente->cliente?></td>
									<td><?= $cliente->numeroCompras?></td>
									<td>S/ <?= $cliente->total?></td>
								</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
	 	</div>
	 </div>

	 <div class="row mt-4">
		<div class="col">
			<div class="card"style="background-color:rgba(217, 217, 217, 1)">
			<div class="card-body">
				<h4 style="font-size: 20px;">10 Productos más vendidos</h4>
				<table class="table">
					<thead>
						<tr style="font-size: 13px;">
							<th>Producto</th>
							<th>Unidades vendidas</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($productosMasVendidos as $producto) {?>
						<tr style="border-color:rgba(0, 0, 0, 0.6)">
							<td><?= $producto->nombre?></td>
							<td><?= $producto->unidades?></td>
							<td>S/ <?= $producto->total?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	 </div>
</div>	

