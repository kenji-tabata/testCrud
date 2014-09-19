<?php
require "../models/Pesquisado.class.php";

/**
 * Abrir formulário de pesquisa
 * UPDATE ou INSERT
 */
$idPesq = isset($_POST['id']) ? $_POST['id'] : null;

# Update
if ($idPesq) {
    # Inicializando variaveis
    $urlAction = "../controllers/pesq-form-action.php?id=$idPesq";
    $pesquisado = new Pesquisado($idPesq);

    require "../models/PesqMain.class.php";
    $pesqMain = new PesqMain;
    $pesqMain->carregarPesq($pesquisado);

}
# Insert
else {

    # Inicializaçao dos controles
    $urlAction = "../controllers/pesq-form-action.php";

    $pesquisado = new Pesquisado();
    
}


/**
 * View
 */
$view = new stdClass();
$view->pesquisado = $pesquisado;
$view->urlAction  = $urlAction;
$view->msgErro    = "";


require "../views/pesq-form.php";
?>
