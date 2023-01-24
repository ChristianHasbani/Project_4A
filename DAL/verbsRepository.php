<?php
include_once("Connection.php");

include_once("../../DTO/Responses/FetchVerbsDTOResponse.php");

include_once("../../DTO/Requests/GetPhraseByIdDTORequest.php");
include_once("../../DTO/Responses/GetPhraseByIdDTOResponse.php");

include_once('../../DTO/Requests/GetPhrasesByLevelDTORequest.php');
include_once('../../DTO/Responses/GetPhrasesByLevelDTOResponse.php');

include_once('../../DTO/Requests/GetVerbByIdDTORequest.php');
include_once('../../DTO/Responses/GetVerbByIdDTOResponse.php');

include_once('../../DTO/Responses/GetVerbByIdDTOResponse.php');
include_once('../../DTO/Requests/GetVerbByIdDTORequest.php');

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

function getPhrasesByLevel($getPhrasesByLevelDTORequest){
    $pdo = connect();
    $level = $getPhrasesByLevelDTORequest->getLevel();
    try{
        $sql = 'SELECT DISTINCT(phrase), example_phrase.id,example_phrase.phrase_tense,example_phrase.verb_id FROM `example_phrase` INNER JOIN verb ON example_phrase.verb_id = verb.id WHERE verb.difficulty = ?;';
        if($query = $pdo->prepare($sql)){
            $query->bindParam(1, $level, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){
                $getPhrasesByLevelDTOResponse = new GetPhrasesByLevelDTOResponse($query);
            }
        }
    }catch(Exception $e){
        error_log($e);
        exit("Error occured");
    }
    disconnect($pdo);
    return $getPhrasesByLevelDTOResponse;
}

function getVerbById($getVerbByIdDTORequest){
    $id = $getVerbByIdDTORequest->getId();
    $pdo = connect();
    try{
        $sql = 'SELECT infinitive,simple_past,past_participle FROM `verb` WHERE id=?; ';
        if($query = $pdo->prepare($sql)){
            $query->bindParam(1, $id, PDO::PARAM_INT);
            $query->execute();
            if($query->rowCount() > 0){
                if($row = $query->fetch(PDO::FETCH_ASSOC)){
                    $getVerbByIdDTOResponse = new GetVerbByIdDTOResponse($row['infinitive'], $row['simple_past'], $row['past_participle']);
                }
            }
        }
    }catch(Exception $e){
        error_log($e);
        exit("Error occured");
    }
    disconnect($pdo);
    return $getVerbByIdDTOResponse;
}

?>
