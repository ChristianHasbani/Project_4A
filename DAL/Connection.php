<?php
//Opening a connection to MySQL
function OpenCon() {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectdb";
    try {
    $conn = new mysqli($host, $user, $password, $dbname) or die("Conn failed: %s\n" . $conn->error);
    return $conn;
     } catch (PDOException $ex) {
        echo "Connection failed: " . $ex->getMessage();
    }
}
//Closing a connection to MySQL
function CloseConn($conn) {
    $conn->close();
}

?>
