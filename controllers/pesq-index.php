<?php

/**
 * Carrega do dados do banco para a VIEW
 */

require 'conexao.php';

$sqlSelect = "SELECT * FROM pesq_main ORDER BY id DESC";
$querySelect = $conecta->query($sqlSelect);

$pesquisados = array();
while ($pesquisado = $querySelect->fetch_object()) {
    $pesquisados[$pesquisado->id] = $pesquisado;
}

$conecta->close();

/**
 * View
 */
$view = new stdClass();
$view->pesquisados = $pesquisados;
require "../views/pesq-index.php";
