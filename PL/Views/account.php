<?php
require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');
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
    <title>Account</title>
    <link rel="stylesheet" href="../Styles/style_account.css">
    
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
    <div>
    <ul>
        <li>Username: <?php echo $_SESSION['loggedUser']->getUsername();?></li>
        <li>First Name: <?php echo $_SESSION['loggedUser']->getFirstname();?></li>
        <li>Last Name: <?php echo $_SESSION['loggedUser']->getLastName();?></li>
        <li>Level: <?php echo $_SESSION['loggedUser']->getLevel();?></li>
        <li>Average Score: <?php echo $_SESSION['loggedUser']->getAvgScore();?></li>
    </ul>
    </div>
</body>
</html>
