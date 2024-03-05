<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
include_once 'consulta_tipo_cambio.php';
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");
$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : null;

$productos = obtenerProductos($nombreProducto);
$TotalInventarioUSD = obtenerTotalInventario() / $tipoCambioSunat->venta;
$TotalInventarioUSDFormateado = "(USD " . number_format($TotalInventarioUSD, 2) . ")";
$TotalGananciasUSD = calcularGananciaProductos() / $tipoCambioSunat->venta;
$TotalGananciasUSDFormateado = "(USD " . number_format($TotalGananciasUSD, 2) . ")";

$cartas = [
    ["titulo" => "No. Productos", "icono" => "fa fa-box", "total" =>"<br>". count($productos), "color" => "#000000"],
    ["titulo" => "Total productos", "icono" => "fa fa-shopping-cart", "total" =>"<br>". obtenerNumeroProductos(), "color" => "#000000"],
    ["titulo" => "Total inventario", "icono" => "fa fa-money-bill", "total" => "S/ ". obtenerTotalInventario()."<br>".$TotalInventarioUSDFormateado , "color" => "#000000"],
    ["titulo" => "Ganancia", "icono" => "fa fa-wallet", "total" => "S/ ". calcularGananciaProductos()."<br>".$TotalGananciasUSDFormateado , "color" => "#000000"],
];
?>
<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:2%; padding-left:5%; padding-right:5%;">
    <h1 style="margin-bottom:2%">
        <a class="btn btn-success btn-lg" href="agregar_producto.php" style="background-color:#489A55">
            <i class="fa fa-plus"></i>
            Agregar
        </a>
        Productos
    </h1>
    <?php include_once "cartas_totales.php"; ?>

    <form action="" method="post" class="input-group mb-3 mt-4" >
        <input autofocus name="nombreProducto" type="text" class="form-control" placeholder="Escribe el nombre o código del producto que deseas buscar" aria-label="Nombre producto" aria-describedby="button-addon2">
        <button type="submit" name="buscarProducto" class="btn btn-primary" id="button-addon2"style="background-color:#3B81EB">
            <i class="fa fa-search"></i>
            Buscar
        </button>
    </form  >
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio compra</th>
                <th>Precio venta</th>
                <th>Ganancia</th>
                <th>Existencia</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto){
            ?>
                <tr>
                    <td><?= $producto->codigo; ?></td>
                    <td><?= $producto->nombre; ?></td>
                    <td><?= 'S/ '.$producto->compra; ?></td>
                    <td><?= 'S/ '.$producto->venta; ?></td>
                    <td><?= 'S/ '. floatval($producto->venta - $producto->compra); ?></td>
                    <td><?= $producto->existencia; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_producto.php?id=<?= $producto->id; ?>"style="background-color:#59D1EB">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="eliminar_producto.php?id=<?= $producto->id; ?>"style="background-color:#EE7373">
                            <i class="fa fa-trash"></i>
                            Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
    // Verifica si hay un parámetro de éxito en la URL
    if(isset($_GET['exito']) && $_GET['exito'] == 1) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Producto eliminado con éxito.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
?>