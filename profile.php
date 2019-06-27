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
        <h3>Profile</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum, assumenda.</p>
</div>

<?php
include "inc/footer.php";
?>