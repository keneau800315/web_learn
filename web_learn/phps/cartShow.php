<?php
session_start();
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>購物車</title>
<link rel="stylesheet" type="text/css" href="../css/cartShow.css">

</head>
<body>
<table >
	<tr bgcolor="#3578E5"><th>書號</th><th>書名</th><th>作者</th><th>價格</th><th>數量</th><th>小記</th><th></th><th></th></tr>

<?php
if(isset($_SESSION["psn"])){ 
	foreach($_SESSION["psn"] as $i=>$psn){
 ?>

 <form action="cartUpdate.php" method="GET">
	<tr>
		<input type="hidden" name="psn" value="<?php echo $_SESSION["psn"][$i];?>">
		<td><?php echo $_SESSION["psn"][$i];?></td>
		<td>
			<a href="prodQuery.php?psn=">
			<?php echo $_SESSION["pname"][$i];?></a>
		</td>
		<td><?php echo $_SESSION["author"][$i];?></td>
		<td><?php echo $_SESSION["price"][$i];?></td>

		<?php  //計算價格
		$price = (int)$_SESSION["price"][$i];
		$qty = (int)$_SESSION["qty"][$i];
		 ?>

		<td><input type="text" name="qty" value="<?php echo $_SESSION["qty"][$i];?>"></td>
		<td><?php echo $qty*$price;?></td>
		
		<td><input type="submit" action="cartUpdate.php" name="qtymodify" value="modify"></td>
		<td><input type="submit" action="cartUpdate.php" name="productdelet" value="delet"></td>
	</tr>
</form>	
<?php 
}}else{
	echo 
	'
	<tr >	
		<td colspan=6 align ="center">購物車內無商品</td>
		<td>
	</tr>
	';
}
 ?>
	
</table>     
<br>
<center><a href="../store.php">繼續瀏覽</a></center><br>
<center><a href="cartToDb.php">下單</a></center>
</body>
</html>