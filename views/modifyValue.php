<form method='post' action='index.php' id="formulari">
    <input type="text" name="useTable" value="0" hidden />
    <input type="text" name="state" value="2" hidden />
    <input type="text" name="action" value="modify" hidden />
    <input type="text" name="key" value="<?php echo $_POST['key']; ?>" hidden />
    <input type="text" name="value" value="<?php echo $_POST['value']; ?>" hidden />
    <input type="text" name="tableName" value="<?php echo $_POST['tableName']; ?>" hidden />
    <input type="text" name="newValue" />
    <input type="submit" value='Modify'/>
</form>