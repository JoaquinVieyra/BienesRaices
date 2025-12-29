<?php 
require "includes/config/database.php";
$db=conectarDB();

$email="correo@correo.com";
$password="1233456";
$passwordHash=password_hash($password,PASSWORD_BCRYPT);
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";
$resultado = mysqli_query($db, $query);


?>