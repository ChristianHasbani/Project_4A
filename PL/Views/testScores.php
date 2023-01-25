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
    <link rel="stylesheet" href="../Styles/style_testScores.css">
    <title>Scores</title>
</head>
<body>
   <header>
        <div class="container">
            <div class="logo">
                <img src="../Assets/image/flags.jpg" alt="" style="width: 100px;">
            </div>

            <div class="onglet">
                <ul>
                    <li><a href="../Views/home.php">Accueil</a></li>
                    <li><a href="../Views/verbs.php">Liste des verbes</a></li>
                    <li><a href="../Views/pretest.php">English Test</a></li>
                    <li><a href="../Views/account.php">Mon compte</a></li>
                    <?php 
                        if (!isset($_SESSION['loggedUser'])) {
                            echo '<li><a href="../Views/loginForm.php">Login</a></li>';
                        }else{
                            echo '<li><a href="../Views/logout.php">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <div class="boite">
        <div  class="box">
            <p>
                <?php 
                echo "number of correct scores: " . $correct;
            }
        ?></p>
    </div>
   </div>
</body>
</html>


