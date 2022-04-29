<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
<style>
  .dash{
    box-shadow: 0px 2px 5px #3e3e3e;
  }
</style>
<?php require_once APPROOT .'/resource/layout/admin/sidebar.php'?>
 
  <div class="container-fluid english text-center text-info border ">
      <div class="row">
               <!-- {{ breadcrumb }} -->
          <div class="col-md-3 mt-3 me-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item english">
                <a href="<?php echo URLROOT .'admin/home'?>">
                <?php echo ucfirst(breadcrumb()[3])?></a></li>
                <li class="breadcrumb-item text-primary english" aria-current="page"><?php echo ucfirst(breadcrumb()[4])?></li>
            </ol>
            </nav> 
             </div><!-- {{ breadcrumb }} --> 
       <?php if(Session::has('name')):?>     
        <div class="col-md-6 alert alert-success alert-dismissible fade show mt-3" role="alert">
          <strong> Welcome Back <?php Session::flashMsg('name')?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
       <?php endif;?> <!-- {{ msg }} -->
     </div>
     <div class="container overflow-hidden border my-3 p-5 rounded" style="box-shadow: 0px 2px 5px #3e3e3e;">
        <div class="row gy-3">
          <div class="col-5 mx-auto">
            <div class="p-3 border dash ">
            <span class="text-start"><i class="bi bi-nut me-5 fs-5"></i></span>  
            <a href="<?php echo URLROOT.'admin/category'?>">Category - Create</a>
          </div>
          </div>
          <div class="col-5 mx-auto">
            <div class="p-3 border dash">
              <span><i class="bi bi-nut me-5 fs-5"></i></span>
              <a href="<?php echo URLROOT. 'admin/product/create'?>">Products - Create </a>
            </div>
          </div>
          <div class="col-5 mx-auto">
            <div class="p-3 border dash">
            <span><i class="bi bi-nut me-5 fs-5"></i></span>  
            <a href="<?php echo URLROOT. 'admin/product/detail'?>">All - Products </a></div>
          </div>
          <div class="col-5 mx-auto">
            <div class="p-3 border dash">
            <span><i class="bi bi-nut me-5 fs-5"></i></span>  
            <a href="<?php echo URLROOT. 'admin/create-admin'?>">Admin - Create</a></div>
          </div>
          <div class="col-5 mx-auto">
            <div class="p-3 border dash">
            <span><i class="bi bi-nut me-5 fs-5"></i></span>  
            <a href="<?php echo URLROOT. 'admin/orders'?>">Client Orders</a></div>
          </div>
          <div class="col-5 mx-auto">
            <div class="p-3 border dash">
            <span><i class="bi bi-nut me-5 fs-5"></i></span>  
            <a href="<?php echo URLROOT. 'admin/message'?>">Client Message</a></div>
          </div>
  </div>
</div>
  </div> <!-- {{ content-area }} -->
  <?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
