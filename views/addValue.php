<form method='post' action='index.php' id="formulari">
    <input type="text" name="useTable" value="0" hidden />
    <input type="text" name="state" value="2" hidden />
    <input type="text" name="action" value="add" hidden />
    <input type="text" name="tableName" value="<?php echo $_POST['tableName']; ?>" hidden />
    <?php
        addInsertForm($_POST['tableName']);
    ?>
    <input type="submit" value='Add'/>
</form>