<?php 
		require_once 'includes/conexion.php';
		require_once 'includes/helpers.php';
 ?>
  <?php require_once 'includes/cabecera.php';
?>
 <?php  
 		$gasto_actual = conseguir_Gasto($db,$_GET['id']);
		$cat = conseguir_Categoria($db,$gasto_actual['categoria_id']);
 		if (!isset($gasto_actual['gasto_id'])) {
 			header("Location: index.php");
 		}

  ?>
<div class="container">
  		<div class="row">
    		<div class="col">

	<h1><?=$gasto_actual['nombre_gasto']?></h1>
	<h4><?=$gasto_actual['fecha']?> | <?=$gasto_actual['nombre'] ?></h4>
	<p>
        Precio: <?=$gasto_actual['precio']?> <br>
		<?=$gasto_actual['descripcion']?>
	</p>
	
	<?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $cat['user_id']): ?>
		<br/>	
		<a href="borrar-gasto.php?id=<?=$gasto_actual['gasto_id']?>" class="btn btn-danger">Borrar gasto</a>
	<?php endif; ?>
	
			</div>
	</div>
</div>
			
<?php require_once 'includes/pie.php'; ?>