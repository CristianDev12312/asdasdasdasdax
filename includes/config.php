<?php
$host = 'localhost'; // di solito è localhost
$dbname = 'account_system';
$username = 'root';  // Il tuo nome utente MySQL
$password = '12345678@plo' 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Errore di connessione: " . $e->getMessage());
}
?>
