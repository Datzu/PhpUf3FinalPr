<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    $result = $dao->executeQuery("drop database ".$_SESSION['dbName'].";");
    if ($result == 1) {
        echo 'Database deleted!';
    } else {
        echo 'There was an error while deleting the database!';
    }

?>