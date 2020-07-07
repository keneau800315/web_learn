<?php
session_start();
?>
<header>
<div class ="nav-bar">

	<ul class = "ti-list">
		<li class = "ti-item"><a href="home.php">Home</a></li>
		<li class = "ti-item"><a href="news.php">News</a></li>
		<div class="sub-item">
		</div>
		<li class = "ti-item ls-down">Screen
			<div class="sub-item hide" id="menu-0">
			<ul>
				<li class = "rollbar"><a class="sub_a" href="screen.php?choose=MOM">月營收排行</a></li>
				<li class = "rollbar"><a class="sub_a" href="screen.php?choose=YOY">年營收排行</a></li>
				<li class = "rollbar"><a class="sub_a" href="screen.php?choose=ROE">ROE排行</a></li>
			</ul>
			</div>
		</li>

		<li class = "ti-item ls-down hidden">Market
			<div class="sub-item hide" id="menu-1">
			<ul>
				<li class = "rollbar"><a class="sub_a" href="market.php">各國指數</a></li>
				<li class = "rollbar"><a class="sub_a" href="market.php">原物料</a></li>
				<li class = "rollbar"><a class="sub_a" href="market.php">汽車</a></li>
				<li class = "rollbar"><a class="sub_a" href="market.php">水泥</a></li>
			</ul>
			</div>
		</li>

		<li class = "ti-item ls-down">Industry
			<div class="sub-item hide" id="menu-2">
			<ul>
				<li class = "rollbar"><a class="sub_a" href="industry.php?stockCate=水泥工業">水泥工業</a></li>
				<li class = "rollbar"><a class="sub_a" href="industry.php?stockCate=食品工業">食品工業</a></li>
				<li class = "rollbar"><a class="sub_a" href="industry.php?stockCate=汽車工業">汽車工業</a></li>
				<li class = "rollbar"><a class="sub_a" href="industry.php?stockCate=半導體業">半導體業</a></li>
			</ul>
			</div>
		</li>
		<li class = "ti-item ls-down">Virtual
			<div class="sub-item hide" id="menu-3">
			<ul >
				<li class = "rollbar"><a class="sub_a" href="virtual.php">虛擬投資</a></li>
				<li class = "rollbar"><a class="sub_a" href="virtual.php">股票投資</a></li>
				<li class = "rollbar"><a class="sub_a" href="virtual.php">債卷投資</a></a></li>
				<li class = "rollbar"><a class="sub_a" href="virtual.php">資產規劃</a></li>
			</ul>
			</div>
		</li>



		<li class = " hidden">Insurance</li>
		<li class = "ti-item ls-down"><a href="store.php">Store</a>
			<div class="sub-item hide" id="menu-4">
			<ul>
				<li class = "rollbar hidden"><a class="sub_a" href="store.php">書店</a></a></a></li>
				<li class = "rollbar hidden"><a class="sub_a" href="store.php">權限</a></a></li>
				<li class = "rollbar hidden"><a class="sub_a" href="store.php">投資知識</a></li>
			</ul>
			</div>
		</li>
		<li class = "ti-item" id="memName">&nbsp;</li>
		<li class = "ti-item" id="login_bu">Login</li>
		<li class = "ti-item"><a href="signup.php">Sign up</a></li>
		<li class = "ti-item cart"><a href="phps/cartShow.php">購物車
		<!-- echo PHP echo 並不是 PHP 函數，是一個語言結構language construct的功能是用來輸出字串-->
		<span id='cart'><?php echo isset($_SESSION["psn"])?count($_SESSION["psn"]) : '' ; ?></span></a></li>
	</ul>

</div>
<div id="lightBox">
	<table class="tb">
    <tr><th>帳號:</th><td><input type="text" name="memId" id="memId" size="20" maxlength="20"></td>
    </tr>
    
    <tr><th >密碼:</th><td><input type="password" name="memPsw" id="memPsw"  size="20" maxlength="20"></td></tr>
    <tr><td colspan="2" >
        <input type="button" id="btnLogin" value="登入">&nbsp;&nbsp;&nbsp;
        <input type="button" id="btnLoginCancel" value="取消">
    </td></tr>
 	<tr><td colspan="2" id="alert" class="hide">帳號或密碼錯，請重新輸入。</td></tr>
</table> 
</div>