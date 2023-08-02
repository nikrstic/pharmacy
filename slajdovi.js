console.log("ksa");

let slideIndex = 1;
prikaziSlajdove(slideIndex);

// Next/previous controls
function sledeciSlajd(n) {
    prikaziSlajdove(slideIndex += n);
}

// Thumbnail image controls
function trenutniSlajd(n) {
  prikaziSlajdove(slideIndex = n);
}

function prikaziSlajdove(n) {
  let i;
  let slajdovi = document.getElementsByClassName("slajdovi");
  if (n > slajdovi.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slajdovi.length}
  for (i = 0; i < slajdovi.length; i++) {
    slajdovi[i].style.display = "none";
  }
  slajdovi[slideIndex-1].style.display = "block";
}