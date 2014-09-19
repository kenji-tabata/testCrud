<?php
/**
 * Recuperar dados do formulário de pesquisado e efetua UPDATE ou INSERT e
 *
 * valida dados
 * e mostra erros
 */

require "../models/Pesquisado.class.php";
require "../models/PesqMain.class.php";

$pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
$pesq_request = json_decode($pesq_request);

$pesquisado = new Pesquisado();
$pesquisado->id     = $pesq_request->id;
$pesquisado->nome   = $pesq_request->nome;
$pesquisado->oculto = $pesq_request->oculto;
$pesquisado->sexo   = $pesq_request->sexo;
$pesquisado->cpf    = $pesq_request->cpf;
$pesquisado->cargo  = $pesq_request->cargo;
$pesquisado->status = "Não preenchido";

$pesqMain   = new PesqMain();

$resp = $pesquisado->validarParaInsertUpdate();

# Se validou...
if (count($resp['campos']) == 0){
    # update
    if($pesquisado->id) {
        $pesqMain->salvarPesq($pesquisado);
//        die("update");
    }
    # insert
    else {
        $pesqMain->salvarPesq($pesquisado);
//        die("insert");
    } 
    
}
# mostra os erros...
else {
    
    # Inicia uma sessão para gravar a mensagem de erro
    session_start("errorLog");
    # Variável da sessão recebe a frase construida pela função camposVazios
//    $_SESSION["msgErro"] = $validador->camposVazios($resp, $inputVazio="mensagem de erro");
    $_SESSION["msgErro"] = "";
    die("erro");
//    header('location: pesq-form.php');
}
