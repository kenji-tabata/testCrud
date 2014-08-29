<?php

define('DB_SERVER', 'localhost');
define('DB_NAME', 'test_dom');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '1234');

class conexao {
    var $banco, $conexao;
    public function __construct($servidor,$nome_bd,$usuario,$senha){
        $this->conexao = mysql_connect($servidor,$usuario,$senha);
        $this->banco = mysql_select_db($nome_bd,$this->conexao);
    }
    
    public function 
}
