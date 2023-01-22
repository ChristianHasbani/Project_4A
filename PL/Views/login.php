<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>

<?php

include('../../BLL/userManager.php');

//DTO Requests and Responses
include_once('../../DTO/Requests/LoginDTORequest.php');
include_once('../../DTO/Responses/LoginDTOResponse.php');

include_once('../../DTO/Requests/GetUserByUsernameDTORequest.php');
include_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try{
        $loginDTORequest = new LoginDTORequest($username, $password);
        $loginDTOResponse = login($loginDTORequest);
        if($loginDTOResponse->getStatus() == true){
            session_start();
            $getUserByUsernameDTORequest = new GetUserByUsernameDTORequest($username);
            $_SESSION['loggedUser'] = getUserByUsername($getUserByUsernameDTORequest);
            echo "<script type='text/javascript'>"
            . " window.location.href='home.php';"
            ."</script>";
        }else{
            echo "<script type='text/javascript'>"
            . "alert('Incorrect Credentials, redirecting you to the login page');"
            . " window.location.href='loginForm.php';"
            . " </script> ";
        }
    }catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}else{
    echo "<script type='text/javascript'>"
    . "alert('Access denied, redirecting you to the login page');"
    . " window.location.href='loginForm.php';"
    . " </script> ";
}



?>