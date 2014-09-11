<?php

/**
 * Carrega do dados do banco para a VIEW
 */
include "../models/pesqMain.class.php";
$pesqMain = new pesqMain;
$pesqMain->listarPesq();

/**
 * View
 */
$view = new stdClass();
$view->pesquisados = $pesqMain->pesquisados;
require "../views/pesq-index.php";
