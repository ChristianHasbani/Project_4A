<?php

class GetUserByUsernameDTORequest {

    private $username;

    function __construct($username) {
        $this->username = $username;
    }

    function getusername() {
        return $this->username;
    }

    function setusername($username) {
        $this->username = $username;
    }

}
