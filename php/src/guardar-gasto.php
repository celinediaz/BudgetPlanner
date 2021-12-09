<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
	$fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($db, $_POST['fecha']) : false;
	$precio = isset($_POST['precio']) ? (float)$_POST['precio'] : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;

	
    $errores = array();
    if(empty($nombre)){
        $errores['nombre'] = 'El nombre no es válido';
    }
    
    if(empty($descripcion)){
        $errores['descripcion'] = 'La descripción no es válida';
    }
    
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = 'La categoría no es válida';
    }
	$tempDate = explode('-', $fecha);
	if(!checkdate($tempDate[1], $tempDate[2], $tempDate[0])){
        $errores['fecha'] = 'Inserta una fecha';
    }

    if (count($errores) == 0){
            $sql = "INSERT INTO Gasto VALUES(null, '$nombre', '$descripcion', '$fecha', $precio, $categoria);";
        
        $guardar = mysqli_query($db, $sql);
        header("Location: index.php");
    
    }else{
        $_SESSION['errores_gasto'] = $errores;
            header("Location: crear-gasto.php");
        }
    }    
    