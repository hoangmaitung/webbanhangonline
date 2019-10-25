<?php 
	
	session_start();
	require 'libraries/Database.php';
    require 'libraries/Function.php';
    $db = new Database;


    
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."webbanhangonline/public/uploads/");

    $category = $db->fetchAll('category');

    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 16";
    $sqlNewt = "SELECT * FROM product WHERE 1 ORDER BY price asc LIMIT 16";
    $sqlNewg = "SELECT * FROM product WHERE 1 ORDER BY price DESC LIMIT 16";


    $productNEW = $db->fetchsql($sqlNew);
    $productNEWt = $db->fetchsql($sqlNewt);
    $productNEWg = $db->fetchsql($sqlNewg);

?>