<?php
include('../../../php/db_connect.php');
if(isset(
    $_POST['team_id'],
    $_POST['user_id'],$_POST['project_id']
    )){
    $team_id = $_POST['team_id'];
    $user_id = $_POST['user_id'];
    $project_id = $_POST['project_id'];


    $sql = "INSERT INTO Team(team_id,user_id,project_id) 
    value ('$team_id','$user_id', '$project_id')";
     
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