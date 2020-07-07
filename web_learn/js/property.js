var property ={
	name:'myaccount',
	balance:0,
	checkAvailable: function(){
		return this.balance;
	}
}

var gr = document.getElementById('greeting');
gr.textContent = property.checkAvailable();

//footer copyright

