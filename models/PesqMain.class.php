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

        $sqlShow = $conecta->query(
                "SELECT * FROM pesq_main INNER JOIN pesq_comple "
                . "ON (pesq_main.id = pesq_comple.id_pesq) "
                . "WHERE id = {$pesquisado->id} LIMIT 0,1");
        $_pesquisado = $sqlShow->fetch(PDO::FETCH_OBJ);

        $pesquisado->idPesq = $_pesquisado->id;
        $pesquisado->oculto = $_pesquisado->oculto;
        $pesquisado->nome   = $_pesquisado->nome;
        $pesquisado->sexo   = $_pesquisado->sexo;
        $pesquisado->cpf    = $_pesquisado->cpf;
        $pesquisado->cargo  = $_pesquisado->cargo;
        
        $pesquisado->id_pesq = $_pesquisado->id_pesq;
        $pesquisado->dt_nasc    = $_pesquisado->dt_nasc;
        $pesquisado->endereco   = $_pesquisado->endereco;
        $pesquisado->bairro     = $_pesquisado->bairro;
        $pesquisado->cidade     = $_pesquisado->cidade;
        $pesquisado->uf         = $_pesquisado->uf;
        $pesquisado->cep        = $_pesquisado->cep;
        $pesquisado->telefone_res   = $_pesquisado->telefone_res;
        $pesquisado->telefone_cel   = $_pesquisado->telefone_cel;
        $pesquisado->telefone_com = $_pesquisado->telefone_com;
        $pesquisado->email      = $_pesquisado->email;
        $pesquisado->formacao   = $_pesquisado->formacao;
        $pesquisado->empresa    = $_pesquisado->empresa;
        $pesquisado->dt_adm     = $_pesquisado->dt_adm;
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
                "UPDATE pesq_main INNER JOIN pesq_comple ON (pesq_main.id = pesq_comple.id_pesq) "
                    . "SET status= :status, oculto= :oculto, nome= :nome, sexo= :sexo, cpf= :cpf, "
                    . "cargo= :cargo, dt_nasc= :dt_nasc, endereco= :endereco, bairro= :bairro,"
                    . "cidade= :cidade, uf= :uf, cep= :cep, telefone_res= :telefone_res, "
                    . "telefone_cel= :telefone_cel, telefone_com= :telefone_com, email= :email,"
                    . "formacao= :formacao, empresa= :empresa, dt_adm= :dt_adm, dt_preen= :dt_preen"
                    . " WHERE id= :id");

            $query->bindParam(":id", $pesq_request->id, PDO::PARAM_INT);
            $query->bindParam(":status", $pesq_request->status, PDO::PARAM_STR);
            $query->bindParam(":oculto", $pesq_request->oculto, PDO::PARAM_STR);
            $query->bindParam(":nome", $pesq_request->nome, PDO::PARAM_STR);
            $query->bindParam(":sexo", $pesq_request->sexo, PDO::PARAM_STR);
            $query->bindParam(":cpf", $pesq_request->cpf, PDO::PARAM_STR);
            $query->bindParam(":cargo", $pesq_request->cargo, PDO::PARAM_STR);
        }
        # Caso o id do pesquisado não existir insira um novo registro
        else {
            $query = $conecta->prepare(
                "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) "
                    . "values (:status, :oculto, :nome, :sexo, :cpf, :cargo)");
            
            $query->bindParam(":status", $pesq_request->status, PDO::PARAM_STR);
            $query->bindParam(":oculto", $pesq_request->oculto, PDO::PARAM_STR);
            $query->bindParam(":nome", $pesq_request->nome, PDO::PARAM_STR);
            $query->bindParam(":sexo", $pesq_request->sexo, PDO::PARAM_STR);
            $query->bindParam(":cpf", $pesq_request->cpf, PDO::PARAM_STR);
            $query->bindParam(":cargo", $pesq_request->cargo, PDO::PARAM_STR);
            
            $query->execute();
            
            $pesquisadoId = $conecta->lastInsertId();
            
            $query = $conecta->prepare(
                "INSERT INTO pesq_comple (id_pesq,dt_nasc,endereco,bairro,cidade,uf,cep,telefone_res,telefone_cel,"
                    . "telefone_com,email,formacao,empresa,dt_adm,dt_preen)"
                    . "values (:pesquisadoId, :dt_nasc, :endereco, :bairro, :cidade, :uf, :cep, :telefone_res, :telefone_cel,"
                    . " :telefone_com, :email, :formacao, :empresa, :dt_adm, :dt_preen)");
            
            $query->bindParam(":pesquisadoId", $pesquisadoId, PDO::PARAM_INT);
        }

        # Pseudo-name Insert / Update
        
        //$query->bindParam(":id_pesq", $pesq_request->id_pesq, PDO::PARAM_STR);
        $query->bindParam(":dt_nasc", $pesq_request->dt_nasc, PDO::PARAM_STR);
        $query->bindParam(":endereco", $pesq_request->endereco, PDO::PARAM_STR);
        $query->bindParam(":bairro", $pesq_request->bairro, PDO::PARAM_STR);
        $query->bindParam(":cidade", $pesq_request->cidade, PDO::PARAM_STR);
        $query->bindParam(":uf", $pesq_request->uf, PDO::PARAM_STR);
        $query->bindParam(":cep", $pesq_request->cep, PDO::PARAM_STR);
        $query->bindParam(":telefone_res", $pesq_request->telefone_res, PDO::PARAM_STR);
        $query->bindParam(":telefone_cel", $pesq_request->telefone_cel, PDO::PARAM_STR);
        $query->bindParam(":telefone_com", $pesq_request->telefone_com, PDO::PARAM_STR);
        $query->bindParam(":email", $pesq_request->email, PDO::PARAM_STR);
        $query->bindParam(":formacao", $pesq_request->formacao, PDO::PARAM_STR);
        $query->bindParam(":empresa", $pesq_request->empresa, PDO::PARAM_STR);
        $query->bindParam(":dt_adm", $pesq_request->dt_adm, PDO::PARAM_STR);
        $query->bindParam(":dt_preen", $pesq_request->dt_preen, PDO::PARAM_STR);

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