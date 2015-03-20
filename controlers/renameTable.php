<?php

    switch ($_POST['state']) {
        case 0:
            include './views/renameTable.php';
            break;
        case 1:
            include './models/renameTable.php';
            break;
    }

?>