<?php
    $conecta = mysql_connect("localhost", "root", "1234");
    mysql_select_db("test_dom", $conecta);
    
    if(mysqli_connect_errno()){
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
    }
    
    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');