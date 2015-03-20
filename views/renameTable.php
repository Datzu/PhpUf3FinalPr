<form method='post' action='index.php' id="formulari">
    <input type="text" name="renameTable" value="0" hidden />
    <input type="text" name="state" value="1" hidden />
    <input type="text" name="tableName" value="<?php echo $_POST['tableName']; ?>" hidden />
    <table>
        <tr>
            <td>New name:</td>
            <td><input type="text" name="newTableName" /></td>
        </tr>
        <tr>
            <td colspan="2" ><input type="submit" value='Rename' /></td>
        </tr>
    </table>
</form>