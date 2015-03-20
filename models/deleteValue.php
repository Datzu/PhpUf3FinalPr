<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    $dao->executeQuery("use ".$_SESSION['dbName'].";");
    $result = $dao->executeQuery("delete from ".$_POST['tableName']." where ".$_POST['key']." = ".$_POST['value'].";");
    if ($result == 1) {
        echo 'Value removed!';
    } else {
        echo 'There was an error while deleting the row!';
    }
    
?>