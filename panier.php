<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/global.css" rel="stylesheet">
    <link href="styles/panier.css" rel="stylesheet">
    <script src="scripts/function.js" defer></script>
    <title>Panier</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="cart-button" onclick="redirigerVersAutrePage('panier.php')">
        <img src="images/panier.png" alt="Panier">
    </div>

    <h2>Mon Panier</h2>

    <?php
    require_once("bdd/bdd.php");
    $products = getProductsInBasket();
    $totalGeneral = 0;
    ?>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <?php $totalProduit = $product["price"] * $product["inBasket"]; ?>
                <?php $totalGeneral += $totalProduit; ?>
                <tr>
                    <td><?php echo htmlspecialchars($product["name"]); ?></td>
                    <td><?php echo htmlspecialchars($product["price"]); ?>€</td>
                    <td>
                        <form method="post" action="controllers/panierController.php" style="display:inline;">
                            <input type="hidden" name="productId" value="<?php echo $product["id"]; ?>">
                            <input type="hidden" name="action" value="decrement">
                            <button type="submit" class="quantity-btn">-</button>
                        </form>
                        <?php echo htmlspecialchars($product["inBasket"]); ?>
                        <form method="post" action="controllers/panierController.php" style="display:inline;">
                            <input type="hidden" name="productId" value="<?php echo $product["id"]; ?>">
                            <input type="hidden" name="action" value="increment">
                            <button type="submit" class="quantity-btn">+</button>
                        </form>
                    </td>
                    <td><?php echo htmlspecialchars($totalProduit); ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="total-general">
        <strong>Total : </strong><?php echo $totalGeneral; ?>€
    </div>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="dylanog1@gmail.com">
        <input type="hidden" name="item_name" value="Total général">
        <input type="hidden" name="amount" value="<?php echo $totalGeneral; ?>">
        <input type="hidden" name="currency_code" value="EUR">
        <button type="submit" class="pay-btn">Commander</button>
    </form>

</body>

</html>