<?php
require_once("../bdd/bdd.php");

$action = isset($_POST["action"]) ? $_POST["action"] : "";
switch ($action) {
    case 'addToBasket':
        $productId = $_POST["productId"];
        $currentBasket = isset($_POST["inBasket"]) ? (int)$_POST["inBasket"] : 0;
        $stock = getProductStock($productId);

        if ($stock <= 0) {
            echo "<script>alert('Stock épuisé'); window.location.href='../boutique.php';</script>";
        } elseif ($currentBasket >= $stock) {
            echo "<script>alert('Limite de stock atteinte'); window.location.href='../boutique.php';</script>";
        } else {
            $number_basket = $currentBasket + 1;
            addProductToBasket($productId, $number_basket);
            header("Location: ../boutique.php");
        }
        break;

    default:
        echo "default";
        break;
}
?>
