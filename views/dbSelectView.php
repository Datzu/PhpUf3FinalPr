<form method='post' action='index.php'>
    <input type="text" name="selectDb" value="0" hidden />
    <input type="text" name="state" value="0" hidden />
    DataBases: <select name='dbName'>
        <?php 
            showDataBases();
        ?>
    </select>
    <input type="submit" value='Send'/>
</form>