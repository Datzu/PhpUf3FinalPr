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
    } else {
        include './views/dbSelectView.php';
    }
    
?>