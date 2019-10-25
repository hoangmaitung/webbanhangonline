<?php 
	
	session_start();
	require_once __DIR__. '/../../libraries/Database.php';
    require_once __DIR__. '/../../libraries/Function.php';
    $db = new Database;


    if ( ! isset($_SESSION['admin_id'])) {

        header("location: /webbanhangonline/login/");
    }



    
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."webbanhangonline/public/uploads/");

    $category = $db->fetchAll('category');
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 12";
    $productNEW = $db->fetchsql($sqlNew);
?>