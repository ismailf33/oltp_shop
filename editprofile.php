<?php
include "inc/header.php";
?>
<?php
$log_acc = Session::get("cmrlogin");		
if($log_acc == false){
header("location:login.php");
}
?>
<style>
.tblone{width:550px; margin: 0 auto; border: 2px solid #ddd;}
/*.tblone tr td{text-align:justify;}*/
 form .tblone tr td input[type="submit"]{
    padding:8px 35px;
}
</style>
 <div class="main">
    <div class="content">
            <div class="section group">
        <?php 
        $id = Session::get("cmrId");
        $cus_pro = $cmr->cus_profile($id);
        if($cus_pro){
            while($value =$cus_pro->fetch_assoc()){
        ?> 
          <h2 style="text-align:center; padding:10px 0px;">Update Profile details</h2>
          <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $cus_info = $cmr->customer_update($_POST,$id);
          } ?>                   
          <form action="" method="post">       
             <table class="tblone">
                     <tr>
                             <td width="20%">User name</td>
                             <td width="5%">:</td>                             
                             <td><input type="text" name="name" value="<?php echo $value['name'];?>"></td>
                     </tr>
                     <tr>
                             <td>Email</td>
                             <td>:</td>
                             <td><input type="text" name="email" value="<?php echo $value['email'];?>"></td>
                     </tr>
                     <tr>
                             <td>Adress</td>
                             <td>:</td>
                             <td><input type="text" name="adress" value="<?php echo $value['adress'];?>"></td>
                     </tr>
                     <tr>
                             <td>City</td>
                             <td>:</td>
                             <td><input type="text" name="city" value="<?php echo $value['city'];?>"></td>
                     </tr>
                     <tr>
                             <td>Country</td>
                             <td>:</td>
                             <td><input type="text" name="country" value="<?php echo $value['country'];?>"></td>
                     </tr>
                     <tr>
                             <td>Zip</td>
                             <td>:</td>
                             <td><input type="text" name="zip" value="<?php echo $value['zip'];?>"></td>
                     </tr>
                     <tr>
                             <td>Phone</td>
                             <td>:</td>
                             <td><input type="text" name="phone" value="<?php echo $value['phone'];?>"></td>
                     </tr>
                     <tr>
                             <td></td>
                             <td><?php if(isset($cus_info)){echo $cus_info;}?></td>
                             <td><input type="submit" name="submit" value="Update"></td>
                            
                     </tr>
                    
             </table>
             </form>
        <?php }} ?>     
            

            </div>
    </div>
</div>

<?php
include "inc/footer.php";
?>