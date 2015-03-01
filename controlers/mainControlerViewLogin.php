<?php

    if (isset($_POST['login'])) {
        $correct = true;
        if ($_POST['state'] == 0) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $serverIP = $_POST['serverIP'];
            if ($_POST['serverIP'] == null) {
                $_SESSION['log']['serverIPError'] = "The serverIP canno't be null!";
                $correct = false;
            }
            if ($_POST['user'] == null) {
                $_SESSION['log']['userError'] = "The username canno't be null!";
                $correct = false;
            }
            if ($_POST['pass'] == null) {
                $_SESSION['log']['passwordError'] = "The password canno't be null!";
                $correct = false;
            }
            if ($correct) {
                $dao = new DAO();
                $dao->startDefaultConnection();
                $result = $dao->executeQuery("select * from administrators");
                if ($result->num_rows > 0) {
                    while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                        $userResult  = $resultArray['user'];
                        $passResult  = $resultArray['pass'];
                        $serverIPResult  = $resultArray['serverIP'];
                        if ($user != $userResult) {
                            $_SESSION['log']['wrongUser'] = 'The user is wrong!';
                            $correct = false;
                        }
                        if ($pass != $passResult) {
                            $_SESSION['log']['wrongPass'] = 'The password is wrong!';
                            $correct = false;
                        }
                        if ($serverIP != $serverIPResult) {
                            $_SESSION['log']['wrongServerIP'] = 'The serverIP is wrong!';
                            $correct = false;
                        }
                        if ($user == $userResult && $pass == $passResult && $serverIP == $serverIPResult) {
                            $_SESSION['user'] = $user;
                            include './controlers/mainControlerSelector.php';
                            return;
                        }
                    }
                }
            }
        }
    } else {
        include './views/mainViewLogin.php';
    }
?>