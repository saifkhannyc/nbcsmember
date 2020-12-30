<?php
include 'inc/header.php';
?>


<div id="layoutSidenav_content">
 <main>
  <div class="container-fluid">
   <h1 class="mt-4">Active Members</h1>
   <!-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
   </ol> -->
   <?php 
    $do=isset($_GET['do']) ? $_GET['do'] : 'Manage';
    if($do=='Manage'){
     // View all Active Members
     ?>
   <div class="card mb-4">
    <div class="card-body">
     Here are the list of all active General, Advisory, Executive and Honorary members of New York City Bangladeshi
     Civil Service Society (NBCS)
    </div>
    <div class="card mb-4">
     <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      List of all active members
     </div>
     <div class="card-body">
      <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
         <tr>
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Mobile Number</th>
          <th>Agency Type</th>
          <th>Agency Name</th>
          <th>Member Type</th>
          <th>Action</th>
         </tr>
        </thead>
        <tfoot>
         <tr>
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Mobile Number</th>
          <th>Agency Type</th>
          <th>Agency Name</th>
          <th>Member Type</th>
          <th>Action</th>
         </tr>
        </tfoot>
        <tbody>
         <!-- Read all Active Members -->
         <?php 
          $query="SELECT member.id as ID, fname,lname, email, mnumber,agencytype.id as agencyId, agencytype,agency,jobtitle,registrationdate,memtype,memstatus FROM member LEFT JOIN agencytype on member.agencytypecode=agencytype.id LEFT JOIN memtype on member.memtypecode=memtype.id LEFT JOIN memstatus on member.memstatuscode=memstatus.id where member.memstatuscode='2' order by member.id";
          $result11=mysqli_query($dbc,$query);
          while($row=mysqli_fetch_assoc($result11)){
            $id=$row['ID'];
            $fname=$row['fname'];
            $lname=$row['lname'];
            $email=$row['email'];
            $mnumber=$row['mnumber'];
            $agencyId=$row['agencyId'];
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
          <td><?php if($agencyId==1){ ?>
           <span class="badge badge-danger"><?php echo $agencytype; ?></span>
           <?php }
           else if($agencyId==2){ ?>
           <span class="badge badge-primary"><?php echo $agencytype; ?></span>
           <?php }
           else if($agencyId==3){ ?>
           <span class="badge badge-warning"><?php echo $agencytype; ?></span>
           <?php } 
           else { ?>
           <span class="badge badge-dark"><?php echo $agencytype; ?></span>
           <?php } ?>
          </td>
          <td><?php echo $agency;?></td>
          <td><?php echo $memtype;?></td>
          <td>
           <a href="index.php?viewId=<?php echo $id; ?>" type="button" class="btn btn-info" data-toggle="modal"
            data-target="#myModals">View</a>
           <a href="" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#myModal<?php echo $id; ?>">Edit</a>
          </td>
          <!-- Modal Code for Edit Active Members -->
          <!-- The Modal -->
          <div class="modal" id="myModal<?php echo $id;?>">
           <div class="modal-dialog">
            <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
              <h4 class="modal-title">Edit Member</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
              <?php 
               $query1="SELECT * FROM agencytype";
               $result1=mysqli_query($dbc,$query1);
               $query2="SELECT * FROM memtype";
               $result2=mysqli_query($dbc,$query2);
               $query3="SELECT * FROM memstatus";
               $result3=mysqli_query($dbc,$query3);
               if(isset($_GET['editId'])){
                 $edit_id=$_GET['editId'];
               $search="SELECT member.id as ID, fname,lname, email, mnumber,agencytype.id as agencyId,agencytype,agency,jobtitle,registrationdate,memtype.id as memtypeId, memtype,memstatus.id as memstatusID, memstatus FROM member LEFT JOIN agencytype on member.agencytypecode=agencytype.id LEFT JOIN memtype on member.memtypecode=memtype.id LEFT JOIN memstatus on member.memstatuscode=memstatus.id where member.id='$edit_id' order by member.id";
              $result11=mysqli_query($dbc,$search);
              while($row11=mysqli_fetch_assoc($result11)){
                $id=$row11['ID'];
                $fname=$row11['fname'];
                $lname=$row11['lname'];
                $email=$row11['email'];
                $mnumber=$row11['mnumber'];
                $agencyId=$row11['agencyId'];
                $agencytype=$row11['agencytype'];
                $memtypeId=$row11['memtypeId'];
                $memtype=$row11['memtype'];
                $memstatusId=$row11['memstatusId'];
                $memstatus=$row11['$memstatus'];
                $agency=$row11['agency'];
                $jobtitle=$row['jobtitle'];
              }
            }
            
              ?>
              <form method="POST">
               <div class="form-group row">
                <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>"
                  placeholder="Enter your first name">
                </div>
               </div>
               <div class="form-group row">
                <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>"
                  placeholder=" Enter your last name">
                </div>
               </div>
               <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-9">
                 <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
                  placeholder=" Enter your email address">
                </div>
               </div>
               <div class="form-group row">
                <label for="mnumber" class="col-sm-3 col-form-label">Mobile No</label>
                <div class="col-sm-9">
                 <input type="tel" class="form-control" id="mnumber" name="mnumber" value="<?php echo $mnumber; ?>"
                  placeholder=" Enter your 10 digit valid US phone number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                  required>
                </div>
               </div>
               <div class="form-group row">
                <label for="agencytype" class="col-sm-3 col-form-label">Agency Type</label>
                <div class="col-sm-9">

                 <select class="form-control" name="agencytype">
                  <option value="<?php echo $agencyId; ?>"> <?php echo $agencytype; ?></option>
                  <?php while($row1 = mysqli_fetch_array($result1)):;?>

                  <option value="<?php echo $row1['id'];?>"><?php echo $row1['agencytype'];?></option>

                  <?php endwhile;?>

                 </select>
                </div>
               </div>
               <div class="form-group row">
                <label for="memtype" class="col-sm-3 col-form-label">Member Type</label>
                <div class="col-sm-9">

                 <select class="form-control" name="memtype">
                  <option value="<?php echo $memtypecode; ?>"><?php echo $memtype; ?></option>
                  <?php while($row2 = mysqli_fetch_array($result2)):;?>

                  <option value="<?php echo $row2['id'];?>"><?php echo $row2['memtype'];?></option>

                  <?php endwhile;?>

                 </select>
                </div>
               </div>
               <div class="form-group row">
                <label for="memstatus" class="col-sm-3 col-form-label">Member Status</label>
                <div class="col-sm-9">

                 <select class="form-control" name="memstatus">
                  <option value="<?php echo $memstatuscode;?>"><?php echo $memstatus;?></option>
                  <?php while($row3 = mysqli_fetch_array($result3)):;?>

                  <option value="<?php echo $row3['id'];?>"><?php echo $row3['memstatus'];?></option>

                  <?php endwhile;?>

                 </select>
                </div>
               </div>
               <div class="form-group row">
                <label for="agency" class="col-sm-3 col-form-label">Agency</label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" id="agency" name="agency" value="<?php echo $agency;?>"
                  placeholder="Enter your agency name">
                </div>
               </div>
               <div class="form-group row">
                <label for="jobtitle" class="col-sm-3 col-form-label">Job Title</label>
                <div class="col-sm-9">
                 <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo $jobtitle;?>"
                  placeholder="Enter your job title">
                </div>
               </div>
               <div class="modal-footer">
                <input type="submit" name="update" class="btn btn-primary" data-dismiss="modal" value="Update">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
              </form>
              <?php 
              // Update
              if(isset($_POST['update'])){
              $fname1=$_POST['fname'];
              $lname1=$_POST['lname'];
              $email1=$_POST['email'];
              $mnumber1=$_POST['mnumber'];
              $agencytype1=$_POST['agencytype'];
              $memtype1=$_POST['memtype'];
              $memstatus1=$_POST['memstatus'];
              $agency1=$_POST['agency'];
              $jobtitle1=$_POST['jobtitle'];
              echo $lname;
              $update="UPDATE member SET fname='$fname1',lname='$lname1',email='$email1',mnumber='$mnumber1',agencytypecode='$agencytype1',memtypecode='$memtype1', memstatuscode='$memstatus11',agency='$agency',jobtitle='$jobtitle1', updatedate=Now() WHERE id='$edit_id'";
              echo $update;
              // // $result12=mysqli_query($dbc,$update);
              // if($result12){
              //   header('Location: activemembers.php');
              //   echo $fname1;
              // } else {
              //   die("Update Member Error".mysqli_error($dbc));
              // }
            }

              
              
              ?>
             </div>

             <!-- Modal footer
             <div class="modal-footer">
              <input type="submit" name="update" class="btn btn-primary" data-dismiss="modal" value="Update">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div> -->

            </div>
           </div>
          </div>



         </tr>
         <?php
          }
        ?>
        </tbody>
       </table>
      </div>
     </div>
    </div>
   </div>


   <?php
    }
    else if($do=='add'){
     // Add New Members
     
    }
    else if ($do== 'view'){
     // edit active member
    }
    else if ($do=='edit') {

    }
    else if ($do=='update') {
     
    }
   
   ?>

   <?php
include 'inc/footer.php';
?>