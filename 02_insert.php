<?php

include 'db_credentials.php';

// Vervolledig deze functie die een SQL-connectie en een bericht als parameter neemt
// en dit bericht toevoegt aan de tabel, met als datum het huidige tijdstip.
// MySQL kent de functie `now()` die het huidige tijdstip voorstelt, dus je hoeft
// dit niet persé in php te doen.

function voegBerichtToe($conn, $inhoud) {
    $sql = "INSERT INTO messages(inhoud, tijdstip)
        VALUES('$inhoud', now())";
    $conn->exec($sql);
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo getdate();
    voegBerichtToe($conn, "Testbericht ");
    echo "Bericht toegevoegd op " . date('Y-m-d H:i:s') . " ... Check de tabel in de database...";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
