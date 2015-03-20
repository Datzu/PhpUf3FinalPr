<?php

    function showIP() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $result = $dao->executeQuery("select serverIP from servers");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                $serverIP  = $resultArray["serverIP"];
                echo "<option value='".$serverIP."'>".$serverIP."</option>";
            }
        }
    }
    
    function showLog() {
        if (isset($_SESSION['log'])) {
            foreach ($_SESSION['log'] as $log) {
                echo $log."<br>";
            }
            unset($_SESSION['log']);
        }
    }
    
    function showDatabases() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $result = $dao->executeQuery("show databases;");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                $databaseName  = $resultArray["Database"];
                echo "<option value='".$databaseName."'>".$databaseName."</option>";
            }
        }
    }
    
    function showTables() {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $result = $dao->executeQuery("show tables;");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                echo $_SESSION['dbName'];
                $tablesName  = $resultArray["Tables_in_".$_SESSION['dbName']];
                echo "<option value='".$tablesName."'>".$tablesName."</option>";
            }
        }
    }
    
    function addInsertForm($tableName) {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $result = $dao->executeQuery("desc ".$tableName.";");
        if ($result->num_rows > 0) {
            echo '<table>';
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr>';
                if ($resultArray['Extra'] != "auto_increment") {
                    echo "<td>".$resultArray['Field']."</td>";
                    echo "<td><input type='text' name='values[]'/></td>";
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    }
    
    function insert($tableName, $values) {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $result = $dao->executeQuery("desc ".$tableName.";");
        $sql = "insert into ".$tableName." (";
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                if ($resultArray['Extra'] != "auto_increment") {
                    $sql .= $resultArray['Field'].", ";
                }
            }
            $sql = substr($sql, 0, -2);
            $sql .= ") values (";
            foreach ($values as $value) {
                $sql .= "'".$value."', ";
            }
            $sql = substr($sql, 0, -2);
            $sql .= ");";
        }
        echo $sql;
        $result = $dao->executeQuery($sql);
        if ($result == 1) {
            echo 'Value inserted!';
        } else {
            echo 'There was an error while inserting the value!';
        }
    }
    
    function showTable($tableName) {
        $autoIncField = compareAutoInc($tableName);
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $result = $dao->executeQuery("select * from ".$tableName.";");
        echo "<table border='1'>";
        if ($result->num_rows > 0) {
            $firtsTime = true;
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)){
                if ($firtsTime) {
                    echo "<tr>";
                    foreach ($resultArray as $key => $value) {
                        echo "<th colspan='2'>".$key."</th>";
                    }
                    echo "</tr>";
                    $firtsTime = false;
                }
                echo "<tr>";
                foreach ($resultArray as $key => $value) {
                    echo "<td coldspan='2'>".$value."</td>";
                    if ($key != $autoIncField){
                        echo addModifyButton($key, $value);
                    } else{
                        echo "<td></td>";
                    }
                }
                echo addDeleteButton($key, $value);
                echo "</tr>";
            }
        } else {
            echo "You have no data on this table!";
        }
    }
    
    function addDeleteButton($key, $value) {
        echo '<td><form method="post" action="index.php">
            <input type="text" name="useTable" value="0" hidden />
            <input type="text" name="state" value="1" hidden />
            <input type="text" name="action" value="delete" hidden />
            <input type="text" name="key" value="'.$key.'" hidden />
            <input type="text" name="value" value="'.$value.'" hidden />
            <input type="text" name="tableName" value="'.$_POST['tableName'].'" hidden />
            <input type="submit" value="Delete"/>
        </form></td>';
    }
    
    function addModifyButton($key,$value){
        echo '<td><form method="post" action="index.php">
            <input type="text" name="useTable" value="0" hidden />
            <input type="text" name="state" value="1" hidden />
            <input type="text" name="action" value="modify" hidden />
            <input type="text" name="key" value="'.$key.'" hidden />
            <input type="text" name="value" value="'.$value.'" hidden />
            <input type="text" name="tableName" value="'.$_POST['tableName'].'" hidden />
            <input type="submit" value="Modify"/>
        </form></td>';
    }
    
    function compareAutoInc($tableName) {
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        $result = $dao->executeQuery("DESC ".$tableName.";");
        if ($result->num_rows > 0) {
            while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
                $firstTime = true;
                foreach ($resultArray as $key => $value) {
                    if ($firstTime){
                        $varValue = $value;
                        $firstTime = false;
                    }
                    if ($value == "auto_increment") {
                        return $varValue;
                    }
                }
            }
        }
    }
    
    function export() {
        
        $correct = true;
        
        $dao = new DAO();
        $dao->startDefaultConnection();
        $dao->executeQuery("use ".$_SESSION['dbName'].";");
        
        $tables = array();
        $result = $dao->executeQuery('show tables');        
        while ($resultArray = $result->fetch_array(MYSQLI_ASSOC)) {
            $tables[]  = $resultArray["Tables_in_".$_SESSION['dbName']];
        }
        
        $return = '';
        
        foreach ($tables as $table) {
            
            $return .= 'create database if not exists '.$_SESSION['dbName'];
            
            $result = $dao->executeQuery('select * from '.$table);
            $num_fields = $dao->getRows($result);
            
            $return .= "\n\ndrop table if exists ".$table.";\n";
            $row2 = $dao->executeQuery('show create table '.$table);
            while ($resultArray = $row2->fetch_array(MYSQLI_ASSOC)) {
                $return .= "\n\n".$resultArray['Create Table'].";\n\n";
            }
            
            for ($i = 0; $i < $num_fields; $i++) {
                while ($row = mysqli_fetch_row($result)) {
                    $return .= 'insert into '.$table.' values(';
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = ereg_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"'.$row[$j].'"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < ($num_fields-1)) {
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
        }
        
        $handle = fopen("./backups/".$_SESSION['dbName']."_".date("dmy_his"), 'w+');
        fwrite($handle, $return);
        
        return $correct;
    }
    
    function readBackupFiles($database){
        createOptions(openDirectory('./backups', $database));
    }    
    
    function openDirectory($directory,$database) {
        $openDir = opendir($directory);
        while ($content = readdir($openDir)) { //Mentre tingui contingut
            if ($content != "." && $content != "..") {
                if (is_dir($directory . "/" . $content)) { //Si és un directori...
                    //Tornem a cridar a la funció. Recursivitat.
                    $this->openDirectory($directory . "/" . $content);
                } else { //si no és un directori....
                    $bddFile = explode('_',$content);
                    if($bddFile[0] == $database){
                        $arrayFiles[] = $content;
                    }
                }
            }
        }  
        closedir($openDir);
        return $arrayFiles;
    }
    
    function createOptions($arrayFiles){
        if (count($arrayFiles) == 0) {
            echo "Before you restore some database, you need to do a new backup!";
        } else {
            echo '<ul>';
            for($i=0; $i<count($arrayFiles); $i++){
                echo '<li><form method="post" action="index.php" id="formulari">';
                echo '<input type="text" name="BackupFile" value="'.$arrayFiles[$i].'" hidden /><input type="text" name="backups" value="1" hidden />';
                echo $arrayFiles[$i].'     <input type="submit" name="restoreBackup" value="Restore"/>  <input type="submit" name="deleteBackup" value="Delete"/></form></li>';
            }
            echo '</ul>';
        }
    }
    
    function deleteFile($directory,$file){   
        unlink('./backups/'.$file) or die("<p>The backup $file can't delete!</p>");
        echo "<p>The backup $file is deleted!</p>";
    }
    
    function returnContentFile($directory,$file){
        fopen($directory.'/'.$file,r) or die("The file can't open!");
        $content = file_get_contents($directory.'/'.$file);
        $arrayContent = explode(';',$content);
        $dao = new DAO();
        $dao->startDefaultConnection();
            for($i=0; $i<count($arrayContent)-1; $i++){
                if(!$dao->executeQuery($arrayContent[$i].';')){
                    echo "Backup can't be restored!";
                    return false;
                }
            }
        $dao->close();
        echo "Backup restored!";
    } 
    
?>