<?php
require_once("../bdd/bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["productId"];
    $action = $_POST["action"];

    $product = getProductById($productId);
    $quantity = $product["inBasket"];
    $stock = getProductStock($productId);

    if ($action == "increment") {
        if ($quantity < $stock) {
            $quantity++;
        } else {
            echo "<script>alert('Limite de stock atteinte'); window.location.href='../panier.php';</script>";
            exit();
        }
    } elseif ($action == "decrement" && $quantity > 0) {
        $quantity--;
    }

    updateProductQuantity($productId, $quantity);
    header("Location: ../panier.php");
    exit();
}
?>
