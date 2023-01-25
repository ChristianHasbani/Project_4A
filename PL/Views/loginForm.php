<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style_login.css">
    <title>Login</title>
</head>
<body>
<header>
  <div class="box">
    <div class="logo">
      <img src="../Assets/image/flags.jpg" alt="" style="width: 100px;">
    </div>

    <div class="onglet">
      <ul>
        <li><a href="../Views/home.php">Accueil</a></li>
        <li><a href="../Views/verbs.php">Liste des verbes</a></li>
        <li><a href="../Views/pretest.php">English Test</a></li>
        <li><a href="../Views/account.php">Mon compte</a></li>
      </ul>
    </div>
  </div>
</header>

<form action="login.php" method="POST">
  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button id="submit" name = "submit" type="submit" >Login</button>
  </div>

  </div>
</form> 
</body>
</html>