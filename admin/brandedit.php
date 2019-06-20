<?php 
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<?php 
include '../classes/Brand.php';
$br = new Brand();
?>
<?php
if(!isset($_GET['braedit']) || $_GET['braedit']==NULL){
    echo "<script>window.location = 'brandlist.php'; </script>";
}else{
	$braedit = $_GET['braedit'];
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $brandName =$_POST['brandName'];
    $brandName = $br->update_Brand($brandName ,$braedit);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
            <?php
            if(isset($brandName)){
                echo $brandName;
            }?>           
             <?php
             $braedit = $br->Brand_edit($braedit);
            if(isset($braedit)){
               while($val = $braedit->fetch_assoc() ){ ?>
               <div class="block copyblock"> 
                 <form action ="" method = "post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" class="medium" value="<?php echo $val['brandName'];?>" name ="brandName" />
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