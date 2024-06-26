<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/faq.css" rel="stylesheet">
    <link href="styles/global.css" rel="stylesheet">
    <script src="scripts/function.js" defer></script>
    <title>Foire aux Questions (FÀQ)</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="cart-button" onclick="redirigerVersAutrePage('panier.php')">
        <img src="images/panier.png" alt="Panier">
    </div>

    <div id="page">
        <div id="haut">
            <h2>Foire aux Questions (FÀQ)</h2>
        </div>

        <div id="faq">
            <div class="question" onclick="toggleAnswer(this)">
                <h3>Quels sont les modes de paiement acceptés ?</h3>
                <div class="answer">
                    <p>Nous acceptons les paiements par carte bancaire, PayPal et virement bancaire.</p>
                </div>
            </div>

            <div class="question" onclick="toggleAnswer(this)">
                <h3>Quels sont les délais de livraison ?</h3>
                <div class="answer">
                    <p>Les délais de livraison varient en fonction de votre emplacement. En général, la livraison prend entre 3 et 7 jours ouvrables.</p>
                </div>
            </div>

            <div class="question" onclick="toggleAnswer(this)">
                <h3>Puis-je retourner un produit ?</h3>
                <div class="answer">
                    <p>Oui, vous pouvez retourner un produit dans les 30 jours suivant la réception de votre commande, à condition qu'il soit dans son état d'origine.</p>
                </div>
            </div>

            <div class="question" onclick="toggleAnswer(this)">
                <h3>Comment puis-je suivre ma commande ?</h3>
                <div class="answer">
                    <p>Vous pouvez suivre votre commande en utilisant le numéro de suivi fourni dans l'email de confirmation d'expédition.</p>
                </div>
            </div>

            <div class="question" onclick="toggleAnswer(this)">
                <h3>Comment puis-je contacter le service client ?</h3>
                <div class="answer">
                    <p>Vous pouvez contacter notre service client via le formulaire de contact sur notre site ou en envoyant un email à support@notresite.com.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
