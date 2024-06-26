<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="scripts/function.js" defer></script>
    <title>Contactez-Nous - Votre Boutique de Compléments Alimentaires</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="cart-button" onclick="redirigerVersAutrePage('panier.php')">
        <img src="images/panier.png" alt="Panier">
    </div>

    <div id="page">
        <section class="contact-section">
            <h2>Contactez-Nous</h2>
            <p>Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous contacter par l'un des moyens suivants :</p>

            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>123 Rue de la Forme, 75000 Paris, France</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <p><a href="mailto:contact@musclemarket.fr">contact@musclemarket.fr</a></p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <p><a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
                </div>
            </div>

            <div class="social-media">
                <a href="https://www.facebook.com" class="social-icon" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" class="social-icon" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com" class="social-icon" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
            </div>
        </section>
    </div>
</body>

</html>
