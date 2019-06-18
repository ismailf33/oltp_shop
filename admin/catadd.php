<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
include '../classes/Category.php';
$ct = new Category();
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $catName =$_POST['catName'];
    $ctnpass = $ct->addCategory($catName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
            <?php
            if(isset($ctnpass)){
                echo $ctnpass;
            }?>
               <div class="block copyblock"> 
                 <form action ="" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" class="medium" placeholder="Enter Category Name..." name ="catName" />
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
            </div>
        </div>
<?php include 'inc/footer.php';?>