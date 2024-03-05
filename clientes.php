<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$clientes = obtenerClientes();
?>
<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:2%; padding-left:5%; padding-right:5%;">
    <h1>
        <a class="btn btn-success btn-lg" href="agregar_cliente.php" style="background-color:#489A55">
           <i class="fa fa-plus" ></i>
            Agregar
        </a>
        Clientes
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($clientes as $cliente){
            ?>
                <tr>
                    <td><?php echo $cliente->nombre; ?></td>
                    <td><?php echo $cliente->telefono; ?></td>
                    <td><?php echo $cliente->direccion; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_cliente.php?id=<?php echo $cliente->id;?>" style="background-color:#59D1EB">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="eliminar_cliente.php?id=<?php echo $cliente->id;?>"style="background-color:#EE7373">
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
                Cliente eliminado con éxito.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
?>