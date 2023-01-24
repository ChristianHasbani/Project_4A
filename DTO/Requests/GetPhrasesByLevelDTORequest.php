<?php
class GetPhrasesByLevelDTORequest{
    private $level;

    function __construct($level)
    {
        $this->level = $level;
    }

    function getLevel(){
        return $this->level;
    }
}
?>