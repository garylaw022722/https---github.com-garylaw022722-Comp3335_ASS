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
</head><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>

  #tablePagination {
    text-align:center;
    font-size:12px;
    margin:6px auto;
    height: 20px;
    line-height:20px;   
}
/*menu Pop Up*/
#container {
    width: 100%;
    height: 100%;
    top: 0;
    visibility:hidden;
    position: absolute;
    display:block;
    background-color: rgba(22,22,22,0.5); /* complimenting your modal colors */
}
#container:target {
    visibility: visible;
    display: block;
}
.reveal-modal {
    position: relative;
    margin: 0 auto;
    top: 15%;
    left:30%;
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
#buyButton{
  background-color:#1A5276;;
  color:white;
  padding:10px;
  width:70px;
  border-radius:8px;
  border-color:transparent;
}

#buyButton:hover{
background-color:red;
}


</style>

<body >

<input type="button" value="Create Team"  id="newProjectButton"
class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal"
style="margin-top:30px;margin-left:30px;"
/>
<table style="width:100%;margin-top:30px;"  id="grid" >
  <thead >
    <tr >
      <th >Team ID</th>
      <th>Project ID</th>
      <th>User ID</th>
      <th>Command</th>
  
    </tr>
  </thead>



  <?php
include('../../php/db_connect.php');
$sql = "SELECT * FROM Team";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
  <tbody>
<tr >
      <th style="padding-top:20px;">
       <?php echo $row['team_id']?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row['user_id']?>
      </th> 
    
      <th style="padding-top:20px;">
      <?php echo $row['project_id']?>
      </th>
    <!--
      <th style="padding-top:20px;">
      
      <input type="button" 
      data-toggle="modal"  
      data-target="#editTeamModal"
      value="Edit" 
      class="btn btn-primary"/>
      </th>

  -->



      <th style="padding-top:20px;">
      <form action="php/deleteTeam.php" method="post" >
      <input type="hidden" 
      name="team_id"
      value="<?php echo $row['team_id']?>" />
      <input type="submit"
      value="Delete"
      class="btn btn-danger"/>
  </form>
        
      </th>
</tr>
  </tbody>


  <?php


}
} else {
echo "0 results";
}

?>



</table>



</div>
</div>
</div>
</div>

        <!--Form Create project Record-->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



        <form action="php/createTeam.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Team ID:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" id="title"
            placeholder="Please enter team id..."
            name="team_id"
            >

            <label for="recipient-name" class="col-form-label">User ID:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" id="title"
            name="user_id"
            placeholder="Please enter user id..."
            >


            <label for="recipient-name" class="col-form-label">Project ID:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" id="title"
            name="project_id"
            placeholder="Please enter project id..."
            >  
     

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input 
        type="submit"
        class="btn btn-primary"
        value="Submit"
        />
      </div>
      </form>
    </div>
  </div>
</div>


<!--end new project-->







</body>
</html>


