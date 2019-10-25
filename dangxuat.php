<?php
	
	unset($_SESSION['admin_name']);
	unset($_SESSION['admin_id']);

	header("location: login/");
	
 ?>