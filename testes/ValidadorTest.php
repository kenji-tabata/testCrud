<?php

require_once "../models/Validador.class.php";

class ValidatorTest extends PHPUnit_Framework_Testcase {

    function testeEhVazio() {
        $validator = new Validador();
        $this->assertEquals(true, $validator->ehVazio(""));
        $this->assertEquals(false, $validator->ehVazio("Marcos"));
    }

    function testeValidaCPF() {
        $validator = new Validador();

        # CPF válido
        $this->assertEquals(true, $validator->validaCPF("112.322.000-11"));

        # CPF inválidos
        $this->assertEquals(false, $validator->validaCPF("11232200011"));
        $this->assertEquals(false, $validator->validaCPF("112.322.000.11"));
        $this->assertEquals(false, $validator->validaCPF("112-322-000-11"));
        $this->assertEquals(false, $validator->validaCPF("112322.000-11"));
        $this->assertEquals(false, $validator->validaCPF("112.322000-11"));
        $this->assertEquals(false, $validator->validaCPF("112.322.00011"));
        $this->assertEquals(false, $validator->validaCPF("112.32200011"));
        $this->assertEquals(false, $validator->validaCPF("112322000-11"));
        $this->assertEquals(false, $validator->validaCPF("112.322000-11"));
        $this->assertEquals(false, $validator->validaCPF(""));
    }

    function testeCampoVazio1() {
        $validator = new Validador();

        $msg = "O campo nome não foi preenchido ou está preenchido de forma incorreta.";
        $this->assertEquals($msg, $validator->camposVazios(1, ["nome"]));

        $msg = "Os campos nome e cpf não foram preenchidos ou estão preenchidos de forma incorreta.";
        $this->assertEquals($msg, $validator->camposVazios(2, ["nome", "cpf"]));

        $msg = "Os campos nome, cpf e cargo não foram preenchidos ou estão preenchidos de forma incorreta.";
        $this->assertEquals($msg, $validator->camposVazios(3, ["nome", "cpf", "cargo"]));
    }

}
