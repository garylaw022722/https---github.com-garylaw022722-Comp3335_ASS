<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset($_POST['task_id'])){

    $conn = getConnection(json_decode($_SESSION[$uuid])); 
    //htmlxxx
    $sql = "DELETE FROM Task WHERE task_id= ? LIMIT 1";
    $preState =$conn->prepare($sql);
    $task_id = $_POST['task_id'];
  $preState->bind_param("s",$task_id);
  $preState->execute();


if ($preState == TRUE) {
    
    header("Location:../main.php");

} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>