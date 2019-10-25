<?php

	require 'autoload/autoload.php'; 
	$key = intval(getInput("key"));
	$qty = intval(getInput("qty"));

	$_SESSION['cart'][$key]['qty'] = $qty;

	echo 1;

 ?>