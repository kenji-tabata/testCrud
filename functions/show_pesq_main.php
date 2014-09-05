<?php

require 'conexao.php';

$sqlShow = "SELECT id, nome, sexo, cpf, cargo, status, oculto FROM pesq_main WHERE id = '".$_GET['id']."' LIMIT 0,1";

$queryShow = $conecta->query($sqlShow);

$rowQuery = $queryShow->fetch_assoc();

extract($rowQuery);

$queryShow->free();
$conecta->close();
?>