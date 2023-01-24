<?php
class GetQuestionsDTOResponse{
    private $result;

    function __construct($result){
        $this->result = $result;
    }

    function getResult(){
        return $this->result;
    }

    function setResult($result){
        $this->result = $result;
    }
}


?>