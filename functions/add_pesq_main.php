<?php

$oculto = $_POST['oculto'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$cargo = $_POST['cargo'];
$status = "Não preenchido";
$qtd_erro = 0;
$campo_branco = "";

if ($nome == "" || $nome == null) {
    $qtd_erro += 1;
    $campo_branco .= "Nome ";
}

if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
    $qtd_erro += 1;
    $campo_branco .= "CPF ";
}

if ($cargo == "" || $cargo == null) {
    $qtd_erro += 1;
    $campo_branco .= "Cargo ";
}

if ($qtd_erro == 0) {
    require 'conexao.php';

    $sqlInsert = "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) values (?, ?, ?, ?, ?, ?)";
    
    if($queryInsert = $conecta->prepare($sqlInsert)){
        $queryInsert->bind_param("ssssss", $status, $oculto, $nome, $sexo, $cpf, $cargo);
    
        if($queryInsert->execute()){
            echo "Pesquisado adicionado com sucesso!";
            $queryInsert->close();
        }else{
            die("Nao foi possivel adicionar o pesquisado!");
        }
        
    }else{
        die("Nao foi possivel executar o servico!");
    }
    
    $conecta->close();
} else {
    if ($qtd_erro == 1) {
        echo "O campo $campo_branco não foi preenchido ou está preenchido de forma incorreta, volte e preencha novamente<br/><br/>"
        . "<a href='javascript:window.history.go(-1)'>Voltar</a>";
    } else {
        $campo_erro = explode(" ", $campo_branco);
        $cont_erro = 0;
        echo "Os campos ";
        for ($erros = 1; $erros <= $qtd_erro; $erros++) {
            if ($erros == 1) {
                echo "$campo_erro[$cont_erro]";
                $cont_erro++;
            } elseif ($erros < $qtd_erro) {
                echo ", $campo_erro[$cont_erro]";
                $cont_erro++;
            } else {
                echo " e $campo_erro[$cont_erro]";
                $cont_erro++;
            }
        }
        echo " não foram preenchidos ou estão preencidos de forma incorreta, volte e preencha novamente<br/><br/>"
        . "<a href='javascript:window.history.go(-1)'>Voltar</a>";
    }
}

