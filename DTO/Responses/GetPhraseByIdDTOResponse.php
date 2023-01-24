<?php
class GetPhraseByIdDTOResponse{
    private $phrase;
    private $tense;
    private $verbId;

    function __construct($phrase,$tense,$verbId)
    {
        $this->phrase = $phrase;
        $this->tense = $tense;
        $this->verbId = $verbId;
    }

    function getPhrase(){
        return $this->phrase;
    }

    function getTense(){
        return $this->tense;
    }

    function getVerbId(){
        return $this->verbId;
    }

    function setPhrase($phrase){
        $this->phrase = $phrase;
    }

    function setTense($tense){
        $this->tense = $tense;
    }

    function setVerbId($verbId){
        $this->verbId = $verbId;
    }
}
?>