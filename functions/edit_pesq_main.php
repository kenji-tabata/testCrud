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

    $sqlUpdate = "UPDATE pesq_main SET status= ?, oculto= ?, nome= ?, sexo= ?, cpf= ?, cargo= ? WHERE id= ?";
    	
    if($queryUpdate = $conecta->prepare($sqlUpdate)){
        $queryUpdate->bind_param("ssssssi", $status, $oculto, $nome, $sexo, $cpf, $cargo, $id);
    
        if($queryUpdate->execute()){
            echo "Os dados do Pesquisado foram alterados com sucesso com sucesso!";
            $queryUpdate->close();
        }else{
            die("Nao foi possivel alterar os dados do pesquisado!");
        }
        
    }else{
        die("Nao foi possivel executar o servico!");
    }
    
    $conecta->close();