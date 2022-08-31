<?php

function ajouter($nom, $image, $prix, $desc)
{
    if(require("config.php"))
    {
    $req = $access->prepare("INSERT INTO produits (image, nom, prix, description)
    VALUES ('$image', '$nom', '$prix', '$desc')");

    $req->execute(array($nom, $image, $prix, $desc));

    $req->closeCursor();
    }
}


function afficher()
{
    if(require("config.php"))
    {
        $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);
        
        return $data;

        $req->closeCursor();
    }
}

function supprimer($id)
{
    if(require("config.php"))
    {
        $req=$access->prepare("DELETE FROM produits WHERE id=?");
        
        $req->execute(array($id));

        $req->closeCursor();
    }
}
?>