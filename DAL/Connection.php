<?php
 require_once 'pdoconfig.php';
function connect(){
    $config = new Config();
    $dsn = "mysql:host=$config->host;dbname=$config->dbname";
    try {
        $conn = new PDO($dsn, $config->username, $config->password);
        echo "Connected to '$config->dbname' at '$config->host' successfully.";
        } catch (PDOException $pe) {
        die ("Could not connect to the database '$config->dbname' :" . $pe->getMessage());
            }
    
}


//Closing a connection to MySQL
function disconnect($conn) {
    $conn->close();
}

?>
