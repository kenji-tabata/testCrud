<?php
/**
 * Model do pesquisado - manipulacao dos registros
 */
require_once "Pesquisado.class.php";

class PesqMain {

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

        $conecta->close();

        return $pesquisados;

    }

    /**
     *  Recupera os dados para a editar do pesquisado
     */
    function carregarPesq($pesquisado) {
        require 'conexao.php';
        $sqlShow = "SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = {$pesquisado->id} LIMIT 0,1";
        $queryShow = $conecta->query($sqlShow);
        $_pesquisado = $queryShow->fetch_object();

        $pesquisado->idPesq = $_pesquisado->id;
        $pesquisado->oculto = $_pesquisado->oculto;
        $pesquisado->nome   = $_pesquisado->nome;
        $pesquisado->sexo   = $_pesquisado->sexo;
        $pesquisado->cpf    = $_pesquisado->cpf;
        $pesquisado->cargo  = $_pesquisado->cargo;

        $queryShow->free();
        $conecta->close();
    }

    /**
     * Insert ou Update do pesquisado
     *
     * @param type $status
     * @param type $oculto
     * @param type $nome
     * @param type $sexo
     * @param type $cpf
     * @param type $cargo
     */
    function salvarPesq($status, $oculto, $nome, $sexo, $cpf, $cargo) {
        require 'conexao.php';

        # Se o id do pesquisado existir atualiza o registro
        if ($_GET['id']) {
            $sql = "UPDATE pesq_main SET status= ?, oculto= ?, nome= ?, sexo= ?, cpf= ?, cargo= ? WHERE id= ?";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssssi", $status, $oculto, $nome, $sexo, $cpf, $cargo, $_GET['id']);
            } else {
                die("Nao foi possivel atualizar o pesquisado!");
            }
        }
        # Caso o id do pesquisado nao existir insira um novo registro
        else {
            $sql = "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) values (?, ?, ?, ?, ?, ?)";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssss", $status, $oculto, $nome, $sexo, $cpf, $cargo);
            } else {
                die("Nao foi possivel adicionar o pesquisado!");
            }
        }

        # Executa a query SQL se nao ocorrer nenhum erro
        if ($query->execute()) {
            $query->close();
        } else {
            die("Nao foi possivel executar o servico!");
        }

        $conecta->close();
    }

    /**
     * Remove o registro do pesquisado
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