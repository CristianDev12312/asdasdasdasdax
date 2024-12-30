<?php
include_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Verifica se il nome utente esiste già
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Username già esistente!";
    } else {
        // Inserisci il nuovo utente nel database
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $hashedPassword]);

        echo "Registrazione avvenuta con successo!";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>
<body>
    <h1>Registrati</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Registrati</button>
    </form>
    <a href="login.php">Hai già un account? Accedi</a>
</body>
</html>
