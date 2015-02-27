<?php
    session_start();
?>
<html>
    <head>
        <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
            include './controlers/mainControler.php';
        ?>
        <div>
            <a href="index.php"><button>Return</button></a>
        </div>
    </body>
</html>