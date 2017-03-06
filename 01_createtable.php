<?php

include 'db_credentials.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create table
    $sql = "CREATE TABLE messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        inhoud VARCHAR(180),
        tijdstip DATETIME
    )";

    // Voeg hier de regel toe die het SQL-statement in $sql uitvoert.
    // Controleer daarna in MySQL Workbench de tabel.
    $conn->exec($sql);
    
    echo "Table created.";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
