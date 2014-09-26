<?php

/**
 * Domain
 */

# Instância o objeto validador
require "../models/Validador.class.php";

class Pesquisado {

    function __construct($id = null) {
        $this->id = $id;
        $this->oculto = 0;
        $this->nome = "";
        $this->sexo = "M";
        $this->cpf = "";
        $this->cargo = "";
        $this->id_pesq = $id;
        $this->dt_nasc = "";
        $this->endereco = "";
        $this->cidade = "";
        $this->bairro = "";
        $this->cep = "";
        $this->uf = "";
        $this->telefone_res = "";
        $this->telefone_cel = "";
        $this->telefone_com = "";
        $this->email = "";
        $this->formacao = "";
        $this->empresa = "";
        $this->dt_adm = "";
    }

    function validarParaInsertUpdate() {

        $validador = new Validador;

        # inicializando "resp"
        $resp = array(
            "campos" => array()
        );

        # validando...
        if ($validador->ehVazio($this->nome)) {
            $resp['campos'][] = array(
                "campo" => "nome", // nome do campo html
                "validou" => false
            );
        }

        if (!$validador->validaCPF($this->cpf)) {
            $resp['campos'][] = array(
                "campo" => "CPF", // cpf do campo html
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->cargo)) {
            $resp['campos'][] = array(
                "campo" => "cargo", // cargo do campo html
                "validou" => false
            );
        }

        if (!$validador->validaData($this->dt_nasc)) {
            $resp['campos'][] = array(
                "campo" => "nascimento", 
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->endereco)) {
            $resp['campos'][] = array(
                "campo" => "endereco", 
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->bairro)) {
            $resp['campos'][] = array(
                "campo" => "bairro", 
                "validou" => false
            );
        }
        
        if ($validador->ehVazio($this->cidade)) {
            $resp['campos'][] = array(
                "campo" => "cidade", 
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->uf)) {
            $resp['campos'][] = array(
                "campo" => "uf", 
                "validou" => false
            );
        }

        if (!$validador->validaCep($this->cep)) {
            $resp['campos'][] = array(
                "campo" => "cep", 
                "validou" => false
            );
        }
        
        if (!$validador->validaTel($this->telefone_res)) {
            $resp['campos'][] = array(
                "campo" => "telefone residencial", 
                "validou" => false
            );
        }

        if (!$validador->validaCel($this->telefone_cel)) {
            $resp['campos'][] = array(
                "campo" => "telefone celular", 
                "validou" => false
            );
        }

        if (!$validador->validaTel($this->telefone_com)) {
            $resp['campos'][] = array(
                "campo" => "telefone Comercial", 
                "validou" => false
            );
        }
        
        if (!$validador->validaEmail($this->email)) {
            $resp['campos'][] = array(
                "campo" => "e-mail", 
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->formacao)) {
            $resp['campos'][] = array(
                "campo" => "Formação", 
                "validou" => false
            );
        }

        if ($validador->ehVazio($this->empresa)) {
            $resp['campos'][] = array(
                "campo" => "empresa", 
                "validou" => false
            );
        }
        
        if (!$validador->validaData($this->dt_adm)) {
            $resp['campos'][] = array(
                "campo" => "data de admissão", 
                "validou" => false
            );
        }

        return $resp;
    }

}
