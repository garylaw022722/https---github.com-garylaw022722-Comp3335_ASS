<?php
if(isset($_GET["tappedID"])){
    $tappedID = $_GET["tappedID"];
    session_start();
    $_SESSION["tappedID"] = $tappedID;
    //go to main.php
    if($tappedID <= 3){
        //Manager left bar
        header("Location:../view/Manager/main.php");
    }else if($tappedID > 3 && $tappedID <= 5 ){
         //IT Staff left bar
        header("Location:../view/ITStaff/main.php");
    }else if($tappedID == 6){
           //HR Staff left bar
           header("Location:../view/HRStaff/main.php");
    }else if($tappedID == 7){
        //admin left bar
        header("Location:../view/Admin/main.php");
 }else if($tappedID > 7 && $tappedID <= 10){
    //sale Staff left bar
    header("Location:../view/SalesStaff/main.php");
}
  
}

?>