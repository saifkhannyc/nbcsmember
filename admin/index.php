<?php
include 'inc/header.php';
?>


<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
   <h1 class="mt-4">New Membership Application</h1>

   <div class="row">

    <div class="col-xl-12 col-md-12">
     <div class="card card-outline-secondary  bg-white text-dark mb-4">
      <div class="card-header">
       <h6 class="mb-0">Membership Enrollment Pending Approval</h6>
      </div>
      <div class="card-body">
       <table class="table  table-responsive table-bordered">
        <thead>
         <tr>
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Mobile No</th>
          <th>Agency Type</th>
          <th>Agency Name</th>
          <th>Job Title</th>
          <th>Registration Date</th>
          <th>Member Type</th>
          <th>Member Status</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <?php 
        $query="SELECT member.id as ID, fname,lname, email, mnumber,agencytype,agency,jobtitle,registrationdate,memtype,memstatus FROM member LEFT JOIN agencytype on member.agencytypecode=agencytype.id LEFT JOIN memtype on member.memtypecode=memtype.id LEFT JOIN memstatus on member.memstatuscode=memstatus.id where member.memstatuscode='1' order by member.id";
        $result=mysqli_query($dbc,$query);
        while($row=mysqli_fetch_assoc($result)){
         $id=$row['ID'];
         $fname=$row['fname'];
         $lname=$row['lname'];
         $email=$row['email'];
         $mnumber=$row['mnumber'];
         $agencytype=$row['agencytype'];
         $agency=$row['agency'];
         $jobtitle=$row['jobtitle'];
         $registrationdate=$row['registrationdate'];
         $memtype=$row['memtype'];
         $memstatus=$row['memstatus'];
         ?>
         <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $fname;?></td>
          <td><?php echo $lname;?></td>
          <td><?php echo $email;?></td>
          <td><?php echo $mnumber;?></td>
          <td><?php echo $agencytype;?></td>
          <td><?php echo $agency;?></td>
          <td><?php echo $jobtitle;?></td>
          <td><?php echo $registrationdate;?></td>
          <td><?php echo $memtype;?></td>
          <td><?php echo $memstatus;?></td>
          <td>
           <a href="index.php?approveId=<?php echo $id; ?>" data-toggle="tooltip" title="Approve"><i
             class="fa fa-thumbs-up" style="color:black;"></i></a>
           <a href="index.php?rejectId=<?php echo $id; ?>" data-toggle="tooltip" title="Reject"><i
             class="fa fa-thumbs-down" style="color:red;"></i></a>
          </td>
         </tr>
         <?php
        }
       
       ?>
         <!-- Member Enrollment Approval Code -->
         <?php 
        if(isset($_GET['approveId'])){
          $approveId=$_GET['approveId'];
          $query="UPDATE member SET memstatuscode=2 where id='$approveId'";
        $result=mysqli_query($dbc,$query);
        if ($result){
											header('Location:index.php');
											echo "Member has been approved";
										} else{
											echo "Member was not approved";
										}
        }
        
        ?>
         <!-- Member Enrollment Rejection Code -->
         <?php 
        if(isset($_GET['rejectId'])){
          $rejectId=$_GET['rejectId'];
          $query="UPDATE member SET memstatuscode=5 where id='$rejectId'";
        $result=mysqli_query($dbc,$query);
        if ($result){
											header('Location:index.php');
											echo "Member has been rejected";
										} else{
											echo "Member was not rejectedd";
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