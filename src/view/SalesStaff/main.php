<?php
session_start();
echo  $_SESSION["tappedID"];
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
            <span style="margin-top:10px;margin-left:10px;"
            
            >
         Sales Staff
          </span>
            <div class="mdl-layout-spacer"></div>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800"
        style="background-color: #1A5276! important; " 
        >
            <a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=8" 
			style="text-decoration: none;"
			>
           
              <div style="margin-left:50px;">
			  <h5>
            Order
</h5>
</div>
            
            </a>


            <a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=9" 
			style="text-decoration: none;"
			>
           
              <div style="margin-left:50px;">
			  <h5>
           Product
</h5>
</div>
            
            </a>



            <a class="mdl-navigation__link" href="../../php/checkStatus.php?tappedID=10" 
			style="text-decoration: none;"
			>
           
              <div style="margin-left:50px;">
			  <h5>
           Customer
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
		
		</a>  
            <div class="mdl-layout-spacer"></div>
       
        
        
        </nav>
      </div>



<?php

	if(isset( $_SESSION["tappedID"])){
		$tappedID = $_SESSION["tappedID"];
		if($tappedID == "8"){
?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >
            <?php
              include('orderView.php');
            ?>
            </div>
      </main>


<?php
    }else if($tappedID == "9"){
      ?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >

<?php
   include('productView.php');
    }else if ($tappedID == "10"){
      ?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >


      <?php
        include('customerView.php');
      }
  

	}else {
?>
 <main class="mdl-layout__content mdl-color--grey-100">
          <div class="mdl-color--white  mdl-shadow--1dp mdl-cell mdl-cell--12-col mdl-grid"
           id="content" >
            <?php
             include('orderView.php');
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



<!-- Start Edit Customer  -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabels">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="php/updateCustomer.php" method="post">
	
    <div class="form-group">
        
        <label for="recipient-name" class="col-form-label">Email:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" name='email'
          >

          <label for="recipient-name" class="col-form-label">Company Name:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" name='CompanyName'
        
          >

          <label for="recipient-name" class="col-form-label">Tel:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" name='tel'
        
          >




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input
        type="submit" 
        class="btn btn-primary"
        value="Save"
        />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Edit Customer  -->



<!-- Start Edit Product  -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabels">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form>
	

    <label for="recipient-name" class="col-form-label">Product ID:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" 
            >

            <label for="recipient-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" 
          
            >

            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" 
          
            >

            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" 
          
            >


            <label for="recipient-name" class="col-form-label">Create By:</label>
            <input type="text" class="form-control" id="recipient-name" class="title"  >

            <label for="recipient-name" class="col-form-label">Code Value:</label>
            <input type="text" class="form-control" id="recipient-name" class="title"  >

            <label for="recipient-name" class="col-form-label">Issue Date:</label>
            <input type="date" class="form-control" id="recipient-name" class="title"  >



</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Product  -->


<!-- Start Edit Order  -->
<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form>
	
  <div class="form-group">
  <div class="form-group">
        
  <label for="recipient-name" class="col-form-label">Order ID:</label>
          <input type="text" class="form-control" id="recipient-name" class="title"  value="3" disabled
          >

        <label for="recipient-name" class="col-form-label">Product ID:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" 
          >

          <label for="recipient-name" class="col-form-label">Quantity:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" 
        
          >

          <label for="recipient-name" class="col-form-label">Total Price:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" 
        
          >

          <label for="recipient-name" class="col-form-label">Order At:</label>
          <input type="text" class="form-control" id="recipient-name" class="title" 
        
          >


          <label for="recipient-name" class="col-form-label">Email:</label>
          <input type="text" class="form-control" id="recipient-name" class="title"  >



    
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Order  -->



