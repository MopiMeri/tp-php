<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/boutique.css" rel="stylesheet">
    <link href="styles/global.css" rel="stylesheet">
    <script src="scripts/function.js" defer></script>
    <title>Boutique MuscleMarket</title>
</head>

<body>
    <div class="cart-button" onclick="redirigerVersAutrePage('panier.php')">
        <img src="images/panier.png" alt="Panier">
    </div>

    <?php include("header.php"); ?>

    <div id="recherche">
        <input type="text" id="searchInput" placeholder="Rechercher...">
        <div id="searchIcon" onclick="searchArticles()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 50 50">
                <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path>
            </svg>
        </div>
    </div>

    <div id="page">
        <div id="haut">
            <h2>NUTRITION</h2>

            <div id="filtre">
                <button class="filter" onclick="toggleFilterMenu()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                        <line y1="21" x2="4" y2="14" x1="4"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    <span>FILTRE</span>
                </button>
                <span id="article-count">50 Articles</span>
                <div class="tri">
                    <span>Trier par :</span>
                    <select name="select" id="sort-select" onchange="sortArticles()">
                        <option value="alpha-asc">Alphabétique, A à Z</option>
                        <option value="alpha-desc">Alphabétique, Z à A</option>
                        <option value="price-asc">Prix croissant</option>
                        <option value="price-desc">Prix décroissant</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="filter-menu">
            <h4>Filtrer par prix</h4>
            <label for="min-price">Prix minimum :</label>
            <input type="number" id="min-price" name="min-price" min="0">
            <label for="max-price">Prix maximum :</label>
            <input type="number" id="max-price" name="max-price" min="0">
            <button id="bA" onclick="applyFilter()">Appliquer</button>
            <h4>Filtrer par catégorie</h4>
            <select id="category-select" onchange="filterByCategory()">
                <option value="tous">Tous</option>
                <option value="protéines">Protéines</option>
                <option value="créatines">Créatines</option>
                <option value="gainer & glucides">Gainer & Glucides</option>
                <option value="bcaa & acides aminés">BCAA & Acides Aminés</option>
                <option value="bruleur de graisse">Bruleur de Graisse</option>
                <option value="booster & pre-workout">Booster & Pre-workout</option>
            </select>
        </div>

        <div id="listDiv">
            <?php
            $products = getAllProducts();
            foreach ($products as $product) {
                if ($product["stock"] > 0) {
            ?>
                    <div class="articles" onclick="document.forms['search-form<?php echo $product["id"] ?>'].submit();">
                        <img src="<?php echo $product["picture"] ?>" id="imgg" alt="Produit">
                        <h3 class="title"><?php echo htmlspecialchars($product["name"]) ?></h3>
                        <span class="price"><?php echo htmlspecialchars($product["price"]) ?>€</span>
                        <span class="category"><?php echo htmlspecialchars($product["category"]) ?></span>
                    </div>
                    <form method="post" action="controllers/controller.php" name="search-form<?php echo $product["id"] ?>">
                        <input type="hidden" name="action" value="addToBasket">
                        <input type="hidden" name="productId" value="<?php echo $product["id"] ?>">
                        <input type="hidden" name="inBasket" value="<?php echo $product["inBasket"] ?>">
                    </form>
            <?php
                }
            }
            ?>
        </div>

    </div>
</body>

</html>