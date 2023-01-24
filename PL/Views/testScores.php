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



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_POST['submit'])) {
        $ids = explode(',', $_GET['id']);
        print_r($ids);
        $correct = 0;
        $questions = array();
        foreach($ids as $id){
            $getPhrasesByIDFromDBDTORequest = new GetPhrasesByIDFromDBDTORequest($id);
            $question = getPhrasesByIDFromDB($getPhrasesByIDFromDBDTORequest)->getResult();
            array_push($questions, $question);
        }

        print_r($questions);
    }
   ?>
</body>
</html>


