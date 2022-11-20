<?php
include("db_Connection.php");
$user_id = $_POST["user_id"];
$user_password = $_POST["password"];

$config  = file_get_contents("../conFig/sa.json");
$privkey = openssl_pkey_get_private(file_get_contents('../secure/server_SK.pem'));
openssl_private_decrypt($config, $plaintext, $privkey);
$config_Data = json_decode($plaintext);

$Psudo_user = $config_Data->user;
$Psudo_pwd = $config_Data->pwd;

$config_Data->user = $config_Data->default;
$config_Data->pwd = $config_Data->default_pwd;



$conn = getConnection($config_Data);








//***********************/ create super account if not found / *************************
$sql = "Select salt , password ,acType, internal_uid ,freeze from Account where user_id = ? ";
$preState = $conn->prepare($sql);
$preState->bind_param("s",$Psudo_user);
$preState->execute();
$result = $preState->get_result();

if (mysqli_num_rows($result) == 0 && $Psudo_user == $user_id && $Psudo_pwd==$user_password) {
    

    //insert record on Account table 
    $internal_uid  = $Psudo_user."%@";
    $salt = openssl_random_pseudo_bytes(16, $cstrong);
    $salt = base64_encode($salt);
    $concat_String = $Psudo_pwd . $salt;
    $password = hash("sha256", $concat_String);
    $row = mysqli_fetch_assoc($result);

    $createdBy = $config_Data->user;
    $sql = "INSERT INTO `Account`(`user_id`, `password`, `salt`,  `created_By`, `acType`, `internal_uid`) 
            VALUES (?,?,?,?,?,?)";

    $preState = $conn->prepare($sql);
    $preState->bind_param("ssssss", $user_id, $password, $salt, $createdBy, $config_Data->Role, $internal_uid);
    $preState->execute();


    //create DB Account 
    $sql = "call createUser(?,?,?)";
    $preState = $conn->prepare($sql);
    $preState->bind_param("sss", $config_Data->Role, $Psudo_user, $Psudo_pwd);
    $preState->execute();

    // create KeyPairs
    $keySpec = openssl_pkey_new([
        'private_key_bits' => 2048,
        'private_key_type' => OPENSSL_KEYTYPE_RSA,
        "digest_alg" => "sha512"
    ]);


    $desetination_Path = "../secure/{$Psudo_user}";
    if ( !is_dir( $desetination_Path ) ) {
        mkdir($desetination_Path);
    }
    openssl_pkey_export_to_file($keySpec, "{$desetination_Path}/{$Psudo_user}_SK.pem");
    $privateKey_Pem = openssl_get_privatekey(file_get_contents("{$desetination_Path}/{$Psudo_user}_SK.pem"));
    $publicKey = openssl_pkey_get_details($privateKey_Pem);
    file_put_contents("{$desetination_Path}/{$Psudo_user}_SK.pem", $publicKey['key']);
}

$sql = "Select salt ,freeze, password ,acType,internal_uid from Account where user_id =?";
$preState = $conn->prepare($sql);
$preState->bind_param("s", $user_id);
$preState->execute();
$result = $preState->get_result();

$isSuccess_Authenticated = false;

if (mysqli_num_rows($result) == 0) {

    echo "<h1>Login Fail</h1> try it again on <a href='../index.php'>index pages </a>";
} else {
   

    $data = mysqli_fetch_assoc($result);
    if ($data["freeze"]=='T'){
        echo "<h1> Access Denied. </h1>";
        exit();
    }
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $concat_String = $user_password . $data["salt"];

    $rehash_password = hash("sha256", $concat_String);
    $content = $data["password"];
    $role = $data["acType"];

    if (!$data["password"] == $rehash_password)
        $isSuccess_Authenticated = false;


    $isSuccess_Authenticated = true;
}

if ($isSuccess_Authenticated) {
    // disconnect root account;
    $conn->close();

    //create json data
    $sessionData = array(

        "host" => $config_Data->host,
        "user" => $user_id,
        "pwd" => $user_password,
        "database" => $config_Data->database,
        "role" =>  $role
    );

    session_start();
    $hashed_uuid = hash("sha256", uniqid());

    $_SESSION[$hashed_uuid] = json_encode($sessionData);
    $_SESSION["id"] = $hashed_uuid;

    switch ($role) {
        case 'HR_Dept_Staff':
            $_SESSION["tappedID"] = "6";
            header("Location:../view/HRStaff/main.php");
            break;

        case 'IT_Dept_Staff':
            $_SESSION["tappedID"] = "4";
            header("Location:../view/ITStaff/main.php");
            break;

        case 'IT_Direct_Manager':
            $_SESSION["tappedID"] = "1";
            header("Location:../view/Manager/main.php");
            break;

        case 'Admin':
            $_SESSION["tappedID"] = "7";
            header("Location:../view/Admin/main.php");
            break;
        case 'Sales_Dept_Staff':
            $_SESSION["tappedID"] = "8";
            header("Location:../view/SalesStaff/main.php");
            break;
        
    }
}
