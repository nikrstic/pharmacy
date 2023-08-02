document.getElementById("formaZaKontakt").addEventListener("submit", function(event) {
    event.preventDefault();
    var ime = document.getElementById("ime").value;
    var email = document.getElementById("email").value;
    var tema = document.getElementById("tema").value;
    var poruka = document.getElementById("poruka").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit_form.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            alert("Poruka je uspesno poslata");
        }
    };
    xhr.send("ime=" + ime + "&email=" + email + "&tema=" + tema + "&poruka=" + poruka);
});