<?php
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){	
	$gasto_id = $_GET['id'];
	$sql = "DELETE FROM Gasto WHERE gasto_id = $gasto_id";
	$borrar = mysqli_query($db, $sql);
}

header("Location: index.php");
