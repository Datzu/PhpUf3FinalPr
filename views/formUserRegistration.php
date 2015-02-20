<?php
    $connexio = new mysqli("localhost", "root", "", "genesis");
    if ($connexio->connect_errno) {
        echo "No s'ha pogut connectar a la base de dades: " . $connexio->connect_error." - ".$connexio->connect_errno;
    } else {
        
        function showIP(){
            $sentenciaSql = "SELECT serverIP FROM servers";
            $result = $connexio->query($sentenciaSql);
            if ($result->num_rows > 0) {
                for($i=0; $i<$result->num_rows; $i++){
                    echo '<option>'.$result["$i"].'</option>';
                }
            }
        }
    }   
?>
<html
    <head>
        <title>User registration</title>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <form method='post' action='index.php'>
            <h1>User registration: </h1>
            Server address: <select name='serverIP'>
                            <?php
                                showIP();
                            ?>
                            </select></br></br>
            User name: <input type='text' name='userName'/></br></br>
            Password: <input type='password' name='passw'/></br></br>
        
            <input type="submit" value='Send'/>
        </form>
    </body>
</html>