<?php

//Iniciar sesion y la conexion a BD
require_once '../includes/conexion.php';

if( isset($_POST) ){

    //Borrar sesion de error antiguo
    if( isset($_SESSION['error_login']) ){
        unset($_SESSION['error_login']);
    }
    //Recoger datos formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta a BD para comprobar credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ( $login && mysqli_num_rows($login) == 1 ) {
        //Array asociativo que trae de la BD
        $usuario = mysqli_fetch_assoc($login);
        //Comprobar contraseña
        $verify = password_verify($password, $usuario['password']);
        if ($verify) {
            //Utilizar sesion para guardar datos de usuario logueado
            $_SESSION['usuario'] = $usuario;

        }else{
            //Si algo falla enviar sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        //Manejo de errores
        $_SESSION['error_login'] = "Login incorrecto";
    }

}

//Redirigir al index.php
header('Location: index.php');

?>