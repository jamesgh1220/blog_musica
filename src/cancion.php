<?php require_once '../includes/cabecera.php';?> 
<?php 
    $entrada = mostrarEntrada($db, $_GET['id']);
    if ( !isset($entrada['id']) ) {
        header('Location: index.php');
    }
?>
<?php require_once '../includes/lateral.php';?>

<div id = "principal">

    <h1><?= $entrada['titulo'] ?></h1>
    <a href="genero.php?id=<?=$entrada['categoria_id']?>">
        <h2><?= $entrada['categoria'] ?></h2>
    </a><br>
    <h4><?= $entrada['fecha'] ?> | <?= $entrada['usuario'] ?></h4><br>
    <p><?= $entrada['descripcion'] ?></p><br><br>

    <?php if( isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada['usuario_id'] ): ?>
        <a href="editar-cancion.php?id=<?=$entrada['id']?>" class="boton boton-verde">Editar entrada</a>
        <a href="borrar-cancion.php?id=<?=$entrada['id']?>" class="boton boton">Borrar entrada</a>
    <?php endif; ?>
</div>

<?php require_once '../includes/pie.php';?>