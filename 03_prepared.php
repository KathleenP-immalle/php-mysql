<?php

include 'db_credentials.php';

function voegBerichtToe($conn, $inhoud) {
    $sql = "INSERT INTO messages(inhoud, tijdstip)
        VALUES('$inhoud', now())";
    $conn->exec($sql);
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO messages(inhoud, tijdstip) VALUES(:inhoud, now())");

    // vervolledig de code om 3 testberichten toe te voegen
    // m.b.v. bovenstaand prepared statement

    voegBerichtToe($conn, "Testbericht 1");
    voegBerichtToe($conn, "Testbericht 2");
    voegBerichtToe($conn, "Testbericht 3");
    echo "3 testberichten toegevoegd...";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
