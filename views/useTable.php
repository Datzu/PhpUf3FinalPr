<?php

    showTable($_POST['tableName']);
    
?>
<form method='post' action='index.php' id="formulari">
    <input type="text" name="useTable" value="0" hidden />
    <input type="text" name="state" value="1" hidden />
    <input type="text" name="action" value="add" hidden />
    <input type="text" name="tableName" value="<?php echo $_POST['tableName']; ?>" hidden />
    <input type="submit" value='Add'/>
</form>