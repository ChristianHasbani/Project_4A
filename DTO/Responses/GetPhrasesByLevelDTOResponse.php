<?php
class GetPhrasesByLevelDTOResponse{
    
    private $result;

    function __construct($result)
    {
        $this->result = $result;    
    }

    function getResult(){
        return $this->result;
    }
}
?>