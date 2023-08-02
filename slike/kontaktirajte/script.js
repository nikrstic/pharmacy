let posalji= document.querySelector('input[type=submit]');
let inputIme=document.getElementById("ime");
let spanObaveznoIme= document.getElementById("obaveznoIme");
let inputPoruka= document.getElementById("poruka");
let spanObaveznaPoruka = document.getElementById("obaveznaPoruka");
let p=document.getElementById("p");
console.log("radi");
posalji.addEventListener("click", e=> {
    //console.log(e);
    e.preventDefault();
    // da li je sve uneto
    let ok = 1;
    valueIme = inputIme.value;
    if(valueIme==""){
        spanObaveznoIme.innerHTML="Morate uneti ime!";
        spanObaveznoIme.style.color="red";
        ok=0;
    }
    valuePoruka = inputPoruka.value;
    if(valuePoruka==""){
        spanObaveznaPoruka.innerHTML="Morate uneti poruku!";
        spanObaveznaPoruka.style.color="red";
        ok=0
    }

	if(ok){
		 p.innerHTML+= "Poruka je uspesno poslata!";
		 p.style.color="green";
	}
})