<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    $dao->executeQuery("use ".$_SESSION['dbName'].";");
    $result = $dao->executeQuery("rename table ".$_POST['tableName']." to ".$_POST['newTableName'].";");
    if ($result == 1) {
        echo 'Table renamed!';
    } else {
        echo 'There was an error while renaming the table!';
    }

?>