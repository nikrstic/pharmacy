let podrazumevano = document.getElementById("podrazumevano");
let opadajuce = document.querySelector("opadajuce");
let rastuce = document.getElementById("rastuce");

let select = document.getElementById('select');

//deep copy
const nizproizvoda1 = structuredClone(nizproizvoda);

function default1() {
    nizproizvoda = structuredClone(nizproizvoda1);
    popuniTabelu();
}

select.addEventListener('change', e => {
    //console.log(e.target.value); ispisuje "rastuce" ili "opadajuce"
    if (e.target.value == "rastuce") {
        // kod
        sortirajrastuce();
    }
    if (e.target.value == "opadajuce") {
        // kod
        sortirajopadajuce();
    }
    if (e.target.value == "podrazumevano") {
        default1();
    }
});

function sortirajrastuce() {
    nizproizvoda.sort(function(a, b) {
        return a.cena - b.cena;
    });

    popuniTabelu();
}

function sortirajopadajuce() {
    nizproizvoda.sort(function(a, b) {
        return b.cena - a.cena;
    });

    popuniTabelu();
}
rastuce.addEventListener("change", sortirajrastuce);
//popuniTabelu();

function popuniTabelu() {
    let tabela = document.getElementById("tabela");
    let text = "<tbody>";
    let c = -1;
    for (let i = 0; i < nizproizvoda.length; i++) {
        ++c;
        if (c % 4 == 0 && c != 0)
            text += "<tr>";
        let d = c;
        text += "<td>";
        let ime = `<label>${nizproizvoda[i].ime}</label>`;
        text += ime;
        let slika = `<img src="${nizproizvoda[i].link}" alt="slika nije ucitana">`;
        let Cena = `<p>cena:${nizproizvoda[i].cena}</p>`
        text += slika;
        text += Cena;
        text += `<label for="counter">Kolicina:</label>
    <input type="number" class = "counter" id="counter${i}"  name="counter" min="0" max="100" value="0">`
        text += "</td>";
        if (c % 4 == 0 && c != 0 && d == c + 4)
            text += "</tr>";
        tabela.innerHTML = text;
    }

    text += "</tbody>";
    tabela.innerHTML = text;
}

//rastuce.addEventListener('select', sortirajrastuce());


//pozovi funkciju na ucitavanju
popuniTabelu();

function izracunajCenu() {
    let sum = 0;
    for (let i = 0; i < nizproizvoda.length; i++) {
        a = document.getElementById(`counter${i}`);
        c = a.value;
        sum += nizproizvoda[i].cena * c;
    }
    console.log("CENA:" + sum);
    return sum;
}


var elements = document.getElementsByClassName("counter");

var myFunction = function() {
    let cena = izracunajCenu();
    document.getElementById("cena").innerHTML = "cena: " +
        cena;
};

for (var i = 0; i < nizproizvoda.length; i++) {
    elements[i].addEventListener('click', myFunction, false);
}




/*
document.querySelector(".counter").addEventListener("click", function() {
    let cena = izracunajCenu();
    document.getElementById("cena").innerHTML = "cena: " +
        cena;
})
*/
document.getElementById("kupi").addEventListener("click", function() {
    let cena = izracunajCenu();
    if (cena > 0) {
        document.getElementById("plati").style.display = "block";
    } else {
        window.alert("niste odabrali ni jedan proizvod!");

    }
})

/*placanje*/

document.getElementById("posalji").addEventListener("click", function() {
    alert("Uspesno!");
    setTimeout(() => {window.location.reload();}, 2000);

    let kupljeniProizvodi = [];
    for (let i = 0; i < nizproizvoda.length; i++) {
        broj = document.getElementById(`counter${i}`).value;
        if (broj > 0) {
            kupljeniProizvodi.push({id: nizproizvoda[i].id, broj: broj});
        }
    }

    let data = kupljeniProizvodi;
    fetch('process_payment.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then((response) => response.text())
    .then((data) => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});