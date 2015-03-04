<?php

    switch ($_POST['state']) {
        case 0:
            include './views/createTable.php';
            break;
        case 1:
            $correct = true;
            if ($_POST['tableName'] == null) {
                $correct = false;
                echo 'You must provide a valid table name!<br>';
            }
            if ($_POST['numRows'] == null) {
                $correct = false;
                echo 'You must insert a valid number!<br>';
            }
            if ($correct) {
                include './views/createTableConfig.php';
            }
            break;
        case 2:
            
            break;
    }

?>