<form method='post' action='index.php' id="formulari">
    <input type="text" name="createTable" value="0" hidden />
    <input type="text" name="state" value="2" hidden />
    <table border='1'>
        <tr>
            <th>Name</th>
            <th>Type</th>
        </tr>
        <?php
            $nRows = $_POST['numRows'];
            for ($i = 0; $i < $nRows; $i++) {
        ?>
                    <tr>
                        <td><input type="text" name="nameRow"/></td>
                        <td>
                            <select>
                                <option>lala</option>
                                <option>lala2</option>
                                <option>lala3</option>
                            </select>
                        </td>
                    </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="2" ><input type="submit" value='Create' /></td>
        </tr>
    </table>
</form>