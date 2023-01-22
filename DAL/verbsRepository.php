<?php
include_once("Connection.php");

include_once("../../DTO/Responses/FetchVerbsDTOResponse.php");

function fetchVerbs(){
    $pdo = connect();
    $sql = "SELECT * FROM verb";
    $query = $pdo->prepare($sql);
    $query->execute();
    disconnect($pdo);
    $fetchVerbsDTOResponse = new FetchVerbsDTOResponse($query);
    return $fetchVerbsDTOResponse;
}


?>
