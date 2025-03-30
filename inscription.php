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
    $nom = $_POST['nom_cli'];
    $prenom = $_POST['prenom_cli'];
    $adresse = $_POST['adresse_cli'];
    $mail = $_POST['mail_cli'];
    $motdepasse = $_POST['motdepasse_cli'];

    // Hacher le mot de passe pour plus de sécurité
    $motdepasse_hash = password_hash($motdepasse, PASSWORD_DEFAULT);

    // Préparer la requête d'insertion
    $sql = "INSERT INTO clients (nom_cli, prenom_cli, adresse_cli, mail_cli, motdepasse_cli)
            VALUES ('$nom', '$prenom', '$adresse', '$mail', '$motdepasse_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
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
    <title>Page d'inscription</title>
</head>
<body>
    <h2>Inscription</h2>

    <form action="inscription.php" method="POST">
        <label for="nom_cli">Nom:</label><br>
        <input type="text" id="nom_cli" name="nom_cli" required><br><br>

        <label for="prenom_cli">Prénom:</label><br>
        <input type="text" id="prenom_cli" name="prenom_cli" required><br><br>

        <label for="adresse_cli">Adresse:</label><br>
        <textarea id="adresse_cli" name="adresse_cli" required></textarea><br><br>

        <label for="mail_cli">E-mail:</label><br>
        <input type="email" id="mail_cli" name="mail_cli" required><br><br>

        <label for="motdepasse_cli">Mot de passe:</label><br>
        <input type="password" id="motdepasse_cli" name="motdepasse_cli" required><br><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
