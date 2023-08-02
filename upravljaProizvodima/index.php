<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
      header("location: ../nasiProizvodi/");
      exit();
    }
    if (isset($_POST['submit'])) {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "apoteka";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      
      $ime = $_POST['ime'];
      $link = $_FILES['link']['name'];
      $cena = $_POST['cena'];
      $dostupnost = $_POST['dostupnost'];
      if (isset($_POST['popust'])) {
        $popust = 1;
      } else {
        $popust = 0;
    }
    
    //echo $link;
      $target = realpath(__DIR__ . '/../slike/') ."/" . basename($link);
    //echo $target;
      
    move_uploaded_file($_FILES['link']['tmp_name'], $target);
      $link = '../../slike/' . $link;
  
      $sql = "INSERT INTO products (ime,  link, cena, dostupnost, popust)
      VALUES ('$ime', '$link', '$cena', '$dostupnost', '$popust')";
      
      if (mysqli_query($conn, $sql)) {
        echo "Novi proizvod je uspešno dodat.";
      } else {
        echo "Došlo je do greške pri dodavanju proizvoda: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
    }
    
  ?>

<script>var target = <?php echo json_encode($target); ?>;</script>
<!DOCTYPE html>
<html>
<head>
  <title>Dodaj novi proizvod</title>
</head>
<body>
  <h1>Dodaj novi proizvod</h1>
  <form action="/nasiProizvodi/logout/index.php" method="post">
  <input type="submit" value="Logout">
</form>
  <form action="" method="post" enctype="multipart/form-data">

    <label for="ime">Ime proizvoda:</label>
    <input type="text" id="ime" name="ime">
    <br><br>
    <label for="slika">Slika:</label>
    <input type="file" id="slika" name="link">
    <br><br>
    <label id="cena" for="cena">Cena:</label>
    <input type="number" id="cena" name="cena">
    <br><br>
    <label for="dostupnost">Dostupnost:</label>
    <input type="number" id="dostupnost" name="dostupnost">
    <br>
    <label for="dostupnost">Na ovaj proizvod se obracunava popust pri unosu promo koda:</label>
    <input type = "checkbox" id="popust" name="popust">
    <br><br>
    <input type="submit" value="Dodaj proizvod" name="submit">
  </form>
  <h3>Poruke: </h3>
  <?php

$conn = mysqli_connect("localhost", "root", "", "apoteka");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ime, email, tema, poruka FROM kontaktirajte";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<div id='porukeKorisnika'>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>Ime: " . $row["ime"] . "</p>";
    echo "<p>Email: " . $row["email"] . "</p>";
    echo "<p>Tema: " . $row["tema"] . "</p>";
    echo "<p>Poruka: " . $row["poruka"] . "</p>";
    echo "<hr>";
  }
  echo "</div>";
} else {
  echo "No data found";
}

mysqli_close($conn);

?>
</body>
</html>
