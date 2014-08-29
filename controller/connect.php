<?php

$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$nome_bd = "test_dom";

$conexao = mysql_connect($servidor, $usuario, $senha);
mysql_select_db($nome_bd, $conexao);
