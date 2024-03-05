<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
session_start();
if(empty($_SESSION['idUsuario'])) header("location: login.php");

$usuarios = obtenerUsuarios();
?>
<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:2%; padding-left:5%; padding-right:5%;">
    <h1>
        <a class="btn btn-success btn-lg" href="agregar_usuario.php" style="background-color:#489A55">
           <i class="fa fa-plus"></i>
            Agregar
        </a>
        Usuarios
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($usuarios as $usuario){
            ?>
                <tr>
                    <td><?php echo $usuario->usuario; ?></td>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td><?php echo $usuario->telefono; ?></td>
                    <td><?php echo $usuario->direccion; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_usuario.php?id=<?php echo $usuario->id; ?>"style="background-color:#59D1EB">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="eliminar_usuario.php?id=<?php echo $usuario->id; ?>"style="background-color:#EE7373">
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
                Usuario eliminado con éxito.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
?>