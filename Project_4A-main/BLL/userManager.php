<?php
//Repositories
include('../../DAL/userRepository.php');

//DTO Requests and Responses
include_once("../../DTO/Requests/LoginDTORequest.php");
include_once("../../DTO/Responses/LoginDTOResponse.php");

include_once("../../DTO/Requests/CheckUserLoginDTORequest.php");
include_once("../../DTO/Responses/CheckUserLoginDTOResponse.php");

include_once("../../DTO/Requests/GetUserByUsernameDTORequest.php");
include_once("../../DTO/Responses/GetUserByUsernameDTOResponse.php");

function login($loginDTORequest){
    $status = null;
    $checkUserLoginDTORequest = new CheckUserLoginDTORequest($loginDTORequest->getUsername(), $loginDTORequest->getPass());
    $checkUserLoginDTOResponse = CheckUserLogin($checkUserLoginDTORequest);
    $loginDTOResponse = new LoginDTOResponse($status);
    if($checkUserLoginDTOResponse->getResult()->rowCount() === 0 ){
        $status = false;
        $loginDTOResponse->setStatus($status);
    }else if($checkUserLoginDTOResponse->getResult()->rowCount() === 1){
        $status = true;
        $loginDTOResponse->setStatus($status);
    }

    return $loginDTOResponse;

}

function getUserByUsername($getUserByUsernameDTORequest){
    $getUserInfoDTORequest = new GetUserInfoDTORequest($getUserByUsernameDTORequest->getUsername());
    $getUserInfo = getUserInfo($getUserInfoDTORequest);
    $getUserByUsernameDTOResponse = new GetUserByUsernameDTOResponse();
    $getUserByUsernameDTOResponse->setUsername($getUserInfo->getUsername());
    $getUserByUsernameDTOResponse->setFirstname($getUserInfo->getFirstname());
    $getUserByUsernameDTOResponse->setLastname($getUserInfo->getLastname());
    $getUserByUsernameDTOResponse->setPassword($getUserInfo->getPassword());
    $getUserByUsernameDTOResponse->setRole($getUserInfo->getRole());
    $getUserByUsernameDTOResponse->setAvgScore($getUserInfo->getAvgScore());
    $getUserByUsernameDTOResponse->setLevel($getUserInfo->getLevel());
    return $getUserByUsernameDTOResponse;
}


?>