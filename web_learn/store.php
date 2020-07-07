<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/store.css">
	<script src="js/jquery-3.5.1.min.js" defer></script>	
	<script src="js/listdown.js"  defer></script>
	<script src="js/home.js"  defer></script>	
	<title>Finance</title>

</head>


<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->
<div class="frist"></div>

<div class="main">
<div class="shopicon"><a href="phps/cartShow.php"><img id="shicon" src="img/shoppingcar.png">
</a></div>

<div id="member">
	<h2>選股分析師方案</h2>
	<div class="content1">
	<ul>
		<li class="case">
			<h3>個股分析師方案一月期</h3>
			<div class="feature"></div>
			<ul class="feature">
				<li>特色:</li>
				<li>原價399，特價350</li>
				<li>個股數據查詢次數無上限</li>
				<li>350元<button>放入購物車</button></li>
			</ul>
		</li>
		<li class="case">
			<h3>個股分析師方案一年期</h3>
			<div class="feature"></div>
			<ul class="feature">
				<li>特色:</li>
				<li>一次購買一年在優惠兩個月</li>
				<li>個股數據查詢次數無上限</li>				
				<li>3500元<button>放入購物車</button></li>
			</ul>			
		</li>		
		<li class="case">
			<h3>選股分析師方案一月期</h3>
			<div class="feature"></div>
			<ul class="feature">
				<li>特色:</li>
				<li>原價499，特價450</li>
				<li>選股分析師推薦標的</li>
				<li>股票機優清單</li>
				<li>450元 <button>放入購物車</button>	</li>
				<li></li>
			</ul>

		</li>
		<li class="case">
			<h3>選股分析師方案一年期</h3>
			<div class="feature"></div>
			<ul class="feature">
				<li>特色:</li>
				<li>一次購買一年在優惠兩個月</li>
				<li>選股分析師推薦標的</li>
				<li>股票機優清單</li>
				<li>3500元<button>放入購物車</button></li>
			</ul>	
		</li>

	</ul>
	</div>
</div>


<?php 
try {	
	require_once("phps/connectfinance.php");
	$sql="select * from products Limit 4";
	$products = $pdo -> query($sql);
	$productsRows = $products->fetchAll(PDO::FETCH_ASSOC);
	
} catch (Exception $e) {
	echo "例外行號 : ", $e->getLine(),"<br>";
	echo "例外原因 : ", $e->getMessage(),"<br>";		
}
 ?>



<div id="bookstore">
<h2>當季熱銷圖書</h2>
<div class="content2">
<ul>	
<?php
	foreach ($productsRows as $p => $productsRow){
?>


<form action="phps/cartAdd.php" method="get">
<input type="hidden" name="psn" value="<?php echo $productsRow["psn"];?>">
<input type="hidden" name="pname" value="<?php echo $productsRow["pname"];?>">
<input type="hidden" name="author" value="<?php echo $productsRow["author"];?>">
<input type="hidden" name="price" value="<?php echo $productsRow["price"];?>">
<input type="hidden" name="image" value="<?php echo $productsRow["image"];?>">

	<li class="book">
		<a href=""><img class="cover" src=<?php echo $productsRow["image"]?>></a>
		<h5 class= "bname"><?php echo $productsRow["pname"]?></h5>
		<div class= "detail">
			<ul>
				<li class="wname"><?php echo $productsRow["author"]?></li>
				<li class="bprice">
					<span>優惠價: </span>
					<b><?php echo $productsRow["price"]?></b>
					<span>元</span>
					<b><?php echo $productsRow["pages"]?></b>
					<span>頁</span>
					<button>放入購物車</button>
				</li>
			</ul>
		</div>
	</li>
</form>

<?php
}
?>
</ul>
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