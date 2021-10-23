<?php require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/nav.php'?>
<?php require_once APPROOT .'/resource/layout/slide.php'?>
<!-- content-area -->
<?php require_once APPROOT .'/resource/layout/cat-nav.php'?>
 <div class="container ms-3 mt-3">
    <a href="<?php echo URLROOT?>">-<u class="english">ALL PRODUCTS</u>-</a>
 </div>
<?php require_once APPROOT .'/resource/layout/card.php'?>

      <div class="container ">
          <!-- {{ pagination }} -->
            <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center ">
                <?php $count = pagi('products');$t=0;?>
                <?php for($i=0;$i<$count ;$i+=10):$t++; ?>
                <li class="page-item ">
                    <a class="page-link rounded-0" href="<?php echo URLROOT .'?start=' . $i?>" style="background-color:#2a5d84;color:#fff;">
                    <?php echo $t?>
                   </a>
                </li> 
                <?php endfor;?>     
            </ul>
            </nav><!-- {{ pagination }} -->
     </div>
</div>
  <div class="container mt-3 p-4">
 
  </div>
<!-- content-area-end -->
<?php require_once APPROOT .'/resource/layout/content_end.php'?>
<script src="<?php assets('js/cart.js')?>"></script>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
 
