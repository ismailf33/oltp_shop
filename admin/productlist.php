<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
include '../helpers/Format.php';
include '../classes/Product.php';
?>
<?php
$fm = new Format();
$pr = new Product();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl No</th>
					<th>Product name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Aciton</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$pr_list = $pr->product_list();
			if($pr_list){
				$i=0;
				while($print = $pr_list->fetch_assoc()){
					$i++; ?>
				
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $print['productName']?></td>
					<td><?php echo $print['catName']?></td>
					<td><?php echo $print['brandName']?></td>
					<td><?php echo $fm->textShorten($print['body'])?></td>
					<td><?php echo $print['price']?></td>
					<td><img src="<?php echo $print['image']?>" height="40px" width="40px"></td>
					<td><?php 
					if($print['type']==0){
						echo "Featured";}?></td>
					<td><a href="<?php echo $print['productId']?>">Edit</a> || <a href="<?php echo $print['productId']?>">Delete</a></td>
				</tr>
			<?php }} ?>				
			</tbody>
		</table>

       </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
