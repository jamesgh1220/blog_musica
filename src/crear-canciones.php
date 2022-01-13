<?php
require_once '../includes/redireccion.php';
require_once '../includes/cabecera.php';
require_once '../includes/lateral.php';
?>

<div id = "principal">

    <h1>Crear Canción</h1>
    <p>Añade nuevas canciones al Blog para que los usuarios puedan conocerlas y disfrutar del contenido.</p><br>

    <form action="guardar-cancion.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') :''; ?>


        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') :''; ?>


        <label for="categoria">Género:</label>
        <select name="categoria" >
            <?php $categorias = mostrarCategorias($db); 
                    if ( !empty($categorias) ):
                        while ( $categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
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