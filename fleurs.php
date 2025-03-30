<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fleur";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer les fleurs de la BDD
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Fleurs - Lafleur</title>
    <link rel="stylesheet" href="style3.css"> <!-- Même CSS que l'index -->
</head>
<body>

    <!-- Header (Identique à l'accueil) -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Lafleur">
            <h1>Lafleur</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="fleurs.php" class="active">Produits</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <button onclick="window.location.href='connexion.php'">Se connecter</button>
            <button onclick="window.location.href='inscription.php'">S'inscrire</button>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <h1>🌸 Nos Fleurs 🌸</h1>
        <section class="grid">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="card">
                    <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['nom_pro']; ?>">
                    <h2><?php echo $row['nom_pro']; ?></h2>
                    <p><?php echo $row['desc_pro']; ?></p>
                    <p class="price"><?php echo $row['prix_pro']; ?> €</p>
                    <button>🛒 Ajouter au Panier</button>
                </div>
            <?php } ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Lafleur - Tous droits réservés</p>
    </footer>

</body>
</html>

<?php $conn->close(); ?>
