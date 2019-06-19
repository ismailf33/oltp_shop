<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';
	  $ct = new Category();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
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
						$i;
						while($print = $result->fetch_assoc()){
						$i++ ; 
						?>	
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $print['catName'];?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
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

