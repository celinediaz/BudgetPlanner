<?php 
require_once 'includes/cabecera.php';
?>
<div class="container">
  <div class="row">
    <div class="col">
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h3>
            <a  href="crear-gasto.php" class="btn btn-success">Crear gastos</a>
            <a href="crear-categoria.php" class="btn btn-secondary">Crear categoria</a>
            <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
        <h3>Login</h3>
        
        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alert alert-danger">
                <?=$_SESSION['error_login'];?>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="POST"> 
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" />
			</div>
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" />
			</div>
            <input class="btn btn-primary" type="submit" value="Entrar" />
        </form>
    </div>
</div>
<div class="col">
        <h3>Registro</h3>

        <?php if(isset($_SESSION['completado'])): ?>
            <div class="alert alert-success">
                <?=$_SESSION['completado']?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alert alert-danger">
                <?=$_SESSION['errores']['general']?>
            </div>
        <?php endif; ?>
        
        <form action="registro.php" method="POST"> 
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
			</div>
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="apellidos">Apellidos</label>
            <input class="form-control" type="text" name="apellidos" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
			</div>
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
			</div>
			<div class="ht-tm-element ht-tm-element-inner">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
			</div>
            <input  class="btn btn-primary" type="submit" name="submit" value="Registrar" />
        </form>
        <?php borrarErrores(); ?>
    <?php endif; ?>
	</div>
  </div>
</div>