<?php
    require ("../config/commandes.php");
    $Produits=afficher();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Import Font awesome Icon Font-->
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <title>Document</title>
        <style>

            form{
            padding: 30px 25px 10px 25px;
            margin: 30px auto;
            width: 400px;
            margin-top:140px;
            }
        .card{
            width:310px;
            height:450px;
            padding: 30px 25px 10px 25px;
            margin: 30px auto;
        }
        
        #btn1{
            border-radius: 5px;
            background:rgb(60, 60, 185) ;
            text-align: center;
            cursor: pointer;
            font-size: 19px;
            width: 100%;
            height: 35px;
            padding: 0;
            color: #fff;
            border: 0;
            outline:0;
    }
    #btn1:hover{
        color:red;
    }
            </style>
</head>
<body>
<?php

if (isset($_POST['supprimer']))
{
    if(isset($_POST['idproduit']))
    {
    if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit']))
            {
                $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

               //fonction php supprimer pour supprimer un article recuperé par le require plus haut
                try
                {
                    supprimer($idproduit);  
                } catch (Exception $e)
                {
                    $e->getMessage();
                }
            }
        }
    }
    ?>
<div class="album py-5 bg-light">
        <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
        <form method="post">
    
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label black-text text-darken-2">Identifiant du produit</label>
    <input type="number" class="form-control" name="idproduit" required>
<button type="submit" name="supprimer" class="btn btn-primary">Supprimer  Produit</button>
</form>
</div>
</div>


<?php foreach($Produits as $produit): ?>
        <div class="col">
            <div class="card shadow-sm">
                
                <img  src="<?= $produit->image ?>">

                <h3><?= $produit->id ?></h3>
                <div class="card-body">
                    </div>
                </div>
            </div>
<?php endforeach; ?>
</div>
    </div>
        </div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>