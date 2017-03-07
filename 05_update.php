<?php

include 'db_credentials.php';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE messages SET inhoud='koeike' WHERE id=4");

    // zorg dat de database ge-update wordt
    $stmt->execute();
    // en getoond wordt hoeveel rijen aangepast zijn
    $aantal_aangepast = $stmt->rowCount();
    
    echo $aantal_aangepast . " rijen aangepast...";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

?>
