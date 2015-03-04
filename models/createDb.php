<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    if (isset($_POST['ifNotExists'])) {
        $result = $dao->executeQuery("create database if not exists ".$_POST['dbName'].";");
    } else {
        $result = $dao->executeQuery("create database ".$_POST['dbName'].";");
    }
    if ($result == 1) {
        echo 'Database created!';
    } else {
        echo 'There was an error while creating the new database!';
    }

?>