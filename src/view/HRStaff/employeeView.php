<?php
require_once("../../php/db_connect.php");
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
</style>

<body>

  <input type="button" value="Create Employee" id="createEmployeeButton" class="btn btn-primary" data-toggle="modal" data-target="#createEmployeeModal" style="margin-top:30px;margin-left:30px;" />
  <!--Select Employee Record-->
  <table style="width:100%;margin-top:30px;" id="grid">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Dep ID</th>
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
      $sql = "SELECT * FROM comp3335.Employee;";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<tr><th style='padding-top:20px;'>" . $row["user_id"] . "</th>
          <th style='padding-top:20px;'>" . $row["Dept_id"] . "</th>
          <th style='padding-top:20px;'>" . $row["firstName"] . "</th>
          <th style='padding-top:20px;'>" . $row["lastName"] . "</th>
          <th style='padding-top:20px;'>" . $row["BOD"] . "</th>
          <th style='padding-top:20px;'>" . $row["salary"] . "</th>
          <th style='padding-top:20px;'>" . $row["gender"] . "</th>
          <th style='padding-top:20px;'>" . $row["address"] . "</th>
          <th style='padding-top:20px;'>" . $row["ID_Card_No"] . "</th>
          <th style='padding-top:20px;'>" . $row["tel"] . "</th>
          <th style='padding-top:20px;'><input type='button' data-toggle='modal' data-target='#editEmpolyeeModal' value='Edit' class='btn btn-primary' /></th></tr>";
        }
        echo "</tbody></table>";
      } else {
        echo "</tbody></table>";
        echo "0 results";
      }
      ?>
      <!--
      <tr>
        <th style="padding-top:20px;">1</th>
        <th style="padding-top:20px;">1</th>
        <th style="padding-top:20px;">Hi</th>
        <th style="padding-top:20px;">Hi</th>
        <th style="padding-top:20px;">02/03/2022</th>
        <th style="padding-top:20px;">2000</th>
        <th style="padding-top:20px;">F</th>
        <th style="padding-top:20px;">Hello</th>
        <th style="padding-top:20px;">R234890(4)</th>
        <th style="padding-top:20px;">
          <input type="button" data-toggle="modal" data-target="#editEmpolyeeModal" value="Edit" class="btn btn-primary" />
        </th>
      </tr>
    -->
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