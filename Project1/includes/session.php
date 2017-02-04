<?php
   include("openDbConn.php");
   session_start();
   
   $_SESSION["logged"] = true;;
   
   /*$user_check = $_SESSION['login_user'];
   
   $sql = "SELECT Login FROM p1user WHERE Login = '".$user_check."'";
   
   $ses_sql = mysql_query($sql);
   
   $row = mysql_fetch_array($ses_sql);
   
   $login_session = $row['Login'];*/
   
   if(!isset($_SESSION['login_user'])){
     	$_SESSION['logged'] = false;
		//header("Location:login.php");
   }
   
?>