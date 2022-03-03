<?php
require_once '../controller/controller_offresCandidat.php';
include 'filtresCandidat.php';
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


<div class="col-lg-9">
    <div class="d-flex justify-content-evenly align-items-end text-center">
        <a href="profilCandidat.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark p-3 col-3">Mon profil</a>
        <a href="offresCandidats.php" id="candidateProfil1" onclick="colorOrangeCandidateProfil1()" class="menu text-dark p-3 col-3">Offres d'emplois</a>
        <a href="likesCandidat.php" id="likes1" onclick="colorOrangeLikes1()" class="menu text-dark p-3 col-3">Likes</a>

        <a href="profilCandidat.php" class="fas fa-user menuIcon p-3 col-3 d-lg-none"></a>
        <a href="offresCandidats.php" class="fas fa-briefcase menuIcon p-3 col-3 d-lg-none"></a>
        <a href="likesCandidat.php" class="fas fa-heart menuIcon p-3 col-3 d-lg-none"></a>
    </div>
    <h1 class="text-center mt-4"><b>Chargé de communication</b></h1>
    <p class="text-center text-secondary">CDI - 2 ans d'expérience</p>



    <div class="myCards d-flex justify-content-start m-3 mt-5 ms-3">
        <?php foreach ($allOfferssArray as $event) {  ?>

            <?php if (isset($event['profilColor']) && $event['profilColor'] == 'superCactus') {  ?>
                <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                    <div class="cardRed m-4 p-1">
                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'peterPaon') {  ?>
                        <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                            <div class="cardCandidate m-4 p-1">
                            <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'ironSpoke') {  ?>
                                <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                                    <div class="cardBlue m-4 p-1">
                                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'spiderLutin') {  ?>
                                        <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                                            <div class="cardGreen m-4 p-1">
                                            <?php  } ?>

                                            <div class="d-flex justify-content-evenly m-2">
                                                <img src="../assets/img/<?= $event['profilPicture'] ?? '' ?>" alt="enterpriseImg" class="imageProfil3 me-1">

                                                <div class="infoCandidate">
                                                    <p class="fs-5 m-0 jobNameTruncate"><?= $event['job'] ?></p>
                                                    <p class="fs-6 fw-light m-0 recruteurName"><?= $event['recruteurName'] ?></p>
                                                    <p class="fs-6 fw-light"><?= $event['contractName'] ?></p>
                                                </div>
                                            </div>

                                            <div class="m-2 jobDescriptionTruncate">
                                                <div class="m-2 jobDescriptionTruncate"><?= strip_tags($event['offerDescription']) ?></div>
                                            </div>

                                        </a>
                                        <div class="d-flex justify-content-evenly">
                                            <div class="publicationDate fw-light">
                                                <p>date de publication : <?= $event['publicationDate'] ?></p>
                                            </div>
                                            <i class="fa <?= in_array($event['idAnnonce'], $likesCandidateArray) ? 'fa-heart' : 'fa-heart-o' ?> text-white text-end fs-3 test p-0"></i>

                                        </div>

                                    </div>



                                <?php } ?>

                            </div>
                    </div>
    </div>
</div>
<div id="scroll_to_top">
    <a href="#top"><img src="../assets/img/scrolltop.png" alt="Retourner en haut" /></a>
</div>






<div class="row bg-dark text-light justify-content-between fixed-bottom">
    <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
    <div class="col text-end">Site by Estelle</div>
</div>
</body>

</html>