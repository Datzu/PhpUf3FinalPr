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
            <a href='closeSession.php'><button>Close session 3</button></a><a href='index.php'><button>Home</button></a>
        </div>
    </body>
</html>