<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="shortcut icon" href="img/dollar_icon.png"/ type="image/png">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/news.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">  
  <script src="js/jquery-3.5.1.min.js" defer></script>  
  <script src="js/listdown.js"  defer></script>
  <script src="js/home.js"  defer></script>  
  <script type="js/signup.js"></script>

	<title>Finance</title>

</head>


<body>
<!-- --------------nav bar ----------- -->
<?php require_once("phps/nav_bar.inc.php");?>
<!-- --------------content ----------- -->  
<div class="frist"></div>
<?php 
if(isset($_REQUEST["error"])){  

  $error = $_REQUEST["error"];
  $ref  = array('memId' =>'帳號需大於3個字' ,
                'memName' => '姓名錯誤',
                'memEmail' => '信箱錯誤',
                'memPsw' => '密碼錯誤',);
  $value = $ref[$error];
}else{
  $value = "gd";
}

?>

<script type="text/javascript">
var value="<?php echo $value; ?>";
if (value=="gd") {
}else{
 window.alert(value);
}
</script>


<script>
var xhr ;
function stateChanged(){  
  console.log(xhr.readyState);
  if( xhr.readyState == 4){  
    switch( xhr.status ){             
      case 200:     
    //console.log(xhr.responseText);
        if( xhr.responseText=="true"){  
              alert("可使用此帳號...");
            }else{  
              alert("帳號已存在,請改用其它帳號...");
            } 
            break;
      case 404:  
        alert("檔案找不到");       
            break;
      case 500:
        alert("伺服端程式錯誤");
      }
  }
}

function checkId(){ 
  xhr = new XMLHttpRequest();
  console.log(xhr.readyState);
  xhr.onreadystatechange = stateChanged;
  var url = "phps/checkMemId.php?memId=" + document.getElementById("imemId").value;
  xhr.open("Get",url,true);   
  xhr.send(null);  
}

function checkName(e){  
  console.log(e.target.value)
  var xhr = new XMLHttpRequest(); 
  //註冊callback function
  xhr.onreadystatechange = function(){
    if( xhr.readyState == 4){
      if( xhr.status==200){
        document.getElementById("NameMsg").innerText= xhr.responseText;
        console.log(xhr.responseText);
      }else{
        alert(xhr.status);
      }
    }
  }
  //設定好所要連結的程式
  let url = "phps/signup2.php?memName=" + document.getElementById("memName").value;
  
  xhr.open("Post", url, true);
  //送出資料
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");

  let data_info = "memName=" + document.getElementById("imemId").value;
  xhr.send(null);
}




function checkPsw(){
  let $psw1 = document.getElementById("memPsw1").value;
  let $psw2 = document.getElementsByName("memPsw2")[0].value;
  if($psw1==$psw2){
      document.getElementById("password").innerText = "密碼正確";
  
  }else{
      document.getElementById("password").innerText = "密碼錯誤";
  }
}


window.addEventListener("load", function(){
  //change事件在離開文字盒時若內容有改變會發生change事件
  document.getElementById("memName").addEventListener("change", checkName, false);
  document.getElementsByName("memPsw2")[0].addEventListener("change", checkPsw, false);
}, false);


</script>

<h2 id="apply" align="center">申請加入會員</h2>
<form action="phps/signup_form.php" method="post"> 
<table class="tbl">
    <caption>*為必填資料</caption>
    <tr>
        <th class="must">帳號:</th><td><input class="intext" name="memId" id="imemId" type="text" size="8" maxlength="8" />
        <input class="buttoml" type="button" value="檢查帳號是否可用" onClick="checkId();"></td>	 
    </tr>

    <tr><th class="must">姓名:</th><td><input class="intext" name="memName" id="imemName" type="text" size="10" maxlength="10" /><span id="NameMsg"></span>
    </td></tr>

    <tr><th class="must">密碼:</th><td><input class="intext" id="memPsw1" name="memPsw" type="password" size="20" maxlength="20" /></td></tr>

    <tr><th class="must">確認密碼:</th><td><input class="intext" name="memPsw2" type="password" size="20" maxlength="20" /><span id="password"></span>
    </td></tr> 

    <tr><th class="must">Email:</th><td><input class="intext" name="memEmail" type="text" size="50" maxlength="50" /></td></tr>

    <tr><th>性別:</th><td><input class="intext" name="sex" type="radio" value="1" />男   <input name="sex" type="radio" value="0"/>女</td></tr>

    <tr><th>生日:</th>
    <td><input class="intext" name="y" type="text"  size="4" maxlength="4"/>&nbsp;&nbsp;-&nbsp;
        <input class="intext" name="m" type="text" size="2" maxlength="2"/>&nbsp;&nbsp;-&nbsp;
        <input class="intext" name="d" type="text" size="2" maxlength="2"/>
        (格式: yyyy-mm-dd)</td>
    </tr>

    <tr ><th>電話:</th><td><input class="intext" name="memTel" type="text" size="10" maxlength="10"/></td></tr>
    <tr><td colspan="2"><p class="buttomp"><input class="buttoml" type="submit" value="submit"/>
    	&nbsp;
    <input class="buttoml" type="reset" value="Reset" /></p></td></tr> 
    
</table>


</form>










<footer>
	<div class="footer">
		<p id="yr">
			Copyright&copy;
		</p>
	</div>	
</footer>
	
</body>
</html>