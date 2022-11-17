<?php
$roleMap = array(
  "am" => "Admin",
  "IDM" => "IT_Direct_Manager",
  "IDS" =>"IT_Dept_Staff",
  "HRDS" =>"HR_Dept_Staff",
  "SDS"  =>"Sales_Dept_Staff"
);


$request_data= json_decode(file_get_contents('php://input'),true);


$config  = file_get_contents("../../conFig/sa.json");
$privkey = openssl_pkey_get_private(file_get_contents('../../secure/server_SK.pem'));
openssl_private_decrypt($config,$plaintext,$privkey); //,OPENSSL_NO_PADDING);
$config_Data =json_decode($plaintext);


$conn = new mysqli(
  $config_Data->host,
  $config_Data->user,
  $config_Data->pwd,
  $config_Data->database
);

$user_id = $_POST["userID"];
$password = $_POST["pwd"];
$acType = $roleMap[$_POST["userType"]];
$internal_uid =  $user_id.'@%';




if ($_POST["action"]=="register"){
        $sql ="Select * from Account where user_id =?";
        $preState =$conn->prepare($sql);
        $preState->bind_param("s",$user_id);
        $preState->execute();
        $result =$preState->get_result();


        if(mysqli_num_rows($result)==1){    
            echo "<h1 >Duplicated </h1>";
        }
        else{ 
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $salt =openssl_random_pseudo_bytes(16, $cstrong);
            $salt =base64_encode($salt);
            $concat_String = $password.$salt;
            $password= hash("sha256", $concat_String);
            echo $concat_String."<br>";
            $createdBy ="skaksa@%";
            $sql ="INSERT INTO `Account`(`user_id`, `password`, `salt`,  `created_By`, `acType`, `internal_uid`) 
            VALUES (?,?,?,?,?,?)";
            
            $preState =$conn->prepare($sql);
            $preState->bind_param("ssssss",$user_id,$password,$salt,$createdBy ,$acType,$internal_uid);
            $preState->execute();
            
            $sql = "call createUser(?,?,?)";
            $preState =$conn->prepare($sql);
            if($acType =="IT_Direct_Manager"){
        
            $acType='IT_Direct_Manager" , "IT_Dept_Staff';
            }
        
            $preState->bind_param("sss",$acType,$user_id,$_POST["pwd"]);
            $preState->execute();
            // echo  "<script>window.location.href='register.html'; </script>";
        }
    }
