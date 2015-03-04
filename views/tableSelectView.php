<form method='post' action='index.php'>    
    Tables: <select name='tableName'>
            <?php
                showTables();
            ?>
    </select>
    <input type="text" name="deleteTable" value="0" hidden />
    <input type="submit" value='Delete'/>
</form>
<form method='post' action='index.php'>
    <input type="text" name="createTable" value="0" hidden />
    <input type="text" name="state" value="0" hidden />
    <input type="submit" value='Create a new table'/>
</form>
<form method='post' action='index.php'>
    <input type="text" name="deleteDb" value="0" hidden />
    <input type="submit" value='Delete this database'/>
</form>