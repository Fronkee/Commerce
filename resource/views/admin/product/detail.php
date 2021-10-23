<?php require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>

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
                <li class="breadcrumb-item text-primary english" aria-current="page"><?php echo ucfirst(breadcrumb()[4])?></li>
                <li class="breadcrumb-item active english" aria-current="page">
                    <?php $data = explode('?',breadcrumb()[5]);echo $data[0]?>
                </li>
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
         <div class="mt-1">
          <table class="table table-hover">
            <thead style="background-color:#2a5d84;color:#fff;">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Created-Time</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php $i= 0;?>
            <?php while($i < count($products)):?>
                   <?php foreach($products as $product):?>
                    <tr class="t-row">
                    <th zscope="row"><?php echo ++$i?></th>                
                    <td class="english"><?php echo ucfirst($product->name) ?></td>
                    <td class="english"><?php echo $product->price?>MMK</td>
                   
                     <td class="english">
                         <img src=" <?php assets('uploads/'.$product->image)?>" 
                         alt="image" class="rounded-0" width="70px" height="50px" style="box-shadow: 0px 2px 5px #3e3e3e;">
                    </td> 
                    <td class="english">
                        <?php echo substr($product->description,0,20)?>...</td>
                    <td class="english"><?php echo $product->created_at ?></td>
                    <td class="english">
                     <a href="<?php echo URLROOT .'admin/product/edit/' .$product->id?>" class="english" >Edit |</a>
                     <a href="<?php echo URLROOT .'admin/product/delete/' .$product->id?>" class="english">Delete |</a>
                     <a href="<?php echo URLROOT .'admin/product/view'?>" class="english">View</a>
                    </td>
                    </tr>
                    <?php endforeach;?>
            <?php endwhile;?>
            </tbody>
            </table><!-- {{ table-end}} -->
            <!-- {{ pagination }} -->
            <div class="pagi">
             <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center">
                    <?php $count = pagi('products');$t=0;?>
                    <?php for($i =0;$i<$count;$i+=7):$t++;?>         
                    <li class="page-item"><a class="page-link" href="<?php echo URLROOT .'admin/product/detail?start='.$i?>"><?php echo $t?></a></li>
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

