<?php

use App\Classes\Session;

require_once APPROOT .'/resource/layout/header.php'?>
<?php require_once APPROOT .'/resource/layout/admin/ad_nav.php'?>
<?php require_once APPROOT .'/resource/layout/admin/sidebar.php'?>
 
  <div class="container-fluid english  border ">
               <!-- {{ breadcrumb }} -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item english">
                <a href="<?php echo URLROOT .'admin/home'?>">
                <?php echo ucfirst(breadcrumb()[3])?></a></li>
                <li class="breadcrumb-item text-primary english" aria-current="page"><?php echo ucfirst(breadcrumb()[4])?></li>
            </ol>
            </nav> 
<!-- {{ breadcrumb }} -->   

  <div class="container  my-3 p-5 rounded">  
      <p class="fs-5">Client Message</p> 
    <div class="accordion col-md-7" id="accordionExample">
            <?php foreach($msg as $item):?>
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $item->id?>">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $item->id?>" aria-expanded="true" aria-controls="collapse<?php $item->id?>">
                 <span class="p-1 "> Client Name - <?php echo $item->name?></span>
                </button>
                </h2>
                <div id="collapse<?php echo $item->id?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $item->id?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="text-start english  fw-bold text-dark"><u>Client Message</u></p>
                    <p class="text-start fw-blod text-danger"> Client-phone <cite title="client-phone"><?php echo $item->phone?></cite></p>
                    <strong class="text-dark"><?php echo $item->state?></strong>
                    <div class="d-flex justify-content-end mt-2 p-2">
                       <span class="align-middle">Read <input type="checkbox"  name="" id=""></span>
                       <span class="ms-3"><i class="bi bi-trash"></i></span>
                    </div>
                </div>
                </div>
                </div>
            <?php endforeach;?>
    </div>
         
  </div>
</div>
  </div> <!-- {{ content-area }} -->
  <?php require_once APPROOT .'/resource/layout/admin/sidebar_end.php'?>
<?php require_once APPROOT .'/resource/layout/footer.php'?>
