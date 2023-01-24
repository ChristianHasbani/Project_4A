<?php 
include('../../BLL/versManager.php'); 
require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');
require_once('../../DTO/Responses/GetUserByUsernameDTOResponse.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verbs</title>
    <link rel="stylesheet" href="../Styles/style_verbs.css">
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

    <div class="liste">
          <!-- Get all verbs from Database -->
          <?php $verbs = getAllVerbs()->getResult()->fetchAll(PDO::FETCH_ASSOC);?>
           <!-- <script src = "../Scripts/verbs.js" defer></script> -->
        <div class="Lpresent">
            <ul id="present"></ul>
            <li>Infinitive</li>
            <!-- printing rows from database -->
            <?php foreach($verbs as $verb){
                echo '<li>' . $verb['infinitive'] . '</li>';    
            } ?>
        </div>

        <div class="Lpassé">
            <ul id="passé"></ul>
            <li>Simple Past</li>
             <!-- printing rows from database -->
            <?php foreach($verbs as $verb){
                echo '<li>' . $verb['simple_past'] . '</li>';    
            } ?>
        </div>

        <div class="Lpassé2">
            <ul id="passé2"></ul>
            <li>Past Participle</li>
             <!-- printing rows from database -->
             <?php foreach($verbs as $verb){
                echo '<li>' . $verb['past_participle'] . '</li>';    
            } ?>
        </div>

        <div class ="Ltranslation">
            <ul id="translation"></ul>
            <li>Traduction</li>
            <?php foreach($verbs as $verb){
                echo '<li>' . $verb['verb_translation'] . '</li>';    
            } ?>
        </div>
        
    

    </div>
</body>
</html>
