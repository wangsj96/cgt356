<div id="topping">
	<?php
		@session_start();
	?>
    <div id="header">
	<?php 
		if($_SESSION['logged'] == true) {
			echo "Welcome back, ".$_SESSION['login_firstname']."("."<span><a href='logout.php'>logout</a></span>".")";
		}
		else {
			echo "<span><a href='login.php'>login</a></span> or <span><a href='login.php'>register</a></span>";
		}
	?>
    </div>
    <div id="nav">
    	<ul id="menu">

			<li><a href="index.php" id="home">Home</a></li>
            
            <li><a href="shipping.php" id="shipping">Shipping</a></li>

			<li><a href="billing.php" id="billing">Billing</a></li>

			<li><a href="account.php" id="account">Account Info</a></li>

			<li><a href="readme.php" id="readme">Readme</a></li>

		</ul>
    </div>
</div>
