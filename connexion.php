<?php
// Connexion à la base de données
$servername = "localhost"; // ou votre hôte
$username = "root"; // nom d'utilisateur
$password = "root"; // mot de passe
$dbname = "fleur"; // nom de votre base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $mail = $_POST['mail_cli'];
    $motdepasse = $_POST['motdepasse_cli'];

    // Préparer la requête pour récupérer les données de l'utilisateur
    $sql = "SELECT * FROM clients WHERE mail_cli = '$mail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si l'utilisateur existe, récupérer les données
        $row = $result->fetch_assoc();

        // Vérifier si le mot de passe correspond
        if (password_verify($motdepasse, $row['motdepasse_cli'])) {
            // Connexion réussie, démarrer une session
            session_start();
            $_SESSION['user_id'] = $row['id_cli'];
            $_SESSION['user_name'] = $row['prenom_cli'];

            // Rediriger vers index.php
            header('Location: index.php');
            exit(); // Important pour arrêter l'exécution du script après la redirection
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        echo "Aucun utilisateur trouvé avec cet email.";
    }

    // Fermer la connexion
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

    <form action="connexion.php" method="POST">
        <label for="mail_cli">E-mail:</label><br>
        <input type="email" id="mail_cli" name="mail_cli" required><br><br>

        <label for="motdepasse_cli">Mot de passe:</label><br>
        <input type="password" id="motdepasse_cli" name="motdepasse_cli" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
