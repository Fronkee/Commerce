<?php require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/nav.php'?>
<?php require_once APPROOT .'/resource/layout/slide.php'?>
<!-- content-area -->
<?php require_once APPROOT .'/resource/layout/cat-nav.php'?>
<!-- {{ labal }} -->
<div class="container mt-2">
      <u><a href="#" class="english ms-3"><?php  $data = explode('?',breadcrumb()[4]);echo" All " . strtoupper( $data[0]) ?></a></u>
  </div><!-- {{ labal }} -->
<?php require_once APPROOT .'/resource/layout/card.php'?>
      <div class="container">
          <!-- {{ pagination }} -->
            <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
                <?php $count = count($products);$t=0;?>
                <?php for($i=0;$i<$count ;$i+=10):$t++; ?>
                <li class="page-item bg-dark">
                    <a class="page-link rounded-0" href="<?php echo URLROOT .'category/'.breadcrumb()[4].'?start=' . $i?>" style="background-color:#2a5d84;color:#fff;">
                    <?php echo $t?>
                   </a>
                </li> 
                <?php endfor;?>     
            </ul>
            </nav><!-- {{ pagination }} -->
     </div>
<!-- content-area-end -->
<script src="<?php assets('js/cart.js')?>"></script>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
 
