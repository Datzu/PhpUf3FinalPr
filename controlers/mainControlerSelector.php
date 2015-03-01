<?php

    include './views/mainView.php';
    
    if (isset($_POST['selectDb'])) {
        switch ($_POST['state']) {
            case 0:
                include './controlers/tableSelectControlerView.php';
                break;
            case 1:
                
                break;
            default:
                break;
        }
    } else {
        include './views/dbSelectView.php';
    }
    
?>