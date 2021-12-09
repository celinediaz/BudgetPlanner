<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>

<div class="container">
  <div class="row">
    <div class="col">
	<h1 class="display-4">Crear categorías</h1>
	<p> 
		Crea categorías para organizar tus gastos.
	</p>

	<form action="guardar-categoria.php" method="POST">
		<label for="nombre">Nombre de la categoría:</label>
		<input  class="form-control" type="text" name="nombre" />
		<div class="form-group">
		<label for="presupuesto">Presupuesto:</label>
		<input type="text" class="form-control" name="presupuesto" />
		</div>
		<div class="form-group">
		<label for="descripcion">Descripción:</label>
		<textarea class="form-control" name="descripcion"> </textarea> 
		</div>
		<input class="btn btn-primary" type="submit" value="Guardar" />
	</form>
</div> 
</div>
</div>

<?php require_once 'includes/pie.php'; ?>


