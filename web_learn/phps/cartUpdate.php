<?php 
session_start();
if (isset($_GET['qtymodify'])) {
	if ($_GET['qtymodify'] === "modify") {	
		$index = array_search($_GET["psn"],$_SESSION["psn"]);
		$_SESSION["qty"][$index ] = $_GET["qty"];
	}
	# code...
}else{
	$index = array_search($_GET["psn"],$_SESSION["psn"]);
	unset($_SESSION["psn"][$index]);
	unset($_SESSION["pname"][$index]);
	unset($_SESSION["price"][$index]);
	unset($_SESSION["author"][$index]);
}

header("location:cartShow.php");
 ?>