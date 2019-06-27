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
.main h2{
        font-size:100px;
        color: red;
        padding: 200px 0px;
        margin: 0 auto;
        width:50%
}
</style>
<div class="main">
    <h2> Order list </h2>
 </div>
<?php
include "inc/footer.php";
?>