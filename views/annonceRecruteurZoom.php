<?php

require_once '../controller/controller_annonceRecruteurZoom.php';

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
    </div>


    <div class="d-flex justify-content-center col-12">
        <?php if (isset($annonceInfoArray['profilColor']) && $annonceInfoArray['profilColor'] == 'superCactus') {  ?>
            <div class="titleAnnounceRed  mt-4">
            <?php  } else if (isset($annonceInfoArray['profilColor']) && $annonceInfoArray['profilColor'] == 'peterPaon') {  ?>
                <div class="titleAnnounceYellow  mt-4">

                <?php  } else if (isset($annonceInfoArray['profilColor']) && $annonceInfoArray['profilColor'] == 'ironSpoke') {  ?>
                    <div class="titleAnnounceBlue  mt-4">

                    <?php  } else if (isset($annonceInfoArray['profilColor']) && $annonceInfoArray['profilColor'] == 'spiderLutin') {  ?>
                        <div class="titleAnnounceGreen  mt-4">
                        <?php  } ?>
                        <div class="d-flex justify-content-center">
                            <img src="../assets/img/<?= $annonceInfoArray['profilPicture'] ?? '' ?>" alt="enterpriseImg" class="imageProfil3 mt-2">
                            <h1 class="text-center mt-4 ms-2"><?= $annonceInfoArray['job']   ?></h1>
                        </div>
                        <p class="text-center ms-2"><?= $annonceInfoArray['recruteurName']   ?></p>
                        <p class="text-center ms-2"><?= $annonceInfoArray['contractName']   ?></p>
                        <p class="text-center ms-2"> offre à pourvoir à partir du : <?= $annonceInfoArray['startDate'] ?></p>
                        </div>
                    </div>
                </div>


            </div>
            <?php if (isset($_POST['conversationButton'])) {  ?>
                <div class="d-flex justify-content-center mt-3">
                    <div class="coordonnees">
                        <h4 class="text-center mt-3">COORDONNEES</h4>
                        <div class="m-5 text-center">
                            <p class=""><?= $annonceInfoArray['adress']   ?> <?= $annonceInfoArray['postalCode']   ?> <?= $annonceInfoArray['city']   ?></p>
                        </div>
                        <div class="m-5 text-center">
                            <p class=""><?= $annonceInfoArray['mail']   ?></p>
                        </div>
                        <div class="m-5 text-center">
                            <p class=""><?= $annonceInfoArray['phone']   ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="m-5 text-center">
                <p class=""><?= $annonceInfoArray['offerDescription']   ?></p>
            </div>

            <div class="m-5 text-center fw-lighter">
                <p class=""> publiée le <?= $annonceInfoArray['publicationDate']   ?></p>
            </div>


            <div class="row bg-dark text-light justify-content-between fixed-bottom">
                <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
                <div class="col text-end">Site by Estelle</div>
            </div>


</body>
<script src="assets/js/script.js">
</script>

</html>