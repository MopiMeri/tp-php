<?php
function initPDO() {
    try {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=musclemarket;charset=utf8',
            'root',
            ''
        );
        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
        return $pdo;
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
}

function getAllProducts() {
    $pdo = initPDO();
    $products = $pdo->query("SELECT * FROM products");
    return $products->fetchAll(PDO::FETCH_ASSOC);
}

function getProductById($id) {
    $pdo = initPDO();
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addProductToBasket($id, $number) {
    $pdo = initPDO();
    $stmt = $pdo->prepare("UPDATE products SET inBasket = ? WHERE id = ?");
    $stmt->execute([$number, $id]);
}

function getProductStock($id) {
    $pdo = initPDO();
    $stmt = $pdo->prepare("SELECT stock FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? (int)$result['stock'] : 0;
}

function getProductsInBasket() {
    $pdo = initPDO();
    $productsInBasket = $pdo->query("SELECT * FROM products WHERE inBasket > 0");
    return $productsInBasket->fetchAll(PDO::FETCH_ASSOC);
}

function updateProductQuantity($id, $quantity) {
    $pdo = initPDO();
    $stmt = $pdo->prepare("UPDATE products SET inBasket = ? WHERE id = ?");
    $stmt->execute([$quantity, $id]);
}
?>
