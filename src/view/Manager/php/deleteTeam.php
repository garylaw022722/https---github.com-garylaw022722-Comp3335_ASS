<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset($_POST['team_id'])){
    $conn = getConnection(json_decode($_SESSION[$uuid])); 
    //htmlxxx
    $sql = "DELETE FROM Team WHERE team_id= ? LIMIT 1";
    $preState =$conn->prepare($sql);
    $team_id = $_POST['team_id'];
  $preState->bind_param("s",$team_id);
  $preState->execute();

if ( $preState == TRUE) {
    
    header("Location:../main.php");

} else {
    header( "Location:../main.php?msg=".urlencode("Wrong data format"));
}

}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}


?>