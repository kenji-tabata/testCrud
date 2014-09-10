<?php

/**
 * Carrega do dados do banco para a VIEW
 */

require 'conexao.php';

$sqlSelect = "SELECT * FROM pesq_main ORDER BY id DESC";
$querySelect = $conecta->query($sqlSelect);

$lista = "<table border='1px'>"
 . "<tr>"
 . "<th>ID</th>"
 . "<th>Nome</th>"
 . "<th>Sexo</th>"
 . "<th>CPF</th>"
 . "<th>Cargo</th>"
 . "<th>Status</th>"
 . "<th>Oculto</th>"
 . "<th>OP</th>"
 . "</tr>";

while ($consulta = $querySelect->fetch_assoc()) {

    extract($consulta);

    if ($oculto == 0) {
        $estaOculto = "Não";
    } else {
        $estaOculto = "Sim";
    }
    
    $lista .= "<tr>"
    . "<td>{$id}</td>"
    . "<td>{$nome}</td>"
    . "<td>{$sexo}</td>"
    . "<td>{$cpf}</td>"
    . "<td>{$cargo}</td>"
    . "<td>{$status}</td>"
    . "<td>{$estaOculto}</td>"
    . "<td>"
    . "<a href='../controllers/pesq-index-action.php?id={$id}' onclick='return confirm(\"Deseja realmente excluir o presquisado?\")' title='Deletar' ><img src='../imagens/del.png' title='Deletar' alt='Deletar'></a>"
    . "<a href='pesq-form.php?id={$id}' title='Editar'><img src='../imagens/edit.png' title='Editar' alt='Editar'></a>"
    . "</td>"
    . "</tr>";
}
$lista .= "</table>";
$conecta->close();

require "../views/pesq-index.php";



