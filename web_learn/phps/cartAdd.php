<?php
session_start();
if (isset($_SESSION["psn"])) {
   if (in_array($_GET["psn"], $_SESSION["psn"])) {
   		$index = array_search($_GET["psn"],$_SESSION["psn"]);
  		$_SESSION["qty"][$index] += 1;
   }else{
   	
		$_SESSION["psn"][] = $_GET["psn"];
		$_SESSION["pname"][] = $_GET["pname"];
		$_SESSION["author"][] = $_GET["author"];
		$_SESSION["image"][]= $_GET["image"];
		$_SESSION["price"][] = $_GET["price"];
		$_SESSION["qty"][] = 1;
	}		
}else{
	
	$_SESSION["psn"][] = $_GET["psn"];
	$_SESSION["pname"][] = $_GET["pname"];
	$_SESSION["author"][] = $_GET["author"];
	$_SESSION["image"][]= $_GET["image"];
	$_SESSION["price"][] = $_GET["price"];
	$_SESSION["qty"][] = 1;	
}


header("location:cartShow.php")
?>