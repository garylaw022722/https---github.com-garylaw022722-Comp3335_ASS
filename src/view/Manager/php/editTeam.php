<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];
if(isset(
    $_POST['team_id'],
    $_POST['user_id'],$_POST['project_id'])){

        $conn = getConnection(json_decode($_SESSION[$uuid])); 
        //htmlxxx
       $sql = "UPDATE Team 
        SET user_id = ?,
        project_id = ?
        WHERE team_id= ?;";
         $preState =$conn->prepare($sql);
        $preState->bind_param("isi",$user_id,$project_id,$team_id);
        $user_id = $_POST['user_id'];
        $project_id = $_POST['project_id'];
        $team_id = $_POST['team_id'];
        $preState->execute();

    if ($preState == TRUE) {
        //success
        //go to main
        header("Location:../main.php");
   
    } else {
        header( "Location:../main.php?msg=".urlencode("Wrong data format"));
    }

    }else{
        header( "Location:../main.php?msg=".urlencode("Miss Data"));
    }






?>