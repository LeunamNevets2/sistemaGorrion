<?php
include_once "encabezado.php";
include_once "navbar.php";
session_start();

if(empty($_SESSION['usuario'])) header("location: login.php");

$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el usuario';
    exit;
}
include_once "funciones.php";
$usuario = obtenerUsuarioPorId($id);
?>
<div class="container " style="background-color:rgba(217, 217, 217, 0.65) ;border-radius: 40px; margin-top:1% ; margin-bottom:2%; padding-top:2%;padding-bottom:4%; padding-left:5%; padding-right:5%;">
    <h2 style="margin-bottom: 20px;">Editar usuario</h2>
    <form method="post">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre de usuario</label>
            <input type="text" name="usuario" class="form-control" value="<?php echo $usuario->usuario;?>" id="usuario" placeholder="Escribe el nombre de usuario. ">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" id="nombre" placeholder="Escribe el nombre completo del usuario">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" pattern="[0-9]{9}" name="telefono" class="form-control" value="<?php echo $usuario->telefono;?>" id="telefono" placeholder="Ej. 911568974">
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?php echo $usuario->direccion;?>" id="direccion" placeholder="Ej. Av Collar 1005 Col Las Cruces">
        </div>

        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg"style="background-color:#3B81EB">
            
            </input>
            <a href="usuarios.php" class="btn btn-danger btn-lg"style="background-color:#E85D54">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    if(empty($usuario)
    ||empty($nombre) 
    || empty($telefono) 
    || empty($direccion)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "funciones.php";
    $resultado = editarUsuario($usuario, $nombre, $telefono, $direccion, $id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Información de usuario actualizada con éxito.
        </div>';
    }
    
}
?>