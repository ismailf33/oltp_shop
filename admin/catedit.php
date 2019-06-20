<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
include '../classes/Category.php';
$ct = new Category();
?>
<?php
if(!isset($_GET['catedit']) || $_GET['catedit']==NULL){
    echo "<script>window.location = 'catlist.php'; </script>";
}else{
	$editid = $_GET['catedit'];
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $catName =$_POST['catName'];
    $ctnup = $ct->update_Category($catName ,$editid);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
            <?php
            if(isset($ctnup)){
                echo $ctnup;
            }?>           
             <?php
             $editid = $ct->Category_edit($editid);
            if(isset($editid)){
               while($val = $editid->fetch_assoc() ){ ?>
               <div class="block copyblock"> 
                 <form action ="" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" class="medium" value="<?php echo $val['catName'];?>" name ="catName" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            <?php } }?>
            </div>
        </div>
<?php include 'inc/footer.php';?>