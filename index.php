<?php 
include 'config/config.php'; 
ob_start();
// Populate agency type data in SELECT
include 'config/config.php';
        $query1="SELECT * FROM agencytype";
        $result1=mysqli_query($dbc,$query1);

// function to verify phone number in USA Format
function validate_phone_number($phone)
{
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
}


// Registration Form 

	if(isset($_POST['submitted'])){				
		$errors = array();									
		
		if(empty($_POST['fname'])){		
			$errors[] = 'Please enter your first name';
		} else {
			$fname = trim($_POST['fname']);	
		}
		
		if(empty($_POST['lname'])){			
			$errors[] = 'Please enter your last name';
		} else {
			$lname = trim($_POST['lname']);	
		}
																
		if(empty($_POST['email'])){									
			$errors[] = 'Please enter your email address';			
		} else {
			$email= trim($_POST['email']);								
		}

		if(empty($_POST['mnumber']) || validate_phone_number($_POST['mnumber']) == false){									
			$errors[] = 'Please enter a valid mobile number';			
		} else {
			$mnumber = trim($_POST['mnumber']);								
		}
  
    if(empty($_POST['agencytype'])){									
			$errors[] = 'Please select agency type';			
		} else {
			$agencytype = trim($_POST['agencytype']);								
    }
    
    if(empty($_POST['agency'])){									
			$errors[] = 'Please enter your agency name';			
		} else {
			$agency = trim($_POST['agency']);								
    }
    
    if(empty($_POST['jobtitle'])){									
			$errors[] = 'Please enter your job title';			
		} else {
			$jobtitle = trim($_POST['jobtitle']);								
		}

		if(empty($errors)){		
     include 'config/config.php';										
			$insert = "INSERT INTO member (fname, lname, email, mnumber, agencytypecode, agency, jobtitle, memtypecode,memstatuscode, registrationdate, updatedate)
						VALUES ('$fname','$lname','$email','$mnumber','$agencytype','$agency','$jobtitle','1','1',Now(),Now())";		
			$result = mysqli_query($dbc, $insert);	
			if($result) {				
				include('include/header.php');	
                        $regis= "Thank you for your interest in New York City Bangladeshi Civil Service Society(NBCS). Your membership application is under review and we shall get in touch soon";					
				echo '<p class="reg">' . $regis . '</p>';
				include('include/footer.php');		
			} else {
        include('include/header.php');
        echo '<p>Oops. Your membership application was not received.</p>';
        include('include/footer.php');
			}
			mysqli_close($dbc);
			exit();
		}
	}	
include 'include/header.php';
?>


<!-- Registration Form section code stats from here -->
<section class="register">
 <div class="container">
  <div class=" row justify-content-center">
   <div class="col-md-6 col-sm-6">
    <div class="card card-outline-secondary">
     <div class="card-header">
      <h2 class="mb-0">Membership Enrollment Form</h2>
      <p>To apply for membership please complete all questions.</p>
     </div>
     <div class="card-body">
      <?php 
	      if(!empty($errors)){
	      include('include/header.php');
		      foreach($errors as $error){	
                        echo'<div class="alert alert-danger" role="alert">';
                              echo $error;
                        echo'</div>'; 				
				//     echo '<p class="error">' . $error . '</p>';
		      }
	      include('include/footer.php');
	      }
      ?>
      <form action="index.php" method="POST">
       <div class="form-group row">
        <label for="fname" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
         <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" <?php if(isset($_POST['fname'])) {  
			            echo 'value="' . $_POST['fname'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group row">
        <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
         <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" <?php if(isset($_POST['lname'])) {  
			            echo 'value="' . $_POST['lname'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label">Email Address</label>
        <div class="col-sm-9">
         <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" <?php if(isset($_POST['email'])) {  
			            echo 'value="' . $_POST['email'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group row">
        <label for="mnumber" class="col-sm-3 col-form-label">Mobile No</label>
        <div class="col-sm-9">
         <input type="tel" class="form-control" id="mnumber" name="mnumber"
          placeholder="Enter your 10 digit valid US phone number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required <?php if(isset($_POST['mnumber'])) {  
			            echo 'value="' . $_POST['mnumber'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group row">
        <label for="agencytype" class="col-sm-3 col-form-label">Agency Type</label>
        <div class="col-sm-9">

         <select class="form-control" name="agencytype">
          <option value="" disabled selected>Choose agency type</option>
          <?php while($row1 = mysqli_fetch_array($result1)):;?>

          <option value="<?php echo $row1['id'];?>"><?php echo $row1['agencytype'];?></option>

          <?php endwhile;?>
          <?php if(isset($_POST['agencytype'])) {  
			            echo 'value="' . $_POST['agencytype'] . '" ';	
              } ?>
         </select>
        </div>
       </div>
       <div class="form-group row">
        <label for="agency" class="col-sm-3 col-form-label">Agency</label>
        <div class="col-sm-9">
         <input type="text" class="form-control" id="agency" name="agency" placeholder="Enter your agency name" <?php if(isset($_POST['agency'])) {  
			            echo 'value="' . $_POST['agency'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group row">
        <label for="jobtitle" class="col-sm-3 col-form-label">Job Title</label>
        <div class="col-sm-9">
         <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Enter your job title" <?php if(isset($_POST['jobtitle'])) {  
			            echo 'value="' . $_POST['jobtitle'] . '" ';	
              } ?>>
        </div>
       </div>
       <div class="form-group">
        <div class="col-sm-12 text-center">
         <div class="submit">
          <input type="submit" name="submit" id="apply" class="btn btn-primary" value="Apply for Membership">
         </div>
        </div>
       </div>
       <input type="hidden" name="submitted" value="1">
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
</section>
<!-- Registration form section code ends here -->
<?php 
ob_end_flush();
include 'include/footer.php';

?>