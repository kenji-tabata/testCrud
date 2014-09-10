<?php
/**
 * Recuperar dados do formulario de pesquisado e efetua UPDATE ou INSERT e
 * 
 * valida dados 
 * e mostra erros
 */

// Obtem os dados do pesquisado pelo metodo POST
$oculto = isset($_POST['oculto']) ? $_POST['oculto'] : null;
$nome   = isset($_POST['nome'])   ? $_POST['nome'] : null;
$sexo   = isset($_POST['sexo'])   ? $_POST['sexo'] : null;
$cpf    = isset($_POST['cpf'])    ? $_POST['cpf'] : null;
$cargo  = isset($_POST['cargo'])  ? $_POST['cargo'] : null;

// Variavel status com o valor padrao 
$status = "Não preenchido";

// Inicializa o contador de quantidade de erros 
$qtd_erro = 0;

// Inicializa em branco a variavel que armazenara o(s) nome(s) do(s) campo(s) que nao esta(ao) preenchido(s)
$campo_branco = "";

/**
 * Inicializa o log de erros em branco, esta variavel e utilizado para mostrar quais campos nao foram preenchidos
 * no proprio html quando o JavaScript estiver desativado ou falhar. 
 */
$errorString = "";

/**
 * Verifica se o campo nome esta preenchido, caso esteja em branco incrementa o $qtd_erro e adiciona o nome do campo
 * ao $campo_branco
 */
if ($nome == "" || $nome == null) {
    $qtd_erro += 1;
    $campo_branco .= "Nome ";
}

/**
 * Verifica se o campo CPF esta preenchido, caso esteja em branco incrementa o $qtd_erro e adiciona o nome do campo
 * ao $campo_branco
 */
if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
    $qtd_erro += 1;
    $campo_branco .= "CPF ";
}

/**
 * Verifica se o campo cargo esta preenchido, caso esteja em branco incrementa o $qtd_erro e adiciona o nome do campo
 * ao $campo_branco
 */
if ($cargo == "" || $cargo == null) {
    $qtd_erro += 1;
    $campo_branco .= "Cargo ";
}

/**
 * update
 */
if ($qtd_erro == 0 && isset($_GET['id'])) {
    $id = $_POST['id'];
    require 'conexao.php';

    $sqlUpdate = "UPDATE pesq_main SET status= ?, oculto= ?, nome= ?, sexo= ?, cpf= ?, cargo= ? WHERE id= ?";

    if ($queryUpdate = $conecta->prepare($sqlUpdate)) {
        $queryUpdate->bind_param("ssssssi", $status, $oculto, $nome, $sexo, $cpf, $cargo, $id);
        if ($queryUpdate->execute()) {
            $queryUpdate->close();
        } else {
            die("Nao foi possivel alterar os dados do pesquisado!");
        }
    } else {
        die("Nao foi possivel executar o servico!");
    }

    $conecta->close();
    header('location: ../controllers/pesq-index.php');
}

/**
 * insert
 */
elseif ($qtd_erro == 0) {
    require 'conexao.php';

    $sqlInsert = "INSERT INTO pesq_main (status,oculto,nome,sexo,cpf,cargo) values (?, ?, ?, ?, ?, ?)";

    if ($queryInsert = $conecta->prepare($sqlInsert)) {
        $queryInsert->bind_param("ssssss", $status, $oculto, $nome, $sexo, $cpf, $cargo);

        if ($queryInsert->execute()) {
            $queryInsert->close();
        } else {
            die("Nao foi possivel adicionar o pesquisado!");
        }
    } else {
        die("Nao foi possivel executar o servico!");
    }

    $conecta->close();
    header('location: ../controllers/pesq-index.php');
}

/**
 * Erros
 */
else {
    /**
     * Caso $qtd_erro for igual ou maior que 1, mostra quais os campos nao foram preenchidos
     */
    if ($qtd_erro == 1) {
        $errorString = "O campo " . $campo_branco . " não foi preenchido ou está preenchido de forma incorreta, volte e preencha novamente);";
        header('location: pesq_form.php');
    } else {
        // Divide a string para obter os nomes dos campos que nao foram preenchidos 
        $campo_erro = explode(" ", $campo_branco);
        $cont_erro = 0;
        $errorString = "Os campos ";
        for ($erros = 1; $erros <= $qtd_erro; $erros++) {
            if ($erros == 1) {
                $errorString .= "$campo_erro[$cont_erro]";
                $cont_erro++;
            } elseif ($erros < $qtd_erro) {
                $errorString .= ", $campo_erro[$cont_erro]";
                $cont_erro++;
            } else {
                $errorString .= " e $campo_erro[$cont_erro]";
                $cont_erro++;
            }
        }
        $errorString .= " não foram preenchidos ou estão preenchidos de forma incorreta, retorne e preencha novamente.";
        header('location: pesq-form.php');
    }
}
