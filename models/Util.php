<?php

    function showIP(){
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

?>