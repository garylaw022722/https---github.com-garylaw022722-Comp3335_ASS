<?php
include("../../php/db_Connection.php");
$roleMap = array(
  "am" => "Admin",
  "IDM" => "IT_Direct_Manager",
  "IDS" =>"IT_Dept_Staff",
  "HRDS" =>"HR_Dept_Staff",
  "SDS"  =>"Sales_Dept_Staff"
);

// register form data
$user_id = $_POST["userID"];
$password = $_POST["pwd"];
$acType = $roleMap[$_POST["userType"]];
$internal_uid =  $user_id.'@%';


session_start();
$uuid =  $_SESSION["id"];
$profile =json_decode($_SESSION[$uuid]);
$conn = getConnection($profile);




if ($_POST["action"]=="register"){
    //get default admin account to obtain  Account table 
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
            $row = mysqli_fetch_assoc($result);

            $createdBy =$profile->user;
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

            $desetination_Path ="../../secure/".$user_id;
            mkdir($desetination_Path);
            $preState->bind_param("sss",$acType,$user_id,$_POST["pwd"]);
            $preState->execute();

            //create private key and secret key with SSL
            $keySpec = openssl_pkey_new([
              'private_key_bits' => 2048,
              'private_key_type' => OPENSSL_KEYTYPE_RSA,
              "digest_alg" => "sha512"
            ]);
          
          openssl_pkey_export_to_file($keySpec, $desetination_Path."/".$user_id."_SK.pem");
          $privateKey_Pem = openssl_get_privatekey(file_get_contents($desetination_Path."/".$user_id."_SK.pem"));
          $publicKey= openssl_pkey_get_details($privateKey_Pem); 
          file_put_contents($desetination_Path."/".$user_id."_PK.pem", $publicKey['key']);

          echo  "<script>window.location.href='register.html'; </script>";

        }
    }
