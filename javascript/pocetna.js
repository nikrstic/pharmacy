//resize slike na dnu da se prilagodi sirini ekrana
function resizeParallax() {
    document.body.style.paddingBottom = document.body.clientWidth / 1260 * 416 + document.querySelector("footer").clientHeight +  "px";
}

window.addEventListener("resize", resizeParallax);
resizeParallax();