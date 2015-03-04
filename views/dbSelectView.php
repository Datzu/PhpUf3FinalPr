<form method='post' action='index.php'>
    <input type="text" name="selectDb" value="0" hidden />
    Databases: <select name='dbName'>
        <?php 
            showDatabases();
        ?>
    </select>
    <input type="submit" value='Use'/>
</form>
<form method='post' action='index.php'>
    <input type="text" name="createDb" value="0" hidden />
    Create Database: <input type="text" name="dbName" />
    If not exists: <input type="checkbox" name="ifNotExists" />
    <input type="submit" value='Create'/>
</form>