<?php
require '../controller/controller_inscriptionCandidat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Document</title>
</head>

<body>


    <body class="">
        <nav class="navbar navbar-expand-lg navbar-dark text-white sticky-top row">
            <div class="container">
                <div class="containerImage">

                    <a href="index.php">
                        <img src="../assets/img/Astypik.png" alt="logo" class="logo">
                    </a>
                </div>




                <div class="list row col-lg-4 col" id="navbarSupportedContent">

                    <li class="connexion d-flex justify-content-center ms-3 mb-5 mt-5 col-lg-8 col-5">
                        <a class="nav-link text-dark text-center" href="connexionEntrepriseOuCandidat.html"><b>Connexion</b></a>
                    </li>
                    <li class="whoAreWe col-lg-8 col-5 m-2 mt-5">
                        <a class="nav-link text-white text-center" href="quisommesnous.html">Qui sommes nous</a>


                </div>
            </div>

        </nav>
        <?php if (!empty($_POST) && empty($arrayErrors)){ 
header('location: testCandidat.php');
    } else {?>

        <h1 class="text-center"> Inscription candidat </h1>


        <form action="" method="POST">
            <div class="container">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <span class="text-danger">
                        <?= $arrayErrors["lastname"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["lastname"]) ? htmlspecialchars($_POST["lastname"]) : "" ?>" type="text" class="form-control" name="lastname" id="lastname" placeholder="DOE">
                </div>

                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <span class="text-danger">
                        <?= $arrayErrors["firstname"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["firstname"]) ? htmlspecialchars($_POST["firstname"]) : "" ?>" type="text" class="form-control" name="firstname" id="firstname" placeholder="John">
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Date de naissance</label>
                    <span class="text-danger">
                        <?= $arrayErrors["birthdate"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["birthdate"]) ? htmlspecialchars($_POST["birthdate"]) : "" ?>" type="date" class="form-control" name="birthdate" id="birthdate">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Numéro de téléphone</label>
                    <span class="text-danger">
                        <?= $arrayErrors["phone"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "" ?>" type="text" class="form-control" name="phone" id="phone" placeholder="065672....">
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail</label>
                    <span class="text-danger">
                        <?= $arrayErrors["mail"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" type="mail" class="form-control" name="mail" id="mail" placeholder="JohnDOE@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="adress" class="form-label">Ville</label>
                    <span class="text-danger">
                        <?= $arrayErrors["city"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "" ?>" type="text" name="city" id="city" placeholder="Le Havre">
                </div>

                <div class="mb-3">
                    <label for="postalCode" class="form-label">Code postal</label>
                    <span class="text-danger">
                        <?= $arrayErrors["postalCode"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["postalCode"]) ? htmlspecialchars($_POST["postalCode"]) : "" ?>" type="text" name="postalCode" id="postalCode" placeholder="76600">
                </div> 

                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse</label>
                    <span class="text-danger">
                        <?= $arrayErrors["adress"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["adress"]) ? htmlspecialchars($_POST["adress"]) : "" ?>" type="text" name="adress" id="adress">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <span class="text-danger">
                        <?= $arrayErrors["password"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "" ?>" type="password" name="password" id="password">
                </div>

                <div class="mb-3">
                    <label for="passwordOk" class="form-label">Confirmer votre mot de passe</label>
                    <span class="text-danger">
                        <?= $arrayErrors["passwordOk"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["passwordOk"]) ? htmlspecialchars($_POST["passwordOk"]) : "" ?>" type="password" name="passwordOk" id="passwordOk">
                </div>


                <div class="row bg-dark text-light justify-content-between fixed-bottom">
                    <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
                    <div class="col text-end">Site by Estelle</div>
                </div>
                <a class="lienConnexion" href="connexionCandidat.php">
                    <p>Déjà inscrit? Veuillez vous connecter</p>
                </a>
                <button type="submit" class="btn btnEnregist mb-5" name="createButton"><b>Envoyer</b></button>
        </form>
        </div>
        <?php } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    
    </body>

</html>