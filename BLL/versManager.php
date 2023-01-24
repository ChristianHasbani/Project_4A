<?php
include('../../DAL/verbsRepository.php');

include_once('../../DTO/Responses/GetAllVerbsDTOResponse.php');

include_once('../../DTO/Requests/GetPhraseByIdDTORequest.php');

function getAllVerbs(){
    $verbs = fetchVerbs()->getResult();
    $getAllVerbsDTOResponse = new GetAllVerbsDTOResponse($verbs);
    return $getAllVerbsDTOResponse;
}

function GetQuestions(){
    $id = 1;
    $getPhraseByIdDTOResquest = new GetPhraseByIdDTORequest($id);
    $question = getPhrasebyId($getPhraseByIdDTOResquest)->getPhrase();
    return $question;
}

?>