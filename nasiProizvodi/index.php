<?php
 //include '../php/register.php'; 
 $conn = mysqli_connect('localhost', 'root', '', 'apoteka');
 if(isset($_POST['ponovi_lozinku']))
{
    $username = mysqli_real_escape_string($conn, $_POST['korisnicko_ime']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lozinka = mysqli_real_escape_string($conn, md5($_POST['lozinka']));
    $ponovi_lozinku = mysqli_real_escape_string($conn, md5($_POST['ponovi_lozinku']));
    $select = mysqli_query($conn, "SELECT * FROM `registracija` WHERE username='$username' OR email = '$email'") or die('upit nije uspeo');
    if(mysqli_num_rows($select) > 0){
        $poruka[] = 'Korisnik sa istim korisnickim imenom ili sa istim mejlom vec posotoji';

    }
    else{
        mysqli_query($conn, "INSERT INTO `registracija` (username, lozinka, email) VALUES ('$username','$lozinka','$email')") or die('upit nije uspeo');
        $poruka[] = 'Uspesno ste napravili nalog!';
    }
}

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'apoteka');
if(isset($_POST['login_username']) && isset($_POST['login_password']))
{
    $username = mysqli_real_escape_string($conn, $_POST['login_username']);
    $lozinka = mysqli_real_escape_string($conn, md5($_POST['login_password']));
    
    $select = mysqli_query($conn, "SELECT * FROM `registracija` WHERE username = '$username' AND lozinka = '$lozinka' ") or die("neuspesan upit"); 
    if(mysqli_num_rows($select)>0){
        $row = mysqli_fetch_assoc($select);
        
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['admin'] = $row['admin'];
        if($_SESSION['admin']){
            header("location: ../upravljaProizvodima/index.php");
        } else {
            header("location: login/");
        }
        $poruka = "Uspesno logovanje!";
    }   
    else{
        $poruka = "Logovanje neuspesno!";
    }
    

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100&display=swap" rel="stylesheet">
        
    <link rel="stylesheet" href="../css/navigacija.css?ver=1.1">
    <link rel="stylesheet" href="style.css?ver=1.1">
    <link rel="stylesheet" href="style1.css">
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
    <div class="rows">
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
                <li class="dropdown" ><a>Kontaktirajte nas</a>
                    <div class="submenu">
                        <a href="../../licnawebprezentacija/index.html">Kontaktirajte autora</a>
                        <a href="../kontaktirajte/index.php">Kontaktirajte apoteku</a>
                    </div>
                </li>
</ul>
        </nav>
    </div>
            <form action="">
            <p>
                <label for="">Sortiraj po: </label>
                <select id="select">
                    <option value="podrazumevano" id="podrazumevano">Podrazumevano</option>
                    <option value="rastuce" id="rastuce" >Rastuce</option>
                    <option value="opadajuce" id="opadajuce">Opadajuce</option>
                </select>
                
            </p>
        </form>
    </div>
    <div>
        <table id="tabela">
            
        </table>
    </div>

    <div class="main-wrapper">
        <form method="post" name = "login_form" id="loginForm">
            <h2 class="black">Login</h2>
            <div>
                <label class="black" >username:</label>
                <input type="text" name="login_username" id="login_email" placeholder="username">
            </div>
            <div>
                <label class="black">Lozinka:</label>
                <input type="password" name="login_password" id="login_password" placeholder="**********">
            </div>

            <script>
                 var poruka = <?php if(isset($poruka)) echo json_encode($poruka);else echo json_encode(""); ?>;
                if(poruka){
                alert(poruka);
                }
            </script>

            <div>
                <input type="submit" value="Uloguj se">
                
            </div>
        </form>
    </div>
    <div id="registration-form" class="custom-modal">
        <button id="closeModal" style="color:white;">X</button>
        <form  id="regForm" method="post">
            <h2>Registration</h2>
            <?php
            if(isset($poruka)){
                    echo '<div id="poruka" onclick= "this.remove();" > .$poruka. </div>';
                
            }

            ?>
            <div>
                <label for="">Korisničko ime:</label>
                <input type="text" name="korisnicko_ime" id="korisnicko_ime" placeholder="Petar123">
            </div>
            <div>
                <label for="">Email:</label>
                <input type="email" name="email" id="email" placeholder="mail@gmail.com">
            </div>
            <div>
                <label for="">Lozinka:</label>
                <input type="password" name="lozinka" id="lozinka" placeholder="******">
            </div>
            <div>
                <label for="">Ponovi lozinku:</label>
                <input type="password" name="ponovi_lozinku" id="ponovi_lozinku" placeholder="******">
            </div>
            <div>
                <button name="posalji-reg">Registruj se</button>
            </div>
        </form>
    </div> 
    
    <div class="no-acc-register">
        <p>Nemaš nalog?</p>
        <button id="login">Uloguj se</button>
        <button id="register">Registruj se</button>
    </div>
    
    <script src="../javascript/Validator.js?ver=1.1" ></script>
    
    <script src="../javascript/navigacija.js?ver=1.1"></script>
    <script src="sortiranje.js?ver=1.1"></script>
    <script src="prikazivanje.js?ver=1.1"></script>
    <script src="../nasiProizvodi/reg-form.js"> </script>
</body>
</html>