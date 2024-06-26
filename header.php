<div class="entete">
    <div class="logo-container">
        <img id="logo" src="images/logo.jpg" onclick="redirigerVersAutrePage('index.php')">
    </div>
    <nav class="menu" id="navbar">
        <div class="menu_b" onclick="redirigerVersAutrePage('boutique.php')">Boutique</div>
        <div class="menu_b" onclick="redirigerVersAutrePage('apropos.php')">À Propos</div>
        <div class="menu_b" onclick="redirigerVersAutrePage('faq.php')">FÀQ</div>
        <div class="menu_b" onclick="redirigerVersAutrePage('contact.php')">Contact</div>
    </nav>
</div>

<?php
include("bdd/bdd.php");
?>