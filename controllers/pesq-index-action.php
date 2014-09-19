<?php


/**
 * DELETE
 */
if (isset($_POST['id'])) {
    include "../models/PesqMain.class.php";
    $pesqMain = new PesqMain;
    $pesqMain->deletarPesq();
    
    echo json_encode(array(
        'operação' => "delete",
        'concluida' => "ok",
        'pesquisado deletado' => $_POST['id']
    ));
}