<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos - Lafleur</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="icon" type="image/png" href="icons8-fleur-16.ico">
</head>
<body>

    <!-- Header (même que l'index) -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Lafleur">
            <h1>Lafleur</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="fleurs.php">Produits</a></li>
                <li><a href="apropos.php" class="active">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="auth-buttons">
            <button onclick="window.location.href='connexion.php'">Se connecter</button>
            <button onclick="window.location.href='inscription.php'">S'inscrire</button>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container">
        <h1>🌿 À propos de Lafleur</h1>
        
        <section class="about">
            <div class="about-text">
                <p>Bienvenue chez <strong>Lafleur</strong>, votre fleuriste passionné depuis plus de 20 ans. Nous sélectionnons avec soin les plus belles fleurs pour toutes vos occasions.</p>
                <p>Nos engagements :</p>
                <ul>
                    <li>💚 Qualité & fraîcheur garanties</li>
                    <li>🌎 Engagement écoresponsable</li>
                    <li>🎨 Créations florales uniques</li>
                </ul>
            </div>
            <img src="boutique.jpg" alt="Notre boutique" class="about-image">
        </section>

        <section class="team">
            <h2>💐 Notre équipe</h2>
            <div class="team-members">
                <div class="member">
                    <img src="team1.jpg" alt="Émilie">
                    <h3>Émilie Dupont</h3>
                    <p>Fondatrice et fleuriste en chef</p>
                </div>
                <div class="member">
                    <img src="team2.jpg" alt="Paul">
                    <h3>Paul Martin</h3>
                    <p>Designer floral</p>
                </div>
                <div class="member">
                    <img src="team3.jpg" alt="Sophie">
                    <h3>Sophie Bernard</h3>
                    <p>Responsable clientèle</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Lafleur - Tous droits réservés</p>
    </footer>

</body>
</html>
