<?php
    session_start();
?>
<html>
    <head>
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div>
            <a href="index.php"><button>Return</button></a>
        </div>
        <?php
            include './controlers/mainControler.php';
        ?>
    </body>
</html>