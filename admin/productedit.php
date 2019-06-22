<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include '../classes/Brand.php';
include '../classes/Category.php';
include '../classes/Product.php';
$pro = new Product();
?>
<?php
if(isset($_GET['proid'])){
    $id = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
$pro_up = $pro->update_Product($_POST , $_FILES ,$id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>        
        <div class="block"> 
            <?php
            if(isset($pro_up)){
                echo $pro_up;
            }
            ?> 
            <?php           
            $get_data = $pro->get_product($id);
            if($get_data){
                while($val = $get_data->fetch_assoc()){
                    ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $val['productName'];?>" class="medium" name="productName"/>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>                    
                        <select id="select" name="catId">
                        <option>Select Category</option>
                        <?php
                    $ct = new Category();
                    $value = $ct->Category_list();
                    if($value){
                        while($print = $value->fetch_assoc()){
                            ?>
                            <option 
                             <?php
                             if($val['catId'] == $print['catId']){ ?>
                                 selected = "selected";                                
                             <?php } ?> value="<?php echo $print['catId']?>"><?php echo $print['catName']?></option>
                    <?php }} ?>    
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php
                    $br = new Brand();
                    $value = $br->Brand_list();
                    if($value){
                        while($print = $value->fetch_assoc()){
                            ?>
                            <option
                            <?php 
                            if($val['brandId'] == $print['brandId']){ ?>
                                selected = "selected"
                          <?php  } ?> value="<?php echo $print['brandId']?>"><?php echo $print['brandName']?></option>
                    <?php }} ?>                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"><?php echo $val['body'];?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $val['price'];?>" class="medium" name="price"/>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="<?php echo $val['image']?>" height="40px" width="40px">
                    <br>                   
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if($val['type'] == 0){ ?>
                                <option selected = "selected" value="1">Featured</option>
                                <option value="2">General</option>
                          <?php }else{ ?>
                            <option value="0">Featured</option>
                            <option  selected = "selected" value="1">General</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php }}   ?> 
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>

