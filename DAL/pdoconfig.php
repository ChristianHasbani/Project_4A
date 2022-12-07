<?php
class Config {
    private $host = "localhost";
    private $dbname = "project_4a";
    private $username = "root";
    private $password = "";


    public function getHost(){
        return $this->host;
    }

    public function getdb(){
        return $this->dbname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }
}