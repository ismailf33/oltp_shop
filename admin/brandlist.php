<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';
        $br = new Brand();
?>
<!-- Delete section -->
<?php
if(isset($_GET['bradel'])){
	$delid = $_GET['bradel'];
	$delid = $br->Brand_del($delid);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>				
				<?php 
				if(isset($delid)){
					echo $delid;
				}?>
				
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$result = $br->Brand_list();
					if($result){
						$i = 0;
						while($print = $result->fetch_assoc()){
						$i++ ; 
						?>	
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $print['brandName'];?></td>
							<td><a href="brandedit.php?braedit=<?php echo $print['brandId'];?>">Edit</a> || <a href="?bradel=<?php echo $print['brandId'];?>">Delete</a></td>
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

