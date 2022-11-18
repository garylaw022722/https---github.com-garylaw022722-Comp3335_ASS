<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];

if(isset(
    $_POST['project_id'],
    $_POST['title_id'],$_POST['task_id'],$_POST['team_id'])){
     $conn = getConnection(json_decode($_SESSION[$uuid])); 
     $sql = "INSERT INTO Project(project_id,title,team_id,task_id) values (?,?,?,?)";
     $preState =$conn->prepare($sql);
     $preState->bind_param("ssss",$project_id,$title_id, $team_id, $task_id);
     $project_id = $_POST['project_id'];
    $title_id = $_POST['title_id'];
    $task_id = $_POST['task_id'];
    $team_id = $_POST['team_id'];
    $preState->execute();
   
   
   
    if($query ==true)
    {
       
      //echo "yes";
      header("Location:../main.php");


    }
    else
    {
        //private key project id wrong
        header( "Location:../main.php?msg=".urlencode("Project ID should be unique"));
    } 


}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}

?>