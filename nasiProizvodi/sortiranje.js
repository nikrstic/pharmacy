let podrazumevano = document.getElementById("podrazumevano");
let opadajuce = document.querySelector("opadajuce");
let rastuce = document.getElementById("rastuce");

let select = document.getElementById('select');

let nizproizvoda=[{
    
    link: "../slike/izdvojeni proizvodi/caj.jpg",
    cena:338

},{

    link: "../slike/izdvojeni proizvodi/hansaplast.jpg",
    cena:310

},{
    link:"../slike/izdvojeni proizvodi/magnezijum.jpg",
    cena:468
},{
    link:"../slike/izdvojeni proizvodi/nutripharm.jpg",
    cena:1400
},{
    link:"../slike/izdvojeni proizvodi/orthomol.jpg",
    cena:6000
},{
    link:"../slike/izdvojeni proizvodi/pritisak.jpg",
    cena:8700
},{
    link:"../slike/izdvojeni proizvodi/sangreen.jpg",
    cena:6900
},{
    link:"../slike/izdvojeni proizvodi/tensilen.jpg",
    cena:750
}];

//deep copy
const nizproizvoda1 = structuredClone(nizproizvoda);

function default1(){
    nizproizvoda=structuredClone(nizproizvoda1);
    popuniTabelu();
}

select.addEventListener('change', e => {
    //console.log(e.target.value); ispisuje "rastuce" ili "opadajuce"
    if(e.target.value == "rastuce"){
        // kod
        sortirajrastuce();
    } 
    if(e.target.value=="opadajuce"){
        // kod
        sortirajopadajuce();
    }
    if(e.target.value=="podrazumevano"){
        default1();
    }
});
function sortirajrastuce(){
    nizproizvoda.sort(function(a,b){
        return a.cena-b.cena;
    });

    popuniTabelu();
}
function sortirajopadajuce(){
    nizproizvoda.sort(function(a,b){
        return b.cena-a.cena;
    });

    popuniTabelu();
}
rastuce.addEventListener("change", sortirajrastuce);
//popuniTabelu();

function popuniTabelu() {
    let tabela = document.getElementById("tabela");
    let text = "<tbody>";
    let c=-1;
    for(let i=0; i<nizproizvoda.length;i++){
        ++c;
        if(c%4==0 && c!=0)
            text+="<tr>";
            let d=c;
        text+="<td>";
        let slika= `<img src="${nizproizvoda[i].link}" alt="slika nije ucitana">`;
        let Cena=`<p>cena:${nizproizvoda[i].cena}</p>`
        text+=slika;
        text+=Cena;
        text+="</td>";
        if(c%4==0 && c!=0 && d == c+4)
            text+="</tr>";
        tabela.innerHTML = text;
    }
    
    text+="</tbody>";
    tabela.innerHTML = text;
}

//rastuce.addEventListener('select', sortirajrastuce());


//pozovi funkciju na ucitavanju
popuniTabelu();
