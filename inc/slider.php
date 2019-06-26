<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
			$get_first = $pd->get_first_brand();
			if($get_first ){
				while($value = $get_first->fetch_assoc()){ ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="preview.php?proid=<?php echo $value['productId']?>"> <img src="admin/<?php echo $value['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $value['productName']?></h2>
						<p><?php echo $fm->textShorten($value['body'],30)?></p>
					<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php	}}?>
			<?php
			$get_first = $pd->get_second_brand();
			if($get_first ){
				while($value = $get_first->fetch_assoc()){ ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="preview.php?proid=<?php echo $value['productId']?>"> <img src="admin/<?php echo $value['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $value['productName']?></h2>
						  <p><?php echo $fm->textShorten($value['body'],30)?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			<?php	}}?>	
			</div>
			<div class="section group">
			<?php
			$get_first = $pd->get_third_brand();
			if($get_first ){
				while($value = $get_first->fetch_assoc()){ ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="preview.php?proid=<?php echo $value['productId']?>"> <img src="admin/<?php echo $value['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $value['productName']?></h2>
						<p><?php echo $fm->textShorten($value['body'],30)?></p>
					<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']?>">Add to cart</a></span></div>
				   </div>
				</div>
			<?php	}}?>	
			<?php
			$get_first = $pd->get_forth_brand();
			if($get_first ){
				while($value = $get_first->fetch_assoc()){ ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="preview.php?proid=<?php echo $value['productId']?>"> <img src="admin/<?php echo $value['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						<h2><?php echo $value['productName']?></h2>
						<p><?php echo $fm->textShorten($value['body'],30)?></p>
					<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
			<?php	}}?>	
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	