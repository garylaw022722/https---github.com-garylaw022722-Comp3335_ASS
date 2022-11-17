<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['project_id'],
    $_POST['assigner'],$_POST['assignee'],$_POST['details'],
    $_POST['end_date']
    )){
    $project_id = $_POST['project_id'];
    $assigner = $_POST['assigner'];
    $assignee = $_POST['assignee'];
    $details = $_POST['details'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO Task(project_id,assigner,assignee,details,end_Date) 
    value ('$project_id','$assigner', '$assignee', '$details','$end_date')";
     
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
       // echo $start_date;
     header( "Location:../main.php?msg=".urlencode("Wrong data input"));
    } 


}else{
    header( "Location:../main.php?msg=".urlencode("Miss Data"));
}

?>