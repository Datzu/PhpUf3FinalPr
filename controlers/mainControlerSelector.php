<?php

    include './views/mainView.php';
    
    if (isset($_POST['selectDb'])) {
        include './controlers/tableSelectControlerView.php';
    } elseif (isset ($_POST['createDb'])) {
        include './models/createDb.php';
    } elseif (isset ($_POST['deleteDb'])) {
        include './models/deleteDb.php';
    } elseif (isset ($_POST['deleteTable'])) {
        include './models/deleteTable.php';
    } elseif (isset ($_POST['createTable'])) {
        include './controlers/createTable.php';
    } elseif (isset ($_POST['renameTable'])) {
        include './controlers/renameTable.php';
    } elseif (isset ($_POST['useTable'])) {
        include './controlers/useTable.php';
    } else if(isset ($_POST['import'])) {
        include './controlers/import.php';
    } else if(isset ($_POST['export'])) {
        include './controlers/export.php';
    } elseif (isset ($_POST['backups'])) {   //t'envia al controlador de copies de seguretat
        include './controlers/backupControler.php';
    } else {
        include './views/dbSelectView.php';
    }
    
?>