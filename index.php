<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoteka</title>
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css?ver=1.1">
    <link rel="stylesheet" href="css/navigacija.css?ver=1.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="row">
        <header id="header">
            <h1>Apoteka</h1>
            <i id="meniikonica" class="fa fa-reorder" style="font-size:36px" onClick="funkcijanav()"></i>
            <i id="meniikonicax" class="fa fa-times" style="font-size:48px;color:red" onClick="funkcijanav()"></i>
        </header>
    </div>
    <div class="row">
        <nav>
            <ul id="linkovi">
                <li><a href="">Pocetna</a></li>
                <li>
                    <a href="nasiProizvodi/index.php">Nasi proizvodi</a>
                </li>
                <li class="dropdown"><a>Prijatelji</a>
                    <div class="submenu">
                        <a href="https://www.apotekajankovic.rs/" target="_blank">Apoteka Jankovic</a>
                        <a href="https://shop.benu.rs/" target="_blank">Benu</a>
                        <a href="https://www.drmax.rs/" target="_blank">Dr.Max</a>
                    </div>
                </li>
                <li class="dropdown" ><a>Kontaktirajte nas</a>
                    <div class="submenu">
                        <a href="licnawebprezentacija/index.html">Kontaktirajte autora</a>
                        <a href="kontaktirajte/index.php">Kontaktirajte apoteku</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div id="divslajdova" class="row">
        <div class="slajdovi prelaz">
            <img src="slike/slideshow/bioderma.jpg" alt="slika nije ucitana">
        </div>
        <div class="slajdovi prelaz">
            <img src="slike/slideshow/kremezasuncanje.jpg" alt="slika nije ucitana">
        </div>
        <div class="slajdovi prelaz">
            <img src="slike/slideshow/noreva.jpg" alt="slika nije ucitana">
        </div>
        <a class="prethodno" onclick="sledeciSlajd(-1)">&#10094;</a>
        <a class="sledece" onclick="sledeciSlajd(1)">&#10095;</a>
    </div>
    <div class="row">

    </div> 
    <div id="kupciRow" class="row">
        <div id="kupciONama" class="row">
        
        </div>
        <div id="divabs"> 
            <div class="uonama"><p>Već duže vreme koristim vaš losion za dubinsko čišćenje lica koji  mi pomaže da regulišem preterano mašćenje kože. Odlični ste, nastaviću da vas preporučujem svima koji imaju sličan problem kao i ja !</p></div>
            <div class="uonama">Preporučujem svima koji imaju proširene vene da probaju Herba Venin. Bol i otečenost u nogama su nestali, a proširene vene se mnogo manje vide. Mnogo srdačnih pozdrava.</div>
            <div class="uonama">Najbolja apoteka u kraju, a i šire! Uvek tu da mi preporučite i posavetujete šta je najbolje. Nećemo vas menjati.</div>
        </div>
    </div>
    
    
    <div class="row" id="tabela">
        <table>
            <tbody>
            <tr>
                <td>
                    <img src="slike/izdvojeni proizvodi/caj.jpg" alt="slika proizvoda nije ucitana">
                    
                    <p>338 din. </p>
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/hansaplast.jpg" alt="slika proizvoda nije ucitana">
                    <p>310 din.</p>
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/magnezijum.jpg" alt="slika proizvoda nije ucitana">
                    <p>468 din.</p>
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/nutripharm.jpg" alt="slika proizvoda nije ucitana">
                    <p>1400 din.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="slike/izdvojeni proizvodi/orthomol.jpg" alt="slika proizvoda nije ucitana">
                    <p>6000 din.</p>  
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/pritisak.jpg" alt="slika proizvoda nije ucitana">
                    <p>8700 din.</p>
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/sangreen.jpg" alt="slika proizvoda nije ucitana">
                    <p>6900 din.</p>
                </td>
                <td>
                    <img src="slike/izdvojeni proizvodi/tensilen.jpg" alt="slika proizvoda nije ucitana">
                    <p>750 din.</p>
                </td>
            </tr>
            
        </tbody>
        </table>
    </div>
    <hr>
   
    <div id="parallax" class="row">
		<img src="slike/slideshow/bioderma.jpg" class="row">
        <footer class="row">
                <h4>© 2022 ni_krstic, Inc. All Rights Reserved</h4>
        </footer>
    </div>
   

    <div id="strelica">
        <a href="#header">&#8593;</a>
    </div>
    
    <script src="javascript/navigacija.js?ver=1.1"></script>
    <script src="javascript/slajdovi1.js?ver=1.1"></script>
    <script src="javascript/pocetna.js?ver=1.1"></script>
</body>
</html>