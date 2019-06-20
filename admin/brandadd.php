<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
include '../classes/Brand.php';
$br = new Brand();
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $brandName =$_POST['brandName'];
    $brandName = $br->add_brand($brandName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
            <?php
            if(isset($brandName)){
                echo $brandName;
            }?>
               <div class="block copyblock"> 
                 <form action ="" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" class="medium" placeholder="Enter Brand Name..." name ="brandName" />
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