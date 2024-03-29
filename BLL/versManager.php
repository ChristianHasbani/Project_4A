<?php
include('../../DAL/verbsRepository.php');

include_once('../../DTO/Responses/GetAllVerbsDTOResponse.php');

include_once('../../DTO/Requests/GetPhraseByIdDTORequest.php');

include_once('../../DTO/Requests/GetQuestionsDTORequest.php');
include_once('../../DTO/Responses/GetQuestionsDTOResponse.php');

include_once('../../DTO/Requests/GetPhrasesByLevelDTORequest.php');
include_once('../../DTO/Responses/GetPhrasesByLevelDTOResponse.php');

include_once('../../DTO/Responses/GetVerbByIdDTOResponse.php');
include_once('../../DTO/Requests/GetVerbByIdDTORequest.php');

include_once('../../DTO/Requests/GetPhrasesByIDFromDBDTORequest.php');
include_once('../../DTO/Responses/GetPhrasesByIDFromDBDTOResponse.php');

function getAllVerbs(){
    $verbs = fetchVerbs()->getResult();
    $getAllVerbsDTOResponse = new GetAllVerbsDTOResponse($verbs);
    return $getAllVerbsDTOResponse;
}

function GetQuestions($getQuestionsDTORequest){
    $level = $getQuestionsDTORequest->getLevel();
    $getPhrasesByLevelDTORequest = new GetPhrasesByLevelDTORequest($level);
    $questions = getPhrasesByLevel($getPhrasesByLevelDTORequest)->getResult()->fetchAll(PDO::FETCH_ASSOC);
    shuffle($questions);
    $questions = array_slice($questions,0,5);
    for ($i = 0; $i < count($questions); $i++){
        $verbId = $questions[$i]['verb_id'];
        $getVerbByIdDTORequest = new GetVerbByIdDTORequest($verbId);
        $verb = getVerbById($getVerbByIdDTORequest);
        if($questions[$i]['phrase_tense'] == 'Infinitive'){
            $find = $verb->getInfinitive();
            $replace = '________';
            $arr = $questions[$i]['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            unset($questions[$i]['phrase']);
            $questions[$i]['phrase'] = $replacedPhrase;
        }elseif($questions[$i]['phrase_tense'] == 'Simple Past'){
            $find = $verb->getSimplePast();
            $replace = '________';
            $arr = $questions[$i]['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            unset($questions[$i]['phrase']);
            $questions[$i]['phrase'] = $replacedPhrase;
            
        }else{
            $find = $verb->getPastParticiple();
            $replace = '________';
            $arr = $questions[$i]['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            unset($questions[$i]['phrase']);
            $questions[$i]['phrase'] = $replacedPhrase;
        }
    }
    $getQuestionsDTOResponse = new GetQuestionsDTOResponse($questions);
    return $getQuestionsDTOResponse;
}


function getPhrasesByIDFromDB($getPhrasesBtIDFromDBDTORequest){
    $id = $getPhrasesBtIDFromDBDTORequest->getId();
    $getPhraseByIdDTORequest = new GetPhraseByIdDTORequest($id);
    $phrase = getPhrasebyId($getPhraseByIdDTORequest);
    $getPhrasesByIDFromDBDTOResponse = new GetPhrasesByIDFromDBDTOResponse($phrase);
    return $getPhrasesByIDFromDBDTOResponse;
}

?>