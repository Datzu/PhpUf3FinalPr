<?php

    if (isset($_POST['state'])) {
        $correct = false;
        if ($_POST['state'] == 0) {
            
        }
        if ($correct) {
            include './controlers/mainView.php';
        } else {
            $_SESSION['log']['loginError'] = 'The username or the password is incorrect!';
            include './views/mainViewLogin.php';
        }
    } else {
        include './views/mainViewLogin.php';
    }

?>