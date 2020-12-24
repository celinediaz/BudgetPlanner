<?php   require_once 'conexion.php'; ?>
<?php   require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Budget planner</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap4-daydream.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Shadows+Into+Light" rel="stylesheet">
    
    
  </head>
  <body>
        
	  
	  <div class="bg-primary text-white navbar-dark">
    	<div class="container">
		  <nav class="navbar px-0 navbar-expand-lg navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			  <div class="navbar-nav">
				<a href="index.php" class="pl-md-0 p-3 text-white">Inicio</a>
			  </div>
				<div class="btn-group">
				  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				  Categorías
				  </button>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="crear-categoria.php">Crear categorías</a>
					<a class="dropdown-item" href="editar-categoria.php">Editar categorías</a>
					<?php   $categorias= conseguir_Categorias($db, $_SESSION['usuario']['id']);
								if (!empty($categorias)):
									while ($categoria= mysqli_fetch_assoc($categorias)):
							 ?> 
					<a class="dropdown-item" href="categoria.php?id=<?=$categoria['id']?>"> <?= $categoria['nombre']?></a>
					<?php   
									endwhile;
								endif;
					 ?>
				  </div>
				</div>
				<div class="navbar-nav">
				<a href="crear-gasto.php" class="p-3 text-decoration-none text-white">Crear gasto</a>
				<a href="acc.php" class="p-3 text-decoration-none text-white">Account</a>
				</div>
			</div>
		  </nav>

		  </div>
  </div>
	  
	  
	  