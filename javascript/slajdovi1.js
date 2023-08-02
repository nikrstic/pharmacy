slideIndex=1;
let trajanjeSlajda=2000;
let slajdovi = document.getElementsByClassName("slajdovi");
var timeout = null;

prikaziSlajdove();
function prikaziSlajdove(n = 1) {
  
  for (let i = 0; i < slajdovi.length; i++) {
    slajdovi[i].style.display = "none";
  }

  slideIndex += n;

  if (slideIndex > slajdovi.length) slideIndex = 1;
  else if (slideIndex <= 0) slideIndex = slajdovi.length;

  slajdovi[slideIndex-1].style.display = "block";
  timeout = setTimeout(prikaziSlajdove, trajanjeSlajda);// Change image every 2 seconds
}
//let slideIndex = 1;
//prikaziSlajdove(slideIndex);

// Next/previous controls

function sledeciSlajd(n) {
  if (timeout != null) {
    clearTimeout(timeout);
    timeout = null;
  }
  prikaziSlajdove(n);
}
