<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];
if(isset(
    $_POST['team_id'],
    $_POST['user_id'],$_POST['project_id']
    )){

      $conn = getConnection(json_decode($_SESSION[$uuid])); 
      //htmlxxx
      $sql = "INSERT INTO Team(team_id,user_id,project_id) values (?,?,?)";
      $preState =$conn->prepare($sql);
      $team_id = $_POST['team_id'];
      $user_id = $_POST['user_id'];
      $project_id = $_POST['project_id'];
    $preState->bind_param("sss",$team_id,$user_id, $project_id);
    $preState->execute();

    if($preState ==true)
    {
      //echo "yes";
      header("Location:../main.php");
   
    }
    else
    {
        //private key project id wrong
       // echo $start_date;
     header( "Location:../main.php?msg=".urlencode("Wrong data input"));
    } 


}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}

?>