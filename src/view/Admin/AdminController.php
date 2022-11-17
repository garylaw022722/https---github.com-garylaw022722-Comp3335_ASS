<?php
include("../../php/db_Connection.php");

$request_data = json_decode(file_get_contents('php://input'), true);
session_start();
$uuid =  $_SESSION["id"];
$conn = getConnection(json_decode($_SESSION[$uuid]));

$jsonData = array();

if ($request_data["action"] == "getAC_data") {
    $sql = "Select user_id,create_on,internal_uid, updated_on ,created_By ,acType from Account";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $jsonData[] = $row;
    }
    echo json_encode($jsonData);
}else if ($request_data["action"]=="updateProfile"){
    $user_id =$request_data["usr_id"];

    if(!empty($request_data["pwd"])){
        $password =$request_data["pwd"];
        $sql="Update Account set password =? , salt =?  Where user_id =? ";
        $salt =openssl_random_pseudo_bytes(16, $cstrong);
        $salt =base64_encode($salt);
        $concat_String = $password.$salt;
        $password= hash("sha256", $concat_String);
        $preState =$conn->prepare($sql);
        $preState->bind_param("sss",$password,$salt,$user_id);
        $preState->execute();
    }
    
    if ($request_data["isRevokeAll"]){
        $sql="Update Account set acType='N/A'  Where user_id =? ";
        $preState =$conn->prepare($sql);
        $preState->bind_param("s",$user_id);
        $preState->execute();     
        
        // procdure in describe in persimssion.sql
        $preState =$conn->prepare("call Disable_USR_Account(?)");
        $preState->bind_param("s",$user_id);
        $preState->execute();         
    }

}
