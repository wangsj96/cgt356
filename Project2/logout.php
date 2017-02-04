<?php
   session_start();
   
   if(session_destroy()) {
      $_SESSION['logged'] = false;
	  $_SESSION['login_user']= "";
	  $_SESSION['login_firstname'] = '';
	  $_SESSION['user_type'] = "";
	  header("Location: index.php");
   }
?>