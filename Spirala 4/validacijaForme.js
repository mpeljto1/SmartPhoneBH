function validiraj(string) {
	if(string == ime) var myVar= setInterval(validirajIme,100);
	if(string == email) var myVar= setInterval(validirajEmail,100);
	if(string == vrijemeObjave) setInterval(validirajVrijemeObjave,100);
}

function validirajIme() {
	var validirano = false;
	var ime = document.getElementById("ime");
	var imeRegex = /^[A-Za-z]{3,20}$/gm;
	if(!imeRegex.test(ime.value)) {
		ime.style.backgroundColor = "red";
		document.getElementById("pZaIme").innerHTML = "Ime ne moze biti prazno, sadržavati brojeve i mora biti minimalno 3 slova dugačko";
	} else { 
		ime.style.backgroundColor = "white";
		document.getElementById("pZaIme").innerHTML ="";
		validirano = true;
	}
	return validirano;
}

function validirajEmail() {
	var validirano = false;
	var ime = document.getElementById("ime").value;
	var email = document.getElementById("email");
	var str = email.value;
	var emailRegex = /^\w+\.\w+[^\.]@(hot|g)mail\.com$/gm;
	if(!(emailRegex.test(email.value) && (str.indexOf(ime) > -1)))  {
		email.style.backgroundColor = "red";
		document.getElementById("pZaEmail").innerHTML = "Email format: example.example@(hot ili g)mail.com + mora sadržavati ime";
	} else  {
		email.style.backgroundColor = "white";
		document.getElementById("pZaEmail").innerHTML ="";
		validirano = true;
	}
	return validirano;
}

function posalji() {
	if(validirajIme() && validirajEmail() && (document.getElementById("muško").checked || document.getElementById("žensko").checked) && (document.getElementById("smartphone").checked || document.getElementById("tablet").checked || document.getElementById("android").checked || document.getElementById("ios").checked || document.getElementById("ostalo").checked) && document.getElementById("komentar").value.length >0) {
		alert("Sve uredu!");
	}
	else {
		alert("POlja nisu ispravno popunjena!");
	}
	return false;
}

/*--------------------------------- validacije za dodavanje novosti ------------------------------------------------------------ */

