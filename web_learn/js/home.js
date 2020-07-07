

let member={};
function getLoginInfo(){
    //查看session紀錄
  let xhr = new XMLHttpRequest();
  xhr.onload = function(){
    if(xhr.status == 200){
      member = JSON.parse(xhr.responseText);
      if(member.memId){
        document.getElementById("memName").innerText = member.memName;
        document.getElementById("Login_bu").innerText = "Logout";  
      }
    }
  }

  xhr.open("get", "phps/getLoginInfo.php");
  xhr.send(null);
}//getLoginInfo 


function showLoginForm(){
  //檢查登入bar面版上 login_bu 的字是登入或登出
  //如果是登入，就顯示登入用的燈箱(lightBox)
  //如果是登出
  //將登入bar面版上，登入者資料清空 
  //spanLogin的字改成登入
  //將頁面上的使用者資料清掉
  if(document.getElementById('login_bu').innerHTML == "Login"){
     document.getElementById('lightBox').style.display = 'block';
    }else{ //登出
     //回server端,登出清除session
     let xhr = new XMLHttpRequest();
     xhr.onload = function(){
       if(xhr.status == 200){
         document.getElementById('memName').innerHTML = '';
         document.getElementById('login_bu').innerHTML = 'Login';
        }else{
         alert(xhr.status);
        }
        }
     xhr.open("Get", "phps/ajaxLogout.php",true);
     xhr.send(null);
    }
}//showLoginForm


function sendForm(){
  //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上
  //---------------------------------------
    let xhr = new XMLHttpRequest();
    xhr.onload = function(){
        if(xhr.status == 200){
          let member = JSON.parse(xhr.responseText);
          if(member.memId){
            document.getElementById("memName").innerText = member.memName;
            document.getElementById("login_bu").innerText = "Logout";
            document.getElementById('alert').setAttribute('class','hide'); 

          }else if(member.memId == undefined){
          	document.getElementById('lightBox').style.display = 'block';
            document.getElementById('alert').setAttribute('class','visual');

          }

        }else{
          alert(xhr.status);
        }
      }

      xhr.open("Post", "phps/ajaxLogin.php",true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      let data_info = `memId=${document.getElementById("memId").value}&memPsw=${document.getElementById("memPsw").value}`;
      xhr.send(data_info);
      //---------------------------------------  

      //將登入表單上的資料清空，並隱藏起來
      document.getElementById('lightBox').style.display = 'none';
      document.getElementById('memId').value = '';
      document.getElementById('memPsw').value = '';
      
}//sendFrom

function cancelLogin(){
   	//將登入表單上的資料清空，並將燈箱隱藏起來
   	document.getElementById('lightBox').style.display = 'none';
   	document.getElementById('memId').value = '';
   	document.getElementById('memPsw').value = '';
    }

window.addEventListener("load", function(){
	getLoginInfo();
	document.getElementById('login_bu').onclick = showLoginForm;
	document.getElementById('btnLogin').onclick = sendForm;
	document.getElementById('btnLoginCancel').onclick = cancelLogin;
});
