<?php

function mostrarError($errores, $campo){
    $alerta = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class = 'alerta alerta-error '>".$errores[$campo].'</div>';
    }
    return $alerta;
}

function borrarErrores(){
    unset($_SESSION['errores']);
    unset($_SESSION['completado']);
    unset($_SESSION['errores_entrada']);
    return true;
}

function mostrarCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();

    if ( $categorias && mysqli_num_rows($categorias) >= 1 ) {
        $resultado = $categorias;
    }
    return $resultado;
}

function mostrarCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();

    if ( $categorias && mysqli_num_rows($categorias) >= 1 ) {
        $resultado = mysqli_fetch_assoc($categorias);;
    }
    return $resultado;
}

function mostrarEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario'  FROM entradas e ".
    "INNER JOIN categorias c ON e.categoria_id = c.id ".
    "INNER JOIN usuarios u ON e.usuario_id = u.id ";

    if ( !empty($categoria) ) {
        $sql .="WHERE e.categoria_id = $categoria ";
    }

    if ( !empty($busqueda) ) {
        $sql .="WHERE e.titulo LIKE '%$busqueda%' ";
    }

    $sql .= "ORDER BY e.id DESC "; 

    if ( $limit ) {
        $sql .="LIMIT 4";
    }
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if ( $entradas && mysqli_num_rows($entradas) >= 1 ) {
        $resultado = $entradas;
    }
    return $resultado;
}

function mostrarEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS 'usuario' FROM entradas e ".
            "INNER JOIN categorias c ON e.categoria_id = c.id ".
            "INNER JOIN usuarios u ON e.usuario_id = u.id ".
            "WHERE e.id = $id";
            
    $entrada = mysqli_query($conexion, $sql);
    $resultado = array();

    if ( $entrada && mysqli_num_rows($entrada) >= 1 )  {
        $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;
}

?>