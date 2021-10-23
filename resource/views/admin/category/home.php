<?php

use App\Classes\CSRFToken;
use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
<!-- {{side-bar}} -->
<?php require_once APPROOT .'/resource/layout/admin/sidebar.php'?>
  <!-- content -->
    <div class="container-fluid content border ">
    <div class="p-2">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item english">
              <a href="<?php echo URLROOT .'admin/home'?>"><?php echo ucfirst(breadcrumb()[3])?></a>
            </li>
            <li class="breadcrumb-item active english" aria-current="page">
              <?php $data = explode('?',breadcrumb()[4]);echo ucfirst($data[0])?>
            
            </li>
        </ol>
        </nav>
    </div>
       <?php if(Session::has('success')):?>
          <div class="container col-md-5 rounded-0 mt-2">
            <?php Session::flash('success')?>
          </div>
        <?php endif;?>
        <?php if(Session::has('delete')):?>
          <div class="container col-md-5 rounded-0 mt-2">
            <?php Session::flash('delete')?>
          </div>
        <?php endif;?>
        <?php if(!empty($error)):?>
           <?php error_fun($error);?>
        <?php endif;?>
         
        
      <div class="d-flex mt-3 category border mb-5">
        <div class="col-md-4 ms-3 p-5 ">
           <h3 class="english" style="color:#2a5d84;"><u>Create Categories</u></h3>
           <form action="<?php echo URLROOT .'admin/category/create'?>" method="post" class="my-5" enctype="multipart/form-data">
             <div class="mb-3">
             <label for="name" class="form-label english" style="color:#2a5d84;"><u>Category Name</u></label>
              <input type="text" class="form-control rounded-0 english input"  id="name" name="name">
              <div class="mb-3">             
              </div>
              </div>  
            
            <div class="float-end">
            <button type="submit" class="btn english text-white" style="background-color:#2a5d84;">Create</button>
            </div>
        </form>
      </div>
      <!-- create-end -->
       <!-- show-item -->
       <div class=" container-fluid my-5 ">
         <h3 class="english text-center" style="color:#2a5d84;"><u>Current Category</u></h3>  
         <div class="mt-5">
          <div class="row g-2 ">
        <?php foreach($category as $cat):?>
          <div class="col-6">
           <div class="p-3 border bg-light">
            <span class="english catname" style="color:#2a5d84;"><?php echo ucfirst($cat->name)?></span>
            <div class="d-felx float-end">
               <a  class="english me-1" onclick="showModal('<?php echo ucfirst($cat->name)?>','<?php echo ucfirst($cat->id)?>')" id="point">Edit</button>
              <a href="<?php echo URLROOT .'admin/category/delete/'.$cat->id?>" class="english">Delete</a>
            </div>
           </div>
          </div>
    <?php endforeach;?>
          </div>
         </div>
            <!-- {{ pagination }} -->
            <div class="pagi mt-2">
             <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center">
                    <?php $count = pagi('category');$t=0;?>
                    <?php for($i =0;$i<$count;$i+=6):$t++;?>         
                    <li class="page-item"><a class="page-link" href="<?php echo URLROOT .'admin/category?start='.$i?>"><?php echo $t?></a></li>
                    <?php endfor;?>
                </ul>
             </nav>
            </div>  <!-- {{pagination }} -->
       </div>
       </div>
       <!-- show-item-end -->
       </div>
       </div>  
    </div>
  <!-- content -->
<?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<!-- {{side-bar}} -->

<script type="text/javascript"  src="<?php assets('js/cat_modal.js')?>"></script>
<?php require_once APPROOT .'/resource/layout/footer.php'?>


