<?php
require '../controller/controller_connexionEntreprise.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&language=fr&key=AIzaSyDecTo4CO49wUS9-_FtES7kcZmnb6H_Reg"></script>
    <link rel="stylesheet" href="../assets/css/style.css" />
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


        <h1 class="text-center"> Connexion Recruteur </h1>


        <form action="" method="POST">
            <div class="container">

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail</label>
                    <span class="text-danger">
                        <?= $arrayError["error"] ?? "" ?>
                        <?= $arrayError["false"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" type="mail" class="form-control" name="mail" id="mail" placeholder="JohnDOE@gmail.com">
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input class="form-control" value="<?= isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "" ?>" type="password" name="password" id="password">
                </div>

                </div>
                <a class="lienConnexion" href="inscriptionRecruteur.php">
                    <p>Pas encore inscrit? Veuillez vous inscrire</p>
                </a>
                <button type="submit" class="btn btnEnregist mb-5" name="createButton"><b>Envoyer</b></button>
        </form>
        </div>


        <div class="row bg-dark text-light justify-content-between fixed-bottom">
                    <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
                    <div class="col text-end">Site by Estelle</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

</html>