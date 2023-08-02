<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("location: ../");
  exit();
}

$conn = mysqli_connect("localhost", "root", "", "apoteka");

if (!$conn) {
    die("Neuspesna konekcija: " . mysqli_connect_error());
}


$sql = "SELECT * FROM products WHERE dostupnost > 0";
$result = mysqli_query($conn, $sql);


$nizproizvoda = array();


while ($row = mysqli_fetch_assoc($result)) {
  
  $nizproizvoda[] = (object) [
    "id" => $row["id"],
    'ime' => $row["ime"],
    "link" => $row["link"],
    "cena" => $row["cena"],
    "dostupnost" => $row["dostupnost"]
  ];
}

mysqli_close($conn);
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
    <link rel="stylesheet" href = "../../css/navigacija.css">
    <!-- <link rel="stylesheet" href="../style.css?ver=1.1"> -->
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
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
                    <a href="">Nasi proizvodi</a>
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
                        <a href="../licnawebprezentacija/index.html">Kontaktirajte autora</a>
                        <a href="../kontaktirajte/index.html">Kontaktirajte apoteku</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <form action="/nasiProizvodi/logout/index.php" method="post">
  <input id="logout" type="submit" value="Logout">
</form>
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
    <label id = "cena" >cena: 0 </label> 

    <button id = "kupi" >Kupi</button>
    <div id = 'plati'>
    <h1>Payment Information</h1>
    <div action="process_payment.php" method="post">
      <label for="card-number">broj kartice:</label>
      <input type="text" id="card-number" name="card-number" required>
      <br><br>
      <label for="card-expiration">datum isteka:</label>
      <input type="date" id="card-expiration" name="card-expiration" required>
      <br><br>
      <label for="card-cvc">CVC:</label>
      <input type="text" id="card-cvc" name="card-cvc" required>
      <br><br>
      <input id ="posalji" type="submit" value="Submit Payment">
    </div>
  </div>

<script>
 
  var nizproizvoda = <?php echo json_encode($nizproizvoda); ?>;

 console.log(nizproizvoda); 
</script>
 <script src="proizvodi.js"></script>
 
</body>
</html>