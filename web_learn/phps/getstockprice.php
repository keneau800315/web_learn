<?php

try{
	require_once("connectfinance.php");
	$sql = "select * from `stockprice` where Stock_no=:stockno order by Date DESC Limit 1";
	$stock = $pdo->prepare($sql);
	$stock->bindValue(":stockno", $_GET["stockno"]);
	$stock->execute();

	if($stock->rowCount()){
		$stockRow = $stock->fetch(PDO::FETCH_ASSOC);
		$stock = array("Stock_no" => $stockRow["Stock_no"],"Close" => $stockRow['Close']);
		echo json_encode($stockRow);

	}else{
		echo '{}';
	}

	}catch (PDOException $e) {
	$error = ["error"=>$e->getMessage()];
	echo json_encode($error);
}




?>