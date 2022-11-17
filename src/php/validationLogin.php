<?php
require_once "db_connect.php";
if(isset($_POST["username"], $_POST["password"])){
        //success   
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM Account WHERE user_id ='".$username."'";
        $rs = mysqli_query($con,$sql) or die(mysqli_error());
        if(mysqli_num_rows($rs) > 0){
            $sql1 = "SELECT acType FROM Account WHERE user_id = '".$username."'";
            $rs1 = mysqli_query($con,$sql1) or die(mysqli_error());
            $rc1 = mysqli_fetch_assoc($rs1);
           
           
            if ($rc1["acType"] == "Admin"){//IT admin
                while($rc = mysqli_fetch_assoc($rs)) {
                    if($rc['username'] = $username && $rc['password'] == $password){
                        session_start();
                        $_SESSION["tappedID"] = "7";
                         //  $_SESSION["OrganizationID"] = $rc['OrganizationID'];

                        header("Location:../view/Admin/main.php");
                    }else{
                        header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
                    }
                }
            }else if ($rc1["acType"] == "HR_Dept_Staff"){ //HR Staff
                while($rc = mysqli_fetch_assoc($rs)) {
                    if($rc['username'] = $username && $rc['password'] == $password){
                        session_start();
                        $_SESSION["tappedID"] = "6";

                         //  $_SESSION["OrganizationID"] = $rc['OrganizationID'];

                        header("Location:../view/HRStaff/main.php");
                    }else{
                        header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
                    }
                }
            }else if ($rc1["acType"] == "IT_Dept_Staff"){ //IT Staff
                while($rc = mysqli_fetch_assoc($rs)) {
                    if($rc['username'] = $username && $rc['password'] == $password){
                        session_start();
                        $_SESSION["tappedID"] = "4";

                       //set session
                      //  $_SESSION["OrganizationID"] = $rc['OrganizationID'];
                        header("Location:../view/ITStaff/main.php");
                    }else{
                        header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
                    }
                }
            }else if ($rc1["acType"] == "IT_Direct_Manager"){ //manager account
                while($rc = mysqli_fetch_assoc($rs)) {
                    if($rc['username'] = $username && $rc['password'] == $password){
                        session_start();
                     //set session
                     $_SESSION["tappedID"] = "1";

                        //  $_SESSION["OrganizationID"] = $rc['OrganizationID'];
                        header("Location:../view/Manager/main.php");
                    }else{
                        header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
                    }
                }
            }else if ($rc1["acType"] == "Sales_Dept_Staff"){ //sales staff
                while($rc = mysqli_fetch_assoc($rs)) {
                    if($rc['username'] = $username && $rc['password'] == $password){
                        session_start();
                        $_SESSION["tappedID"] = "8";

                        //set session
                           //  $_SESSION["OrganizationID"] = $rc['OrganizationID'];
                 
                        header("Location:../view/SalesStaff/main.php");
                    }else{
                        header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
                    }
                }
            }


        }  
         else{
            header( "Location:../index.php?msg=".urlencode("Wrong Username and password"));
         }


  
  
}else{
  //  header( "Location:../index.php?msg=".urlencode("You have no permission"));
  echo "no permisson";
  echo  $_POST["username"];
  echo $_POST["password"];
}



?>