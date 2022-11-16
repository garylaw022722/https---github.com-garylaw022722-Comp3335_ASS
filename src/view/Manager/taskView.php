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

<input type="button" value="Create Task"  id="newTaskButton"
class="btn btn-primary" data-toggle="modal"  data-target="#newTaskModal"
style="margin-top:30px;margin-left:30px;"
/>
<table style="width:100%;margin-top:30px;"  id="grid" >
  <thead >
    <tr >
      <th >Task ID</th>
      <th>Project ID</th>
      <th>Assigner</th>
	    <th>Assignee</th>
        <th>Details</th>
        <th>Status</th>
        <th>Start Date</th>
        <th>End Date</th>
      <th>Command</th>
  
    </tr>
  </thead>
  <tbody>
    <tr >
      <th style="padding-top:20px;">
        1
      </th>
      <th style="padding-top:20px;">
        1
      </th> 
      <th style="padding-top:20px;">
      Harry
      </th>
      <th style="padding-top:20px;">
     Andy
      </th>
    
      <th style="padding-top:20px;">
   Hello world
      </th>

      <th style="padding-top:20px;">
  Open
      </th>
      <th style="padding-top:20px;">
  09/10/2022
      </th>
      <th style="padding-top:20px;">
      09/12/2022
      </th>

      <th style="padding-top:20px;">
      
      <input type="button" 
      data-toggle="modal"  
      data-target="#editTaskModal"
      value="Edit" 
      class="btn btn-primary"/>

      <button type="button" 
      data-toggle="modal"  
      data-target="#deleteTaskModal"
      class="btn btn-danger">Delete</button>
        
      </th>
</tr>




  </tbody>
</table>
</div>
</div>
</div>
</div>


<!-- Modal -->

        <!--Form Create task Record-->
       <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form>
	
    <div style="margin-top:20px;">
       Task ID: <input type="text"  class="form-control"/>
</div>
<div style="margin-top:20px;">
       Project ID: <input type="text"   class="form-control"/>
</div>

<div style="margin-top:20px;">
       Assigner: <input type="text"  class="form-control"/>
</div>

<div style="margin-top:20px;">
       Assignee: <input type="text"  class="form-control"/>
</div>

<div style="margin-top:20px;">
       Details: <input type="text"  class="form-control"/>
</div>
<div style="margin-top:20px;">
       Status: <input type="text" class="form-control"/>
</div>

<div style="margin-top:20px;">
       Start Date: <input type="date" class="form-control"/>
</div>
<div style="margin-top:20px;">
       End Date: <input type="date"  class="form-control"/>
</div>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<!--end new task-->







</body>
</html>