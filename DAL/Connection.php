<?php
 require_once 'pdoconfig.php';
class Connection
{
    private $conn;
    public function connect()
    {
        $config = new Config();
        $host = $config->getHost();
        $dbname = $config->getdb();
        $username = $config->getUsername();
        $password = $config->getPassword();
        $dsn = "mysql:host=$host;dbname=$dbname";
        try {
            $conn = new PDO($dsn, $username, $password);
        } catch (PDOException $pe) {
            die("Could not connect to the database '$dbname' :" . $pe->getMessage());
        }
        return $conn;
    }


    //Closing a connection to MySQL
    public function disconnect()
    {
        $conn = null;
    }
}
?>
