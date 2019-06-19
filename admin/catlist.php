<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';
	  $ct = new Category();
?>
<!-- Delete section -->
<?php
if(isset($_GET['catdel'])){
	$delid = $_GET['catdel'];
	$delid = $ct->Category_del($delid);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>				
				<?php 
				if(isset($delid)){
					echo $delid;
				}?>
				
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$result = $ct->Category_list();
					if($result){
						$i = 0;
						while($print = $result->fetch_assoc()){
						$i++ ; 
						?>	
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $print['catName'];?></td>
							<td><a href="?catedit=<?php echo $print['catId'];?>">Edit</a> || <a href="?catdel=<?php echo $print['catId'];?>">Delete</a></td>
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

