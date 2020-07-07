<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/news.css">
	<script src="js/jquery-3.5.1.min.js" defer></script>	
	<script src="js/listdown.js" defer></script>
	<script src="js/home.js" defer></script>	
	<title>Finance</title>

</head>

<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->
<div class="frist"></div>

<?php 
try {
	require_once("phps/connectfinance.php");
	//產生PDO物件
	$sql = "select * from news order by Time DESC Limit 6";
	$news = $pdo -> query($sql);
	//query()產生一個結果集物件
	$newsRows = $news->fetchAll(PDO::FETCH_ASSOC);

	} catch (PDOException $e) {
	echo "例外行號 : ", $e->getLine(),"<br>";
	echo "例外原因 : ", $e->getMessage(),"<br>";		
}
?> 


<div class="main">

<?php 
	foreach( $newsRows as $newsRow){
?>
	<div class= "news_profile">
		<div class= "news_img"><img src=<?=$newsRow["Img"]?>></div>	
		<div class= "news_title"><?=$newsRow["Title"]?></div>
		<div class= "news_time"><?=$newsRow["Time"]?></div>				 
		<div class= "news_content"><?=mb_substr( $newsRow["Content"] ,0, 100,"utf-8")?>......</div><div class= "news_more"></div>
	</div>

<?php
	}
?>	

</div>
<!--
<div class="page_buttum">
	<ul>
		<li><a href=""></a><img src=""></li>
		<li><a href=""></a>1</li>
		<li><a href=""></a>2</li>
		<li><a href=""></a>3</li>
		<li><a href=""></a>4</li>
		<li><a href=""></a>5</li>
		<li><a href=""></a><img src=""></li>
	</ul>
</div>

-->



<footer>
	<div class="footer">
		<p id="yr">
			Copyright&copy;
		</p>
	</div>	
</footer>
	
</body>
</html>