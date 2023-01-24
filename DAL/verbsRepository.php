<?php
include_once("Connection.php");

include_once("../../DTO/Responses/FetchVerbsDTOResponse.php");

include_once("../../DTO/Requests/GetPhraseByIdDTORequest.php");
include_once("../../DTO/Responses/GetPhraseByIdDTOResponse.php");

function fetchVerbs(){
    $pdo = connect();
    try{
        $sql = "SELECT * FROM verb";
        $query = $pdo->prepare($sql);
        $query->execute();
    }catch(Exception $e){
        error_log($e);
        exit('Error occured!');
    }
    disconnect($pdo);
    $fetchVerbsDTOResponse = new FetchVerbsDTOResponse($query);
    return $fetchVerbsDTOResponse;
}

function getPhrasebyId($getPhraseByIdDTORequest){
    $pdo = connect();
    $id = $getPhraseByIdDTORequest->getId();
    try{
        $sql = "Select * From example_phrase Where id = ?";
        if($query = $pdo->prepare($sql)){
            $query->bindParam(1, $id, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){
                if($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $getPhraseByIdDTOResponse = new GetPhraseByIdDTOResponse($row['phrase'],$row['phrase_tense'],$row['verb_id']);
                }

            }
        }
    }catch(Exception $e){
        error_log($e);
        exit("Error occured");
    }
    disconnect($pdo);
    return $getPhraseByIdDTOResponse;
}

function getPhrasesNbByLevel(){
    
}

?>
