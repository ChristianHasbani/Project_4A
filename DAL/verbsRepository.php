<?php
include_once("Connection.php");


function fetchVerbs(){
    $pdo = connect();
    $sql = "SELECT * FROM verb";
    // $query = $pdo->query($sql);
    $query = $pdo->prepare($sql);
    $query->execute();
    disconnect($pdo);
    return $query;
}


?>
