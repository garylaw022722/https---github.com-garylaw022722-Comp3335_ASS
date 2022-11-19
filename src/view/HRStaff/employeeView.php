<?php
require_once("../../php/db_Connection.php");

$uuid =  $_SESSION["id"];
$con = getConnection(json_decode($_SESSION[$uuid]));

?>
<html>

<head>
  <meta charset="utf-8">
  <link href="images/table.css" rel="stylesheet" type="text/css" media="all">
  <script type="text/javascript" src="../public/jquery/jquery-1.11.0.js"></script>
  <script type="text/javascript" src="../public/jquery/jquery.tablePagination.0.2.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
  #tablePagination {
    text-align: center;
    font-size: 12px;
    margin: 6px auto;
    height: 20px;
    line-height: 20px;
  }

  /*menu Pop Up*/
  #container {
    width: 100%;
    height: 100%;
    top: 0;
    visibility: hidden;
    position: absolute;
    display: block;
    background-color: rgba(22, 22, 22, 0.5);
    /* complimenting your modal colors */
  }

  #container:target {
    visibility: visible;
    display: block;
  }

  .reveal-modal {
    position: relative;
    margin: 0 auto;
    top: 15%;
    left: 30%;
  }

  /*button */
  .button {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
  }

  #buyButton {
    background-color: #1A5276;
    ;
    color: white;
    padding: 10px;
    width: 70px;
    border-radius: 8px;
    border-color: transparent;
  }

  #buyButton:hover {
    background-color: red;
  }

  .black_overlay {
    display: none;
    position: absolute;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    background-color: black;
    z-index: 1001;
    -moz-opacity: 0.8;
    opacity: .80;
    filter: alpha(opacity=80);
  }

  .white_content {
    display: none;
    position: absolute;
    top: 2%;
    left: 25%;
    width: 50%;
    height: 96%;
    padding: 16px;
    border: 16px solid orange;
    background-color: white;
    z-index: 1002;
    overflow: auto;
  }
</style>

<body>

  <div id="light" class="white_content">This is the lightbox content. <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

    <div>

      <div class="form-group">
        <form action="editEmployee.php" method="post">
          <label for="recipient-name" class="col-form-label">User ID: </label>
          <p type="text" id="user_id"></p>

          <label for="Dept_id" class="col-form-label">Department ID:</label>
          <input type="value" class="form-control" name="Dept_id" id="Dept_id" class="title" placeholder="Please enter department ID...">

          <label for="firstName" class="col-form-label">First Name:</label>
          <input type="text" class="form-control" name="firstName" id="firstName" class="title" placeholder="Please enter the first name...">

          <label for="lastName" class="col-form-label">Last Name:</label>
          <input type="text" class="form-control" name="lastName" id="lastName" class="title" placeholder="Please enter the last name...">

          <label for="BOD" class="col-form-label">Birth of Date:</label>
          <input type="date" class="form-control" name="BOD" id="BOD" class="title" placeholder="Please enter the birth of date...">

          <label for="salary" class="col-form-label">Salary:</label>
          <input type="value" class="form-control" name="salary" id="salary" class="title" placeholder="Please enter the salary...">

          <label for="gender" class="col-form-label">gender:</label>
          <input type="text" class="form-control" name="gender" id="gender" class="title" placeholder="Please enter the gender...">

          <label for="address" class="col-form-label">Address:</label>
          <input type="text" class="form-control" name="address" id="address" class="title" placeholder="Please enter the address...">

          <label for="ID_Card_No" class="col-form-label">HKID:</label>
          <input type="text" class="form-control" name="ID_Card_No" id="ID_Card_No" class="title" placeholder="Please enter the HKID number...">

          <label for="tel" class="col-form-label">Tel:</label>
          <input type="text" class="form-control" name="tel" id="tel" class="title" placeholder="Please enter the contact number...">
          <br />
          <input type="submit" value="Save Change" type="button" class="btn btn-primary" />
        </form>
      </div>
    </div>
  </div>
  <div id="fade" class="black_overlay">
  </div>


  <input type="button" value="Create Employee" id="createEmployeeButton" class="btn btn-primary" data-toggle="modal" data-target="#createEmployeeModal" style="margin-top:30px;margin-left:30px;" />
  <!--Select Employee Record-->
  <table style="width:100%;margin-top:30px;" id="grid">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Department Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>BOD</th>
        <th>Salary</th>
        <th>Gender</th>
        <th>Address</th>
        <th>HKID</th>
        <th>Contact Number</th>
        <th>Command</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT comp3335.Employee.*, comp3335.Department.deptName FROM comp3335.Employee
        INNER JOIN comp3335.Department on comp3335.Employee.Dept_id=comp3335.Department.Dept_id;";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        include("protection.php");


        // output data of each row
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
          $Skey_Path = "../../secure/{$row['user_id']}/{$row['user_id']}_SK.pem";
          echo $Skey_Path;
          $priKey = openssl_get_privatekey(file_get_contents($Skey_Path));
          echo "<tr><th style='padding-top:20px;'>" . $row['user_id'] . "</th>
          <th style='padding-top:20px;'>" . $row["deptName"] . "</th>
          <th style='padding-top:20px;'>" . $row["firstName"] . "</th>
          <th style='padding-top:20px;'>" . $row["lastName"] . "</th>
          <th style='padding-top:20px;'>" . RSA_decryption($row["BOD"], $priKey) . "</th>
          <th style='padding-top:20px;'>" . RSA_decryption($row["salary"], $priKey) . "</th>
          <th style='padding-top:20px;'>" . $row["gender"] . "</th>
          <th style='padding-top:20px;'>" . RSA_decryption($row["address"], $priKey) . "</th>
          <th style='padding-top:20px;'>" . RSA_decryption($row["ID_Card_No"], $priKey) . "</th>
          <th style='padding-top:20px;'>" . RSA_decryption($row["tel"], $priKey) . "</th>";
      ?>
          <th style='padding-top:20px;'>
            <p>
              <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';
                document.getElementById('user_id').innerHTML ='<h1><input type= text value= <?php echo $row['user_id'] ?> name= user_id </h1>';
                document.getElementById('fade').style.display='block';">
                Edit
              </a>
            </p>
          </th>
      <?php
          echo "</tr>";
        }
        echo "</tbody></table>";
      } else {
        echo "</tbody></table>";
        echo "0 results";
      }
      ?>

      <!--end of select employee-->

      </div>
      </div>
      </div>
      </div>

      <!--Form Create Employee Record-->
      <div class="modal fade" id="createEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create New Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="createEmployee.php" method="POST">
                <div class="form-group">
                  <label for="user_id" class="col-form-label">User ID:</label>
                  <input type="text" class="form-control" name="user_id" id="user_id" class="title">

                  <label for="Dept_id" class="col-form-label">Department ID:</label>
                  <input type="value" class="form-control" name="Dept_id" id="Dept_id" class="title">

                  <label for="firstName" class="col-form-label">First Name:</label>
                  <input type="text" class="form-control" name="firstName" id="firstName" class="title">

                  <label for="lastName" class="col-form-label">Last Name:</label>
                  <input type="text" class="form-control" name="lastName" id="lastName" class="title">

                  <label for="BOD" class="col-form-label">Birth of Date:</label>
                  <input type="date" class="form-control" name="BOD" id="BOD" class="title">

                  <label for="salary" class="col-form-label">Salary:</label>
                  <input type="value" class="form-control" name="salary" id="salary" class="title">

                  <label for="gender" class="col-form-label">gender:</label>
                  <input type="text" class="form-control" name="gender" id="gender" class="title">

                  <label for="address" class="col-form-label">Address:</label>
                  <input type="text" class="form-control" name="address" id="address" class="title">

                  <label for="ID_Card_No" class="col-form-label">HKID:</label>
                  <input type="text" class="form-control" name="ID_Card_No" id="ID_Card_No" class="title">

                  <label for="tel" class="col-form-label">Tel:</label>
                  <input type="text" class="form-control" name="tel" id="tel" class="title">

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>


              </form>
            </div>

          </div>
        </div>
      </div>


      <!--end new employee-->







</body>

</html>