<?php
// Conexión
$servidor = 'db';
$usuario = 'MYSQL_USER';
$password = 'MYSQL_PASSWORD';
$basededatos = 'MYSQL_DATABASE';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
    session_start();
}
