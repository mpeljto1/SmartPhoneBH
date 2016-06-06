window.onload = function () {
	var vremenaObjava = document.getElementsByClassName("vrijemeObjave");
	var porukaObjave = document.getElementsByClassName("porukaObjave");
	var x ;
	for(var i =0 ; i<vremenaObjava.length; i++) {
		var danasnjiDatum = new Date();
		vremenaObjava[i].style.display = "none";
		x = vremenaObjava[i].innerHTML;
		var datumObjave = new Date(x);
		/*if(datumObjave.getTime() <= danasnjiDatum.getTime())*/ var razlika_u_s = (danasnjiDatum.getTime() - datumObjave.getTime())/1000;
		/*else porukaObjave[i].innerHTML = "Nevalja datum objave";*/
		var razlika_u_m = razlika_u_s/60;
		var razlika_u_h = razlika_u_m/60;
		var razlika_u_d = razlika_u_h/24;
		var razlika_u_sedmicama = razlika_u_d/7;
		if(razlika_u_s <=59) {
			porukaObjave[i].innerHTML = "Novost objavljena prije par sekundi";
		} else if(razlika_u_m <=59) {
			if(Math.round(razlika_u_m) >=11 && Math.round(razlika_u_m)<=14) porukaObjave[i].innerHTML = "Novost objavljena prije " + Math.round(razlika_u_m) + " minuta";
			else {
				switch (Math.round(razlika_u_m) % 10) {
					case 1:
						porukaObjave[i].innerHTML = "Novost objavljena prije " + Math.round(razlika_u_m) + " minutu";
						break;
					case 2:
					case 3:
					case 4:
						porukaObjave[i].innerHTML = "Novost objavljena prije " + Math.round(razlika_u_m) + " minute";
						break;
					default:
						porukaObjave[i].innerHTML = "Novost objavljena prije " + Math.round(razlika_u_m) + " minuta";
				}
			}
		} else if(razlika_u_h <24) {
			if(Math.round(razlika_u_h) >=11 && Math.round(razlika_u_h)<=14) porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_h) + " sati";
			else {
				switch (Math.round(razlika_u_h) % 10) {
					case 1:
						porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_h) + " sat";
						break;
					case 2:
					case 3:
					case 4:
						porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_h) + " sata";
						break;
					default:
						porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_h) + " sati";
				}
			}
		} else if(Math.round(razlika_u_d) < 7) {
			switch(Math.round(razlika_u_d) %10) {
				case 1:
					porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_d) + " dan";
					break;
				default:
					porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_d) + " dana";
			}
			
		} else if((datumObjave.getDate()+7 <= danasnjiDatum.getDate() && datumObjave.getMonth() === danasnjiDatum.getMonth()) 
			|| (datumObjave.getMonth() === danasnjiDatum.getMonth()-1 && datumObjave.getDate() >= danasnjiDatum.getDate())) {
			porukaObjave[i].innerHTML = "Novost je objavljena prije " + Math.round(razlika_u_sedmicama) + " sedmice";
		} else  {
			porukaObjave[i].innerHTML = "Novost je objavljena: " + datumObjave.getDate() + "." + (datumObjave.getMonth()+1) + "." + datumObjave.getFullYear()+ ".";
		}	
	}
	
}