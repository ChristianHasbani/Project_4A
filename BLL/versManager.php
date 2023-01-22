<?php
include('../../DAL/verbsRepository.php');

include_once('../../DTO/Responses/GetAllVerbsDTOResponse.php');

function getAllVerbs(){
    $verbs = fetchVerbs()->getResult();
    $getAllVerbsDTOResponse = new GetAllVerbsDTOResponse($verbs);
    return $getAllVerbsDTOResponse;
}

?>