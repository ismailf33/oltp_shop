<?php
include "inc/header.php";
include "inc/slider.php";
?>
<?php
if(! isset($_GET['proid']) || $_GET['proid'] == NULL){
	echo "<script>window.location = '404.php';</script>";
}else{
	$id = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
$quantity = $_POST['quantity'];
$addCart = $ct->add_cart($quantity ,$id);
}
?>
 <div class="main">
    <div class="content">
	<?php
	if(isset($addCart)){
		echo $addCart;
	}?>

    	<div class="section group">
	<?php
	$eachid = $pd->each_item($id);
	if($eachid){
		while($value = $eachid->fetch_assoc()){ ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $value['image']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $value['productName']?></h2>					
					<div class="price">
						<p>Price: <span>$<?php echo $value['price']?></span></p>
						<p>Category: <span><?php echo $value['catName']?></span></p>
						<p>Brand:<span><?php echo $value['brandName']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><span><?php echo $fm->htmlless($value['body'])?></p>
	    </div>				
	</div>
	<?php	}} ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
		<?php
		$cat_list = $cat->Category_list();
		if($cat_list){
		while($value =$cat_list->fetch_assoc()){ ?>
				<ul>
					<li><a href="productbycat.php?catid=<?php echo $value['catId'];?>"><?php echo $value['catName'];?></a></li>					
    				</ul>
		<?php	}} ?>
 				</div>
 		</div>
 	</div>
	</div>

<?php
include "inc/footer.php";
?> 