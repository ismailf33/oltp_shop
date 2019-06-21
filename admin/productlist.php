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
<?php
if(isset($_GET['proid'])){	
		$id = preg_replace('/[^-a-zA-Z0-9_]/','', $_GET['proid']) ;
		$del_pro = $pr->del_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
		<h2>Post List</h2>
		<?php
		if(isset($del_pro)){
			echo $del_pro;
		}?>
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
						echo "Featured";
						}else{
							echo "General";}?></td>
					<td><a href="<?php echo $print['productId']?>">Edit</a> || <a href="?proid = <?php echo $print['productId']?>">Delete</a></td>
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
