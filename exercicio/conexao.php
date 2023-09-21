<?php
    $host = "localhost";
    $usuario = 'root';
    $senha = "";
    $database = "empresa";
    

    $connection = new mysqli($host, $usuario, $senha, $database);

    if($connection->connect_error){
        die("Falha na Conexão" . $connection->connect_error);
    }
?>