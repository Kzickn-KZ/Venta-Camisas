<?php if(isset($edit) && isset($pro) && is_object($pro)) : ?>
<h1>EDITAR PRODUCTO <?= $pro->nombre?></h1>
<?php $url_action = base_url."/producto/save&id=".$pro->id; ?>
<?php else: ?>
<h1>CREAR NUEVOS PRODUCTOS</h1>
    <?php $url_action = base_url."/producto/save"; ?>
<?php endif; ?>



<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

<label for="nombre">NOMBRE</label>
<input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '' ?>"/>

<label for="descripcion">DESCRIPCION</label>
<textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>

<label for="precio">PRECIO</label>
<input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '' ?>" />

<label for="stock">STOCK</label>
<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '' ?>" />

<label for="categoria">CATEGORIA</label>
<?php $categorias = Utils::showCategorias(); ?>
<select name="categoria">
<?php while($cat = $categorias->fetch_object()) : ?>
    <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?>>
        <?=$cat->nombre?>
    </option>
<?php endwhile; ?>
</select>

<label for="imagen">IMAGEN</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <img src="<?=base_url?>/uploads/images/<?=$pro->imagen?>" class="thump">
    <?php endif; ?>
<input type="file" name="imagen" />


<input type="submit" value="Guardar">






</form>