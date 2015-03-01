<?php

    include './models/Util.php';
    include './models/DAO.php';

    if (isset($_SESSION['user'])) {
        include './controlers/mainControlerSelector.php';
    } else {
        include './controlers/mainControlerViewLogin.php';
    }

?>