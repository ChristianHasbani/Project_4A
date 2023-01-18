<?php

function connect()
{
    $host = "localhost";
    $dbname = "project_4a";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=$host;dbname=$dbname";
    try {
        $conn = new PDO($dsn, $username, $password);
    } catch (PDOException $pe) {
        die("Could not connect to the database '$dbname' :" . $pe->getMessage());
    }
    return $conn;
}


    //Closing a connection to MySQL
function disconnect($conn)
{
    $conn = null;  
}

?>
