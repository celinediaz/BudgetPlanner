<?php 
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';
?>
<?php 
require_once 'includes/cabecera.php';
?>
       <div class="container">
  		<div class="row">
    		<div class="col">
               <h1 class="display-4">Todos los gastos</h1>
                <?php 
        $gastos = todos_Gastos($db, $_SESSION['usuario']['id'] ?? null);
        if (!empty($gastos)):
            while ($gasto= mysqli_fetch_assoc($gastos)):
     ?>
    
    <article class="gasto">
        <a href="gasto.php?id=<?=$gasto['gasto_id']?>">
            <h2><?=$gasto['nombre_gasto']?></h2> </a>
            <span class="fecha"><?=$gasto['nombre']?> &#10047; <?=$gasto['fecha']?> </span>
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
    <h2>No hay gastos aún. </h2>
    <?php endif; ?>
		   		</div>
			</div>
</div>

      <?php 
			require_once 'includes/pie.php'
			?>