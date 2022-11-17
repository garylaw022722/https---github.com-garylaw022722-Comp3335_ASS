<?php

$roleMap = array(
    "am" => "Admin",
    "IDM" => "IT_Direct_Manager",
    "IDS" => "IT_Dept_Staff",
    "HRDS" => "HR_Dept_Staff",
    "SDS"  => "Sales_Dept_Staff"
);


$request_data = json_decode(file_get_contents('php://input'), true);


$config  = file_get_contents("../../conFig/sa.json");
$privkey = openssl_pkey_get_private(file_get_contents('../../secure/server_SK.pem'));
openssl_private_decrypt($config, $plaintext, $privkey); //,OPENSSL_NO_PADDING);
$config_Data = json_decode($plaintext);


$conn = new mysqli(
    $config_Data->host,
    $config_Data->user,
    $config_Data->pwd,
    $config_Data->database
);


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
