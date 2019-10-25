<?php

	require 'autoload/autoload.php'; 

	$key =  intval(getInput('key'));

	unset($_SESSION['cart'][$key]);

	$_SESSION['success'] = "Xóa sản phẩm thành công";
	header("location: giohang.php");

 ?>