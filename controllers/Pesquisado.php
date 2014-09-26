<?php

require "../models/Pesquisado.class.php";
require "../models/PesqMain.class.php";
require_once "../models/Validador.class.php";

$acao = isset($_POST['ac']) ? $_POST['ac'] : null;

switch ($acao) {
      
    case "form-insert":
        $idPesq = null;
        
        $pesquisado = new Pesquisado();
        
        $view = new stdClass();
        $view->pesquisado = $pesquisado;
        $view->urlAction  = "controllers/pesq-form-action.php";
        $view->msgErro    = "";

        require "../views/pesq-form.php";
        break;
    
    case "form-update":
        $idPesq = isset($_POST['id']) ? $_POST['id'] : null;
        
        $pesquisado = new Pesquisado($idPesq);

        $pesqMain = new PesqMain;
        $pesqMain->carregarPesq($pesquisado);
        
        $view = new stdClass();
        $view->pesquisado = $pesquisado;
        $view->urlAction  = "controllers/pesq-form-action.php?id={$pesquisado->id}";
        $view->msgErro    = "";

        require "../views/pesq-form.php";
        break;

    case "validar":
        
        $pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
        $pesq_request = json_decode($pesq_request);
        
        $pesquisado = new Pesquisado();
        $pesquisado->oculto = $pesq_request->oculto;
        $pesquisado->nome   = $pesq_request->nome;
        $pesquisado->sexo   = $pesq_request->sexo;
        $pesquisado->cpf    = $pesq_request->cpf;
        $pesquisado->cargo  = $pesq_request->cargo;
        
        $pesquisado->dt_nasc    = $pesq_request->dt_nasc;
        $pesquisado->endereco   = $pesq_request->endereco;
        $pesquisado->bairro     = $pesq_request->bairro;
        $pesquisado->cidade     = $pesq_request->cidade;
        $pesquisado->uf         = $pesq_request->uf;
        $pesquisado->cep        = $pesq_request->cep;
        $pesquisado->telefone_res   = $pesq_request->telefone_res;
        $pesquisado->telefone_cel   = $pesq_request->telefone_cel;
        $pesquisado->telefone_com = $pesq_request->telefone_com;
        $pesquisado->email      = $pesq_request->email;
        $pesquisado->formacao   = $pesq_request->formacao;
        $pesquisado->empresa    = $pesq_request->empresa;
        $pesquisado->dt_adm     = $pesq_request->dt_adm;

        $resp = $pesquisado->validarParaInsertUpdate();
        echo json_encode($resp);        
        break;

    # Mais Informações
    case "info":
        
        break;
    # Read
    case "list":
        $pesqMain = new PesqMain;

        $view = new stdClass();
        $view->pesquisados = $pesqMain->listarPesq();
        require "../views/pesq-index.php";
        break;

    # Create
    case "insert":
        
        $pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
        $pesq_request = json_decode($pesq_request);

        $pesquisado = new Pesquisado();
        $pesquisado->nome         = $pesq_request->nome;
        $pesquisado->oculto       = $pesq_request->oculto;
        $pesquisado->sexo         = $pesq_request->sexo;
        $pesquisado->cpf          = $pesq_request->cpf;
        $pesquisado->cargo        = $pesq_request->cargo;
        $pesquisado->status       = "Não preenchido";
        
        $pesquisado->id_pesq      = $pesq_request->id_pesq;
        $pesquisado->dt_nasc      = $pesq_request->dt_nasc;
        $pesquisado->endereco     = $pesq_request->endereco;
        $pesquisado->bairro       = $pesq_request->bairro;
        $pesquisado->cidade       = $pesq_request->cidade;
        $pesquisado->uf           = $pesq_request->uf;
        $pesquisado->cep          = $pesq_request->cep;
        $pesquisado->telefone_res = $pesq_request->telefone_res;
        $pesquisado->telefone_cel = $pesq_request->telefone_cel;
        $pesquisado->telefone_com = $pesq_request->telefone_com;
        $pesquisado->email        = $pesq_request->email;
        $pesquisado->formacao     = $pesq_request->formacao;
        $pesquisado->empresa      = $pesq_request->empresa;
        $pesquisado->dt_adm       = $pesq_request->dt_adm;
        $pesquisado->dt_preen     = date("Y-m-d");
        
        $pesqMain   = new PesqMain();

        $resp = $pesquisado->validarParaInsertUpdate();
        
        if (count($resp['campos']) == 0){
            $pesqMain->salvarPesq($pesquisado);
        } else {
            $validador = new Validador();
            $erros = json_encode($resp);
            
            echo $validador->camposVazios($erros);
        }
        break;
        
    # Update
    case "update":
        
        $pesq_request = isset($_POST['pesq']) ? $_POST['pesq'] : null;
        $pesq_request = json_decode($pesq_request);

        $pesquisado               = new Pesquisado();
        $pesquisado->id           = $pesq_request->id;
        $pesquisado->nome         = $pesq_request->nome;
        $pesquisado->oculto       = $pesq_request->oculto;
        $pesquisado->sexo         = $pesq_request->sexo;
        $pesquisado->cpf          = $pesq_request->cpf;
        $pesquisado->cargo        = $pesq_request->cargo;
        $pesquisado->status       = "preenchido";
        
        $pesquisado->id_pesq      = $pesq_request->id_pesq;
        $pesquisado->dt_nasc      = $pesq_request->dt_nasc;
        $pesquisado->endereco     = $pesq_request->endereco;
        $pesquisado->bairro       = $pesq_request->bairro;
        $pesquisado->cidade       = $pesq_request->cidade;
        $pesquisado->uf           = $pesq_request->uf;
        $pesquisado->cep          = $pesq_request->cep;
        $pesquisado->telefone_res = $pesq_request->telefone_res;
        $pesquisado->telefone_cel = $pesq_request->telefone_cel;
        $pesquisado->telefone_com = $pesq_request->telefone_com;
        $pesquisado->email        = $pesq_request->email;
        $pesquisado->formacao     = $pesq_request->formacao;
        $pesquisado->empresa      = $pesq_request->empresa;
        $pesquisado->dt_adm       = $pesq_request->dt_adm;
        $pesquisado->dt_preen     = date("Y-m-d");
        
        $pesqMain   = new PesqMain();

        $resp = $pesquisado->validarParaInsertUpdate();
        
        if (count($resp['campos']) == 0){
            $pesqMain->salvarPesq($pesquisado);
        } else {
            $validador = new Validador();
            $erros = json_encode($resp);
            $validador->camposVazios($erros);
        }
        break;

    # Delete
    case "delete":
        $pesq_id = isset($_POST['id']);
        
        $pesqMain = new PesqMain;
        $pesqMain->deletarPesq($pesq_id);
        break;

    default:
        echo "Sem ação em controllers/Pesquisado";
        break;
}