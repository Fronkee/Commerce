<style>
   .side-bar>button>span{
    background-color: #2a5d84;
    }
    .side-bar>button>a{
      color: #2a5d84;
    }
  </style>
  <div class="d-flex">
 <div class="col-md-2 side-bar">
 <button type="button" class="list-group-item  list-group-item-action d-flex justify-content-between align-items-start">
    <a class="english" href="<?php echo URLROOT .'admin/home'?>">DashBroad</a> 
    <span class="badge  rounded-pill"><?php echo counting('category')?> </span>
    </button>

   <button type="button" class="list-group-item  list-group-item-action d-flex justify-content-between align-items-start">
    <a class="english" href="<?php echo URLROOT .'admin/category'?>">Category-Create</a> 
    <span class="badge  rounded-pill"><?php echo counting('category')?> </span>
    </button>
    
    <button type="button" class="list-group-item  list-group-item-action d-flex justify-content-between align-items-start">
    <a class="english" href="<?php echo URLROOT .'admin/product/create'?>">Product-Create</a> 
    <span class="badge rounded-pill"><?php echo counting('products')?> </span>
    </button>

    <button type="button" class="list-group-item  list-group-item-action d-flex justify-content-between align-items-start">
    <a class="english" href="<?php echo URLROOT .'admin/product/detail'?>">All-Product</a> 
    <span class="badge rounded-pill"><?php echo counting('products')?> </span>
    </button>

    <button type="button" class="list-group-item  list-group-item-action d-flex justify-content-between align-items-start">
    <a class="english" href="<?php echo URLROOT .'admin/create-admin'?>">Create-Admin </a> 
    <span class="badge rounded-pill"><?php echo counting('admin')?> </span>
    </button>
  
</div> 





