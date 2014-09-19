<?php
/**
 * Gateway
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
     */
    function salvarPesq($pesq_request) {
        require 'conexao.php';
        # Se o id do pesquisado existir atualiza o registro
        if ($pesq_request->id) {
            $sql = "UPDATE pesq_main SET status= ?, oculto= ?, nome= ?, sexo= ?, cpf= ?, cargo= ? WHERE id= ?";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssssi", 
                        $pesq_request->status, 
                        $pesq_request->oculto, 
                        $pesq_request->nome, 
                        $pesq_request->sexo, 
                        $pesq_request->cpf, 
                        $pesq_request->cargo, 
                        $pesq_request->id
                    );
                echo "Pesquisado atualizado com sucesso";
            } else {
                echo "Nao foi possivel atualizar o pesquisado!";
                die();
            }
        }
        # Caso o id do pesquisado nao existir insira um novo registro
        else {
            $sql = "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) values (?, ?, ?, ?, ?, ?)";
            if ($query = $conecta->prepare($sql)) {
                $query->bind_param("ssssss", 
                        $pesq_request->status, 
                        $pesq_request->oculto, 
                        $pesq_request->nome, 
                        $pesq_request->sexo, 
                        $pesq_request->cpf, 
                        $pesq_request->cargo
                );
                echo "Pesquisado adicionado com sucesso";
            } else {
                echo "Nao foi possivel adicionar o pesquisado!";
                die();
            }
        }

        # Executa a query SQL se nao ocorrer nenhum erro
        if ($query->execute()) {
            $query->close();
        } else {
            die("Nao foi possivel executar o servico 2!");
        }

        $conecta->close();
    }

    /**
     * Remove o registro do pesquisado
     */
    function deletarPesq() {
        require 'conexao.php';
        $id_pesq = $_POST['id'];
        
        $sqlDelete = "DELETE FROM pesq_main WHERE id = ?";

        if ($queryDelete = $conecta->prepare($sqlDelete)) {
            $queryDelete->bind_param("i", $id_pesq);

            if ($queryDelete->execute()) {
                $queryDelete->close();
                echo "Pesquisado deletado com sucesso!";
            } else {
                die("Nao foi possivel deletar o usuario.");
            }
        }
    }

}

?>