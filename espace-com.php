<?php
require ("config/config.php");

$select_stmt = $access->prepare("SELECT login, commentaire, date FROM utilisateurs INNER JOIN commentaires WHERE utilisateurs.id = commentaires.id_utilisateur");
$select_stmt-> execute();
$row = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($row);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace-com</title>
    <style>
        
        </style>
</head>
<body>
    <form class="form-com" action="index.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                    <th class="center align" scope="col">Utilisateur</th>
                    <th class="center align" scope="col">Commentaire</th>
                    <th class="center align" scope="col">Date de publication</th>
                    </tr>
                </thead>
    <?php
        foreach ($row as $key => $values){
            echo "<tr>";
            foreach ($values as $key => $value){
            echo '<td class="event center align">' . $value . "</td>";
    }
            echo "</tr>";
    }
    ?>
		</form>
</table>
</body>
</html>
