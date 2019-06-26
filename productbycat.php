<?php
include "inc/header.php";
?>
<?php
if(! isset($_GET['catid']) || $_GET['catid'] == NULL){
	echo "<script>window.location = '404.php';</script>";
}else{
	$id = $_GET['catid'];
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	<div class="section group">
	<?php 
	$catpro = $pd->get_cat_product($id);
	if($catpro){
	while($value = $catpro->fetch_assoc()){ ?>      		 		 
		<div class="grid_1_of_4 images_1_of_4">
				<a href="preview.php?proid=<?php echo $value['productId'] ;?>"><img src="admin/<?php echo $value['image'] ;?>" alt="" /></a>
				<h2><?php echo $value['productName'] ;?></h2>
				<p><?php echo $fm->textShorten($value['productName'], 30);?></p>
				<p><span class="price"><?php echo $value['price'] ;?></span></p>
			<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId'] ;?>">Details</a></span></div>
		</div>
	<?php }}else{ ?>

<h2 style="font-size:100px; color:red; padding: 200px 0px;margin: 0 auto;width:50%"> Products of this Category not available ! </h2>

	<?php } ?>		
	</div>	
    </div>
 </div>
</div>
<?php
include "inc/footer.php";
?>