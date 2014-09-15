<?php
require_once "../models/Validador.class.php";

class ValidatorTest extends PHPUnit_Framework_Testcase {
    
    /**
     * Verifica se o retorno da função ehVazio() é o valor pretendido
     */
    function testeNomeInserido() {
        $validator = new Validador();
        $this->assertEquals(false,$validator->ehVazio("Marcos"));
    }
    function testeNomeNaoInserido() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->ehVazio(""));
    }
    
    /**
     * Verifica se o retorno da função validaCPF() é um formato de CPF válido
     */
    function testeCPFInserido() {
        $validator = new Validador();
        $this->assertEquals(false,$validator->validaCPF("112.322.000-11"));
    }
    function testeCPFNumero() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("11232200011"));
    }
    function testeCPFPonto() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112.322.000.11"));
    }
    function testeCPFTraco() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112-322-000-11"));
    }
    function testeCPFIncompleto1() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112322.000-11"));
    }
    function testeCPFIncompleto2() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112.322000-11"));
    }
    function testeCPFIncompleto3() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112.322.00011"));
    }
    function testeCPFIncompleto4() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112.32200011"));
    }    
    function testeCPFIncompleto5() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112322000-11"));
    }
    function testeCPFIncompleto6() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF("112.322000-11"));
    }
    function testeCPFSemNumero() {
        $validator = new Validador();
        $this->assertEquals(true,$validator->validaCPF(""));
    }
    /**
     * Verifica se o retorno da função campoVazio() é o valor pretendido
     */
    function testeCampoVazio1() {
        $validator = new Validador();
        $this->assertEquals("O campo nome não foi preenchido ou está preenchido de forma incorreta.",
                $validator->camposVazios(1,["nome"]));
    }
    function testeCampoVazio2() {
        $validator = new Validador();
        $this->assertEquals("Os campos nome e cpf não foram preenchidos ou estão preenchidos de forma incorreta.",
                $validator->camposVazios(2,["nome","cpf"]));
    }
    function testeCampoVazio3() {
        $validator = new Validador();
        $this->assertEquals("Os campos nome, cpf e cargo não foram preenchidos ou estão preenchidos de forma incorreta.",
                $validator->camposVazios(3,["nome","cpf","cargo"]));
    }
}