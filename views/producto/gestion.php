<h1>Gestion de productos</h1>

<a href="<?=base_url?>/producto/crear" class="button button-small">Añadir producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_green">PRODUCTO CREADO CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
    <strong class="alert_red">PRODUCTO NO CREADO CORRECTAMENTE</strong>
<?php endif; ?>
<?php Utils::deletesession('producto') ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
    <strong class="alert_green">PRODUCTO BORRADOO CORRECTAMENTE</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
    <strong class="alert_red">PRODUCTO NO BORRADO CORRECTAMENTE</strong>
<?php endif; ?>
<?php Utils::deletesession('delete') ?>


<table>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>PRECIO</th>
    <th>STOCK</th>
    <th>ACCIONES</th>

<?php while($pro = $productos->fetch_object()) : ?>
    <tr>
        <td><?= $pro->id ?></td>
        <td><?= $pro->nombre ?></td>
        <td><?= $pro->precio ?></td>
        <td><?= $pro->stock ?></td>
        <td> <a href="<?=base_url?>/producto/editar&id=<?=$pro->id?>" class="button">Editar</a></td>
        <td> <a href="<?=base_url?>/producto/eliminar&id=<?=$pro->id?>" class="button">Eliminar</a></td>

    </tr>
<?php endwhile; ?>

</table>