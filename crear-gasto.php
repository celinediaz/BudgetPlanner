<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>


<div class="container">
    <h1 class="display-4">Crear gastos</h1>
    <p>
        Guarda tus gastos aquí
    </p>
    <br/>
    <form action="guardar-gasto.php" method="POST">
		<div class="row">
		 <div class="col">
		<div class="form-group">
        <label for="nombre">Nombre del gasto:</label>
        <input class="form-control" type="text" name="nombre" />
        <?php echo isset($_SESSION['errores_gasto']) ? mostrarError($_SESSION['errores_gasto'], 'nombre') : '' ?>
		</div>
		<div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea class="form-control" name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_gasto']) ? mostrarError($_SESSION['errores_gasto'], 'descripcion') : '' ?>
		</div>
		</div>
	  </div>
	   <div class="row">
		<div class="col-sm">
		<div class="form-group">
		<label for="fecha">Fecha:</label>
        <input class="form-control" type="date" name="fecha" />
        <?php echo isset($_SESSION['errores_gasto']) ? mostrarError($_SESSION['errores_gasto'], 'fecha') : '' ?>
		</div>
		</div>
		<div class="col-sm">
		<div class="form-group">
		<label for="precio">Precio:</label>
        <input class="form-control" type="text" name="precio" />
        <?php echo isset($_SESSION['errores_gasto']) ? mostrarError($_SESSION['errores_gasto'], 'precio') : '' ?>
		</div>
		</div>
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
		</div>
		<div class="row">
            <input class="btn btn-primary" type="submit" name="submit" value="Guardar" />   
		</div>
    </form>
    <?php borrarErrores()?>

	  </div> 

<?php require_once 'includes/pie.php';
        


