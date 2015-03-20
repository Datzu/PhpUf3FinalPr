<form method='post' action='index.php' id="formulari">
    Tables: <select name='tableName'>
            <?php
                showTables();
            ?>
    </select>
    <input type="text" name="useTable" value="0" hidden />
    <input type="text" name="state" value="0" hidden />
    <input type="submit" value='Use table'/>
</form>
<form method='post' action='index.php' id="formulari">    
    Tables: <select name='tableName'>
            <?php
                showTables();
            ?>
    </select>
    <input type="text" name="deleteTable" value="0" hidden />
    <input type="submit" value='Delete'/>
</form>
<form method='post' action='index.php' id="formulari">
    Tables: <select name='tableName'>
            <?php
                showTables();
            ?>
    </select>
    <input type="text" name="renameTable" value="0" hidden />
    <input type="text" name="state" value="0" hidden />
    <input type="submit" value='Rename table'/>
</form>
<form method='post' action='index.php' id="formulari">
    <input type="text" name="createTable" value="0" hidden />
    <input type="text" name="state" value="0" hidden />
    <input type="submit" value='Create a new table'/>
</form>
<form method='post' action='index.php' id="formulari">
    <input type="text" name="deleteDb" value="0" hidden />
    <input type="submit" value='Delete this database'/>
</form>
<form method='post' action='index.php' id="formulari">
    <input type="text" name="backups" value="0" hidden />
    <input type="submit" value='Import'/>
</form>
<form method='post' action='index.php' id="formulari">
    <input type="text" name="export" value="0" hidden />
    <input type="submit" value='Export'/>
</form>