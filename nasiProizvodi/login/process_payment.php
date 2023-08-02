<?php
    $conn = mysqli_connect("localhost", "root", "", "apoteka");

    if (!$conn) {
        die("Neuspesna konekcija: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $proizvodi = json_decode(file_get_contents('php://input'));

       foreach ($proizvodi as $proizvod) {
            $query = "UPDATE products SET dostupnost=dostupnost-".$proizvod->broj." WHERE id=".$proizvod->id.";";
            mysqli_query($conn, $query);
        }
        $query = "UPDATE products SET dostupnost=0 WHERE dostupnost<0";
        mysqli_query($conn, $query);
    }

    mysqli_close($conn);
?>