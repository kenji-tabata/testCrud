<?php

/**
 * Inicia a conexao com o banco de dados
 */

$conecta = new mysqli("localhost", "root", "1234","test_dom");

if (mysqli_connect_errno()) {
    trigger_error(mysqli_connect_error());
}

$conecta->set_charset('utf8');
