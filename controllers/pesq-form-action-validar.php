<?php
/**
 * Recuperar dados do formulário de pesquisado e efetua UPDATE ou INSERT e
 *
 * valida dados
 * e mostra erros
 */

$pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
$pesq_request = json_decode($pesq_request);
//var_dump($pesq_request);

# Instancia o objeto pesquisado
require "../models/Pesquisado.class.php";
require "../models/PesqMain.class.php";

$pesquisado = new Pesquisado();
$pesquisado->oculto = $pesq_request->oculto;
$pesquisado->nome   = $pesq_request->nome;
$pesquisado->sexo   = $pesq_request->sexo;
$pesquisado->cpf    = $pesq_request->cpf;
$pesquisado->cargo  = $pesq_request->cargo;

$pesqMain   = new PesqMain();

$resp = $pesquisado->validarParaInsertUpdate();

echo json_encode($resp);
