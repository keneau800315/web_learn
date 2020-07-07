<?php
$errMsg ="";

try {
	require_once("connectfinance.php");
	$sql = "select * from stock  where TimeM = '2019/9' order by {$_GET["orderType"]} DESC  limit 50;";
 	$stocks = $pdo -> prepare($sql);
 	$stocks -> execute(); 

 	if( $stocks->rowCount() ==0){ 
    echo "{}";
  	}else{ //
    $stocksRows = $stocks->fetchAll(PDO::FETCH_ASSOC);
    //轉換成JSON格式
    echo json_encode($stocksRows);
  	} 

 } catch (PDOException $e) {
 	$errMsg = $errMsg . "錯誤 : " . $e -> getMessage() . "<br>";
	$errMsg = $errMsg . "行號 : " . $e -> getLine() . "<br>";
	if( $errMsg != ""){ 
	echo "<center>", $errMsg, "</center>"; 
	exit(); }
 } 
?>