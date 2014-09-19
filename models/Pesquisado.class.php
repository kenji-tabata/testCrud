<?php

/**
 * Domain
 */
class Pesquisado {

    function __construct($id = null) {
        $this->id = $id;
        $this->oculto = 0;
        $this->nome = "";
        $this->sexo = "M";
        $this->cpf = "";
        $this->cargo = "";
    }

    function validarParaInsertUpdate() {

        # Instância o objeto validador
        require "../models/Validador.class.php";
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


        return $resp;
    }

}
