<h1>CREAR NUEVOS PRODUCTOS</h1>

<form action="<?=base_url?>/producto/save" method="POST" enctype="multipart/form-data">



<label for="nombre">NOMBRE</label>
<input type="text" name="nombre" />

<label for="descripcion">DESCRIPCION</label>
<textarea name="descripcion"></textarea>

<label for="precio">PRECIO</label>
<input type="text" name="precio" />

<label for="stock">STOCK</label>
<input type="number" name="stock" />

<label for="categoria">CATEGORIA</label>
<?php $categorias = Utils::showCategorias(); ?>
<select name="categoria" id="">
<?php while($cat = $categorias->fetch_object()) : ?>
    <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
<?php endwhile; ?>
</select>

<label for="imagen">IMAGEN</label>
<input type="file" name="imagen" />


<input type="submit" value="Guardar">






</form>