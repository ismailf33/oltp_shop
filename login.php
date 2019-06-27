<?php include "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
$cus_log= $cmr->customerLogin($_POST);
} ?>   
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
		<p>Sign in with the form below.</p>

		<?php if(isset($cus_log)){echo $cus_log;}?>  
	<!--Login form -->	
        	<form action="" method="post" id="member">
			<input name="email" type="text"  name="email"       placeholder="Enter your Username.. " class="field">
			<input name="password" type="password"  name="password"    placeholder="Enter your Password.." class="field">
			<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
		</form>
                
	</div>

		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
		$cus_reg= $cmr->customerSignup($_POST);
		} ?>   
    	<div class="register_account">
		    <h3>Register New Account</h3><span> <?php if(isset($cus_reg)){echo $cus_reg;}?>  </span>
	<!--Signup form -->		    
    		<form action="" method="post">
		<table>
		<tbody>
			<tr>
				<td>
				<div>
					<input type="text" name="name" placeholder="Username" >
				</div>						
				<div>
					<input type="text" name="city" placeholder="City">
				</div>							
				<div>
					<input type="text" name="zip" placeholder="Zip-code">
				</div>
				<div>
					<input type="text" name="email"  placeholder="Email" >
				</div>
		    		</td>
		    		<td>
				<div>
					<input type="text" name="adress"  placeholder="Address"  >
				</div>
		    		<div>
					<select id="country" name="country">
						<option value="null">Select a Country</option>         
						<option value="AF">Afghanistan</option>
						<option value="AL">Albania</option>
						<option value="DZ">Algeria</option>
						<option value="AR">Argentina</option>
						<option value="AM">Armenia</option>
						<option value="AW">Aruba</option>
						<option value="AU">Australia</option>
						<option value="AT">Austria</option>
						<option value="AZ">Azerbaijan</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesh</option>
					</select>
				 </div>		        	
				<div>
					<input type="text" name="phone" value="Phone">
				</div>	  
				<div>
					<input type="text" name="password" value="Password">
				</div>
		    		</td>
		    </tr> 
		</tbody>
		</table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button> <!--<input type="submit" value="Create Account">-->  </div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		</form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include "inc/footer.php"; ?>
