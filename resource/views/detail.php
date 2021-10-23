<?php

use App\Classes\Session;

require_once APPROOT . '/resource/layout/header.php'?>
<?php require_once APPROOT . '/resource/layout/nav.php'?>

 <div class="container my-4 border detail-body p-3">
    <div class="row  gx-0 p-3 rounded">
         <div class="col card h-100">
             <img src="<?php assets('uploads/' .$product->image)?>" alt="" style="height:320px;box-shadow: 0px 2px 5px #3e3e3e;" class="rounded">
         </div>
         <div class="col-md-7 ">
           <div class="mt-3">
                <h4 class="english text-center text-muted"><u>Products - Detials -</u></h4>
               <p class="english ms-4 text-muted">- Brand Name -<br> <span class="text-danger ms-4"><u><cite title="product name"><?php echo $product->name?></cite></u></span></p>
               <p class="english ms-4 text-muted">- Price - <br><span class="text-danger ms-4"><cite title="product price"><u><?php echo $product->price?></cite> KS</u></span></p>
               <hr class="ms-4">
               <p class=" ms-4 english text-muted">- Description - <p class="ms-5 text-break english text-muted"><cite title="prodcut state"><?php echo $product->description?></cite></p></p>
           </div>  
           <div class="rate ms-4 mt-2">
             <p class="english text-muted">Rating : 
             <span>
             <i class="bi bi-star-fill text-warning"></i>
             <i class="bi bi-star-fill text-warning"></i>
             <i class="bi bi-star-fill text-warning"></i>
             <i class="bi bi-star-half text-warning"></i>
             </span>
             </p>
             
          </div>
           <hr class="ms-4">
           <div class="d-flex justify-content-center mt-4 detail-button">
                <?php if(Session::has('email')):?>
                   <cite title="buy item"><button class="btn btn-primary text-white english rounded-0 ">Buy Now</button>
                     </cite>
                <?php else:?>
                    <cite title="please-login"> <button class="btn btn-primary text-white english rounded-0 disabled ">Buy Now</button></cite>
                <?php endif;?>  
                <cite title="add item">
                <button class="btn btn-warning text-white english rounded-0 " onclick="addToCart('<?php echo $product->id?>')">Add to Cart</button>
                </cite>      
          </div>
         </div>
    </div>
     
 </div>
 <!-- {{ card }} -->
    <div class="container english">- RELATED - SHOW - ITEMS -</div>
   <?php require_once APPROOT . '/resource/layout/card.php'?>   
   <div class="container">
          <!-- {{ pagination }} -->
            <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
                <?php $count = count($products);$t=0;?>
                <?php for($i=0;$i<$count;$i+=5):$t++; ?>
                <li class="page-item bg-dark">
                    <a class="page-link rounded-0" href="<?php echo URLROOT .'product/detail/'.$product->id.'?start=' . $i?>" style="background-color:#2a5d84;color:#fff;">
                    <?php echo $t?>
                   </a>
                </li> 
                <?php endfor;?>     
            </ul>
            </nav><!-- {{ pagination }} -->
     </div>
<!-- {{ card }} -->
 <script src="<?php assets('js/cart.js')?>"></script>
 <?php require_once APPROOT . '/resource/layout/content_end.php'?>
<?php require_once APPROOT . '/resource/layout/footer.php'?>