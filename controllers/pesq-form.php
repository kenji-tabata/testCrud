<?php

/**
 * Abrir formulario de pesquisa
 * UPDATE ou INSERT
 */
$idPesq = isset($_GET['id']) ? $_GET['id'] : null;

# Update
if ($idPesq) {

    include "../models/pesqMain.class.php";
    $pesqMain = new pesqMain;
    $pesqMain->carregaPesq($idPesq);

    # Inicializando variaveis
    $urlAction = "../controllers/pesq-form-action.php?id=$idPesq";
    
    # Inicializa as variaveis com os dados do pesquisado
    $oculto = $pesqMain->pesquisado->oculto;
    $nome  = $pesqMain->pesquisado->nome;
    $sexo = $pesqMain->pesquisado->sexo;
    $cpf = $pesqMain->pesquisado->cpf;
    $cargo = $pesqMain->pesquisado->cargo;
}
# Insert
else {

    # Inicializaçao dos controles
    $urlAction = "../controllers/pesq-form-action.php";
    
    # Inicializa as variaveis com dados padroes
    $oculto = 0;
    $nome  = "";
    $sexo   = "M";
    $cpf    = "";
    $cargo  = "";
}


/*
 * View
 */
$view = new stdClass();
$view->urlAction = $urlAction;
$view->pesquisado = new stdClass();
$view->pesquisado->idPesq = $idPesq;
$view->pesquisado->oculto = $oculto;
$view->pesquisado->nome  = $nome;
$view->pesquisado->sexo = $sexo;
$view->pesquisado->cpf = $cpf;
$view->pesquisado->cargo = $cargo;
require "../views/pesq-form.php";
?>
