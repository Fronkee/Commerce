<?php

use App\Models\CategoryModel;

$cats = new CategoryModel();
$category = $cats->all('category','asc');
?>

<div class="container-fluid con-end mt-5">
    <div class="container p-3">
      <div class="row gx-3 mt-4 offset-md-1">
          <div class="col mb-2">
              <p class="english fs-5">Categories</p>
            <ul class="list-unstyled ">
                <?php foreach($category as $cat):?>
                <li><a href="" class="english fw-bold"><?php echo $cat->name?></a></li>
               <?php endforeach;?>
           </ul>
          </div>
          
          <div class="col mb-2">
              <p class="english fs-5 ">Content</p>
                <p class="english">
                  <span><i class="bi bi-envelope-open-fill"></i></span>
                  <cite title="email">hanwinaungsdg@gmail.com</cite>
                </p>
                <p class="english">
                  <span><i class="bi bi-telephone-fill"></i></span>
                  <cite title="phone">09786924674</cite>
                </p>
                <p class="english">
                  <span><i class="bi bi-telephone-fill"></i></span>
                  <cite title="phone">09970777378</cite>
                </p>   
                <div class="ms-5">
                    <span><a href="#"><i class="bi bi-facebook fs-4"></i></a></span>
                    <span><a href="#"><i class="bi bi-telegram fs-4"></i></a></span>
                </div>   
          </div>
          <div class="col mb-2">
              <p class="english fs-5 ">Support</p>
              <p class="english">NO.44/B, Cherry (2) Street, 54 Quarter, 
                  South Dagon Myothit, Yangon, Myanmar
                 <cite title="call-me">09786924674</cite></p>
          </div>
      </div>
      <div class="text-dark ms-5"><hr></div>
      <div class="container">
          <p class="ms-5 fw-bold english text-start">&COPY;<b>2021-2022 Ice-Berg Com.Ltd </b> . <small>All rights reserved.</small></p>
      </div>
    </div>
</div>