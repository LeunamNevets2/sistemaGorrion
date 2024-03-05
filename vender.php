<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
include_once 'consulta_tipo_cambio.php';
session_start();
if(empty($_SESSION['usuario'])) header("location: login.php");
$_SESSION['lista'] = (isset( $_SESSION['lista'])) ?  $_SESSION['lista'] : [];
$total = calcularTotalLista($_SESSION['lista']);
$clientes = obtenerClientes();
$clienteSeleccionado = (isset($_SESSION['clienteVenta'])) ? obtenerClientePorId($_SESSION['clienteVenta']) : null;
?>
<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:2%; padding-left:5%; padding-right:5%;">
    <form action="agregar_producto_venta.php" method="post" class="row">
        <div class="col-10">
            <input class="form-control form-control-lg" name="codigo" autofocus id="codigo" type="text" placeholder="Código de barras del producto" aria-label="codigoBarras">
        </div>
        <div class="col">
            <input type="submit" value="Agregar" name="agregar" class="btn btn-success mt-2"style="background-color:#489A55">
        </div>
    </form>
    <?php if($_SESSION['lista']) {?>
    <div style="margin-top:2%">
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Quitar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($_SESSION['lista'] as $lista) {?>
                    <tr>
                        <td><?php echo $lista->codigo;?></td>
                        <td><?php echo $lista->nombre;?></td>
                        <td>S/ <?php echo $lista->venta;?></td>
                        <td><?php echo $lista->cantidad;?></td>
                        <td>S/ <?php echo floatval($lista->cantidad * $lista->venta);?></td>
                        <td>
                            <a href="quitar_producto_venta.php?id=<?php echo $lista->id?>" class="btn btn-danger"style="background-color:#EE7373">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>

        <form class="row" method="post" action="establecer_cliente_venta.php">
            <div class="col-10">
                <select class="form-select" aria-label="Default select example" name="idCliente">
                    <option selected value="">Selecciona el cliente</option>
                    <?php foreach($clientes as $cliente) {?>
                        <option value="<?php echo $cliente->id?>"><?php echo $cliente->nombre?></option>
                    <?php }?>
                </select>
            </div>
            <div class="col-auto">
                <input class="btn btn-info" type="submit" value="Seleccionar cliente">
                </input>
            </div>
        </form>

        <?php if($clienteSeleccionado){?>
            <div class="alert alert-primary mt-3" role="alert">
                <b>Cliente seleccionado: </b>
                <br>
                <b>Nombre: </b> <?php echo $clienteSeleccionado->nombre?><br>
                <b>Teléfono: </b> <?php echo $clienteSeleccionado->telefono?><br>
                <b>Dirección: </b> <?php echo $clienteSeleccionado->direccion?><br>
                <a href="quitar_cliente_venta.php" class="btn btn-warning" >Quitar</a>
            </div>
        <?php }?>
        
        <?php
        $totalUSD = $total / $tipoCambioSunat->venta;
        ?>

        <div class="alert alert-info" role="alert">
            <b>Tipo de cambio:</b> <?php echo $tipoCambioSunat->compra;?> (Compra) / <?php echo $tipoCambioSunat->venta;?> (Venta)
        </div>        

        <div class="text-center mt-3">
            <h2 style="margin-bottom:2%;">Total: S/ <?php echo $total;?> (USD <?php echo number_format($totalUSD, 2);?>)</h2>
            <a  class="btn btn-primary btn-lg" href="registrar_venta.php"style="background-color:#3B81EB">  
                <i class="fa fa-check" ></i> 
                Terminar venta 
            </a>
            <a class="btn btn-danger btn-lg" href="cancelar_venta.php" style="background-color:#E85D54">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </div>
    <?php }?>
</div>
