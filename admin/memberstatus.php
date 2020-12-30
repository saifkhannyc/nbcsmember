<?php
include 'inc/header.php';
?>
<!-- Member Status Add -->
<?php 
								
									if(isset($_POST['save'])){
										$memstatus=$_POST['memstatus'];
										
										//database insert
										$sql="INSERT INTO memstatus(memstatus) VALUES ('$memstatus')";

										$result= mysqli_query($dbc,$sql);
										if ($result){
											header('Location:memberstatus.php');
											echo "New membership status is added";
										} else{
											echo "New membership status cannot be added";
										}
									}
								
?>




<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
   <h1 class="mt-4">Membership Status</h1>

   <div class="row">
    <div class="col-xl-6 col-md-6">
     <div class="card card-outline-secondary bg-white text-dark mb-4">
      <div class="card-header">
       <h6 class="mb-0">Add New Membership Status</h6>
      </div>
      <div class="card-body">
       <form class="form-inline" method="POST">
        <div class="form-group ">
         <label for="memstatus" class="col-xs-4 col-form-label">Membership Status</label>
         <div class="col-xs-6 col-md-6">
          <input type="text" class="form-control" id="memstatus" name="memstatus" placeholder="Enter member status">
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
       <h6 class="mb-0">View list of all membership status</h6>
      </div>
      <div class="card-body">
       <table class="table table-bordered">
        <thead>
         <tr>
          <th>Id</th>
          <th>Membership Status</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <!-- Member Status View   -->
         <?php 
          $query="SELECT * FROM memstatus order by id asc";
          $result=mysqli_query($dbc,$query);
          while($row=mysqli_fetch_assoc($result)){
          $id=$row['id'];
          $memstatus=$row['memstatus'];
         ?>
         <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $memstatus;?></td>
          <td>
           <a href=""><i class="fa fa-edit" style="color:black;"></i></a>
           <a href="memberstatus.php?deleteId=<?php echo $id; ?>"><i class="fa fa-trash" style="color:red;"></i></a>
          </td>
         </tr>
         <?php
        }
       
       ?>
         <!-- Member Status Delete -->
         <?php 
								
									if(isset($_GET['deleteId'])){
										$delete=$_GET['deleteId'];
										$query="DELETE FROM memstatus WHERE id='$delete'";
										$result=mysqli_query($dbc,$query);
										if($result){
												header('Location:memberstatus.php');
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