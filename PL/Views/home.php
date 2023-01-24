<?php
require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styles/style_home.css">

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
    <div class="sec1">
        <div class="container">
            <h1>Irregular <br /> Verbs</h1>
        </div>
    </div>

    <p>
        
    </p>
</body>
</html>
