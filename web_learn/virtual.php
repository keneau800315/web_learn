<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/virtual.css">
	<script src="js/jquery-3.5.1.min.js" async></script>	
	<script src="js/listdown.js" async defer></script>
	<script src="js/home.js" async defer></script>	
	<title>Finance</title>

</head>


<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->
<div class="frist"></div>
<div id=stock>
	<div>
		<span>股票代碼</span>
		<div>
		<input id="stockno" class="in" type="text" name="" value="輸入股票代號">	
		</div>		
	</div>
	<div>
		<div class="tran">
		<input type="radio" id="buy" name="tran" >
		<label for="buy">買</label>
		</div>
		<div class="tran">
		<input type="radio" id="sell" name="tran" >
		<label for="sell">賣</label>
		</div>
	</div>
	<div>
		<span>價格</span>
		<div>
		<input id="stockprice" class="in" type="text" name="" value="股票價格">
		</div>
	</div>
	<div>
		<div>
		<input id="trmethod" class="buy" type="button" name="" value="買進">
		</div>
	</div>
</div>

<div id="person_data">
	<div>
		<ul>
			<li>帳戶</li>
			<li>交易紀錄</li>
			<li>未實現損益</li>
			<li>已實現損益</li>
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

<script type="text/javascript">

function stockprice(stockno){
	var xhr = new XMLHttpRequest();
	xhr.onload = function(){
		if(xhr.status == 200){
		var stock = JSON.parse(xhr.responseText);
		document.getElementById('stockprice').value = stock['Close'];	
		}
		else{
			alert(xhr.status);
		}
	}
	let url = `phps/getstockprice.php?stockno=${stockno}`;
	xhr.open("get", url, true);
	xhr.send(null);
}


function search(){
	console.log("");
}

function price(){
	stockno = document.getElementById('stockno').value;
	stockprice(stockno);
}

function buy(){
	document.getElementById('trmethod').value = "買進";
	document.getElementById('trmethod').classList.remove("sell");
	document.getElementById('trmethod').classList.add("buy")
}

function sell(){
	document.getElementById('trmethod').value = "賣出";
	document.getElementById('trmethod').classList.remove("buy");
	document.getElementById('trmethod').classList.add("sell")
}

window.addEventListener("load",function(){
	//document.getElementById("stockno").addEventListener("keydown",search,false);
	document.getElementById("stockno").addEventListener("change",price,false);
	document.getElementById("buy").addEventListener("click",buy,false);
	document.getElementById("sell").addEventListener("click",sell,false);
},false)

</script>
	
</body>
</html>