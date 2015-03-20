<?php

    switch ($_POST['state']) {
        case 0:
            include './models/export.php';
            include './views/exportMainView.php';
            break;
    }

?>