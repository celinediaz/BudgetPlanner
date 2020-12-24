<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>

<div class="container">
  <div class="row">
    <div class="col">
	<h1 class="display-4">Editar categorías</h1>
	<p> 
		Editar categorías para organizar tus gastos.
	</p>

	<form action="guardar-cat.php" method="POST">
		<div class="form-group">
        <label for="categoria">Categoría:</label>
        <select class ="custom-select" name="categoria"> 
            <?php  $categorias= conseguir_Categorias($db, $_SESSION['usuario']['id']);
					if (!empty($categorias)):
							while ($categoria= mysqli_fetch_assoc($categorias)):
			 ?> 
							 <option value="<?=$categoria['id']?>">
									<?=$categoria['nombre']?>    
								</option>
					<?php   
							endwhile;
					endif;
		?>
            
        </select>
		<?php echo isset($_SESSION['errores_gasto']) ? mostrarError($_SESSION['errores_gasto'], 'categoria') : '' ?>
		</div>
		<label for="newnombre">Nombre de la categoría:</label>
		<input  class="form-control" type="text" name="newnombre" />
		<div class="form-group">
		<label for="newpresupuesto">Presupuesto:</label>
		<input type="text" class="form-control" name="newpresupuesto" />
		</div>
		<div class="form-group">
		<label for="newdescripcion">Descripción:</label>
		<textarea class="form-control" name="newdescripcion"> </textarea> 
		</div>
		<input class="btn btn-primary" type="submit" value="Guardar" />
	</form>
</div> 
</div>
</div>

<?php require_once 'includes/pie.php'; ?>