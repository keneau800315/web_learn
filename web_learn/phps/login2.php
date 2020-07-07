<?php

$errMsg ="";  
try {	
	require_once ('connectfinance.php');

	//$sql = "select * from `member` where memId='{$_POST["memId"]}' and memPsw='{$_POST["memPsw"]}';";
	
	$sql = "select * from `member` where memId=:memId and memPsw=:memPsw"; 
    $member = $pdo->prepare($sql);
    $member->bindValue(":memId", $_POST["memId"]);
    $member->bindValue(":memPsw", $_POST["memPsw"]);
 	$member->execute();


} catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤 : " . $e -> getMessage() . "<br>";
	$errMsg = $errMsg . "行號 : " . $e -> getLine() . "<br>";
}
?>


<?php 
if( $member->rowCount() == 0){ //查無此帳密
	//$message = "帳密錯誤";
	//echo $message;		
	header("location:/Finance/login.php?check=ng");
	
}else{ //登入成功
	
	//$memRow = $member->fetch(PDO::FETCH_ASSOC);	
	//echo $memRow["memName"], "您好~<br>";
	header("location:/Finance/home.php");
	
}

?>
