<?php
require_once '../includes/redireccion.php';
require_once '../includes/cabecera.php';
require_once '../includes/lateral.php';
?>

<div id = "principal">

    <h1>Crear género musical.</h1>
    <p>Añade nuevos géneros musicales al Blog para que los usuarios puedan usarlas.</p><br>

    <form action="guardar-genero.php" method="POST">
        <label for="nombre">Nombre del género musical:</label>
        <input type="text" name="nombre">

        <input type="submit" value="Guardar">
    </form>

</div>
<?php require_once '../includes/pie.php';?>