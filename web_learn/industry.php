<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/industry.css">
	<!-- https://vuejs.org/v2/guide/installation.html -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="js/jquery-3.5.1.min.js" defer></script>	
	<script src="js/listdown.js" defer></script>
	<script src="js/home.js"  defer></script>	
	<title>Finance</title>

</head>


<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->

<div class="frist"></div>



<?php
$errMsg =""; 
try {	
	require_once ('phps/connectfinance.php');
	$sql = "select * from stockid where stkC=:stockCate"; 
    $stocks = $pdo->prepare($sql);
    $stocks->bindValue(":stockCate", $_GET["stockCate"]);
 	$stocks->execute();

 	if( $stocks->rowCount() ==0){ 
    echo "{}";
  	}else{ //
    $stocksRows = $stocks->fetchAll(PDO::FETCH_ASSOC);
    //轉換成JSON格式

    $jsonStr =  json_encode($stocksRows);
  	} 

} catch (PDOException $e) {
	$errMsg = $errMsg . "錯誤 : " . $e -> getMessage() . "<br>";
	$errMsg = $errMsg . "行號 : " . $e -> getLine() . "<br>";
}
?>




<div id="tb">
<table >	
<tr><th>股票代號</th><th>股票名稱</th><th>產業類別</th></tr>

<tr v-for="stockRow in stockRows">
			<td>{{stockRow.stkID}}</td>
			<td>{{stockRow.stkN}}</td>
			<td>{{stockRow.stkC}}</td>
		</tr>	
</table>


<script type="text/javascript">
	//JSON.parse吃字串資料
	var jsonStr = '<?php echo $jsonStr ?>';
	var app = new Vue({
	el:'#tb',
	data:{
		stockRows:JSON.parse(jsonStr)
	}
	})	

</script>

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