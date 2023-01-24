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

function getAllVerbs(){
    $verbs = fetchVerbs()->getResult();
    $getAllVerbsDTOResponse = new GetAllVerbsDTOResponse($verbs);
    return $getAllVerbsDTOResponse;
}

function GetQuestions($getQuestionsDTORequest){
    $questionsArray = array();
    $level = $getQuestionsDTORequest->getLevel();
    $getPhrasesByLevelDTORequest = new GetPhrasesByLevelDTORequest($level);
    $questions = getPhrasesByLevel($getPhrasesByLevelDTORequest)->getResult()->fetchAll(PDO::FETCH_ASSOC);
    shuffle($questions);
    $questions = array_slice($questions,0,5);
    foreach ($questions as $question){
        $verbId = $question['verb_id'];
        $getVerbByIdDTORequest = new GetVerbByIdDTORequest($verbId);
        $verb = getVerbById($getVerbByIdDTORequest);
        if($question['phrase_tense'] == 'Infinitive'){
            $find = $verb->getInfinitive();
            $replace = '________';
            $arr = $question['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            // $question['phrase'] = $replacedPhrase;
            array_push($questionsArray, $replacedPhrase);
        }elseif($question['phrase_tense'] == 'Simple Past'){
            $find = $verb->getSimplePast();
            $replace = '________';
            $arr = $question['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            // $question['phrase'] = $replacedPhrase;
            array_push($questionsArray, $replacedPhrase);
        }else{
            $find = $verb->getPastParticiple();
            $replace = '________';
            $arr = $question['phrase'];
            $replacedPhrase = str_replace($find,$replace,$arr);
            // $question['phrase'] = $replacedPhrase;
            array_push($questionsArray, $replacedPhrase);
        }
        $getQuestionsDTOResponse = new GetQuestionsDTOResponse($questionsArray);
    }
    return $getQuestionsDTOResponse;
}

?>