<h1>GESTIONAR CATEGORIAS</h1>

<a href="<?=base_url?>/categoria/crear" class="button button-small">Crear categoria</a>
<table>

    <th>ID</th>
    <th>NOMBRE</th>
<?php while($cat = $categorias->fetch_object()) : ?>
    <tr>
        <td><?= $cat->id ?></td>
        <td><?= $cat->nombre ?></td>
    </tr>
<?php endwhile; ?>

</table>