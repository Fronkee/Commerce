<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand text-white" href="<?php

use App\Classes\Session;

echo URLROOT?>">
    <span><img src="<?php assets('image/java.png')?>" alt="logo" width="30px" height="30px" class="rounded"></span>
      ShoppingMall
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "><i class="bi bi-gear"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="<?php echo URLROOT.'admin/home'?>">
          <i class="bi bi-house"></i> Admin
        </a>
        </li>
        <!-- {{ cart }} -->
         
        <li class="nav-item">
           <a class="nav-link text-white" aria-current="page"  href="<?php echo URLROOT.'admin/orders' ?>" position-relative>
           <i class="bi bi-cart-fill"></i>
           <span class="badge  english badge-icon" id="cart-count"><?php echo orderCount('orders')?></span>
           </a> 
        </li>
        <!-- {{ cart }} -->
        <li class="nav-item dropdown me-2 text-start">
          <a class="nav-link text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if(Session::has('admin-email')):?>
            <span>User</span> <i class="bi bi-emoji-smile fs-6"></i>
            <?php else:?>
              <span>User</span> <i class="bi bi-emoji-frown"></i>
          <?php endif;?>
          </a>
          <ul class="dropdown-menu  rounded-0 mt-2" aria-labelledby="navbarScrollingDropdown">
            <li class="dropdown-item english text-white">
              <p class="english">
                <span>Admin</span><br>
                <?php if(Session::has('admin-email')):?>
                  <i class="bi bi-person-circle fs-3 text-break"></i> <span class="align-baseline"><?php echo(cut('admin-email'))?></span></p>
                  <?php else:?>
                    <i class="bi bi-person-circle fs-3 "></i> <span class="align-baseline english text-break">Sign Account</span></p>
                <?php endif;?>
            </li>
            <li><hr class="dropdown-divider text-white"></li>
            <li>
            <?php if(Session::has('admin-email')):?>
              <a class="dropdown-item english text-white" href="<?php echo URLROOT . 'admin/logout'?>"> <i class="bi bi-box-arrow-right"></i> &nbsp;Logout</a>
              <?php else:?>
              <a class="dropdown-item english text-white" href="<?php echo URLROOT . 'admin'?>"> <i class="bi bi-box-arrow-in-left"></i> Login</a>
              <?php endif;?>
            </li>
          </ul>
        </li>
       
    </div>
  </div>
</nav>
<script src="<?php assets('js/cartLoad.js')?>"></script>