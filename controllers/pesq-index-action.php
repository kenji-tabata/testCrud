<?php

/**
 * DELETE
 */
if (isset($_GET['id'])) {
    include "../models/pesqMain.class.php";
    $pesqMain = new pesqMain;
    $pesqMain->deletarPesq();
}