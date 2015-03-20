<?php

    include './models/Util.php';
    include './models/DAO.php';

    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
    </head>
    <body>
        <?php
            include './controlers/mainControler.php';
        ?>
        <div>
            <a href='closeSession.php'><button>Close session</button></a>
            <br>
            <a href='index.php'><button>Home</button></a>
        </div>
        <form method="post" action="index.php" >
            <input type="text" name="back" value="0" hidden />
            <input type="submit" value="Back" />
        </form>
    </body>
</html>