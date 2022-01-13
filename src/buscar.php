<?php 

    if ( !isset($_POST['busqueda']) ) {
        header('Location: index.php');
    }

    require_once '../includes/cabecera.php';
    require_once '../includes/lateral.php';
?>

<div id = "principal">

    <h1>Búsqueda: <?= $_POST['busqueda'] ?></h1>

    <?php 
        $entradas = mostrarEntradas($db, null, null, $_POST['busqueda']);
        if( !empty($entradas) ):
            while( $entrada = mysqli_fetch_assoc($entradas) ):
    ?>
                <article class = "entrada"><!--article es como un div pero mejor-->
                    <a href="cancion.php?id=<?=$entrada['id']?>">
                        <h2><?= $entrada['titulo']?></h2>
                        <span class = "fecha"><?= $entrada['categoria'].' | '.$entrada['fecha'].' | '.$entrada['usuario']?></span>                        <p><?= substr($entrada['descripcion'], 0, 180)."..."?></p>
                    </a>
                </article>
    <?php
            endwhile;
        else:
    ?><br><br>
    <div class = "alerta">No se encontraron resultados.</div>
    <?php
        endif;
    ?>
</div>
<?php require_once '../includes/pie.php';?>