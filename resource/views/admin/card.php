<?php require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/nav.php'?>

<!-- {{side-bar}} -->
 <?php require_once APPROOT . '/resource/layout/admin/sidebar.php'?>
 <style>
     .t-row,td{
         cursor: pointer;
         color:#2a5d84;
     }
     .t_row,:nth-of-type(6)>a{
        color:#2a5d84;
        text-decoration: none;
     }
     .t-row:hover>:nth-of-type(6)>a{
        color:#fff;
     }
     .t-row:hover>td{
         background-color:#959697;
         color:#fff;
     }
     .t-row:hover>th{
         background-color:#959697;
         color:#fff;
     }
 </style>
   <!-- {{content-area}} -->
     <div class="container border">
         <div class="row">
               <!-- {{ breadcrumb }} -->
          <div class="col-md-3 mt-3 me-2">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item english">
                <a href="<?php echo URLROOT .'admin/home'?>">
                <?php echo ucfirst(breadcrumb()[3])?></a></li>
                <li class="breadcrumb-item text-primary english" aria-current="page">
                  <a href="<?php echo URLROOT .'admin/product/detail'?>">
                  <?php echo ucfirst(breadcrumb()[4])?>
                   </a>    
                </li>
                <li class="breadcrumb-item active english" aria-current="page">live - views </li>
            </ol>
            </nav> 
            </div><!-- {{ breadcrumb }} --> 
             <div class="col-md-5 mt-3">
                <?php singleError(['product_delete']) ?>
             </div><!-- {{ message }} -->
             <div class="col mt-3">
                 <a href="<?php echo URLROOT .'admin/product/product/1'?>" class="d-flex float-center english">Arrange-Category-Name</a>
             </div>
         </div>
          <!-- {{card }}-->
          <div class="container mt-2 p-3 ">
  <div class="row row-cols-1 row-cols-md-5 g-4 ">
  <?php foreach($products as $data):?>
    <div class="col">
       <div class="card h-100 card-box">
       <a href="<?php echo URLROOT .'admin/product/edit/'. $data->id?>" style="text-decoration:none;">
       <img src="<?php assets('uploads/'.$data->image)?>" height="200px" class="card-img-top" alt="...">
       </a>
      <div class="card-body ">
      <a href="<?php echo URLROOT .'admin/product/edit/'. $data->id?>" style="text-decoration:none;">
        <h5 class="card-title english"><u><?php echo strtoupper($data->name)?></u></h5>
        <p class="card-text english"><?php echo substr($data->description,0,40) ?></p>
      </a>
      </div>
     
      <div class="card-footer d-flex justify-content-end" style="background-color:#2a5d84;">
      <small class="english text-white me-auto"><u><?php echo $data->price?>-KS</u></small>
      <span>
         <a href="<?php echo URLROOT .'admin/product/edit/'. $data->id?>" style="text-decoration:none;">
         <i class="bi bi-pencil-square text-white fs-5"></i>
         </a>
      </span>
      
      <span>
      <a href="<?php echo URLROOT .'admin/product/view/delete/' .$data->id?>" class="english">
         <i class="bi bi-trash text-danger fs-5"></i>
        </a>
      </span>
     
      </div>
    </div>

  </div>
  <?php endforeach;?>

  </div>
 </div>

          <!-- {{ card }} -->
            <!-- {{ pagination }} -->
            <div class="pagi">
             <nav aria-label="Page navigation example ">
             <ul class="pagination justify-content-center">
                    <?php $count = pagi('products');$t=0;?>
                    <?php for($i =0;$i<$count;$i+=10):$t++;?>         
                    <li class="page-item"><a class="page-link" href="<?php echo URLROOT .'admin/product/view?start='.$i?>"><?php echo $t?></a></li>
                    <?php endfor;?>
                </ul>
             </nav>
            </div>  <!-- {{pagination }} -->
         </div>

   

      </div> <!-- {{content-area}} -->

 <?php require_once APPROOT . '/resource/layout/admin/sidebar_end.php'?>
 <!-- {{side-bar}} -->
 <script src="<?php assets('js/product_modal.js')?>"></script>
 <?php require_once APPROOT . '/resource/layout/footer.php'?>

