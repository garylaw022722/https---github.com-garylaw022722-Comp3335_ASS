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

<body >

<div id="light" class="white_content">This is the lightbox content. <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>

 <div>

 <div class="form-group">
 <form action="php/updateProducts.php" method="post">

            <label for="recipient-name" class="col-form-label">pid: </label>
            <p   id="pid" class="form-control"></p>

            <label for="recipient-name" class="col-form-label">pName: </label>
            <input type="text" class="form-control" id="recipient-name" class="pName" id="pName"
            placeholder="Please enter pName"
            name="pName"
            >

            <label for="recipient-name" class="col-form-label">price: </label>
            <input type="text" class="form-control" id="recipient-name" class="price" id="price"
            placeholder="Please enter price"
            name="price"
            >

            <label for="recipient-name" class="col-form-label">description: </label>
            <input type="text" class="form-control" id="recipient-name" class="description" id="description"
            placeholder="Please enter description"
            name="description"
            >

            <label for="recipient-name" class="col-form-label">create_by: </label>
            <input type="text" class="form-control" id="recipient-name" class="create_by" id="create_by"
            placeholder="Please enter create_by"
            name="create_by"
            >

            <label for="recipient-name" class="col-form-label">codeVal: </label>
            <input type="text" class="form-control" id="recipient-name" class="codeVal" id="codeVal"
            placeholder="Please enter codeVal"
            name="codeVal"
            >

            <label for="recipient-name" class="col-form-label">issueDate: </label>
            <input type="date" class="form-control" id="recipient-name" class="issueDate" id="issueDate"
            placeholder="Please enter issueDate"
            name="issueDate"
            >

            >
<br/>

<input type="submit"

            value="Save Change"
            type="button" 
            class="btn btn-primary"/>
</form>


</div>



</div>
</div>
  <div id="fade" class="black_overlay">
  </div>


  <div id="fade" class="black_overlay"></div>

<input type="button" value="New Product"  id="createProductButton"
class="btn btn-primary" data-toggle="modal"  data-target="#createProductModal"
style="margin-top:30px;margin-left:30px;"
/>
<table style="width:100%;margin-top:30px;"  id="grid" >
  <thead >
    <tr >
      <th >Product ID</th>
      <th>Product Name</th>
      <th>Price</th>
	    <th>Description</th>
      <th>Create By</th>
      <th>Code Value</th>
      <th>Issue Date</th>
      <th>Command</th>
    </tr>
  </thead>
  <?php
include('../../php/db_connect.php');
$sql = "SELECT * FROM Product";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
  ?>

  <tbody>
    <tr >
      <th style="padding-top:20px;">
      <?php echo $row["pid"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["pName"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["price"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["description"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["create_by"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["codeVal"]?>
      </th>
      <th style="padding-top:20px;">
      <?php echo $row["issueDate"]?>
      </th>


      <th style="padding-top:20px;">
      <p>
      <a href="javascript:void(0)" 
      onclick="document.getElementById('light').style.display='block';
      document.getElementById('pid').innerHTML ='<h1><input type= text value= <?php echo $row['pid']?> name= pid </h1>';
      document.getElementById('fade').style.display='block';
      ">
      Edit 
      </a>
      </p>
        
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


<!--end new project-->

        <!--Form Create project Record-->
       <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="php/insertProducts.php" method="post">
          <div class="form-group">
        
          <label for="recipient-name" class="col-form-label">Product ID:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='pid'
            >

            <label for="recipient-name" class="col-form-label">Product Name:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='pName'
          
            >

            <label for="recipient-name" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='price'
          
            >

            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='description'
          
            >


            <label for="recipient-name" class="col-form-label">Create By:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='create_by'
            
            >

            <label for="recipient-name" class="col-form-label">Code Value:</label>
            <input type="text" class="form-control" id="recipient-name" class="title" name='codeVal'
            
            >

            <label for="recipient-name" class="col-form-label">Issue Date:</label>
            <input type="date" class="form-control" id="recipient-name" class="title" name='issueDate'
            
            >

    
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input
        type="submit" 
        class="btn btn-primary"
        value="Save"
        />
        </form>
      </div>
    </div>
  </div>
</div>


<!--end new project-->






</body>
</html>



