

<?php
if(isset($_POST)){
	require_once 'includes/conexion.php';

	$nombre = isset($_POST['newnombre']) ? mysqli_real_escape_string($db, $_POST['newnombre']) : false;
    $descripcion = isset($_POST['newdescripcion']) ? mysqli_real_escape_string($db, $_POST['newdescripcion']) : false;
    $presupuesto = isset($_POST['newpresupuesto']) ? (int)$_POST['newpresupuesto'] : false;
    $userid = $_SESSION['usuario']['id'];
	$id = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;

	//
	$errores = array();

	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	if(count($errores)==0){
		$sql = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion',presupuesto=$presupuesto WHERE user_id = $userid AND id=$id;";
		$guardar = mysqli_query($db, $sql);
	}
	header("Location: categoria.php?id=$id");
}