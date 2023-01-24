<?php
include_once("Connection.php");

include_once("../../DTO/Requests/CheckUserLoginDTORequest.php");
include_once("../../DTO/Responses/CheckUserLoginDTOResponse.php");

include_once("../../DTO/Requests/GetUserInfoDTORequest.php");
include_once("../../DTO/Responses/GetUserInfoDTOResponse.php");

function CheckUserLogin($checkUserLoginDTORequest){
    $pdo = connect();
    $username = $checkUserLoginDTORequest->getUsername();
    $password = $checkUserLoginDTORequest->getPass();
    try{
        $sql = "select * from users where username = ? AND password = ?;";
        
        if( $query = $pdo->prepare($sql)){
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->bindParam(2, $password, PDO::PARAM_STR);
            $query->execute();
        }
   
    }catch (Exception $e) {
        error_log($e);
        exit('Error occured!');
    }
    disconnect($pdo);
    $checkUserLoginDTOResponse = new checkUserLoginDTOResponse($query);
    return $checkUserLoginDTOResponse;
}

function getUserInfo($getUserInfoDTORequest){
    $pdo = connect();
    $username = $getUserInfoDTORequest->getUsername();
    try{
        $sql = "select * from users where username = ?;";
        if($query = $pdo->prepare($sql)){
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount() > 0){
                if($row = $query->fetch(pdo::FETCH_ASSOC)){
                    $getUserInfoDTOResponse = new GetUserInfoDTOResponse(
                        $row['username'], $row['password'], $row['firstName'], $row['lastName'], 
                        $row['role'],$row['avg_score_value'],$row['student_level']
                    );

                }
            }
        }
    }catch(Exception $e){
        error_log($e);
        exit('Error occured!');
    }
    disconnect($pdo);
    return $getUserInfoDTOResponse;
}

?>