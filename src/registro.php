<?php

if (isset($_POST)) {
    require_once '../includes/conexion.php';
    if ( ! isset($_SESSION) ) {
        session_start();   
    }
    /*Recoger valores del formulario de registro y escapas datos (mysqli_real_escape_string)
    para recibir comillas en los string*/
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ?  mysqli_real_escape_string($db, $_POST['password']) : false;
    $errores = array();
    
    //Validando los datos antes de guardarlos en la BD
    if ( ! (empty($nombre)) && ! is_numeric($nombre) && ! preg_match("/[0-9]/", $nombre) ) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre']= 'El nombre es incorrecto';
    }
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos']= 'Los apellidos son incorrectos';
    }
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email']= 'El email es incorrecto';
    }
    if (!empty($password) && strlen($password) >= 6){
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password']= 'La contraseña es incorrecta';
    }

    $guardar_usuario = false;
    if ( count($errores) == 0 ) {
        $guardar_usuario = true;
        //Cifrar la contraseña (la cifra  4 veces(cost))
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        //Insertar datos a la BD
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        /* $db es la variable en la que iniciamos la bd --> $db = mysqli_connect($server, $username, $password, $database); */
        $guardar = mysqli_query($db, $sql);
            if ( $guardar ) {
                $_SESSION['completado'] = 'El registro se completó con éxito';
            }else{
                $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
            }
    }else {
        $_SESSION['errores'] = $errores;
    }
}
header('Location:index.php');
?>