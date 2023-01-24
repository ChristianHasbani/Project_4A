<?php
class GetUserInfoDTOResponse{

    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $role;
    private $avgScore;

    private $level;

    function __construct($username,$password,$firstName,$lastName,$role,$avgScore,$level)
    {
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->role = $role;
        $this->avgScore = $avgScore;
        $this->level = $level;
    }

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