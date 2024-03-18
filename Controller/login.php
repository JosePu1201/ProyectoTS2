<?php
    session_start();
    include '../Model/configServer.php';
    include '../Model/consulSQL.php';


    $nombre=consultasSQL::clean_string($_POST['nombre_login']);
    echo 'Error nombre o contraseña invalido';

?>



