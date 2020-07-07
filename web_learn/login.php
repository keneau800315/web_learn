<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="js/jquery-3.5.1.min.js" async></script>	
	<script src="js/listdown.js" ></script>
	<script src="js/login.js" async defer></script>	
	<script src="js/home.js" async defer></script>
	<title>Finance</title>

</head>


<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->
<div class="frist"></div>

<?php
if(isset($_REQUEST["check"])){	
	//查無此人check=ng
	$value = $_REQUEST["check"];

}else{
	$value = "gd";
}
?>



<h2 id="apply" align="center">帳號登入</h2>
<form action="phps/login2.php" method="post"> 
<div id="alert">帳號或密碼錯，請重新輸入。</div>	 
<table class="tbl">
    <tr>
        <th >帳號:</th><td><input class="intext" name="memId" id="memId" type="text" size="20" maxlength="20" />
        </td>
    </tr>
    
    <tr><th >密碼:</th><td><input class="intext" name="memPsw" type="password" size="20" maxlength="20" /></td></tr>

</table>
<p class="buttomp"><input class="buttoml" type="submit" value="登入"/>&nbsp;
</p>

</form>

<footer>
	<div class="footer">
		<p id="yr">
			Copyright&copy;
		</p>
	</div>	
</footer>	
</body>


<script type="text/javascript">
var value="<?php echo $value; ?>";
el = document.getElementById('alert');
if (value=="gd") {
	$('#alert').addClass('hide')
	//jquery
	//el.setAttribute('class','hide');
	//el.classList
}else{
	$('#alert').addClass('visual')
	//el.setAttribute('class','visual');
}
</script>

</html>