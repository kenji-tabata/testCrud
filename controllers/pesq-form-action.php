<?php
/**
 * Recuperar dados do formulário de pesquisado e efetua UPDATE ou INSERT e
 *
 * valida dados
 * e mostra erros
 */

# Atribui os dados do pesquisado pelo metodo POST
$oculto = isset($_POST['oculto']) ? $_POST['oculto'] : null;
$nome   = isset($_POST['nome'])   ? $_POST['nome'] : null;
$sexo   = isset($_POST['sexo'])   ? $_POST['sexo'] : null;
$cpf    = isset($_POST['cpf'])    ? $_POST['cpf'] : null;
$cargo  = isset($_POST['cargo'])  ? $_POST['cargo'] : null;

# Define STATUS do formulário do pesquisado como Não preenchido
$status = "Não preenchido";

# Inicializa as variáveis da mensagem de erro
$qtdVazio = 0;
$inputVazio = null;

# Instância o objeto validador
require "../models/Validador.class.php";
$validador = new Validador;

/**
 * Valida o campo Nome
 */
if ($validador->ehVazio($nome)) {
    $inputVazio[$qtdVazio] = "Nome";
    $qtdVazio += 1;
}

/**
 * Valida o campo CPF
 */
if (!$validador->validaCPF($cpf)) {
    $inputVazio[$qtdVazio]= "CPF";
    $qtdVazio += 1;
}

/**
 * Valida o campo Cargo
 */
if ($validador->ehVazio($cargo)) {
    $inputVazio[$qtdVazio] = "Cargo";
    $qtdVazio += 1;
}

# Instancia o objeto pesquisado
require "../models/PesqMain.class.php";
$pesqMain = new PesqMain;

/**
 * update
 */
if ($qtdVazio == 0 && isset($_GET['id'])) {
    $pesqMain->salvarPesq($status, $oculto, $nome, $sexo, $cpf, $cargo);
    header('location: ../controllers/pesq-index.php');
}

/**
 * insert
 */
elseif ($qtdVazio == 0) {
    $pesqMain->salvarPesq($status, $oculto, $nome, $sexo, $cpf, $cargo);
    header('location: ../controllers/pesq-index.php');
}

/**
 * Erros
 */
else {
    # Inicia uma sessão para gravar a mensagem de erro
    session_start("errorLog");
    # Variável da sessão recebe a frase construida pela função camposVazios
    $_SESSION["msgErro"] = $validador->camposVazios($qtdVazio,$inputVazio);
    header('location: pesq-form.php');
}
