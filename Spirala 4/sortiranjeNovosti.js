function danasnjeNovosti() {

	vratiNaDefault();
	var x = document.getElementsByClassName("vrijemeObjave");
	var y = document.getElementsByClassName("novosti");
	for(var i=0; i<x.length; i++) {
		var danasnjiDatum = new Date();
		var temp = x[i].innerHTML;
		var datumObjave = new Date(temp);
		if(datumObjave.getDate() > danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() > danasnjiDatum.getHours()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() == danasnjiDatum.getHours() && datumObjave.getMinutes() > danasnjiDatum.getMinutes()) y[i].style.display = "none";
		if(!(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getFullYear() == danasnjiDatum.getFullYear())) {
			y[i].style.display = "none";	
		}
	}
	return false;
}


function novostiOveSedmice() {

	vratiNaDefault();
	var x = document.getElementsByClassName("vrijemeObjave");
	var y = document.getElementsByClassName("novosti");
	for(var i=0; i<x.length; i++) {
		var danasnjiDatum = new Date();
		var temp = x[i].innerHTML;
		var datumObjave = new Date(temp);
		if(datumObjave.getDate() > danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() > danasnjiDatum.getHours()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() == danasnjiDatum.getHours() && datumObjave.getMinutes() > danasnjiDatum.getMinutes()) y[i].style.display = "none"; 
		var danUSedmici = danasnjiDatum.getDay();
		var danUSedmici2 = datumObjave.getDay();
		if(danUSedmici2 == 0) danUSedmici2 = 7;
		if(danUSedmici == 0) danUSedmici = 7;
		var pocetakSedmice = new Date(danasnjiDatum.setHours(-24*(danUSedmici-1),0,0));
	
		if(pocetakSedmice.getMonth() == datumObjave.getMonth() && pocetakSedmice.getFullYear() == datumObjave.getFullYear()) {
			if(!(datumObjave.getDate() >= pocetakSedmice.getDate() && danUSedmici2<=danUSedmici)) {
				y[i].style.display = "none";	
			}
		} else if(pocetakSedmice.getFullYear() == datumObjave.getFullYear() && pocetakSedmice.getMonth() != datumObjave.getMonth()) {
				if(datumObjave.getDate() > danasnjiDatum.getDate()) {
					y[i].style.display = "none";
				}
		}
		else {
			y[i].style.display = "none";
		}
	}

	return false;
}

function novostiOvogMjeseca() {

	vratiNaDefault();
	var x = document.getElementsByClassName("vrijemeObjave");
	var y = document.getElementsByClassName("novosti");
	for(var i=0; i<x.length; i++) {
		var danasnjiDatum = new Date();
		var temp = x[i].innerHTML;
		var datumObjave = new Date(temp);
		if(datumObjave.getDate() > danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() > danasnjiDatum.getHours()) y[i].style.display = "none";
		if(datumObjave.getDate() == danasnjiDatum.getDate() && datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getHours() == danasnjiDatum.getHours() && datumObjave.getMinutes() > danasnjiDatum.getMinutes()) y[i].style.display = "none";
		if(!(datumObjave.getMonth() == danasnjiDatum.getMonth() && datumObjave.getFullYear() == danasnjiDatum.getFullYear())) {
			y[i].style.display = "none";	
		}
	}
	return false;
}

function sveNovosti() {

	var y = document.getElementsByClassName("novosti");
	for(var i=0; i<y.length; i++) {
		if(y[i].style.display == "none") y[i].style.display = "inline-block";
	}
	return false;
}

function vratiNaDefault() {
	var y = document.getElementsByClassName("novosti");
	for(var i=0; i<y.length; i++) {
		if(y[i].style.display == "none") y[i].style.display = "inline-block";
	}
}
