<?php
include('../../php/db_Connection.php');

$uuid =  $_SESSION["id"];
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
  <table style="width:100%;margin-top:30px;" id="grid">
    <thead>
      <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Department Name</th>
      </tr>
    </thead>
    <?php
    $conn = getConnection(json_decode($_SESSION[$uuid]));
    $sql = "SELECT * FROM comp3335.itData;";
    $preState = $conn->prepare($sql);
    $preState->execute();
    $result = $preState->get_result();

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["user_id"] . "</td>
        <td>" . $row["firstName"] . "</td>
        <td>" . $row["lastName"] . "</td>
        <td>" . $row["deptName"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "</table>";
      echo "0 results";
    }
    ?>

    </div>
    </div>
    </div>
    </div>

</body>

</html>