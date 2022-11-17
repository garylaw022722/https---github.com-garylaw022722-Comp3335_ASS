<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['project_id'],
    $_POST['title_id'],$_POST['task_id'],$_POST['team_id'])){
    $project_id = $_POST['project_id'];
    $title_id = $_POST['title_id'];
    $task_id = $_POST['task_id'];
    $team_id = $_POST['team_id'];

    $sql = "INSERT INTO Project(project_id,title,team_id,task_id)
     value ('$project_id','$title_id', '$team_id', '$task_id')";
     
    $query= mysqli_query($con,$sql);
    $lastId = mysqli_insert_id($con);
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