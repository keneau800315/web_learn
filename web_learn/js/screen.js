
function showStocks(json){
 
  document.getElementById("showPanel").innerHTML = ''; 
  let stockRows = JSON.parse(json);
  let html="";
  html += `<table >	
	<tr><th>時間</th><th>股票代號</th><th>股票價格</th><th>月增率</th>
	<th>年增率</th><th>ROE</th></tr>`
  for(let i in stockRows){
  html +=  `<tr><td>${stockRows[i].TimeM}</td><td>${stockRows[i].Stock_ID}</td><td>${stockRows[i].PriceM}</td><td>${stockRows[i].MOM}</td><td>${stockRows[i].YOY}</td><td>${stockRows[i].ROE}</td></tr>`;
  }
  html += `</table>`;
  document.getElementById("showPanel").innerHTML = html;
} 




function getStocks(orderType){
  //XMLHttpRequest物件處理Ajax請求
  var xhr = new XMLHttpRequest();
	xhr.onload = function(){
  //xhr.readyState == 4
		if(xhr.status == 200){
    //成功回傳資料 
			showStocks(xhr.responseText);
		}else{
			alert(xhr.status);
		}
	}

  let url = `phps/getfetchAll.php?orderType=${orderType}`;

  xhr.open("get", url, true);
  //準備請求發送,(HTTP方法,請求url,true非同步)
  
  xhr.send(null);
  //送出資料
}//getStocks




function orderByType(e){
	getStocks(e.target.value);
}



//事件監聽器
window.addEventListener("load",function(){	
	document.getElementById('orderByType').addEventListener("change", orderByType, false);
},false);


