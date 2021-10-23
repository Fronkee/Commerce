<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
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
     <div class="container overflow-hidden border my-3 p-5 rounded">
        <div class="row gy-3">
          <div class="col-5">
            <div class="p-3 border "><a href="#">Category - Create</a></div>
          </div>
          <div class="col-5">
            <div class="p-3 border "><a href="">Products - Create </a></div>
          </div>
          <div class="col-5">
            <div class="p-3 border "><a href="">All - Products </a></div>
          </div>
          <div class="col-5">
            <div class="p-3 border "><a href="">Admin - Create</a></div>
          </div>
  </div>
</div>
  </div> <!-- {{ content-area }} -->
  <?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
