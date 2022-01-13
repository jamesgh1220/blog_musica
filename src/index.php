<?php require_once '../includes/cabecera.php';?> 
<?php require_once '../includes/lateral.php';?>

<div id = "principal">

    <h1>Últimas Canciones</h1>

    <?php 
        $entradas = mostrarEntradas($db, true);
        if( !empty($entradas) ):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
                <article class = "entrada"><!--article es como un div pero mejor-->
                    <a href="cancion.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada['titulo']?></h2><br>
                        <span class = "fecha"><?= $entrada['categoria'].' | '.$entrada['fecha'].' | '.$entrada['usuario']?></span>
                        <p><?= substr($entrada['descripcion'], 0, 180)."..."?></p>
                    </a>
                </article>
    <?php
            endwhile;
        endif;
    ?>

    <div id="ver-todas">
        <a href="canciones.php">Ver todas las canciones.</a>
    </div>
</div>
<?php require_once '../includes/pie.php';?>