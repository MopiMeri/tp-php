<?php
require_once("../bdd/bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pdo = initPDO();
    $productsInBasket = getProductsInBasket();

    foreach ($productsInBasket as $product) {
        $id = $product["id"];
        $quantityInBasket = $product["inBasket"];
        $newStock = $product["stock"] - $quantityInBasket;

        $pdo->query("
            UPDATE products 
            SET stock = $newStock, inBasket = 0
            WHERE id = $id
        ");
    }

    header("Location: ../panier.php?success=1");
    exit();
}
