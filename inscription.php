<?php
require ("config/config.php");
ini_set('error_reporting', E_ALL);

session_start();

/*if(isset($_SESSION['user'])){
    header("location: index.php");
}*/

if(isset($_REQUEST['inscription_btn'])){
    
    
    
    $_login = filter_var($_REQUEST['login'],FILTER_SANITIZE_STRING);
    $_password = strip_tags($_REQUEST['password']);
    $_confirm_password = strip_tags($_REQUEST['confirm_password']);

    if(empty($_login)){
        $errorMsg[0][] = 'Login requis';
    }

    if(empty($_password)){
        $errorMsg[3][] = 'Password requis';
    }

    if(empty($_confirm_password)){
        $errorMsg[4][] = 'Confirmation password requis';
    }

    if ($_REQUEST['password'] === $_REQUEST['confirm_password']) {
        (empty($errorMsg));
    }

    if(empty($errorMsg)){
        
        $select_stmt = $access->prepare("SELECT login FROM utilisateurs WHERE login = :login" );
        //var_dump($_login);
        $select_stmt->bindValue(':login',$_login);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        if(isset($row['login']) && $row['login'] == $_login){
            $errorMsg[0][] = "Ce nom d'utilisateur existe déjà, veuillez en choisir un autre";
        }
        else{
            $hashed_password = password_hash($_password, PASSWORD_DEFAULT);
            $insert_stmt = $access->prepare("INSERT INTO utilisateurs (login,password) VALUES (:login,:password)");
            $insert_stmt->bindValue(':login', $_login);
            $insert_stmt->bindValue('password',$hashed_password);
        
            $insert_stmt->execute();
                header("location: connexion.php");   
        }
        }
    }
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style/inscription.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	
    <title>Inscription</title>
    <!--Import Font awesome Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
    <body>
    <main>

    <header class="p-3 bg-dark text-white">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-basket" id="basket" viewBox="0 0 16 16">
            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
            </svg>            
                <strong>Fabshop</strong>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-white">Accueil</a></li>
            <li><a href="profil.php" class="nav-link px-2 text-white">Profil</a></li>
            <li><a href="panier.php" class="nav-link px-2 text-white">Panier</a></li>
            <li><a href="payment.php" class="nav-link px-2 text-white">Tarification</a></li>
            <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark blue-text text-darken-2" placeholder="Rechercher..." aria-label="Search">
            </form>
        </div>
        </div>
    </header>
</main>
<section>
    <h1  class=" bg-dark text-white center align" font-size="16px">Inscrivez Vous ici !</h1>
    </section>
		<form action="inscription.php" method="post" class="box col s12">
        <div class="row">
        <div class="input-field col s12">
                
        <?php
        if(isset($errorMsg[0])){
            foreach($errorMsg[0] as $loginErrors){
                echo "<p class='small text-danger'>".$loginErrors."</p>";
            }
        }
        ?>
		<input type="text" name="login" class="validate">
        <label class="active" for="login">Identifiant :</label>
			</div>
    </div>
    <div class="row">
        <div class="input-field col s12">
				
        <?php
        if(isset($errorMsg[3])){
            foreach($errorMsg[3] as $passwordErrors){
                echo "<p class='small text-danger'>".$passwordErrors."</p>";
            }
        }
        ?>       

				<input type="password" name="password" class="validate">
                <label class="active" for="password">Mot De Passe :</label>

				</div>
                </div>
    <div class="row">
        <div class="input-field col s12">
                
        <?php
        if(isset($errorMsg[4])){
            foreach($errorMsg[4] as $confirmpasswordErrors){
                echo "<p class='small text-danger'>".$confirmpasswordErrors."</p>";
                    
            }
        }
        ?>
                <input type="password" name="confirm_password" class="validate">
                <label class="active" for="password">Confirmation du Mot De Passe :</label>
                </div>
            </div>
                <button type="submit" name="inscription_btn" id="btn1" class="btn btn-primary">Enregistrer</button>
		<P>Vous possédez déjà un compte ? <a class="connexion" href="connexion.php">Connectez-vous !</a></p>
	</form>
    </div>
    </main>
    <script>
    $(document).ready(function() {
    M.updateTextFields();
});
</script>
    <footer class="text-muted py-5 p-3 bg-dark text-white">
    <div class="container">
        <p class="float-end mb-1">
        <a href="#">Back to top</a>
        </p>
    </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>