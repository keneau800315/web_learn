<?php 
session_start();
if (isset($_SESSION["psn"])) {
	

	require_once("connectfinance.php");
	//啟始交易管理
	$pdo->beginTransaction();
	$_SESSION["memNo"] = 1;
	$_SESSION["email"] = "keneau800315@gmail.com";
	$sql = " insert into bookorder (`orderNo`, `orderMemNo`, `orderTime`, `email`, `payStatus`)
		value (null, :orderMemNo, now(), :email, '0')";
	$bookorder = $pdo->prepare($sql);
	$bookorder->bindValue(":orderMemNo", $_SESSION["memNo"]);
	$bookorder->bindValue(":email", $_SESSION["email"]);
	$bookorder->execute();
	$orderNo = $pdo->lastInsertId(); //取回訂單編號

	$sql = "INSERT INTO `orderitems` (`orderNo`, `productNo`, `quantity`) VALUES (:orderNo, :productNo, :quantity)";
	$orderitems = $pdo->prepare($sql);
	$orderitems->bindValue(":orderNo", $orderNo);

	foreach ($_SESSION["psn"] as $i=>$psn) {
		$orderitems->bindValue(":productNo", $_SESSION["psn"][$i]);
		$orderitems->bindValue(":quantity", $_SESSION["qty"][$i]);
		$orderitems->execute();
	}

	echo "下訂成功, 您的訂單編號是 : $orderNo";
	$pdo->commit();
	//將購物車清除
	unset($_SESSION["psn"]);
	unset($_SESSION["pname"]);
	unset($_SESSION["author"]);
	unset($_SESSION["image"]);
	unset($_SESSION["price"]);
	unset($_SESSION["qty"]);
}else{
	echo "未放入商品";
}

?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>購物車</title>
</head>
<body>
<center>
	<a href="../store.php">瀏覽商品</a><br>
	<a href="cartShow.php">瀏覽購物車</a>
</center>
</body>
</html>