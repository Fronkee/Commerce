<div class="container mt-2 p-3 ">
  <div class="row row-cols-1 row-cols-md-5 g-4 ">
  <?php foreach($products as $data):?>
    <div class="col">
       <div class="card h-100 card-box">
       <a href="<?php echo URLROOT .'product/detail/'. $data->id?>" style="text-decoration:none;">
       <img src="<?php assets('uploads/'.$data->image)?>" height="200px" class="card-img-top" alt="...">
       </a>
      <div class="card-body ">
      <a href="<?php echo URLROOT .'product/detail/'. $data->id?>" style="text-decoration:none;">
        <h5 class="card-title english"><u><?php echo strtoupper($data->name)?></u></h5>
        <p class="card-text english"><?php echo substr($data->description,0,40) ?></p>
      </a>
      </div>
     
      <div class="card-footer d-flex justify-content-end" style="background-color:#2a5d84;">
      <small class="english text-white me-auto"><u><?php echo $data->price?>-KS</u></small>
      <small>
       <a href="<?php echo URLROOT .'product/detail/'. $data->id?>" style="text-decoration:none;">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-white english" viewBox="0 0 16 16">
        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
      </svg>
      </a>
       </small>
      <!-- <button class="btn btn-sm btn-info english text-white" "> -->
        <span class="english text-white" onclick="addToCart('<?php echo $data->id?>')" style="cursor:pointer;">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-cart3 english" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
        </span>
       <!-- </button> -->
     
      </div>
    </div>

  </div>
  <?php endforeach;?>

  </div>
 </div>


