<?php include_once "encabezado.php"; ?>

<div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);overflow: auto; background-color: #d9d9d9; max-width: 350px; padding: 20px; border-radius: 40px;">
    <div class="row m-4 no-gutters justify-content-center">
        <div class="col-lg-12 d-flex justify-content-center p-3">
            <img src="img/gorrion.png" class="img-fluid" style="min-height:100%; max-height: 50vh; width: auto;" />
        </div>
        <div class="col-lg-12 p-3">
            <div>
                <form action="login.php" method="post">
                    <div class="form-group pb-3">
                        <input type="text" placeholder="Usuario" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Contraseña" class="form-control" name="password" id="exampleInputPassword1">
                    </div>

                    <div class="pb-2">
                        <button type="submit" name="ingresar" class="btn btn-primary w-100 font-weight-bold mt-2" style="background-color:#3B75CC">Ingresar</button>
                    </div>
                </form>
            </div>

           
        </div>
    </div>
</div>
 <!-- Mensaje de alerta si se detecta un error en el inicio de sesión -->
 <?php
            if(isset($_POST['ingresar'])){
                if(empty($_POST['usuario']) || empty($_POST['password'])){
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                        Debes completar todos los datos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else {
                    include_once "funciones.php";

                    $usuario = $_POST['usuario'];
                    $password = $_POST['password'];

                    session_start();
                    $datosSesion = iniciarSesion($usuario, $password);

                    if(!$datosSesion){
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            Nombre de usuario y/o contraseña incorrectas.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    } else {
                        $_SESSION['usuario'] = $datosSesion->usuario;
                        $_SESSION['idUsuario'] = $datosSesion->id;
                        header("location: index.php");
                    }
                }
            }
            ?>
