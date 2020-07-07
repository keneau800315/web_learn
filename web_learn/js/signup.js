var xhr ;
function stateChanged(){  
  console.log(xhr.readyState);
  if( xhr.readyState == 4){  
    switch( xhr.status ){             
      case 200:     
    console.log(xhr.responseText);
    window.alert(xhr.responseText);
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
//  console.log(xhr.readyState);
  xhr.onreadystatechange = stateChanged;
  var url = "checkMemId.php?memId=" + document.getElementById("memId").value;
  xhr.open("Get",url,true);   
  xhr.send(null);  
}


