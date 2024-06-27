function redirigerVersAutrePage(url) {
    window.location.href = url;
}

window.addEventListener('scroll', function() {
    var navbar = document.getElementById('navbar');
    var entete = document.querySelector('.entete');
    var bordo = document.querySelector('.bordo');
    var pres = document.querySelector('.pres');
    var menu = document.querySelector('.menu');
    if (window.scrollY > 1) {
        pres.style.height = 35 + "%";
        entete.style.boxShadow = "0 2px 5px rgba(0, 0, 0, .3)";
        entete.classList.add('scrolled');
        menu.style.borderBottom = 0;
        bordo.style.paddingTop = 0 + 'px';
    } else {
        pres.style.height = 77 + "%";
        entete.style.boxShadow = "None";
        entete.classList.remove('scrolled');
        menu.style.borderBottom = 2 + 'px solid #8dc6ff';
        bordo.style.paddingTop = '0';
    }
});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");

    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
}

function toggleAnswer(questionElement) {
    const answer = questionElement.querySelector('.answer');
    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener("DOMContentLoaded", function() {
    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        question.querySelector('.answer').style.display = 'none';
    });

    const articleCountSpan = document.getElementById('article-count');
    const articles = document.querySelectorAll('.articles');
    articleCountSpan.textContent = `${articles.length} Articles`;
});

function sortArticles() {
    const select = document.getElementById('sort-select');
    const articles = Array.from(document.querySelectorAll('.articles'));
    const listDiv = document.getElementById('listDiv');
    const sortOption = select.value;

    switch (sortOption) {
        case 'alpha-asc':
            articles.sort((a, b) => a.querySelector('h3').textContent.localeCompare(b.querySelector('h3').textContent));
            break;
        case 'alpha-desc':
            articles.sort((a, b) => b.querySelector('h3').textContent.localeCompare(a.querySelector('h3').textContent));
            break;
        case 'price-asc':
            articles.sort((a, b) => parseFloat(a.querySelector('span').textContent.replace('€', '')) - parseFloat(b.querySelector('span').textContent.replace('€', '')));
            break;
        case 'price-desc':
            articles.sort((a, b) => parseFloat(b.querySelector('span').textContent.replace('€', '')) - parseFloat(a.querySelector('span').textContent.replace('€', '')));
            break;
        default:
            break;
    }

    listDiv.innerHTML = '';

    articles.forEach(article => listDiv.appendChild(article));
}

function toggleFilterMenu() {
    const filterMenu = document.getElementById('filter-menu');
    filterMenu.classList.toggle('open');
}

function applyFilter() {
    const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
    const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
    const articles = document.querySelectorAll('.articles');
    let visibleCount = 0;

    articles.forEach(article => {
        const price = parseFloat(article.querySelector('span').textContent.replace('€', ''));
        if (price >= minPrice && price <= maxPrice) {
            article.style.display = 'flex';
            visibleCount++;
        } else {
            article.style.display = 'none';
        }
    });

    const articleCountSpan = document.getElementById('article-count');
    articleCountSpan.textContent = `${visibleCount} Articles`;
    toggleFilterMenu();
}

function toggleCartMenu() {
    const cartMenu = document.getElementById('cartMenu');
    cartMenu.style.right = cartMenu.style.right === '0px' ? '-300px' : '0px';
}

function addToCart(article) {
    var title = article.querySelector('h3').textContent;
    var priceStr = article.querySelector('span').textContent;
    var price = parseFloat(priceStr.substring(0, priceStr.length - 1));

    var existingItem = Array.from(document.querySelectorAll('.cart-item')).find(function(item) {
        return item.dataset.title === title;
    });

    if (existingItem) {
        var count = existingItem.querySelector('.count');
        var currentCount = parseInt(count.textContent);
        count.textContent = currentCount + 1;
    } else {
        var cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.dataset.title = title;

        var img = document.createElement('img');
        img.src = article.querySelector('img').src;
        img.alt = title;
        cartItem.appendChild(img);

        var titlePara = document.createElement('p');
        titlePara.textContent = title;
        cartItem.appendChild(titlePara);

        var pricePara = document.createElement('p');
        pricePara.textContent = priceStr;
        cartItem.appendChild(pricePara);

        var count = document.createElement('span');
        count.classList.add('count');
        count.textContent = '1';
        cartItem.appendChild(count);

        document.getElementById('cartMenu').appendChild(cartItem);
    }
    updateTotalPrice();
}

function filterByCategory() {
    const select = document.getElementById('category-select');
    const selectedCategory = select.value.toLowerCase();
    const articles = document.querySelectorAll('.articles');
    let visibleCount = 0;

    articles.forEach(article => {
        const category = article.querySelector('.category').textContent.toLowerCase();
        if (selectedCategory === 'tous' || category === selectedCategory) {
            article.style.display = 'flex';
            visibleCount++;
        } else {
            article.style.display = 'none';
        }
    });

    const articleCountSpan = document.getElementById('article-count');
    articleCountSpan.textContent = `${visibleCount} Articles`;
    toggleFilterMenu();
}

document.getElementById('category-filter').addEventListener('change', function() {
    const selectedCategory = this.value;
    filterByCategory(selectedCategory);
});

function updateTotalPrice() {
    const cartItems = document.querySelectorAll('.cart-item');
    let totalPrice = 0;

    cartItems.forEach(item => {
        const priceStr = item.querySelector('p:nth-child(3)').textContent;
        const price = parseFloat(priceStr.substring(0, priceStr.length - 1));
        const count = parseInt(item.querySelector('.count').textContent);
        totalPrice += price * count;
    });

    const totalPriceDiv = document.getElementById('totalPrice');
    totalPriceDiv.textContent = `Total : ${totalPrice.toFixed(2)}€`;
}

window.addEventListener('scroll', function() {
    var menu = document.querySelector('.entete');
    var scrollPosition = window.scrollY;
    var menuOffset = menu.offsetTop;

    if (scrollPosition >= menuOffset) {
        menu.classList.add('fixed');
    } else {
        menu.classList.remove('fixed');
    }
});

document.getElementById('recherche').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        console.log(this.value);
    }
});

function searchArticles() {
    var input = document.getElementById('searchInput').value.toLowerCase();
    var articles = document.querySelectorAll('.articles');
    let visibleCount = 0;

    articles.forEach(function(article) {
        var title = article.querySelector('h3').textContent.toLowerCase();
        if (title.includes(input)) {
            article.style.display = 'flex';
            visibleCount++;
        } else {
            article.style.display = 'none';
        }
    });

    const articleCountSpan = document.getElementById('article-count');
    articleCountSpan.textContent = `${visibleCount} Articles`;
}