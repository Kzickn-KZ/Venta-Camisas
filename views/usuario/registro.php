<h1>Registrase</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong class="alert_green">REGISTRO COMPLETADO CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">REGISTRO FALLIDO</strong>
<?php endif ?>
<?php Utils::deleteSession('register');?>
    
<form action="<?=base_url?>/usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required />

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required />

    <label for="email">Email</label>
    <input type="email" name="email" required />

    <label for="password">Password</label>
    <input type="password" name="password" required />

    <input type="submit" value="Registrarse" />
   

</form>