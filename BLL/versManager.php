<?php
include('../../DAL/verbsRepository.php');
function getAllVerbs(){
    $verbs = fetchVerbs();
    return $verbs;
}

?>