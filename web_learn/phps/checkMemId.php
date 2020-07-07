<?php  	
try{
	//回傳可與資料庫互動的物件$pdo
	require_once("connectfinance.php");
	$sql = "select * from member where memId=:memId";
	//prepared statement預防隱碼攻擊
	$member = $pdo->prepare( $sql); 
	$member->bindValue(":memId" , $_REQUEST["memId"]);
	$member->execute();
	if($member->rowCount()==0) 
	  echo "true";	
	else
	  echo "false";
}catch(PDOException $e){
	//catchPDO建構子意外
  	echo "資料庫操作失敗，原因 : " , $e->getMessage() , "<br>";
  	echo "行號 : " , $e->getLine() , "<br>";
}
?>