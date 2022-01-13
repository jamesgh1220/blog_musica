<!--    BARRA LATERAL    -->
<aside id = "sidebar"> 

    <div id = "buscador" class="bloque">
        <div class = "identificate">
            <h3>Buscar canciones.</h3>
        </div>

            <form action="../src/buscar.php" method="POST">
                
                <input type="text" name="busqueda"><br>
                <input type="submit" name="submit" value="Buscar">

            </form>
    </div>

<?php if(isset($_SESSION['usuario'])): ?>
    <div id = "usuario-logueado" class="bloque">
        <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h3>
        <!--Botones-->
        <div id = "botones-login">
            <a href="crear-canciones.php" class="boton boton-verde"><i class="fas fa-plus-circle"></i></a>
            <a href="crear-genero.php" class="boton boton"><i class="fas fa-plus-circle"></i></a>
            <a href="mis-datos.php" class="boton boton-naranja"><i class="fas fa-user-circle"></i></a>
            <a href="cerrar.php" class="boton boton-rojo"><i class="fas fa-sign-out-alt"></i></a>
            <label >  Crear<br>canción</label>
            <label >Crear<br>género</label>
            <label >  Editar<br>perfil</label>
            <label >Cerrar<br>sesión</label>
        </div>
    </div>
<?php endif; ?>

<?php if( !isset($_SESSION['usuario']) ): ?>

    <div id = "login" class="bloque">
        <div class = "identificate">
            <h3>Identifícate.</h3>
        </div>

        <?php if( isset($_SESSION['error_login']) ): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login'];?>
            </div>
        <?php endif; ?>

            <form action="../src/login.php" method="POST">
                
                <label for="email">Email:</label>
                <input type="email" name="email"><br>

                <label for="password">Contraseña:</label>
                <input type="password" name="password">

                <input type="submit" name="submit" value="Entrar">

            </form>
    </div>

    <div id = "register" class="bloque">
        <div class = "identificate">
            <h3>Regístrate.</h3>
        </div>
        <!--MOSTRAR ERRORES-->
        <?php if(isset($_SESSION['completado'])): ?>
            <div class = "alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class = "alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>

            <form action="../src/registro.php" method="POST">
                        
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre"><br>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') :''; ?>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos"><br>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') :''; ?>
                            
                <label for="email">Email:</label>
                <input type="email" name="email"><br>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') :''; ?>

                <label for="password">Contraseña:</label>
                <input type="password" name="password"><br>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') :''; ?>

                <input type="submit" name="submit" value="Registrarse">
            </form>

            <?php borrarErrores(); ?>
            
    </div>
<?php endif; ?>
</aside>