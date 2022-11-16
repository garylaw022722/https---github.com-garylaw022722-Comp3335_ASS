<?php
 
$user_id = $_POST["userID"];
$password = $_POST["pwd"];
$acType = 'Sales_Dept_Staff' ;
$internal_uid =  $user_id.'@%';

 //128 string
$salt =openssl_random_pseudo_bytes(16, $cstrong);
$salt =base64_encode($salt);
$concat_String = $password.$salt;
$password= hash("sha256", $concat_String);

$config  = file_get_contents("conFig/sa.json");
$privkey = openssl_pkey_get_private(file_get_contents('secure/server_SK.pem'));
openssl_private_decrypt($config,$plaintext,$privkey); //,OPENSSL_NO_PADDING);
$config_Data =json_decode($plaintext);


var_dump($config_Data);
echo $config_Data->pwd;

$conn = new mysqli(
        $config_Data->host,
        $config_Data->user,
        $config_Data->pwd,
        $config_Data->database
     );

// // Check connection
if ($conn-> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}else{
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $createdBy ="skaksa@%";
  $sql ="INSERT INTO `Account`(`user_id`, `password`, `salt`,  `created_By`, `acType`, `internal_uid`) 
  VALUES (?,?,?,?,?,?)";
  
  $preState =$conn->prepare($sql);
  $preState->bind_param("ssssss",$user_id,$password,$salt,$createdBy ,$acType,$internal_uid);
  $preState->execute();
  
  $sql = "call createUser(?,?,?)";
  $preState =$conn->prepare($sql);
  $preState->bind_param("sss",$acType,$user_id,$_POST["pwd"]);
  $preState->execute();





  








}


?>


