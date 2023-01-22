<?php
class GetUserByUsernameDTOResponse{

    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $role;

    private $avgScore;

    private $level;


    function getUsername(){
        return $this->username;
    }

    function getPassword(){
        return $this->password;
    }

    function getFirstName(){
        return $this->firstName;
    }
    
    function getLastName(){
        return $this->lastName;
    }

    function getRole(){
        return $this->role;
    }

    function getAvgScore(){
        return $this->avgScore;
    }

    function getLevel(){
        return $this->level;
    }

    function setUsername($username){
        $this->username = $username;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    function setLastName($lastName){
        $this->lastName = $lastName;
    }

    function setRole($role){
        $this->role = $role;
    }

    function setAvgScore($avgScore){
        $this->avgScore = $avgScore;
    }

    function setLevel($level){
        $this->level = $level;
    }
}


?>