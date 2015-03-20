<?php

    if (isset($_POST['back'])) {
        $_POST = $_SESSION['lastPos'];
    }
    
    /*
    print_r($_POST);
    echo "<br>";
    print_r($_SESSION['lastPos']);
    */
    
    if (isset($_SESSION['user'])) {
        include './controlers/mainControlerSelector.php';
    } else {
        include './controlers/mainControlerViewLogin.php';
    }
    
    $_SESSION['lastPos'] = $_POST;

?>