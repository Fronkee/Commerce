<?php require_once APPROOT .'/resource/layout/header.php'?>
<link rel="stylesheet" href="<?php assets('css/admin-login.css')?>">

<!-- {{admin-login}} -->

  <div class="container p-5 mt-5">
       <div class="col-md-5 mx-auto">
       <?php singleError(['password','email_err'])?>
       </div>
      <div class="col-md-5 ms-auto me-auto ad-login rounded">       
      <form action="" method="post" class="border p-4 rounded">
      <h3 class="english text-center">Admin Login</h3>
  <div class="mb-3 my-5">
    <label for="email" class="form-label english">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" require>
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label english">Password</label>
    <input type="password" class="form-control" id="pass" name="password" require>
  </div>
  <div class="mb-3 form-check d-flex justify-content-between mt-1">
      <div class="">
        <input type="checkbox" class="form-check-input " id="check">
        <label class="form-check-label english" for="check">ForgetPassword</label>
      </div>
    
    <button type="submit" class="btn english">Login</button>
  </div>
  
</form>
      </div>
  </div>
<!-- {{admin-login-form}} -->
<?php require_once APPROOT .'/resource/layout/footer.php'?>