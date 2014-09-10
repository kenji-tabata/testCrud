<?php

/**
 * Abrir formulario de pesquisa
 * UPDATE ou INSERT
 */

$idPesq = isset($_GET['id']) ? $_GET['id'] : null;

# Se 'id' existir carregaremos dados para abrir formulario no modo UPDATE
if ($idPesq) {

    /**
     * Recupera os dados para a view
     */
    require 'conexao.php';

    $sqlShow = "SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = $idPesq LIMIT 0,1";

    $queryShow = $conecta->query($sqlShow);

    $rowQuery = $queryShow->fetch_assoc();

    extract($rowQuery);

    $queryShow->free();
    $conecta->close();
}

require "../views/pesq-form.php";
?>
