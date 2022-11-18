<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>IT Sales System</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
  </head>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap');

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Noto Sans KR', sans-serif;
}

.header{
	width: 1000px;
	padding: 30px;
	margin: 25px auto;
	border-radius: 5px;
	text-align: center;
}

.header p{
	font-size: 45px;
	text-transform: uppercase;
	font-weight: 700;
	color: black;
}

.container .input{
	border: 0;
	outline: none;
	color: black;
}

.search_wrap{
	width: 500px;
	margin: 38px auto;
}

.search_wrap .search_box{
	position: relative;
	width: 500px;
	height: 65px;
}

.search_wrap .search_box .input{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;

	border-radius: 3px;
	font-size: 18px;
}

.search_wrap .search_box .btn{
	position: absolute;
	top: 0;
	right: 0;
	width: 60px;
	height: 100%;
	background: black;
	z-index: 1;
	cursor: pointer;
}

.search_wrap .search_box .btn:hover{
	background: red;	
}

.search_wrap .search_box .btn.btn_common .fas{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	color: #fff;
	font-size: 20px;
}

.search_wrap.search_wrap_1 .search_box .btn{
	right: 0;
	border-top-right-radius: 3px;
	border-bottom-right-radius: 3px;
}

.search_wrap.search_wrap_1 .search_box .input,
.search_wrap.search_wrap_3 .search_box .input{
	padding-right: 80px;
}

.search_wrap.search_wrap_2 .search_box .btn{
	left: 0;
	border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
}

.search_wrap.search_wrap_2 .search_box .input,
.search_wrap.search_wrap_4 .search_box .input{
	padding-left: 80px;
}

.search_wrap.search_wrap_3 .search_box .input,
.search_wrap.search_wrap_4 .search_box .input,
.search_wrap.search_wrap_6 .search_box .input{
	border-radius: 50px;
}

.search_wrap.search_wrap_3 .search_box .btn{
	right: 0px;
	border-radius: 50%;
}

.search_wrap.search_wrap_4 .search_box .btn{
	left: 0px;
	border-radius: 50%;
}

.search_wrap.search_wrap_6 .search_box .btn,
.search_wrap.search_wrap_5 .search_box .btn{
	width: 125px;
	height: 45px;
	top: 8px;
	right: 5px;
	border-radius: 3px;
	color: #fff;
	display: flex;
	align-items: center;
	justify-content: center;
}

.search_wrap.search_wrap_6 .search_box .btn{
	border-radius: 25px;
}

.search_wrap.search_wrap_5 .search_box .input,
.search_wrap.search_wrap_6 .search_box .input{
	padding-right: 145px;
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
  top: 25%;
  left: 25%;
  width: 50%;
  height: 50%;
  padding: 16px;
  border: 16px solid orange;
  background-color: white;
  z-index: 1002;
  overflow: auto;
}
    </style>
  <body width="100%">
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header"
    >
     
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50"
      style="background-color: #1A5276! important; "
      >
        <header class="demo-drawer-header"   style="margin-left:70px;"
        
        >
          <img src="../../image/happy.png" class="demo-avatar">
          <div class="demo-avatar-dropdown">
            <span style="margin-top:10px;margin-left:-20px;"
            
            >
            IT Direct Manager
          </span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800"
        style="background-color: #1A5276! important; " 
        >
            <a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=1" 
			style="text-decoration: none;"
			>
           
              <div style="margin-left:50px;">
			  <h5>
             Project 
</h5>
</div>
            
            </a>


            <a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=2"
			style="text-decoration: none;"
			>
			<div style="margin-left:50px;">
			  <h5>
             Task
			 </h5>
</div>
            
            </a>
           
			<a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=3" 
			style="text-decoration: none;"
      >
	  <div style="margin-left:50px;">
			  <h5>
      Team
	  </h5>
</div>
          
    </a>

    <form action = "../../php/validation_logout.php" method="post" id="my_form">
            <a class="mdl-navigation__link" href="javascript:{}"
             onclick="document.getElementById('my_form').submit(); return false;">
			<div style="margin-left:50px;">
			  <h5>	
      
    	Logout
			</h5>
</div>
          
		
		</a>  
</form>
            <div class="mdl-layout-spacer"></div>
       
        
        
        </nav>
      </div>



<?php

	if(isset( $_SESSION["tappedID"])){
		$tappedID = $_SESSION["tappedID"];
		if($tappedID == "1"){
?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >
            <?php
              include('projectView.php');
            ?>
            </div>
      </main>
<?php
		}else if($tappedID == "2"){
?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >
            <?php
              include('taskView.php');
            ?>
            </div>
      </main>
<?php
		} else if($tappedID == "3"){
			?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >

<?php
	    include('teamView.php');
		
		}

	}else {
?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >
            <?php
              echo "hello";
            ?>
            </div>
      </main>
<?php
	}
?>
     

    </div>


    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>

<script type="text/javascript">

</script>



<!-- Start Edit Task  -->
<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form> 
	 <div style="margin-top:20px;">
		Project ID:
     <input type="text" value="" disabled="disabled" 
     />
</div>
<div style="margin-top:20px;">
		Project Title: <input type="text" value="" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Team ID: <input type="text" value="" disabled="disabled" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Task ID: <input type="text" value="" disabled="disabled" class="form-control"/>
</div>

      </div>
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>

</div>
<!-- End Edit Project  -->






 
<!-- Start Edit Task  -->
<div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form>
	
	 <div style="margin-top:20px;">
		Task ID: <input type="text" value="22" disabled="disabled" class="form-control"/>
</div>
<div style="margin-top:20px;">
		Project ID: <input type="text" value="22" disabled="disabled" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Assigner: <input type="text" value="1" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Assignee: <input type="text" value="1" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Details: <input type="text" value="1" class="form-control"/>
</div>
<div style="margin-top:20px;">
		Status: <input type="text" value="1" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Start Date: <input type="text" value="1" class="form-control"/>
</div>
<div style="margin-top:20px;">
		End Date: <input type="text" value="1" class="form-control"/>
</div>


</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Project  -->






<!-- Start Edit Team  -->
<div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
    
      <form>
	
	 <div style="margin-top:20px;">
		Team ID: <input type="text" value="1" disabled="disabled" class="form-control"/>
</div>

<div style="margin-top:20px;">
		Project ID: <input type="text" value="1"  class="form-control"/>
</div>

<div style="margin-top:20px;">
		User ID: <input type="text" value="1"  class="form-control"/>
</div>


</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Project  -->






<!--paste-->
<?php
	if(isset($_GET['msg'])){
		$message = $_GET['msg'];
		echo "<script>alert('$message');</script>";
		echo "<script>window.history.pushState({}, document.title, '/' + '/main.php');</script>";
	}
	?>