<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    $dao->executeQuery("use ".$_SESSION['dbName'].";");
    $result = $dao->executeQuery("drop table ".$_POST['tableName'].";");
    if ($result == 1) {
        echo 'Table deleted!';
    } else {
        echo 'There was an error while deleting the table!';
    }

?>