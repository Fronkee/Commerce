<?php require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>

<!-- {{side-bar}} -->
 <?php require_once APPROOT . '/resource/layout/admin/sidebar.php'?>

   <!-- {{content-area}} -->
     <div class="container-fluid border">
      <div class="row">
                  <!-- {{ breadcrumb }} -->
         <div class="col-md-3 mt-3 me-2 mb-4">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item english">
                <a href="<?php echo URLROOT .'admin/home'?>">
                <?php echo ucfirst(breadcrumb()[3])?></a></li>
                <li class="breadcrumb-item text-primary english" aria-current="page">
                <a href="<?php echo URLROOT .'admin/product/detail'?>">
                <?php echo ucfirst(breadcrumb()[4])?></a></li>
                <li class="breadcrumb-item active english" aria-current="page"><?php echo ucfirst(breadcrumb()[5])?></li>
            </ol>
            </nav>  
          </div><!-- {{ breadcrumb }} -->
          <div class="col-md-5 mt-3 ">
                <?php singleError(['error','success','size','valid']) ?>
          </div><!-- {{ message }} -->
      </div>
      <div class="col-md-7 border p-3 form_box offset-md-2 rounded-0 mb-3 ">
          <h3 class="english text-center">CHANGE  - PRODUCT -</h3>
        <form action="<?php echo URLROOT .'admin/product/update'?>" class="my-3 mt-2" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="name" class="form-label english">Product Name </label>
            <input type="text" class="form-control rounded-0 english" id="name" name="name" value="<?php echo ucfirst( $product->name )?>">
            </div>
            <div class="mb-3">
            <label for="price" class="form-label english">Product Price </label>
            <input type="text" class="form-control rounded-0 english" id="price" name="price" value="<?php echo  $product->price ?>">
            <input type="hidden" class="form-control rounded-0 english"  name="id" value="<?php echo  $product->id ?>">

            </div>
            <div class="mb-3 ">
            <label for="img" class="form-label english">Original Image </label><br>
            <input type="hidden" name="img"  value="<?php echo $product->image?>">
            <img src="<?php assets('uploads/'.$product->image)?>" alt=""  width="100px"  height="100px" class="rounded img_box">
            </div>

            <div class="mb-3">
            <label for="c_img" class="form-label english">Change Image </label>
            <input type="file" class="form-control english rounded-0" alt="" value="" id="c_img" name="file">
            </div>
              
            
            <div class="col-md-4 mb-3">
            <label for="cat" class="form-label english">Category Name | ID </label>
            <input type="text" class="form-control english rounded-0" alt=""  id="cat" name="cat" value="<?php echo ucfirst($cat_name->name) ." | " . $product->cat_id ?>" readonly>
            <input type="hidden" class="form-control english rounded-0" alt=""  id="cat" name="cat_id" value="<?php echo  $product->cat_id ?>" readonly>

            </div>

            <div class="mb-3">
            <label for="desc" class="form-label english">Product Description </label>
            <textarea class="form-control english rounded-0" id="des" rows="3" name="description">
            <?php echo $product->description?>
           </textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn english text-white">UPDATE</button>
            </div>
        </form>
        </div>

</div>
      </div> <!-- {{content-area}} -->

 <?php require_once APPROOT . '/resource/layout/admin/sidebar_end.php'?>
 <!-- {{side-bar}} -->
 <script src="<?php assets('js/product_modal.js')?>"></script>
 <?php require_once APPROOT . '/resource/layout/footer.php'?>

