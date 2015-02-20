<?php
    showLog();
?>
<form method='post' action='index.php'>
    <input type="text" name="state" value="0" hidden />
    <h1>User registration: </h1>
    Server address: <select name='serverIP'>
                    <?php
                        showIP();
                    ?>
                    </select></br></br>
    User name: <input type='text' name='user'/></br></br>
    Password: <input type='password' name='pass'/></br></br>
    <input type="submit" value='Send'/>
</form>