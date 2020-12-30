<?php
include 'inc/header.php';
?>
<!-- Member Type Add -->
<?php 
								
									if(isset($_POST['save'])){
										$memtype=$_POST['memtype'];
										
										//database insert
										$sql="INSERT INTO memtype (memtype) VALUES ('$memtype')";

										$result= mysqli_query($dbc,$sql);
										if ($result){
											header('Location: membertype.php');
											echo "New member type added";
										} else{
											echo "New member cannot be added";
										}
									}
								
								?>


<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
   <h1 class="mt-4">Membership Category</h1>

   <div class="row">
    <div class="col-xl-4 col-md-4">
     <div class="card card-outline-secondary bg-white text-dark mb-4">
      <div class="card-header">
       <h6 class="mb-0">Add New Member Type</h6>
      </div>
      <div class="card-body">
       <form class="form-inline" method="POST">
        <div class="form-group ">
         <label for="memtype" class="col-xs-4 col-form-label">Member Type</label>
         <div class="col-xs-6 col-md-6">
          <input type="text" class="form-control" id="memtype" name="memtype" placeholder="Enter membership type">
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
       <h6 class="mb-0">View list of all member type</h6>
      </div>
      <div class="card-body">
       <table class="table table-bordered">
        <thead>
         <tr>
          <th>Id</th>
          <th>Membership Type</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>

         <!-- Member Type View -->
         <?php 
          $query="SELECT * FROM memtype";
          $result=mysqli_query($dbc,$query);
          while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $memtype=$row['memtype'];
         ?>

         <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $memtype; ?></td>
          <td>
           <a href=""><i class="fa fa-edit" style="color:black;"></i></a>
           <a href="membertype.php?deleteId=<?php echo $id; ?>"><i class="fa fa-trash" style="color:red;"></i></a>
          </td>
         </tr>
         <?php
        }
       
        ?>
         <!-- Member Type Delete -->
         <?php 
								
									if(isset($_GET['deleteId'])){
										$delete=$_GET['deleteId'];
										$query="DELETE FROM memtype WHERE id='$delete'";
										$result=mysqli_query($dbc,$query);
										if($result){
												header('Location:membertype.php');
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