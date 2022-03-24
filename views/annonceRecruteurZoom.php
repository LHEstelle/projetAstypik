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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
    <?php if (isset($_SESSION['siretNumber'])) {
        include 'menuRecruteurs.php';
    } else {
        include 'menuCandidats.php';
    } ?>

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
                        <div class="d-flex justify-content-center mb-2">
                            <img src="../assets/img/<?= $annonceInfoArray['profilPicture'] ?? '' ?>" alt="enterpriseImg" class="imageProfil3 mt-2">
                            <h1 class="text-center mt-4 ms-2"><?= $annonceInfoArray['job']   ?></h1>
                        </div>
                        <p class="text-center ms-2"><?= $annonceInfoArray['recruteurName']   ?> - <?= $annonceInfoArray['city']   ?></p>
                        <p class="text-center ms-2"><?= $annonceInfoArray['domaine.name']   ?> - <?= $annonceInfoArray['contractName']   ?> - <?= isset($annonceInfoArray['experienceYear']) ? $annonceInfoArray['experienceYear'] : '0'  ?> ans d'exp.minimum</p>
                        <p class="text-center ms-2"> offre à pourvoir à partir du : <?= $annonceInfoArray['startDate'] ?></p>

                        <div class="d-flex justify-content-end m-4">
                            <div class="col-11"></div>
                            <div class="lineHeight col">
                                <i id="<?= $annonceInfoArray['idAnnonce'] ?>" class="fa <?= in_array($annonceInfoArray['idAnnonce'], $likesCandidateArray) ? 'fa-heart' : 'fa-heart-o' ?> text-white text-end fs-3 test p-0 heart"></i>
                                <div class="p-0 d-table-cell align-top text-white">
                                    <span class=""> LIKE </span>
                                </div>
                            </div>
                        </div>

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
            <div class="d-flex justify-content-center mt-3 row">
                <div class="jobDescription text-center col">
                    <p class=""><?= $annonceInfoArray['offerDescription']   ?></p>
                </div>
            </div>
            <div class="m-5 text-center fw-lighter">
                <p class=""> publiée le <?= $annonceInfoArray['publicationDate']   ?></p>
            </div>

            <script>
                const test = document.querySelectorAll('.test');
                test.forEach(element => {
                    element.addEventListener('click', function() {
                        if (this.classList.contains('fa-heart-o')) {
                            this.classList.remove('fa-heart-o');
                            this.classList.add('fa-heart');
                            let idOfferLike = this.id

                            $.ajax({
                                url: 'annonceRecruteurZoom.php?id=' + idOfferLike,
                                type: 'post',
                                data: {
                                    idOfferLike: idOfferLike,
                                },

                            });
                        } else {
                            this.classList.remove('fa-heart')
                            this.classList.add('fa-heart-o')
                            let idOfferDislike = this.id
                            $.ajax({
                                url: 'annonceRecruteurZoom.php?id=' + idOfferDislike,
                                type: 'post',
                                data: {
                                    idOfferDislike: idOfferDislike,
                                },
                            });
                        }
                    })

                });
            </script>
            <?php include 'footer.php' ?>


</body>
<script src="assets/js/script.js">
</script>

</html>