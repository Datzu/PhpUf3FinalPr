<?php

    include './models/Util.php';
    include './models/DAO.php';

    if (isset($_POST['login'])) {
        include './controlers/mainView.php';
    } else {
        include './controlers/mainViewLogin.php';
    }

?>