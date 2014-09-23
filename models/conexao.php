<?php

/**
 * Inicia a conexão com o banco de dados
 */

$login = "root";
$pass  = "1234";

try {
    $conecta = new PDO("mysql:host=localhost; dbname=test_dom", $login, $pass);
    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conecta->exec("SET CHARACTER SET utf8");
    
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

//$conecta = new mysqli("localhost", "root", "1234","test_dom");
//
//if (mysqli_connect_errno()) {
//    trigger_error(mysqli_connect_error());
//}
//
//$conecta->set_charset('utf8');
