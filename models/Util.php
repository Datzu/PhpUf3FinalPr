<?php

    function showIP() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $result = $dao->executeQuery("select serverIP from servers");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                $serverIP  = $resultArray["serverIP"];
                echo "<option value='".$serverIP."'>".$serverIP."</option>";
            }
        }
    }
    
    function showLog() {
        if (isset($_SESSION['log'])) {
            foreach ($_SESSION['log'] as $log) {
                echo $log."<br>";
            }
            unset($_SESSION['log']);
        }
    }
    
    function showDatabases() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $result = $dao->executeQuery("show databases;");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                $databaseName  = $resultArray["Database"];
                echo "<option value='".$databaseName."'>".$databaseName."</option>";
            }
        }
    }
    
    function showTables() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $dao->executeQuery("show tables;");
        $result = $dao->executeQuery("show tables;");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                echo $_SESSION['dbName'];
                $tablesName  = $resultArray["Tables_in_".$_SESSION['dbName']];
                echo "<option value='".$tablesName."'>".$tablesName."</option>";
            }
        }
    }
?>