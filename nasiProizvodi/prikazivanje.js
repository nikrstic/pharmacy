var l = document.querySelector("#login");
var r = document.querySelector("#register");
l.addEventListener("click",()=>{
    document.querySelector(`.main-wrapper`).style.display=`block`;
    });
   document.querySelector(`#closeModal`).addEventListener(`click`,()=>{
       document.querySelector(`.custom-modal`).style.display=`none`;
   });  

r.addEventListener("click", ()=>{
    document.querySelector("#registration-form").style.display = `block`;
    window.scrollTo(0, 0);
});