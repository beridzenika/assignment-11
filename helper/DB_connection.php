
<?php
    
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'assignment-8';

    $connection = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$connection) {
        echo "connection faild";
        die();
    } 

    function getAll($select_query) {
        global $connection;
        $result = mysqli_query($connection, $select_query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    
    function getFirst($select_query) {
        global $connection;
        $result = mysqli_query($connection, $select_query);
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    function query($select_query) {
        global $connection;
        return mysqli_query($connection, $select_query);
    }
?>