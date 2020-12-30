<?php 
include 'include/header.php';
?>

<!-- Registration Form section code stats from here -->
<section class="register">
 <div class="container">
  <div class=" row justify-content-center">
   <div class="col-md-6 col-sm-6">
    <div class="card card-outline-secondary">
     <div class="card-header">
      <h2 class="mb-0">NBCS Member System Admin</h2>
      <p>Login to Admin Portal</p>
     </div>
     <div class="card-body">
      <form action="http://localhost:8080/nbcsmember/admin">
       <div class="form-group row">
        <label for="uname" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
         <input type="text" class="form-control" id="uname" name="unamee" placeholder="Enter your email">
        </div>
       </div>
       <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
         <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
        </div>
       </div>
       <div class="form-group">
        <div class="col-sm-12 text-center">
         <div class="submit">
          <button type="submit" id="apply" class="btn btn-primary">Login</button>
         </div>
        </div>
       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>
</section>
<!-- Registration form section code ends here -->
<?php 
include 'include/footer.php';
?>