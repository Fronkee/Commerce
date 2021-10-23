<?php

use App\Classes\CSRFToken;
use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
<!-- {{side-bar}} -->
<?php require_once APPROOT .'/resource/layout/admin/sidebar.php'?>

<div class="container-fluid border">
    <div class="row">
    <div class="col-md-3 p-2 ">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item english">
             <a href="<?php echo URLROOT .'admin/home'?>">
             <?php echo ucfirst(breadcrumb()[3])?></a></li>
            <li class="breadcrumb-item text-primary english" aria-current="page"><?php echo ucfirst(breadcrumb()[4])?></li>
        </ol>
        </nav>
    </div> 
    <!-- {{breadcrumb-end}} -->
       <?php if(!empty($error) > 0):?>
             <?php error_fun($error)?>
        <?php endif;?>
        <div class="col-md-5 ">
        <?php singleError(['error','authen','success'])?>
        </div>
    </div>
    <div class=" col-md-8 border p-3 form_box ms-5 my-4">
    <h3 class="english text-center" style="color:#2a5d84"><u>CREATE ADMIN-USERS</u></h3>
    <!-- {{product-form-start}} -->
     <form action="<?php echo URLROOT .'admin/create-admin'?>" method="post" enctype="multipart/form-data"  class="my-4">
        <div class="mb-3">
            <label for="name" class="form-label english"><u>Admin Name</u></label>
            <input type="text" class="form-control rounded-0 english" id="name" name="name" placeholder="Name must be 6 Characters">
        </div>
        <div class="mb-3">
         <label for="email" class="form-label english"><u>Admin Email</u></label>
            <input type="email" class="form-control rounded-0 english" id="eamil" name="email">
        </div>
        <div class="mb-3">
            <label for="num" class="form-label english"><u>Phome Number</u></label>
            <input type="text" class="form-control rounded-0 english" id="num" name="num" placeholder="+959" required>
        </div>
         <div class="row">
           <div class="col mb-3">
                <label for="pass" class="form-label english"><u>Password</u></label>
                <input type="password" name="password"  class="form-control rounded-0 english" id="pass" placeholder="Password must be 5 Characters">
           </div>

           <div class="col mb-3">
                <label for="con_pass" class="form-label english"><u>Confirm Password</u></label>
                <input type="password" name="con_pass"  class="form-control rounded-0 english" id="con_pass">
           </div>
         </div>


        <div class="d-flex justify-content-end">
        <button type="submit" class="btn  english text-white">Submit</button>
        </div>
    </form>
<!-- {{product-form-end}} -->
    </div>
<?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<!-- {{side-bar}} -->
<?php require_once APPROOT .'/resource/layout/footer.php'?>