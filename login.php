<?php
require 'includes/config/database.php';
$db=conectarDB();
$errores=[];
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $email= mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ;
    $password=  mysqli_real_escape_string($db,$_POST['password']);
    if (!$email){
        $errores[]= "El email no es valido";
    }
        if (!$password){
        $errores[]= "La contraseña no es valida";
    }
    if (empty($errores)){
        $query= "SELECT * FROM usuarios WHERE email= '$email';";
        $resultado= mysqli_query($db,$query);
        if ($resultado->num_rows){
            //COMPRUEBA SI EL MAIL EXISTE
            $usuario=mysqli_fetch_assoc($resultado);
            //VERIFICAR PASSWORD
            $auth= password_verify($password, $usuario['password']);
            if ($auth){
                session_start();
                $_SESSION['usuario']=$usuario['email'];
                $_SESSION['login']=true;
                header('Location: /admin');
            }
            else{
                $errores[]="La contraseña es incorrecta";
            }
        }
        else{
            $errores[]="El usuario no existe";
        }
    }
}


//Inlcuye el header
require "includes/funciones.php";

incluirTemplate('header') ?>

    <main class="seccion contenedor contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <?php foreach ($errores as $error) {?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php }?>
        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Contraseña</legend>
                <label for="email">Email</label>
                <input name="email" type="email" id="email" placeholder="Tu email" required>
                <label for="password">Contraseña</label>
                <input name="password" type="password" id="password" placeholder="Tu constraseña" required>
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton-verde">
        </form>
    </main>

<?php 
incluirTemplate('footer')
 ?>