<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style_pretest.css">
    <title>Document</title>

    <style>
        input[type=button]{
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
            margin-top: 400px;
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
    <div class="test">
    <form>
        <input type="button" value="Démarrer le test" onclick="window.location.href='../Views/test.php'">
    </form>
    <?php
        if(isset($_POST['submit'])) {
        header('Location: ../Views/test.php');
        }
    ?>
    </div>
</body>
</html>