<?php
    switch ($_POST['backups']){
        case 0: 
            include './views/backupMainView.php';
            break;
        case 1:
            if (isset($_POST['restoreBackup'])){
                include './models/restoreBackup.php';
            } else if (isset($_POST['deleteBackup'])){
                include './models/deleteBackup.php';
            }
            break; 
    }


?>