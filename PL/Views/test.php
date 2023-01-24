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
    <style>
        input[type=submit]{
            display:block;
            margin : auto;
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            padding: 10px 20px; 
            border-radius: 5px; 
            font-size: 18px; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            font-weight: bold; 
            cursor: pointer; 
            box-shadow: 2px 2px 2px rgba(0,0,0,0.3); 
            transition: all 0.2s; 
            width: 300px;
            height: 50px;
        }
    </style>
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
                    <li><a href="../Views/logout.php">Logout</a></li>
                </ul>
            </div>
            <div class="logo">

            </div>
        </div>
    </header>
    
    <div class="test">
   
    <?php
      $getQuestionsDTORequest = new GetQuestionsDTORequest($_SESSION['loggedUser']->getLevel());
      $questions = GetQuestions($getQuestionsDTORequest)->getResult();
      $counter = 1;
        $ids = '';
      for($i = 0; $i < count($questions) ; $i++){
        if($i == count($questions) - 1){
            $ids = $ids . $questions[$i]['id'].'';
        }else{
             $ids = $ids . $questions[$i]['id'].',' ;
        }
     }
    ?>
       <form action="testScores.php?id=<?php echo $ids ?>" method="post">
        <?php
            foreach($questions as $question){
                echo '<p>'.$counter.'-'.$question['phrase'].'</p><br>';
                $id = $question['verb_id'];
                $getVerbByIdDTORequest = new GetVerbByIdDTORequest($id);
                $verbs = getVerbById($getVerbByIdDTORequest);
                echo '<input type="radio" id="question' . $counter . '" name="question' . $counter . '"
                value="'.$verbs->getInfinitive().'"required>'.$verbs->getInfinitive() . ' (Infinitive) ';

                echo '<input type="radio" id="question' . $counter . '" name="question' . $counter . '"
                value="'.$verbs->getSimplePast().'">'.$verbs->getSimplePast() .' (Simple Past) ';
                
                echo '<input type="radio" id="question' . $counter . '" name="question' . $counter . '"
                value="'.$verbs->getPastParticiple().'">'.$verbs->getPastParticiple() . ' (Past Participle) ';

                $counter++;
            }
            ?>
            <br>
            <br>
            <input type="submit" value="Submit" name="submit">
       </form>
        
    </div>
</body>
</html>
