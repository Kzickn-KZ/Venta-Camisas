<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>/categoria/save" method="POST">

<label for="Nombre categoria">Nombre</label>
<input type="text" name="nombre" id="nombre" required/>

<input type="submit" name="guardar" />
</form>