<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/navigacija.css?ver=1.1">
    <link rel="stylesheet" href="style.css?ver=1.1">
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100&display=swap" rel="stylesheet">

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
                <li><a href="../index.php">Pocetna</a></li>
                <li>
                    <a href="../nasiProizvodi/index.php">Nasi proizvodi</a>
                </li>
                <li class="dropdown"><a>Prijatelji</a>
                    <div class="submenu">
                        <a href="https://www.apotekajankovic.rs/" target="_blank">Apoteka Jankovic</a>
                        <a href="https://shop.benu.rs/" target="_blank">Benu</a>
                        <a href="https://www.drmax.rs/" target="_blank">Dr.Max</a>
                    </div>
                </li>
                <li class="dropdown"><a>Kontaktirajte nas</a>
                    <div class="submenu">
                        <a href="../licnawebprezentacija/index.html">Kontaktirajte autora</a>
                        <a href="#">Kontaktirajte apoteku</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row" id="kontaktirajte">
        <h1>Kontaktirajte nas</h1>
    </div>
    <div class="row">
        <div id="formaMapa">
            <div id="forma">
                <form id="formaZaKontakt" method="post" action="submit">
                    <p>
                        <label for="">Ime</label>
                        <span id="obaveznoIme" class="err">*</span>
                    </p>
                    <p><input type="text" name="ime" id="ime" placeholder="Unesite vase ime"></p>
                    <p>
                        <label for="">Email</label>
                    </p>
                    <p><input type="email" name="email" id="email" placeholder="Unesite vas email"></p>
                    <p>
                        <label for="">Tema</label>
                    </p>
                    <p>
                        <input type="text" name="tema" id="tema" placeholder="Unesite naslov"></p>
                    </p>
                    <p>
                        <label for="">Poruka</label>
                        <span id="obaveznaPoruka" class="err">*</span>
                    </p>
                    <p>
                        <textarea name="poruka" id="poruka" cols="30" rows="10" placeholder="Unesite tekst poruke"></textarea>
                    </p>
                    <p>
                        <!--<input type="submit"  value="posalji">-->
                        <button id="posalji" type="submit">Posalji</button>
                    </p>
                    <p id="p">

                    </p>
                </form>
            </div>
            <div id="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3121.8944462694317!2d21.893218217667098!3d43.320926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b15f656bf31d%3A0x556edf948a8e6874!2sApoteka%20Dr.Max!5e1!3m2!1ssr!2srs!4v1653301160802!5m2!1ssr!2srs"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?php
$conn = mysqli_connect("localhost", "root", "", "apoteka");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['ime']) && isset($_POST['email']) && isset($_POST['tema']) && isset($_POST['poruka'])) {
    $ime = mysqli_real_escape_string($conn, $_POST['ime']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tema = mysqli_real_escape_string($conn, $_POST['tema']);
    $poruka = mysqli_real_escape_string($conn, $_POST['poruka']);
    /*
    $ime = $_POST["ime"];
    $email = $_POST["email"];
    $tema = $_POST["tema"];
    $poruka = $_POST["poruka"];
    */

    $sql = "INSERT INTO kontaktirajte (ime, email, tema, poruka)
VALUES ('$ime', '$email', '$tema', '$poruka')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Uspesno poslato";
    } else {
        echo "Greska pri ubacivanju: " . mysqli_error($conn);
    }
    
    //print_r($_POST);
    
}
mysqli_close($conn);

?>
    <div class="row">
        <footer>
            <h4>© 2022 ni_krstic, Inc. All Rights Reserved</h4>
        </footer>
    </div>
    <div id="strelica">
        <a href="#header">&#8593;</a>
    </div>
    
    <script src="../javascript/navigacija.js?ver=1.1"></script>
    <script src="script.js?ver=1.1"></script>
    


</body>

</html>