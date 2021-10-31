<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/nav.php'?>
   <?php if(Session::has('msg_suc')):?>
      <div class="col-md-4 mt-2 mx-auto alert alert-success alert-dismissible fade show rounded-0" role="alert">
      <strong class=" fs-5" style="color:#2a5d84"><?php Session::flashMsg('msg_suc')?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <?php endif;?>
   <div class="container mt-4 p-3 content mx-auto" style="box-shadow: 1px 3px 7px #2a5d84;">
     <p class="english fs-3 text-center" style="font-family: 'Courier New', Courier, monospace;color:#2a5d84;"><u>Content Our Teams</u></p>
     <div class="row gx-0 mx-auto">
     <div class="col google-map">
        <iframe class="rounded" width="500" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp=16.859977886864343~96.24094&lvl=16&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
        </iframe>
        <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
           <button class="btn btn-primary text-primary">  
            <a class="text-white" id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=16.859261206886245~96.24053599126341&amp;sty=r&amp;lvl=14.391238677576853&amp;FORM=MBEDLD">View Larger Map</a>
           </button>
            <button class="btn btn-primary text-primary">     
            <a class="text-white" id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=16.859261206886245~96.24053599126341&amp;sty=r&amp;lvl=14.391238677576853&amp;rtp=~pos.16.859261206886245_96.24053599126341____&amp;FORM=MBEDLD">Get Directions</a>
            </button>  
            </div>
    </div>
    <div class="col">
    <form action="<?php echo URLROOT.'content'?>" method="post" class="p-1">
    <div class="mb-3">
    <label for="name" class="form-label english ">Name</label>
    <input type="text" class="form-control english rounded-0" name="name" id="name" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
    <label for="email" class="form-label english">Email address</label>
    <input type="email" class="form-control english rounded-0" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label english">Phone Number</label>
    <input type="text" class="form-control english rounded-0" id="phone" name="phone">
  </div>
  <div class="mb-3">
  <label for="state" class="form-label english">Message</label>
  <textarea class="form-control english rounded-0" id="state" name="state" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary english float-end">Submit</button>
</form>
    </div>
     </div>
   </div>

<?php require_once APPROOT .'/resource/layout/content_end.php'?>
<script src="<?php assets('js/cart.js')?>"></script>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
 
