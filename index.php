<?php
session_start(); // Démarre la session PHP

// Si l'utilisateur est connecté, il ne doit pas voir la page de connexion
if (isset($_SESSION['user_id'])) {
    // Rediriger l'utilisateur vers une autre page, par exemple la page des produits
    header('Location: fleurs.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lafleur - Accueil</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="icon" type="image/png" href="icons8-fleur-16.ico">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Lafleur">
            <h1>Lafleur</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="fleurs.php">Produits</a></li>
                <li><a href="apropos.php">À propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <button onclick="window.location.href='connexion.php'">Se connecter</button>
            <button onclick="window.location.href='inscription.php'">S'inscrire</button>
        </div>
    </header>

    <!-- Bannière -->
    <section class="banner">
        <h2>Bienvenue chez Lafleur 🌸</h2>
        <p>Découvrez nos plus belles créations florales pour illuminer votre quotidien.</p>
        <button onclick="window.location.href='fleurs.php'">Voir nos produits</button>
    </section>

    <!-- Section Produits populaires -->
    <section class="produits">
        <h2>Nos Produits Populaires</h2>
        <div class="produits-container">
            <div class="produit">
                <img src="rose.jpg" alt="Bouquet de roses">
                <h3>Bouquet de Roses</h3>
                <p>Un bouquet élégant pour toutes les occasions.</p>
                <span>25€</span>
            </div>
            <div class="produit">
                <img src="orchidee.jpg" alt="Orchidée">
                <h3>Orchidée Blanche</h3>
                <p>Un symbole de pureté et d'élégance.</p>
                <span>30€</span>
            </div>
            <div class="produit">
                <img src="tulipes.jpg" alt="Tulipes">
                <h3>Bouquet de Tulipes</h3>
                <p>Colorées et éclatantes, parfaites pour offrir.</p>
                <span>20€</span>
            </div>
        </div>
    </section>

    <!-- Section À propos -->
    <section class="about">
        <h2>À propos de nous</h2>
        <p>Depuis plus de 10 ans, Lafleur sélectionne les plus belles fleurs pour vous offrir des bouquets raffinés et de qualité.</p>
    </section>

    <!-- Section Contact -->
    <section class="contact">
        <h2>Contactez-nous</h2>
        <p>📍 123 Rue des Fleurs, Paris<br>📞 01 23 45 67 89</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Lafleur. Tous droits réservés.</p>
    </footer>
</body>
</html>
