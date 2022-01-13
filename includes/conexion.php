<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bd_music';
//$database = 'blog_master';
$db = mysqli_connect($server, $username, $password, $database);
mysqli_query($db, "SET NAMES utf8");//setear caracteres

//Inicia una sesión
if ( !isset($_SESSION) ) {
    session_start();
}
?>