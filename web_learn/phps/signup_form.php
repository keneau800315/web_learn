<?php
//用來記錄錯誤訊息
$errMsg ="";


if(strlen(trim($_POST['memId']))>3 && strlen(trim($_POST['memName'])) && strlen(trim($_POST["memEmail"])) && (trim($_POST["memPsw"]) == trim($_POST["memPsw2"]))){
	save_form();
	}elseif(strlen(trim($_POST['memId']))<3){
		header('Location: ../signup.php?error=memId');
	}elseif(strlen(trim($_POST['memName']))<1){
		header('Location: ../signup.php?error=memName');
	}elseif(trim($_POST["memPsw"]) != trim($_POST["memPsw2"])){
		header('Location: ../signup.php?error=memPsw');
	}elseif(strlen(trim($_POST["memEmail"])) == 0){
		header('Location: ../signup.php?error=memEmail');
	}
	else{
	header('Location: ../signup.php');
	}


function save_form(){  
try {
	
	require_once ('connectfinance.php');

	$sql = "insert into `member` (memName,memId,memEmail,memTel,memPsw,memBd,memSex) 
			value(?,?,?,?,?,?,?)";

    $signmember = $pdo->prepare($sql);

 	$signmember->execute($arrayName = array($_POST["memName"],$_POST["memId"],$_POST["memEmail"],
 		$_POST["memTel"],$_POST["memPsw"],$_POST["y"].$_POST["m"].$_POST["d"],$_POST["sex"] ?? ''));
 	header('Location: ../home.php');

} catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤 : " . $e -> getMessage() . "<br>";
	$errMsg = $errMsg . "行號 : " . $e -> getLine() . "<br>";
}}
?>