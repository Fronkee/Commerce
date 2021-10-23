<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/nav.php'?>
<div class="container col-md-4 mx-auto mt-2">
  <?php singleError(['error','pass_error'])?>
</div>
 <div class="container my-5">
     <div class="col-md-5 mx-auto border rounded p-5 mt-5" style="box-shadow: 0px 1px 3px #2a5d84;">
          <p class="english fs-5 text-center" style="color: #2a5d84;">Please Login !</p>
         <form action="<?php echo URLROOT.'user/login'?>" method="POST" class="">
           <div class="form-floating mb-3">
            <input type="email" class="form-control english" name="email" id="email" placeholder="name@example.com">
            <label for="email" class="english">Email address</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control english" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword" class="english">Password</label>
            </div>
             <div class="d-flex justify-content-between mt-4">
                 <a href="<?php echo URLROOT .'user/register'?>" class=" english fs-6 text-decoration-underline">Not a user yet!please register</a>
                 <button class="btn  btn-primary english ">Login</button>
             </div>
         </form>
     </div>
 </div>
<script src="<?php assets('js/cart.js')?>"></script>
<?php require_once APPROOT .'/resource/layout/content_end.php'?>
<?php require_once APPROOT .'/resource/layout/footer.php'?>