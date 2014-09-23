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

        $sqlSelect = $conecta->query("SELECT * FROM pesq_main ORDER BY id DESC");
        
        $pesquisados = array();
        while ($pesquisado = $sqlSelect->fetch(PDO::FETCH_OBJ)) {
            $pesquisados[$pesquisado->id] = $pesquisado;
        }

        return $pesquisados;
    }

    /**
     *  Recupera os dados para a editar do pesquisado
     */
    function carregarPesq($pesquisado) {
        require 'conexao.php';
        
        $sqlShow = $conecta->query("SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = {$pesquisado->id} LIMIT 0,1");
        $_pesquisado = $sqlShow->fetch(PDO::FETCH_OBJ);

        $pesquisado->idPesq = $_pesquisado->id;
        $pesquisado->oculto = $_pesquisado->oculto;
        $pesquisado->nome   = $_pesquisado->nome;
        $pesquisado->sexo   = $_pesquisado->sexo;
        $pesquisado->cpf    = $_pesquisado->cpf;
        $pesquisado->cargo  = $_pesquisado->cargo;
    }

    /**
     * Insert ou Update do pesquisado
     *
     */
    function salvarPesq($pesq_request) {
        require 'conexao.php';
        
        # Se o id do pesquisado existir atualiza o registro
        if ($pesq_request->id) {
            $query = $conecta->prepare(
                "UPDATE pesq_main SET status= :status, oculto= :oculto, "
                . "nome= :nome, sexo= :sexo, cpf= :cpf, cargo= :cargo WHERE id= :id");
            
           $query->bindParam(":id", $pesq_request->id, PDO::PARAM_INT);
        }
        # Caso o id do pesquisado não existir insira um novo registro
        else {
            $query = $conecta->prepare(
                "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) "
                . "values (:status, :oculto, :nome, :sexo, :cpf, :cargo)");
        }
        
        # Pseudo-name Insert / Update
        $query->bindParam(":status", $pesq_request->status, PDO::PARAM_STR);
        $query->bindParam(":oculto", $pesq_request->oculto, PDO::PARAM_STR);
        $query->bindParam(":nome", $pesq_request->nome, PDO::PARAM_STR);
        $query->bindParam(":sexo", $pesq_request->sexo, PDO::PARAM_STR);
        $query->bindParam(":cpf", $pesq_request->cpf, PDO::PARAM_STR);
        $query->bindParam(":cargo", $pesq_request->cargo, PDO::PARAM_STR);
        
        # Executa a query SQL
        $query->execute();

        # Mensagem
        if ($query && $pesq_request->id) {
            echo "Pesquisado atualizado com sucesso";
        } elseif($query) {
            echo "Pesquisado adicionado com sucesso";
        } else{
            die("Não foi possível executar o serviço solicitado!");
        }
    }

    /**
     * Remove o registro do pesquisado
     */
    function deletarPesq() {
        require 'conexao.php';
        $idPesq = $_POST['id'];
        
        $sqlDelete = $conecta->prepare("DELETE FROM pesq_main WHERE id = :id");

        $sqlDelete->bindParam(":id", $idPesq, PDO::PARAM_INT);
        
        if ($sqlDelete->execute()) {
            echo "Pesquisado deletado com sucesso!";
        } else {
            echo "Não foi possível deletar o pesquisado.";
            die();
        }
    }
}

?>