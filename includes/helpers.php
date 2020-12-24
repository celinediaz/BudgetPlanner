
<?php

function mostrarError($errores, $campo){
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div class='alert alert-danger' role=`alert'>".$errores[$campo].'</div>';
	}
	return $alerta;
}

function borrarErrores(){
	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['errores_gasto'])){
		$_SESSION['errores_gasto'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['completado'])){
		$_SESSION['completado'] = null;
		$borrado = true;
	}
	
	return $borrado;
}
function conseguir_Categoria($conexion, $id){
	$sql= "SELECT * FROM categorias WHERE id = $id;";
	$categorias = mysqli_query($conexion,$sql);
	$resultado=array();
	if ($categorias && mysqli_num_rows($categorias)>=1) {
		$resultado=mysqli_fetch_assoc($categorias) ;
	}
		return $resultado;

}
function conseguir_Categorias($conexion, $id){
	$sql= "SELECT * FROM categorias WHERE user_id =  $id ORDER BY id ASC;";
	$categorias = mysqli_query($conexion,$sql);
	$resultado=array();
	if ($categorias && mysqli_num_rows($categorias)>=1) {
		$resultado= $categorias;
	}
	
		return $resultado;
}

function conseguir_Gastos($conexion, $categoria){
	$sql= "SELECT * FROM Gasto WHERE categoria_id = $categoria;";
	$gastos= mysqli_query($conexion,$sql);
	 return $gastos;
}

function conseguir_Gasto($conexion,$id){
	$sql = "SELECT categorias.nombre, Gasto.* FROM gasto INNER JOIN categorias ON Gasto.categoria_id = categorias.id where Gasto.gasto_id =$id;";
	$gasto = mysqli_query($conexion, $sql);
	
	$resultado = array();
	if($gasto && mysqli_num_rows($gasto) >= 1){
		$resultado = mysqli_fetch_assoc($gasto);
	}

	return $resultado;

}

function dinero_Restante($conexion, $id){
$sql = "SELECT presupuesto, categorias.presupuesto - sum(Gasto.precio) AS gastado, 100-(100*(categorias.presupuesto - sum(Gasto.precio))/presupuesto) AS porcent FROM Gasto INNER JOIN categorias ON categorias.id = Gasto.categoria_id WHERE Gasto.categoria_id =  $id;";
$dinero = mysqli_query($conexion, $sql);
$resultado = array();
	if($dinero && mysqli_num_rows($dinero) >= 1){
		$resultado = mysqli_fetch_assoc($dinero);
	}

	return $resultado;
}

function todos_Gastos($conexion, $id){
$sql = "SELECT categorias.*, Gasto.* FROM gasto INNER JOIN categorias ON Gasto.categoria_id = categorias.id where categorias.user_id =$id ORDER BY gasto.fecha DESC;";
$gastos= mysqli_query($conexion,$sql);
$resultado = array();
return $gastos;
}
