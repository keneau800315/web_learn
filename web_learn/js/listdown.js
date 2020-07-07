//列表下拉單


function toggleMenu(number){
    var menu = document.getElementById('menu-'+number);
    //使用classList物件的toggle方法  
    menu.classList.toggle('hide');
}

function closeMenu(number){
    var menu = document.getElementById('menu-'+number);  
    menu.classList.add('hide');
}
//向下相容element.attachEvent()
//element.addEventListener('event',functionName,Boolean)
//加入一個事件監聽器至DOM element節點
//Boolean事件流程模式,true事件補捉(capture)模式外層元件向內，false事件氣泡(bubble)
//e.stopPropagation() 停止事件傳遞
var el = document.getElementsByClassName('ls-down');


let switchnum =0;
for(let i=0;i<el.length;i++){ 
    //帶入參數使用匿名函式
    el[i].addEventListener('click',function(){ 
    if( i == switchnum){    
        toggleMenu(i);
        switchnum = i;             
    }else{
        toggleMenu(i);    
        closeMenu(switchnum);
        switchnum = i; 
    }
    },false); 
};

//document.addEventListener('mousedown',function(){ closeMenu(switchnum);},false);

