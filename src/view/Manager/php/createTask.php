<?php
include('../../../php/db_Connection.php');
session_start();
$uuid =  $_SESSION["id"];
if(isset(
    $_POST['project_id'],
    $_POST['assigner'],$_POST['assignee'],$_POST['details'],
    $_POST['end_date']
    )){
      $conn = getConnection(json_decode($_SESSION[$uuid])); 
      //htmlxxx
      $sql = "INSERT INTO Task(project_id,assigner,assignee,details,end_Date) values (?,?,?,?,?)";
      $preState =$conn->prepare($sql);
    $project_id = $_POST['project_id'];
    $assigner = $_POST['assigner'];
    $assignee = $_POST['assignee'];
    $details = $_POST['details'];
    $end_date = $_POST['end_date'];
    $preState->bind_param("sssss",$project_id,$assigner, $assignee, $details,$end_date);
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