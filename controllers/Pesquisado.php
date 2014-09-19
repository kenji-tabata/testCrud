<?php

require "../models/Pesquisado.class.php";
require "../models/PesqMain.class.php";

$acao = isset($_POST['ac']) ? $_POST['ac'] : null;

switch ($acao) {
    case "validar":
        
        $pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
        $pesq_request = json_decode($pesq_request);
        
        $pesquisado = new Pesquisado();
        $pesquisado->oculto = $pesq_request->oculto;
        $pesquisado->nome   = $pesq_request->nome;
        $pesquisado->sexo   = $pesq_request->sexo;
        $pesquisado->cpf    = $pesq_request->cpf;
        $pesquisado->cargo  = $pesq_request->cargo;

        $resp = $pesquisado->validarParaInsertUpdate();
        echo json_encode($resp);        
        break;

    case "insert":
        
        $pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
        $pesq_request = json_decode($pesq_request);

        $pesquisado = new Pesquisado();
        $pesquisado->nome   = $pesq_request->nome;
        $pesquisado->oculto = $pesq_request->oculto;
        $pesquisado->sexo   = $pesq_request->sexo;
        $pesquisado->cpf    = $pesq_request->cpf;
        $pesquisado->cargo  = $pesq_request->cargo;
        $pesquisado->status = "Não preenchido";
        
        $pesqMain   = new PesqMain();

        $resp = $pesquisado->validarParaInsertUpdate();
        
        if (count($resp['campos']) == 0){
            $pesqMain->salvarPesq($pesquisado);
        } else {
            echo "Mensagem de Erro";
        }
        break;

    case "update":
        
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
        
        if (count($resp['campos']) == 0){
            $pesqMain->salvarPesq($pesquisado);
        } else {
            echo "Menssagem de Erro";
        }
        break;

    case "delete":
        $pesq_id = isset($_POST['id']);
        
        $pesqMain = new PesqMain;
        $pesqMain->deletarPesq($pesq_id);
        break;

    default:
        break;
}