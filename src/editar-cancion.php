<?php
require_once '../includes/redireccion.php';
require_once '../includes/cabecera.php'?> 
<?php 
    $entrada = mostrarEntrada($db, $_GET['id']);
    if ( !isset($entrada['id']) ) {
        header('Location: index.php');
    }
?>
<?php require_once '../includes/lateral.php';?>


<div id = "principal">

    <h1>Editar Canción</h1>
    <p>Edita tu canción <?='"'.$entrada['titulo'].'"'?>.</p><br>

    <form action="guardar-cancion.php?editar=<?=$entrada['id']?>" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?=$entrada['titulo']?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') :''; ?>


        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" ><?=$entrada['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') :''; ?>


        <label for="categoria">Categoría:</label>
        <select name="categoria" >
            <?php $categorias = mostrarCategorias($db); 
                    if ( !empty($categorias) ):
                        while ( $categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>"
                    <?= $categoria['id'] == $entrada['categoria_id'] ? 'selected="selected"' : '' ?>
                >
                    <?=$categoria['nombre']?>
                </option>
            <?php
                        endwhile;
                    endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') :''; ?>


        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>               
</div>


<?php require_once '../includes/pie.php';?>