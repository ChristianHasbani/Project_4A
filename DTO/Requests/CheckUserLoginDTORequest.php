<?php

class CheckUserLoginDTORequest {

    private $username;
    private $pass;

    function __construct($username, $pass) {
        $this->username = $username;
        $this->pass = $pass;
    }

    function getUsername() {
        return $this->username;
    }

    function getPass() {
        return $this->pass;
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPass($pass) {
        $this->pass = $pass;
        return $this;
    }

}
