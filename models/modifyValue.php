<?php

    $dao = new DAO();
    $dao->startDefaultConnection();
    $dao->executeQuery("use ".$_SESSION['dbName'].";");
    $result = $dao->executeQuery("update ".$_POST['tableName']." set ".$_POST['key']." = ".$_POST['newValue']." where ".$_POST['key']." = ".$_POST['value'].";");
    if ($result == 1) {
        echo 'Value updated!';
    } else {
        echo 'There was an error while updating the value!';
    }
    
?>