<?php
require_once '../controller/controller_viewRH.php';
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

<body class="viewRH">





    <div class="row">
        <div class="col-lg-3 filters pb-5">


            <div class="d-flex justify-content-center">
                <a href="index.php">
                    <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3">
                </a>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE POSTE</b></p>
            <div class="d-flex">
                <input class="form-control inputSearch me-2 ms-3" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btnSearch btn text-white me-3" type="submit">Search</button>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE CONTRAT</b></p>
            <div class="form-check col-10 ms-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioCDI">
                <label class="form-check-label" for="flexRadioCDI">
                    CDI
                </label>
            </div>
            <div class="form-check col-10  ms-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioCDD">
                <label class="form-check-label" for="flexRadioCDD">
                    CDD
                </label>
            </div>
            <div class="form-check col-10  ms-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioAlternance">
                <label class="form-check-label" for="flexRadioAlternance">
                    Alternance
                </label>
            </div>


            <p class="border-bottom m-4 p-3 col-10 text-white"><b>EXPERIENCE</b></p>
            <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
            <div class="d-flex">
                <input type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center" min="0" max="50">
                <button class="btnSearch btn text-white mt-3 me-3" type="submit">Search</button>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>COMPETENCES</b></p>
            <div class="d-flex">
                <input class="form-control inputSearch me-2 ms-3" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btnSearch btn text-white me-3" type="submit">Search</button>
            </div>

        </div>



        <div class="col-lg-9">

            <div class="d-flex justify-content-evenly align-items-end text-center">
                <a href="profilRecruteur.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark p-3 col-2">Mon profil</a>
                <a href="annoncesRecruteur.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark  p-3 col-2">Mes offres d'emplois</a>
                <a href="viewRH.php" id="candidateProfil1" onclick="colorOrangeCandidateProfil1()" class="menu text-dark p-3 col-2">Profils candidats</a>
                <a href="likesRecruteur.php" id="likes1" onclick="colorOrangeLikes1()" class="menu text-dark  p-3 col-2">Likes</a>
                <a href="profilRecruteur.php" class="fas fa-user menuIcon p-3 col-2 d-lg-none"></a>
                <a href="annoncesRecruteur.php" class="fas fa-briefcase menuIcon p-3 col-2 d-lg-none"></a>
                <a href="viewRH.php" class="fas fa-users menuIcon p-3 col-2 d-lg-none"></a>
                <a href="likesRecruteur.php" class="fas fa-heart menuIcon p-3 col-2 d-lg-none"></a>
            </div>
            <h1 class="text-center mt-4"><b>Chargé de communication</b></h1>
            <p class="text-center text-secondary">CDI - 2 ans d'expérience</p>



            <div class="myCards d-flex justify-content-evenly m-3 mt-5">

                <?php foreach ($allCandidatesArray as $event) { ?>
                    <!-- <a href="detailRecrutor.php?id=<?= $event['id'] ?>"> -->
                    <?php if (isset($event['profilColor']) && $event['profilColor'] == 'superCactus') {  ?>
                       <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>"> <div class="cardRed m-3 p-1"> 
                        <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'peterPaon') {  ?>
                            <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>"> <div class="cardCandidate m-3 p-1">

                            <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'ironSpoke') {  ?>
                                <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>"> <div class="cardBlue m-3 p-1">

                                <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'spiderLutin') {  ?>
                                    <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">  <div class="cardGreen m-3 p-1">
                                    <?php  } ?>

                                    <input type="hidden" name="profilColor" value="<?= $event['profilColor']  ?>">
                                    <div class="d-flex justify-content-evenly m-2">
                                        <img src="../assets/img/<?= $event['profilPicture'] ?? '' ?>" alt="candidateImg" class="imageProfil3">
                                        <div class="infoCandidate">
                                            <p class="fs-5 m-0"><?= $event['pseudo'] ?></p>
                                            <p class="fs-6 fw-light m-0"> <?= $event['lastName'] ?> <?= $event['firstName'] ?></p>
                                            <p class="fs-6 fw-light"><?= $event['city'] ?></p>
                                        </div>
                                    </div>
                                    <p class="m-2 text-center"><?= $event['candidateDescription'] ?></p>
                                    </a>
                                    <div class="row d-flex align-text-bottom">
                                        <i class="far fa-heart text-white text-end fs-3 pe-5" onclick="setLike()" id="heartIconEmpty"></i>
                                    </div></a>
                                    </div>

                                <?php } ?>



                                <div class="row bg-dark text-light justify-content-between fixed-bottom">
                                    <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
                                    <div class="col text-end">Site by Estelle</div>
                                </div>
</body>
<script src="assets/js/script.js">
</script>

</html>