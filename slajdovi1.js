slideIndex=1;
prikaziSlajdove();

function prikaziSlajdove() {
  let i;
  let slajdovi = document.getElementsByClassName("slajdovi");
  for (let i = 0; i < slajdovi.length; i++) {
    slajdovi[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slajdovi.length) {slideIndex = 1}
  slajdovi[slideIndex-1].style.display = "block";
  setTimeout(prikaziSlajdove, 4000); // Change image every 2 seconds
}

