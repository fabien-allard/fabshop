<?php
require ("config/config.php");
ini_set('error_reporting', E_ALL);

session_start();
/*var_dump($_SESSION);*/
if(isset($_POST['profil_btn'])){
    $_login = $_POST['login'];
    $_password = $_POST['password'];
    $_oldlogin = $_SESSION['user']['login'];

    if(empty($_login)){
        $errorMsg[] = 'Veuillez entrer votre login';
    }
    if(empty($_password)){
        $errorMsg[] = 'Veuillez entrer votre password';
    }

    if(empty($_POST['login'])){
        $_login = $_SESSION['user']['login'];
    }

    if(empty($_POST['password'])){
        $_password = $_SESSION['user']['password'];
}
else{
    $hashed_password = password_hash($_password, PASSWORD_DEFAULT);
    $insert_stmt = $access->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE login = :oldlogin");
    $insert_stmt->bindValue(':login', $_login, PDO::PARAM_STR);
    $insert_stmt->bindValue(':password',$hashed_password, PDO::PARAM_STR);
    $insert_stmt->bindValue(':oldlogin', $_oldlogin, PDO::PARAM_STR);
    $insert_stmt->execute();
    

    $stm1 = $access->prepare("SELECT * FROM utilisateurs WHERE login = :login");
    $stm1->bindValue(':login', $_login, PDO::PARAM_STR);
    $stm1->execute();
    $var = $stm1->fetch(PDO::FETCH_ASSOC);
    header("location: index.php");
    

    if(isset($var)){
    $_SESSION['user'] = $var;
}
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="style/profil.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<style>
        input{
            text-align: left;
        }
    </style>
        <title>Profil</title>
        <!--Import Font awesome Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        
</head>
    
    <body>
    <main>
    <h1 class="visually-hidden">Headers examples</h1>

    <div class="b-example-divider"></div>

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
            <li><a href="connexion.php" class="nav-link px-2 text-white">S'identifier</a></li>
            <li><a href="profil.php" class="nav-link px-2 text-white">Profil</a></li>
            <li><a href="panier.php" class="nav-link px-2 text-white">Panier</a></li>
            <li><a href="payment.php" class="nav-link px-2 text-white">Tarification</a></li>
            <li><a href="#" class="nav-link px-2 text-white">À propos</a></li>
            </ul>
            <form class="col-12 col-lg-5 mb-5 mb-lg-0 me-lg-auto">
            <input type="search" class="form-control form-control-dark blue-text text-darken-2" placeholder="Rechercher..." aria-label="Search">
            </form>
        </div>
        </div>
</header>
</main>
	<div class="container">
    <div class="text-end">
    <section>
    <h1  class=" bg-dark text-white center align" font-size="16px">Modifier Votre Profil !</h1>
    </section>
            </div>
    <?php
        if(isset($_REQUEST['msg'])){
            echo "<p class='alert alert-danger'>".$_REQUEST['msg']."</p>";
    }
    if(isset($errorMsg)){
        foreach($errorMsg as $loginError ){
            echo "<p class='alert alert-danger'>".$loginError."</p>";
    }
    }
    ?>
		<form action="profil.php" class="box col s12" method="post">
        <div class="row">
        <div class="input-field col s12">
        
				<input type="text" name="login" class="form-control" placeholder="<?php if(isset($_SESSION['user']['login'])){
                                                                                        echo $_SESSION['user']['login'];} ?>">
                <label class="active" for="login">Nouvel Identifiant :</label>
			</div>
                </div>

    <div class="row">
        <div class="input-field col s12">   
				<input type="password" name="password" class="form-control" placeholder="">
                <label class="active" for="login">Nouveau Mot De Passe :</label>
				</div>
                </div>
                <button type="submit" name="profil_btn" id="btn1" class="btn btn-primary">Enregistrer</button>
            </form>
	</div>

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