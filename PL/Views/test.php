<?php
require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');
include('../../BLL/versManager.php');

include_once('../../DTO/Requests/GetQuestionsDTORequest.php');

include_once('../../DTO/Requests/GetVerbByIdDTORequest.php');




session_start();
if (!isset($_SESSION['loggedUser'])) {
    echo "<script type='text/javascript'>"
            . "alert('Please login to access this page, redirecting you to the login page');"
            . " window.location.href='loginForm.php';"
            . " </script> ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests</title>
    <link rel="stylesheet" href="../Styles/style_test.css">
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
                    <li><a href="../Views/test.php">English Test</a></li>
                    <li><a href="../Views/account.php">Mon compte</a></li>
                    <li><a href="../Views/logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="logo">

            </div>
        </div>
    </header>
    
    <div class="test">
        <!-- <script src="../Scripts/test.js" defer></script>
        <p><button id="start">Démarrer le test</button></p> -->
    <br>
    <br>
    <br>
        <?php
        $getQuestionsDTORequest = new GetQuestionsDTORequest($_SESSION['loggedUser']->getLevel());
        $questions = GetQuestions($getQuestionsDTORequest)->getResult();
        
        foreach($questions as $question){
            echo '<p>'.$question['phrase'].'</p>';
            $id = $question['verb_id'];
            $getVerbByIdDTORequest = new GetVerbByIdDTORequest($id);
            $verbs = getVerbById($getVerbByIdDTORequest);
            echo '<input type="radio" name="' . $question['id'] . 'test">'.$verbs->getInfinitive();
            echo '<input type="radio" name="' . $question['id'] . 'test">'.$verbs->getSimplePast();
            echo '<input type="radio" name="' . $question['id'] . 'test">'.$verbs->getPastParticiple();
        }
        // print_r($questions);
        ?>
        <!-- <input type="radio" name="test">test -->
        
    </div>
</body>
</html>
