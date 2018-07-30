var intervalo;
var hora    = document.getElementById("hora")
var segundo = document.getElementById("segundo")
var minuto  = document.getElementById("minuto")

function tempo(op) 
{
	if (op == 1) 
	{
		document.getElementById('parar').style.display  = "block"
		document.getElementById('comeca').style.display = "none"
	}

	var s = 1
	var m = 0
    var h = 0
    
	intervalo = window.setInterval(function() 
	{
		if (s == 60) { m++; s = 0; }
		if (m == 60) { h++; s = 0; m = 0; }
		if (h < 10) hora.innerHTML = "0" + h + ":"; else hora.innerHTML = h + ":"
		if (s < 10) segundo.innerHTML = "0" + s; else segundo.innerHTML = s
		if (m < 10) minuto.innerHTML = "0" + m + ":"; else minuto.innerHTML = m + ":"		
		s++;
	},1000);
}

function stop_time() 
{
	window.clearInterval(intervalo)
	document.getElementById('parar').style.display  = "none"
    document.getElementById('comeca').style.display = "block"
}