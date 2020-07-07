<?php  	
try{
	//回傳可與資料庫互動的物件$pdo
	require_once("connectfinance.php");
	$sql = "select * from stock  where TimeM = '2019/9' order by {$_GET["choose"]} DESC  limit 50;";
	//prepared statement預防隱碼攻擊
	$choose = $pdo->prepare( $sql); 
	$choose->execute();
	//fetch_assoc() 以colums_names取值
	$stockRows = $choose->fetchAll(PDO::FETCH_ASSOC);
	foreach($stockRows as $i=>$stocks){
?>
		<tr >
			<td><?php echo $stocks["TimeM"]; ?> </td>
			<td><?php echo $stocks["Stock_ID"]; ?> </td>
			<td><?php echo $stocks["PriceM"];?></td>
			<td><?php echo $stocks["MOM"];?></td>
			<td><?php echo $stocks["YOY"];?></td>
			<td><?php echo $stocks["ROE"];?></td>
		</tr>
<?php
	}
}catch(PDOException $e){
	//catchPDO建構子意外
  	echo "資料庫操作失敗，原因 : " , $e->getMessage() , "<br>";
  	echo "行號 : " , $e->getLine() , "<br>";
}
?>