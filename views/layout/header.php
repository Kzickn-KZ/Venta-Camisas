<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="uft-8" />
    <link rel="stylesheet" href="<?=base_url?>/assets/css/styles.css">
    <title>Tienda de camisetas</title>
</head>
<body>
    <div id="container">

<!--- CABECERA -->
<header id="header">
    <div id="logo">
        <img src="<?=base_url?>/assets/img/camiseta.png" alt="camiseta logo">
        <a href="index.php">
            <h1>Tienda de camisetas</h1>
        </a>
    </div>
</header>
<!--- MENU -->
<?php $categorias = Utils::showCategorias();?>
<nav id="menu">
    <ul>
        <li>  
            <a href="#"> Inicio </a>
        </li>
        <?php  while($cat = $categorias->fetch_object()) :  ?>
            <li>  
            <a href="#"> <?=$cat->nombre?></a>
        </li>
        <?php endwhile; ?>
            
    </ul>
</nav>
<!--- BARRA LATERAL -->
<div id="content">