<?php
if(isset($_POST)){
	require_once 'includes/conexion.php';

	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $presupuesto = isset($_POST['presupuesto']) ? (int)$_POST['presupuesto'] : false;
    $userid = $_SESSION['usuario']['id'];

	//
	$errores = array();

	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	if(count($errores)==0){
		$sql = "INSERT INTO categorias VALUES(NULL, '$nombre', '$descripcion', $presupuesto, $userid);";
		$guardar = mysqli_query($db, $sql);
	}
	header("Location: index.php");
}