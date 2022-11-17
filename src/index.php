<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>IT-Sales Login</title>
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman';
        }
    </style>
</head>

<body style="background-color: #1A5276;">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div style="background:white;
            opacity: 0.3;
           height:500px;
           width: 500px;
           margin-top:100px;
           border-radius: 30px;
           position:fixed;
            ">
            </div>
            <div style="
            opacity: 1;
           height:500px;
           width: 500px;
           margin-top:100px;
           border-radius: 30px;
           position:fixed;
            ">
                <table style="width: 100%;height:100%;">
                    <tr>
                        <td align="center">
                            <div>

                                <br />
                                <h1 style="color: white;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                            margin-top: 3px;
                            ">Login</h1>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top;" align="center">
                            <h4 align="left" style="padding-left: 45px;color:white">User ID : <label style="color: red;">*</label></h4>
                            <!--Form post data-->
                            <form action="php/validationLogin.php" method="post">
                                <input type="text" size="38"  name="user_id" placeholder="Please input your user id ..." required style="opacity: 0.6;height: 50px;border-radius: 15px;padding: 13px;" />
                        </td>
                    </tr>
                    <tr style="margin-top:-20px;">
                        <td style="vertical-align: top;" align="center">
                            <h4 align="left" style="padding-left: 45px;color:white">Password: <label style="color: red;">*</label></h4>
                            <input type="password" size="38" placeholder="Please input your password..." required id="password" name="password" style="opacity: 0.6;height: 50px;border-radius: 15px;padding: 13px;" />
                            <h5 align="right" style="padding-right: 48px;
                    padding-top: 10px;
                    ">

                            </h5>
                        </td>
                    </tr>

                    <tr style="margin-top:-30px;">
                        <td align="center">
                            <div style="background-color: white;
                   padding: 13px;
                   margin-left: 40px;
                   margin-right: 40px;
                    height: 50px;
                    opacity: 0.5;
                    border-radius: 15px;
                    
                    ">

                                <input type="submit" style="background-color: transparent;border: transparent;width: 100%;" value="Login">



                                </form>
                            </div>

                        </td>

                    </tr>


                </table>
            </div>








        </div>
        <div class="col"></div>
    </div>



</body>

</html>

<?php
if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
    echo "<script>alert('$message');</script>";
    echo "<script>window.history.pushState({}, document.title, '/' + '/index.php');</script>";
}
?>