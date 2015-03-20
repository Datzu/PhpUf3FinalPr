<?php

    switch ($_POST['state']) {
        case 0:
            include './views/useTable.php';
            break;
        case 1:
            if ($_POST['action'] == 'delete') {
                include './models/deleteValue.php';
            }
            if ($_POST['action'] == 'modify') {
                include './views/modifyValue.php';                
            }
            if ($_POST['action'] == 'add') {
                include './views/addValue.php';                
            }
            break;
        case 2:
            if ($_POST['action'] == 'modify') {
                include './models/modifyValue.php';
            }
            if ($_POST['action'] == 'add') {
                include './models/addValue.php';                
            }
            break;
    }

?>