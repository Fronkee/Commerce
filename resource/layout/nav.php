<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand text-white" href="<?php

use App\Classes\Session;

echo URLROOT?>">
    <span><img src="<?php assets('image/java.png')?>" alt="logo" width="30px" height="30px" class="rounded"></span>
      ShoppingMall
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="bi bi-gear text-white align-middle"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
      <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="<?php echo URLROOT ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="<?php echo URLROOT.'admin/home'?>">Admin</a>
        </li>
        <!-- {{ cart }} -->
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="<?php echo URLROOT.'content'?>">Content</a>
        </li>
        <li class="nav-item">
          <?php if(Session::has('email')):?>
           <a class="nav-link text-white" aria-current="page"  href="<?php echo URLROOT .'product/cart'?>" position-relative>
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
           </svg>
           <span class="badge  english badge-icon" id="cart-count">0</span>
           </a>
         <?php else:?>
          <a class="nav-link text-white" aria-current="page"  href="<?php echo URLROOT .'user/login'?>" position-relative>
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
           </svg>
           <span class="badge  english badge-icon" id="cart-count">0</span>
           </a>
         <?php endif;?>
        </li>
        <!-- {{ cart }} -->
        <li class="nav-item dropdown me-3 text-start">
          <a class="nav-link text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php if(Session::has('email')):?>
            <span>User</span> <i class="bi bi-emoji-smile fs-6"></i>
            <?php else:?>
              <span>User</span> <i class="bi bi-emoji-frown"></i>
          <?php endif;?>
          </a>
          <ul class="dropdown-menu  rounded-0 mt-2" aria-labelledby="navbarScrollingDropdown">
            <li class="dropdown-item english text-white">
              <p class="english">
                <span>Personal</span><br>
                <?php if(Session::has('email')):?>
                 <i class="bi bi-person-circle fs-3 text-break"></i> <span class="align-baseline"><?php echo(cut('email'))?></span></p>
                  <?php else:?>
                    <i class="bi bi-person-circle fs-3 "></i> <span class="align-baseline english text-break">Sign Account</span></p>
                <?php endif;?>
            </li>
            <li><hr class="dropdown-divider text-white"></li>
            <li>
            <?php if(Session::has('email')):?>
              <a class="dropdown-item english text-white" href="<?php echo URLROOT . 'user/logout'?>"> <i class="bi bi-box-arrow-right"></i> &nbsp;Logout</a>
              <?php else:?>
              <a class="dropdown-item english text-white" href="<?php echo URLROOT . 'user/login'?>"> <i class="bi bi-box-arrow-in-left"></i> Login</a>
              <?php endif;?>
            </li>
          </ul>
        </li>
       
    </div>
  </div>
</nav>
<script src="<?php assets('js/cartLoad.js')?>"></script>