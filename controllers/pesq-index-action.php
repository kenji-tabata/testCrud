<?php

/**
 * DELETE
 */
if (isset($_GET['id'])) {
    include "../models/PesqMain.class.php";
    $pesqMain = new PesqMain;
    $pesqMain->deletarPesq();
}