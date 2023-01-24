<?php
class GetVerbByIdDTOResponse{
    // infinitive,simple_past,past_participle
    private $infinitive;
    private $simplePast;
    private $pastParticiple;

    function __construct($infinitive, $simplePast, $pastParticiple)
    {
        $this->infinitive = $infinitive;
        $this->simplePast = $simplePast;
        $this->pastParticiple = $pastParticiple;
    }

    function getInfinitive(){
        return $this->infinitive;
    }

    function getSimplePast(){
        return $this->simplePast;
    }

    function getPastParticiple(){
        return $this->pastParticiple;
    }
}
?>