<?php
require_once '../controller/controller_details.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
</head>

<body>
    <div class="row">
        <a href="index.php" class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
        </a>
        <div class="pb-3">
        <div class="d-flex justify-content-evenly align-items-end text-center">
                <a href="profilCandidat.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark p-3 col-3">Mon profil</a>
                <a href="offresCandidats.php" id="candidateProfil1" onclick="colorOrangeCandidateProfil1()" class="menu text-dark p-3 col-3">Offres d'emplois</a>
                <a href="likesCandidat.php" id="likes1" onclick="colorOrangeLikes1()" class="menu text-dark p-3 col-3">Likes</a>

                <a href="profilCandidat.php" class="fas fa-user menuIcon p-3 col-3 d-lg-none"></a>
                <a href="offresCandidats.php" class="fas fa-briefcase menuIcon p-3 col-3 d-lg-none"></a>
                <a href="likesCandidat.php" class="fas fa-heart menuIcon p-3 col-3 d-lg-none"></a>
            </div>
        </div>
        <?php foreach ($arrayAnnounces as $event) {
            if ($event["id"] == $_GET["id"]) { ?>
               
                <div class="d-flex justify-content-center ms-5 col-11">
                    <div class="titleAnnounce  mt-4">
                    <div class="d-flex justify-content-end align-items-center mt-2">
            <i class="far fa-heart text-end fs-3 pe-5" onclick="setLike()" id="heartIconEmpty"></i>
            <i class="fas fa-heart text-end  fs-3 pe-5" onclick="deleteLike()" id="heartIcon"></i>

        </div>
                        <h1 class="text-center"><?= $event['job'] ?></h1>
                        <p class="text-center"><?= $event['enterprise'] ?></p>
                        <p class="text-center"><?= $event['contract'] ?></p>
                        
                    </div>
                </div>
        <?php }
        } ?>

    </div>


    </div>

    <p class="text-center mt-5 ms-5 me-5"><?= $event['jobDescription'] ?>
    </p>



    <div class="row bg-dark text-light justify-content-between fixed-bottom">
        <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
        <div class="col text-end">Site by Estelle</div>
    </div>


</body>
<script src="assets/js/script.js">
</script>

</html>