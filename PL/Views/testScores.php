<?php
include('../../BLL/versManager.php');

require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');

include_once('../../DTO/Requests/GetPhrasesByIDFromDBDTORequest.php');
include_once('../../DTO/Responses/GetPhrasesByIDFromDBDTOResponse.php');

session_start();
if (!isset($_SESSION['loggedUser'])) {
    echo "<script type='text/javascript'>"
            . "alert('Please login to access this page, redirecting you to the login page');"
            . " window.location.href='loginForm.php';"
            . " </script> ";
}

if (isset($_POST['submit'])) {
    $ids = explode(',', $_GET['id']);
    $choices = array();
    for ($i = 1; $i < 6; $i++){
        array_push($choices,$_POST['question' . $i]);
    }
    $correct = 0;
    
    // $questions = array();
    for ($i = 0; $i < count($ids); $i++){
        $getPhrasesByIDFromDBDTORequest = new GetPhrasesByIDFromDBDTORequest($ids[$i]);
        $question = getPhrasesByIDFromDB($getPhrasesByIDFromDBDTORequest)->getResult();
        // array_push($questions, $question);
        $tense = $question->getTense();
        $getVerbByIdDTORequest = new GetVerbByIdDTORequest($question->getVerbId());
        $verbs = getVerbById($getVerbByIdDTORequest);
        if($tense == 'Infinitive'){
            if($choices[$i] ==$verbs->getInfinitive()){
                $correct++;
            }
        }elseif($tense == 'Simple Past'){
            if($choices[$i] ==$verbs->getSimplePast()){
                $correct++;
            }
        }else{
            if($choices[$i] == $verbs->getPastParticiple()){
                $correct++;
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores</title>
</head>
<body>
    <?php 
        echo "number of correct scores: " . $correct;
    }
   ?>
</body>
</html>


