<?php
require 'conexao.php';

$sqlDelete = "DELETE FROM pesq_main WHERE id = ?";

if($queryDelete = $conecta->prepare($sqlDelete)){
    $queryDelete->bind_param("i", $_GET['id']);
    
    if($queryDelete->execute()){
        $queryDelete->close();
        echo "<script type='text/javascript'>alert('Pesquisado deletado com sucesso!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
    }else{
        die("Nao foi possivel deletar o usuario.");
    }
}