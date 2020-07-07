<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/screen.css">
	<script src="js/jquery-3.5.1.min.js" ></script>	
	<script src="js/listdown.js"  defer></script>	
	<script src="js/home.js"  defer></script>
	<script src="js/screen.js" defer></script>
	<title>Finance</title>
</head>



<body>

<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->
<div class="frist"></div>
<div id="NameMsg"></div>

<?php
$errMsg ="";

try {
	require_once("phps/connectfinance.php");
	$sql = "select * from stock  where TimeM = '2019/9' order by {$_GET["choose"]} DESC limit 50;";
 	$choose = $pdo -> prepare($sql);
 	$choose -> execute(); 

 } catch (PDOException $e) {
 	$errMsg = $errMsg . "錯誤 : " . $e -> getMessage() . "<br>";
	$errMsg = $errMsg . "行號 : " . $e -> getLine() . "<br>";
 } 
?>


<div id="tb">
<form >
<select id="orderByType">
  <option>排序搜尋</option>
  <option value="PriceM">股票價格</option>
　<option value="MOM">月增率排行</option>
　<option value="YOY">年增率排行</option>
　<option value="ROE">ROE排行</option>
</select>
</form>

<div id="showPanel">
<table id ="intb">	
<tr><th>時間</th><th>股票代號</th><th>股票價格</th><th>月增率</th>
<th>年增率</th><th>ROE</th></tr>

<?php
	//fetch_assoc() 以colums_names取值	
	while($stocks = $choose->fetch(PDO::FETCH_ASSOC)){
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
?>
</table>
</div>
</div>
</div>
<footer>
	<div class="footer">
		<p id="yr">
			Copyright&copy;
		</p>
	</div>	
</footer>
	
</body>
</html>