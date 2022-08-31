<?php
require 'config/_header.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonPanier</title>
    
    <!--Import Font awesome Icon Font-->
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="style/panier2.css">
        <style>
            #monbtn{
                margin-top: 10%;
            }
            .rowtotal{
                margin-top: 5%;
            }
            </style>
</head>
<body>
<main>
    <?php require 'header.php';?>
    <h1 class="visually-hidden">Headers examples</h1>
    <div class="b-example-divider"></div>
    </main>

    <div class="checkout">
        <div class="title">
            <div class="wrap">
                <h2 class="first p-1 bg-dark text-white center align">Shopping Cart</h2>
            </div>
            </div>
            <div class="text-end">
                <a href="#" class="proceed "><button type="button" class="btn btn-outline-light me-2" id="proceed">Passer à la Caisse</button></a>
                </a>
                </div>
        <form method="post" action="panier.php">
                
                    <table border="3" width="100%">
                        <thead>
                            <tr class="colonne">
                        <th class="imgproduit">Produit :</th>
                        <th class="name">Nom du Produit :</th>
                        <th class="price">Prix HT :</th>
                        <th class="quantity">Quantité :</th>
                        <th class="subtotal">Prix TTC :</th>
                        <th class="action">Action :</th>
                        </tr>
                        </thead>
                    <tbody>
                        
                    <?php
                    $ids = array_keys($_SESSION['panier']);
                    if(empty($ids)){
                        $produits = array();
                    }else{
                        $produits = $DB->query('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
                    }
                        foreach($produits as $produit):
                    ?>
                    <tr>
                        <div class="row total grey lighten-2">
                        <td><img class="imgp" src="<?= $produit->image ?>"></td>
                        
                        <td class="name"><?= $produit->nom ?></td>
                        
                        <td class="price"><?= number_format($produit->prix,2,',',' '); ?> €</td>
                        
                        <td class="quantity"><input type="text" name="panier[quantity][<?= $produit->id; ?>]"
                        value="<?= $_SESSION['panier'][$produit->id]; ?>"></td>
                        
                        <td class="subtotal"><?= number_format($produit->prix* 1.196,2,',',' '); ?> €</td>
                        
                        <td class="action">
                        <a href="panier.php?delPanier=<?= $produit->id; ?>" class="del"><i class="material-icons" id="icones">delete</a></i></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                        <div class="recal align left">
                        <input id="monbtn" class="btn btn-outline-light me-2" type="submit" value="Recalculer">
                        </div>
                        </div>
                        </div>                    
                <div class="rowtotal grey lighten-2 align center">
                            Total TTC : <span class="total"><?= number_format($panier->total() * 1.196,2,',',' '); ?> €</span>
                    </div>
<?php require 'footer.php';?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>