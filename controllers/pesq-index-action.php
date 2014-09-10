<?php

/**
 * DELETE
 */
if ($_GET) {
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