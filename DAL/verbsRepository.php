<?php
include_once("DAL\Connection.php");


function fetchVerbs(){
    $conn = new Connection();
    $pdo = $conn->connect();
    $sql = 'SELECT * FROM verb';
    $query = $pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_ASSOC);
    return $query;
}


?>
