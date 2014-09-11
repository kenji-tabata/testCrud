<?php

class pesqMain {

    /**
     * Carrega todos os registros da Tabela pesq_main
     */
    function listarPesq() {
        require 'conexao.php';

        $sqlSelect = "SELECT * FROM pesq_main ORDER BY id DESC";
        $querySelect = $conecta->query($sqlSelect);

        $pesquisados = array();
        while ($pesquisado = $querySelect->fetch_object()) {
            $pesquisados[$pesquisado->id] = $pesquisado;
        }

        $this->pesquisados = $pesquisados;

        $conecta->close();
    }

    /**
     *  Recupera os dados para a view
     */
    function carregaPesq($idPesq) {
        require 'conexao.php';

        $sqlShow = "SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = $idPesq LIMIT 0,1";
        $queryShow = $conecta->query($sqlShow);
        
        $pesquisado = $queryShow->fetch_object();

        $this->pesquisado = $pesquisado;

        $queryShow->free();
        $conecta->close();
    }

    /**
     * Insert ou Update pesquisado
     */
    function salvarPesq($status, $oculto, $nome, $sexo, $cpf, $cargo) {
        require 'conexao.php';

        if ($_GET['id']) {
            $sql = "UPDATE pesq_main SET status= ?, oculto= ?, nome= ?, sexo= ?, cpf= ?, cargo= ? WHERE id= ?";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssssi", $status, $oculto, $nome, $sexo, $cpf, $cargo, $_GET['id']);
            } else {
                die("Nao foi possivel executar o servico!");
            }
        } else {
            $sql = "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) values (?, ?, ?, ?, ?, ?)";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssss", $status, $oculto, $nome, $sexo, $cpf, $cargo);
            } else {
                die("Nao foi possivel adicionar o pesquisado!");
            }
        }

        if ($query->execute()) {
            $query->close();
        } else {
            die("Nao foi possivel executar o servico!");
        }

        $conecta->close();
    }

    /**
     * Delete pesquisado
     */
    function deletarPesq() {
        require 'conexao.php';

        $sqlDelete = "DELETE FROM pesq_main WHERE id = ?";

        if ($queryDelete = $conecta->prepare($sqlDelete)) {
            $queryDelete->bind_param("i", $_GET['id']);

            if ($queryDelete->execute()) {
                $queryDelete->close();
                header('location: ../controllers/pesq-index.php');
            } else {
                die("Nao foi possivel deletar o usuario.");
            }
        }
    }

}

?>