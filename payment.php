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
.payment {text-align:center; padding:20px 5px; border:1px solid black; width:80%; margin: auto; overflow: hidden; }
.payment h2{font-size:30px; text-align:center; }
.payment a{text-align:center; display:block;  padding:20px 5px; width:200px; background:lightpink; float:left; margin-left:140px; margin-top:52px; }
.back_pay{overflow:hidden;}
.back_pay a{text-align:center; display:block;  padding:12px 2px; width:200px; background:greenyellow; float:left; margin-left:430px; margin-top:52px;color:white; }
</style>
<div class="main">  
        <div class="payment">
            <h2>Choose a payment method</h2>       
                <a href="offline.php">Offline Payment</a>
                <a href="online.php">Online Payment</a>
        </div>
       <div class="back_pay">
       <a href="cart.php">Previous</a>
        </div>
</div>
<?php
include "inc/footer.php";
?>