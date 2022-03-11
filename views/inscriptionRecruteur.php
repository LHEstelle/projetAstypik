<?php
require '../controller/controller_inscriptionEntreprise.php';
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
                        <a class="nav-link text-dark text-center" href="connexionEntrepriseOuCandidat.php"><b>Connexion</b></a>
                    </li>
                    <li class="whoAreWe col-lg-8 col-5 m-2 mt-5">
                        <a class="nav-link text-white text-center" href="quisommesnous.php">Qui sommes nous</a>


                </div>
            </div>

        </nav>

        <h1 class="text-center"> Inscription entreprise </h1>


        <form action="" method="POST">
            <div class="container">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom de l'entreprise</label>
                    <span class="text-danger">
                        <?= $arrayErrors["name"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "" ?>" type="text" class="form-control" name="name" id="name" placeholder="ex: Astypik Recrutement 76">
                </div>

                <div class="mb-3">
                    <label for="siretNumber" class="form-label">Numéro de SIRET</label>
                    <span class="text-danger">
                        <?= $arrayErrors["siretNumber"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["siretNumber"]) ? htmlspecialchars($_POST["siretNumber"]) : "" ?>" type="text" class="form-control" name="siretNumber" id="siretNumber" placeholder="ex: 0987..........">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Numéro de téléphone</label>
                    <span class="text-danger">
                        <?= $arrayErrors["phone"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : "" ?>" type="text" class="form-control" name="phone" id="phone" placeholder="ex: 065672....">
                </div>

                <div class="mb-3">
                    <label for="mail" class="form-label">Mail</label>
                    <span class="text-danger">
                        <?= $arrayErrors["mail"] ?? "" ?>
                    </span>
                    <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : "" ?>" type="mail" class="form-control" name="mail" id="mail" placeholder="ex: JohnDOE@gmail.com">
                </div>

                <div class="mb-3">
                    <label for="adress" class="form-label">Ville</label>
                    <span class="text-danger">
                        <?= $arrayErrors["city"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : "" ?>" type="text" name="city" id="city" placeholder="ex: Le Havre">
                </div>

                <div class="mb-3">
                    <label for="postalCode" class="form-label">Code postal</label>
                    <span class="text-danger">
                        <?= $arrayErrors["postalCode"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["postalCode"]) ? htmlspecialchars(intval($_POST["postalCode"])) : "" ?>" type="text" name="postalCode" id="postalCode" placeholder="ex: 76600">
                </div> 

                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse</label>
                    <span class="text-danger">
                        <?= $arrayErrors["adress"] ?? "" ?>
                    </span>
                    <input class="form-control" value="<?= isset($_POST["adress"]) ? htmlspecialchars($_POST["adress"]) : "" ?>" type="text" name="adress" id="adress" placeholder="ex: 23 rue des platanes">
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
                <a class="lienConnexion" href="connexionRecruteur.php">
                    <p>Déjà inscrit? Veuillez vous connecter</p>
                </a>
                <input type="hidden" name="profilPicture" value="avatar.jpg">
                <button type="submit" class="btn btnEnregist mb-5" name="createButton"><b>Envoyer</b></button>

            </form>

        </div>
     
        <?php include 'footer.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </script>
    </body>

</html>