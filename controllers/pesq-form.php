<?php

/**
 * Abrir formulario de pesquisa
 * UPDATE ou INSERT
 */
$idPesq = isset($_GET['id']) ? $_GET['id'] : null;

# Update
if ($idPesq) {

    # Recupera os dados para a view
    require 'conexao.php';

    $sqlShow   = "SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = $idPesq LIMIT 0,1";
    $queryShow = $conecta->query($sqlShow);
    $rowQuery  = $queryShow->fetch_assoc();

    extract($rowQuery);

    $queryShow->free();
    $conecta->close();

    # Inicializando variaveis
    $urlAction = "../controllers/pesq-form-action.php?id=$idPesq";
    
}
# Insert
else {

    # Inicializaçao dos controles
    $urlAction = "../controllers/pesq-form-action.php";
    
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
