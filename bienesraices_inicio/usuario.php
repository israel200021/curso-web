<?php

//Importar la conexion
require 'includes/config/database.php';
$db =  conectarDB();

//Crear un email y password
$email = "correo@example.com";
$password = "123456";

$passwordHash = password_hash($password,PASSWORD_BCRYPT);



//Query para crear la cuenta
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";
// echo $query;


//Agregara la base de datos
mysqli_query($db,$query);