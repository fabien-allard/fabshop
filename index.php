<?php
require 'config/_header.php';

ini_set('error_reporting', E_ALL);

if(!isset($_SESSION)) 
    {
session_start();
    }
//var_dump($_SESSION);
if (isset($_POST['logout']))
    {
        session_destroy();
        header('location:index.php');
    }
?>
<!doctype html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Fabshop</title>
        <!--Import Font awesome Icon Font-->
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="style/index2.css">    

    <style>

        </style>

        
    </head>
    <body>
    <?php require 'header.php';?>
    <h1 class="visually-hidden">Headers examples</h1>
    <div class="b-example-divider">
    </div>

<div class="checkout">
        <div class="title">
            <div class="wrap">
    
    <section class="py-5 text-center container">
        <div class="row py-lg-1">
        <div class="col-lg-6 col-md-8 mx-auto">
            <!---Si l'utilisateur est connecté afficher Bienvenue avec le ,nom de l'utilisateur sinon rien afficher--->
        <div class="welcome">
            <div class="co">
                <a href="#" class="conn"><h1 class="wel black-text text-darken-2">
                <?php if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
                    echo "Bienvenue :","<br>","</br>" . $_SESSION['user']['login'];} ?></h1></a></br>
                        <?php if(isset($_SESSION['user'])){
                        echo "<form method='post'>
                        <button type='submit' name='logout' class='btn1 btn-danger'>Déconnexion</button>  
                            </form>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <section>
            <div class="blockslide">
            <img class="slide" name="slide">
                <?php require 'js/slide.php'?>
            </div>
        </section>

    <main>
    <div class="album py-2 bg-light">
        <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <h1 class="lead  align center"><u><p class="monh1">FabShop</u></br></p><u>Sélectionne pour vous les meilleurs produits High-Tech</h1></u>
            <?php $produits = $DB->query('SELECT * FROM produits'); ?>
            <?php foreach ($produits as $produit): ?>
            <div class="box">
            <div class="card shadow-sm">
                <legend><?= $produit->nom ?></legend>
                <img class="imgp" src="<?= $produit->image ?>">
                <!--------<a class="gift addPanier" href="addpanier.php?id=<?//= $produit->id; ?>" >
                    Gift
                    </a>---->
                <div class="card-body">
                <p class="card-text"><?= substr($produit->description, 0, 200);?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                <a class="add addPanier"  href="addpanier.php?id=<?= $produit->id; ?>">
                    Ajouter au panier
                </a>
                </div>
                    <small class="text-muted"><?= number_format($produit->prix,2,',',' '); ?> €</small>
                    </div>
                </div>
            </div>
            </div>
            <?php endforeach ?>
            </div>
    <!-------<div id="pagination">
        <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
    </div>------>  
            </div>
        </div>
    </div>
</main>

        <section>
    <div class="espace-com">
    <?php require 'espace-com.php'; ?>
    </div>
    <div class="header-right">
            <a class="active align center" href="commentaire.php">Ecrire un Commentaire</a> 
        </div>
</section>
    
    
    <?php require 'footer.php';?>
    
