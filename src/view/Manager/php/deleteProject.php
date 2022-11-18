<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset($_POST['project_id'])){

    $conn = getConnection(json_decode($_SESSION[$uuid])); 
    //htmlxxx
    $sql = "DELETE FROM Project WHERE project_id= ? LIMIT 1";
    $preState =$conn->prepare($sql);
    $project_id = $_POST['project_id'];
  $preState->bind_param("s",$project_id);
  $preState->execute();

if ($preState == true) {
    header("Location:../main.php");
} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>