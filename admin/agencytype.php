<?php
include 'inc/header.php';
?>
<!-- Agency Type Add Code -->
<?php 
								
									if(isset($_POST['save'])){
										$agencytype=$_POST['agencytype'];
										
										//database insert
										$sql="INSERT INTO agencytype(agencytype) VALUES ('$agencytype')";

										$result= mysqli_query($dbc,$sql);
										if ($result){
											header('Location: agencytype.php');
											echo "New agency type is added";
										} else{
											echo "New agency type cannot be added";
										}
									}
								
								?>

<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
   <h1 class="mt-4">Agency Type</h1>

   <div class="row">
    <div class="col-xl-4 col-md-4">
     <div class="card card-outline-secondary bg-white text-dark mb-4">
      <div class="card-header">
       <h6 class="mb-0">Add New Agency Type</h6>
      </div>
      <div class="card-body">
       <form class="form-inline" method="POST">
        <div class="form-group ">
         <label for="agencytype" class="col-xs-4 col-form-label">Agency Type</label>
         <div class="col-xs-6 col-md-6">
          <input type="text" class="form-control" id="agencytype" name="agencytype" placeholder="Enter agency type">
         </div>
        </div>
        <div class="form-group">
         <div class="col-xs-2 col-md-1 text-right">
          <button type="submit" name="save" class="btn btn-primary">Save</button>
         </div>
        </div>
      </div>
      </form>
     </div>
    </div>
    <div class="col-xl-12 col-md-12">
     <div class="card card-outline-secondary  bg-white text-dark mb-4">
      <div class="card-header">
       <h6 class="mb-0">View list of all agency type</h6>
      </div>
      <div class="card-body">
       <table class="table table-bordered">
        <thead>
         <tr>
          <th>Id</th>
          <th>Agency Type</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <!-- Agency Type View Code -->
         <?php 
            $query="SELECT * FROM agencytype";
            $result=mysqli_query($dbc,$query);
            while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $agencytype=$row['agencytype'];
         ?>

         <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $agencytype;?></td>
          <td>
           <a href=""><i class="fa fa-edit" style="color:black;"></i></a>
           <a href="agencytype.php?deleteId=<?php echo $id; ?>"><i class="fa fa-trash" style="color:red;"></i></a>
          </td>
         </tr>
         <?php
        }
       
       ?>
         <!-- Agency Type Delete Code -->
         <?php 
								
									if(isset($_GET['deleteId'])){
										$delete=$_GET['deleteId'];
										$query="DELETE FROM agencytype WHERE id='$delete'";
										$result=mysqli_query($dbc,$query);
										if($result){
												header('Location:agencytype.php');
										} else{
											echo "delete item error";
										}

									}
								
								?>


        </tbody>
       </table>
      </div>
     </div>
    </div>

   </div>

  </div>
</div>
</div>
</div>
</main>
<?php
include 'inc/footer.php';
?>