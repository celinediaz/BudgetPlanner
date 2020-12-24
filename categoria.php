<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php 
    $categoria_actual = conseguir_Categoria($db,$_GET['id']);
	$rest = dinero_Restante($db,$_GET['id']);
    if (!isset($categoria_actual['id'])) {
                header('Location: index.php');
        
    }
 ?>


<div class="container">
  		<div class="row">
    		<div class="col">

    <h1 class="display-4">Gastos de <?=$categoria_actual['nombre']?></h1>
	<h3>Descripción: <?=$categoria_actual['descripcion']?></h3>
	<h3> Presupuesto: <?=$categoria_actual['presupuesto']?> </h3>
	<h3> Dinero restante: <?=$rest['gastado']?> </h3>
	<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?=(int)$rest['porcent']?>%"
    aria-valuenow="<?=(int)$rest['porcent']?>" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <?php 
        $gastos = conseguir_Gastos($db,$_GET['id']);
        if (!empty($gastos)&& mysqli_num_rows($gastos)>=1):
            while ($gasto= mysqli_fetch_assoc($gastos)):
     ?>
    
    <article class="gasto">
        <a href="gasto.php?id=<?=$gasto['gasto_id']?>">
            <h2><?=$gasto['nombre_gasto']?></h2> </a>
            <span class="fecha"><?=$gasto['fecha']?></span>
            <p>
				Precio: <?=$gasto['precio']?>
				<br>
                <?=substr($gasto['descripcion'], 0, 180)?>
            </p>
    </article>
    <?php 
            endwhile;
        else:

     ?>
    <div class="alerta">No hay gastos en esta categoría</div>
    <?php endif; ?>
			</div>
	</div>
</div>

<?php require_once 'includes/pie.php'; ?>