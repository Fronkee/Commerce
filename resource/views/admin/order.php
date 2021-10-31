<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
<?php require_once APPROOT .'/resource/layout/admin/sidebar.php'?>
 
  <div class="container-fluid english  border">
               <!-- {{ breadcrumb }} -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item english">
                <a href="<?php echo URLROOT .'admin/home'?>">
                <?php echo ucfirst(breadcrumb()[3])?></a></li>
                <li class="breadcrumb-item text-primary english" aria-current="page"><?php echo ucfirst(breadcrumb()[4])?></li>
            </ol>
            </nav> 
<!-- {{ breadcrumb }} -->   

  <div class="container  my-3 p-5 rounded">  
      <p class="fs-5">Customer Orders </p> 
       <p class="text-end english fw-bold">
       <a href="<?php echo URLROOT .'admin/orders-ready'?>"><i class="bi bi-card-list"></i> Ready Orders List</a>
      </p>
        <?php if(!empty($orders)):?>
          <?php foreach($orders as $order):?>
         
         <div class="card mb-3" style="box-shadow: 0px 2px 5px #3e3e3e;">
         <div class="card-header">
           <span class="english text-start">Customer - Orders </span>
           <span class="english float-end"> 
             <cite title="customer-mail" style="color:#2a5d84"><?php echo $order->email?></cite>
           </span>
 
         </div>
         <div class="card-body">
             <?php $total=0;foreach(json_decode($order->items) as $item):?>
               <?php $total += $item->qty*$item->price;?>
              <div class="row gx-0 mb-2">
                <div class="col">
                  <img src="<?php assets('uploads/'.$item->image)?>" alt="" class="rounded" width="70px" height="70px" style="box-shadow: 0px 2px 5px #2a5d84;">
                </div>
                <div class="col">
                  <span>Name - </span> <cite title="name" class="fw-bold text-primary"><?php echo $item->name?></cite><br>
                  <span>QTY - <cite title="quantity" class="fw-bold text-primary"><?php echo $item->qty;?></cite></span><br>
                  <span>Price - <cite title="price" class="fw-bold text-primary"><?php echo $item->price;?></cite></span>
 
                </div>
                <div class="col">
                  <span>Total - <cite title="total" class="ms-3"><?php echo $item->qty?> <span class="text-success fw-bold"> * </span> <?php echo $item->price?></cite> <span> = <?php echo $item->qty*$item->price?></span></span><br>
                  <span>Payment - <cite title="payment" class="ms-3 fw-bold text-danger">Pending</cite></span>
                </div>
              </div>
              <hr class="fw-bold">   
           <?php endforeach;?>
         </div>
 
          <form action="<?php echo URLROOT .'admin/orders'?>" method="post">
              <div class="row gx-0 my-3">
                <div class="col-md-8">
                  <p class="text-muted float-start ms-4 time" id="time">1 min ago</p>
                    <p class="float-end align-middle">Grand - Total &nbsp; &nbsp; &nbsp; &nbsp;
                      <span class=" fw-bold text-danger"><?php echo $total;?> MMK</span></p>
                </div>
                 <input type="hidden" name="id" value="<?php echo $order->id?>">
                <div class="col-md-4 text-center">
                 <span class="english">Select</span> <input type="checkbox" name="check" id="" class="text-success" class="rounded-0">
                  <button class="btn btn-sm btn-primary">Ready</button>
                </div>
              </div>
          </form>
        </div>
         <?php  endforeach;?>
          <?php else:?>
            <div class="mt-3 p-3">
            <p class="">Not Have Customer Orders!</p>
            </div>
        <?php endif;?>
      
      
  </div>


</div>
  </div> <!-- {{ content-area }} -->
  <?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
