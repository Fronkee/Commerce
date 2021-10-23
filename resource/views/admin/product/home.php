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
            <li class="breadcrumb-item active english" aria-current="page"><?php echo ucfirst(breadcrumb()[5])?></li>
        </ol>
        </nav>
    </div> 
    <!-- {{breadcrumb-end}} -->
       <?php if(!empty($error) > 0):?>
             <?php error_fun($error)?>
        <?php endif;?>
        <div class="col-md-5 ">
        <?php singleError(['empty','size','invalid','product_success','file'])?>
        </div>
    </div>
    <div class=" col-md-8 border p-3 form_box ms-5 my-4">
    <h3 class="english text-center" style="color:#2a5d84"><u>CREATE PRODUCTS</u></h3>
    <!-- {{product-form-start}} -->
     <form action="<?php echo URLROOT .'admin/product/create'?>" method="post" enctype="multipart/form-data"  class="my-4">
        <div class="mb-3">
            <label for="name" class="form-label english"><u>Product Name</u></label>
            <input type="text" class="form-control rounded-0 english" id="name" name="name">
            <!-- <div id="emailHelp" class="form-text english">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
         <label for="price" class="form-label english"><u>Product Price</u></label>
            <input type="text" class="form-control rounded-0 english" id="price" name="price">
        </div>
        <div class="row mb-3">
            <div class="col">
            <label for="image" class="form-label english"><u>Product Image</u></label>
            <input type="file" class="form-control rounded-0 english" id="image" name="file">
            </div>
            
            <div class="col">
            <label for="cat_id" class="form-label english"><u>Select Category ID</u></label>
            <select class="form-select rounded-0 english" id="cat_id" name="cat_id">
                <?php foreach($cats as $cat):?>
                    <option selected value="<?php echo $cat->id?>" class="english">
                        <u><?php echo $cat->name?></u>
                    </option>
                <?php endforeach;?>
           </select>
            </div>
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label english"><u>Product Description</u></label>
        <textarea class="form-control english rounded-0" id="desc" rows="3" name="description"></textarea>
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