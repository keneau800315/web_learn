
//h2標題

var today = new Date()
var hourNow = today.getHours()
var greeting;

if (hourNow > 18){
	greeting = '晚安';
} else if (hourNow > 12){
	greeting = '下午好';
} else if (hourNow >0){
	greeting = '早安';
} else{
	greeting = '你好';
}

var gr = document.getElementById('greeting');
gr.textContent = (greeting + '，輕鬆規劃人生');


//footer copyright

var today = new Date()
var year = today.getFullYear();
var yr = document.getElementById('yr');
yr.innerHTML ='Copyright&copy;'+year;