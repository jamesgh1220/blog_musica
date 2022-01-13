<?php
require_once 'conexion.php';
require_once 'helpers.php'; 
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Blog de Música</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
    </head>

    <body>
        <!--    CABECERA    -->
        <header id = "cabecera">
            <!--    LOGO    -->
            <div id = "logo">
                <a href="index.php">
                    Blog de Musica.
                </a>
            </div>
            <!--MENÚ-->
            <nav id = "menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php 
                        $categorias = mostrarCategorias($db); 
                        if( !empty($categorias) ):
                            while ( $categoria = mysqli_fetch_assoc($categorias)): 
                    ?>
                            <li>
                                <a href="../src/genero.php?id=<?= $categoria['id']?>"><?= $categoria['nombre']?></a>
                            </li>
                    <?php 
                            endwhile; 
                        endif;
                    ?>
                    <li>
                        <a href="index.php">Sobre mí</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        <div id = "contenedor">