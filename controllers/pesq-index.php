<?php

/**
 * Carrega do dados do banco para a VIEW
 */
include "../models/PesqMain.class.php";
$pesqMain = new PesqMain;
$pesqMain->listarPesq();

/**
 * View
 */
$view = new stdClass();
$view->pesquisados = $pesqMain->pesquisados;
require "../views/pesq-index.php";
