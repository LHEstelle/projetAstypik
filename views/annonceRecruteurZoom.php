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
    </div>
<?php include 'menuCandidats.php'; ?>

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
                        <p class="text-center ms-2"><?= $annonceInfoArray['domaine.name']   ?> - <?= $annonceInfoArray['contractName']   ?> - <?= isset($annonceInfoArray['experienceYear']) ? $annonceInfoArray['experienceYear'] : '0'  ?> ans d'exp.minimum</p>
                        <p class="text-center ms-2"> offre à pourvoir à partir du : <?= $annonceInfoArray['startDate'] ?></p>
                        <i class="far fa-heart d-flex text-white justify-content-end fs-3 mb-5 me-5" onclick="setLike()" id="heartIconEmpty"></i>    
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


            <?php include 'footer.php' ?>


</body>
<script src="assets/js/script.js">
</script>

</html>