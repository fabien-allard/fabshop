<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <!--Import materialize.css-->
    <title>Header</title>
    <link rel="stylesheet" href="style/header2.css">    
    <style> 
    
    </style>
</head>
<body>
    <section class="index">
        <header class="p-3 bg-dark text-white">
            <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-basket" id="basket" viewBox="0 0 16 16">
            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
            </svg>            
                <strong>Fabshop</strong>
            </a>
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-5 mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-white">Accueil</a></li>
            <li><a href="connexion.php" class="nav-link px-2 text-white">S'identifier</a></li>
            <li><a href="profil.php" class="nav-link px-2 text-white">Profil</a></li>
            <li><a href="panier.php" class="nav-link px-2 text-white">Panier</a></li>
            <li><a href="payment.php" class="nav-link px-2 text-white">Tarification</a></li>
            <li><a href="#" class="nav-link px-2 text-white">À propos</a></li>
            </ul>
            <form class="col-12 col-lg-5 mb-5 mb-lg-0 me-lg-auto">
            <input type="search" class="form-control form-control-dark blue-text text-darken-2" placeholder="Rechercher..." aria-label="Search">
            </form>
            <table class="tab">
                            <thead>
                            <tr class="col">
                                <th>Articles :</th>
                                <th>Prix Total :</th>
                            </tr>
                            </thead>
                            <a class="monpanier" href="panier.php"><i class="material-icons">shopping_cart</i></a>
                            <tr class="colon">
                                <td><span id="count"><?= $panier->count(); ?></td></span>
                                <td><span id="total"><?= number_format($panier->total(),2,',',' '); ?></span> €</td>  
                            </tr>
                        </table>
</header>
</div>         
</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
