<?php
    use App\Models\CategoryModel;
    $category = new CategoryModel();
   $cats =  $category->all('category','asc');
?>
<div class="container" style="background-color:#2a5d84;">
 <nav class="nav">
 <a href="<?php echo URLROOT ?>" class="nav-link english text-white" ><u>HOME</u></a> 
     <?php foreach($cats as $cat):?>
        <a href="<?php echo URLROOT .'category/'. strtolower($cat->name) ?>" class="nav-link english text-white"><u><?php echo strtoupper($cat->name)?></u></a> 
     <?php endforeach;?>
</nav>
 </div>