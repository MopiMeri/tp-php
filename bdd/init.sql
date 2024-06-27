drop database if exists musclemarket;

create database musclemarket;

use musclemarket;

CREATE TABLE products (
    id INTEGER,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INTEGER NOT NULL,
    picture VARCHAR(512),
    category VARCHAR(100),
    inBasket integer,
    constraint pk_products primary key (id)
);

INSERT INTO products (id, name, price, stock, picture, category, inBasket) VALUES
    (
        1, 
        'WHEY I90 ISOLAC® CFM (Isolat de protéine)', 
        46.90, 
        13, 
        'images/WHEY I90 ISOLAC® CFM (Isolat de protéine).webp', 
        'protéines',
        0
    ),
    (
        2, 
        'CR3 CREAPURE® (Créatine monohydrate)', 
        34.90, 
        10, 
        'images/CR3 CREAPURE® (Créatine monohydrate).webp', 
        'créatines',
        0
    ),
    (
        3, 
        'BM4 BIG MUSCLE (Lean gainer)', 
        54.90, 
        7, 
        'images/BM4 BIG MUSCLE (Lean gainer).webp', 
        'gainer & glucides',
        0
    ),
    (
        4, 
        'CYCLO PRO (Intra-Workout)', 
        46.90, 
        15, 
        'images/CYCLO PRO (Intra-Workout).webp', 
        'BCAA & Acides Aminés',
        0
    ),
    (
        5, 
        'WHEY ISOJUICE® CFM (Isolat de protéine)', 
        65.90, 
        4, 
        'images/WHEY ISOJUICE® CFM (Isolat de protéine).webp', 
        'protéines',
        0
    ),
    (
        6, 
        'NH2 RIPPED PRO (Brûleur de graisse)', 
        39.90, 
        6, 
        'images/NH2 RIPPED PRO (Brûleur de graisse).webp', 
        'bruleur de graisse',
        0
    ),
    (
        7, 
        'PRE IGNITION (Pré-Workout)', 
        34.90, 
        3, 
        'images/PRE IGNITION (Pré-Workout).webp', 
        'booster & pre-workout',
        0
    ),
    (
        8, 
        'GFA GROWTH FACTOR AA (Acides aminés essentiels - EAA)', 
        39.90, 
        8, 
        'images/GFA GROWTH FACTOR AA (Acides aminés essentiels - EAA).webp', 
        'BCAA & Acides Aminés',
        0
    ),
    (
        9, 
        '17TEST FX™ PRO (Booster testostérone)', 
        54.90, 
        10, 
        'images/17TEST FX™ PRO (Booster testostérone).webp', 
        'booster & pre-workout',
        0
    );



select
    *
from
    products;