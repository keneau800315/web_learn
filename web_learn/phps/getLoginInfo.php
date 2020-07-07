<?php 
session_start();
if( isset($_SESSION["memId"])){
  	$member = array("memId"=>$_SESSION["memId"], "memName"=>$_SESSION["memName"], "memEmail"=>$_SESSION["memEmail"]);
  	echo json_encode($member);
} else {
	echo "{}";
}
?>
