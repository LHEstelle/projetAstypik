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
    <style>
        a[href="offresCandidats.php"] {
            border-bottom: #E28850 6px solid;
            text-decoration: none;
            width: 14rem;
        }

        @media screen and (max-width: 1000px) {
            a[href="offresCandidats.php"] {
                border-bottom: #E28850 6px solid;
                text-decoration: none;
                width: 7rem;
            }
        }
    </style>
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
<div class="col-lg-9">
    <?php include 'menuCandidats.php'; ?>
    <h1 class="text-center mt-4"><b><?= isset($_GET['inputSearch']) ? htmlspecialchars(trim(strip_tags($_GET['inputSearch']))) : '' ?></b></h1>
    <p class="text-center text-secondary"><?= isset($_GET['domaineName']) ? implode(',', $_GET['domaineName']) : '' ?> </p>
    <p class="text-center text-secondary"> <?= isset($_GET['contractName']) ? implode(',', $_GET['contractName']) : '' ?> </p>
    <p class="text-center text-secondary"> <?= isset($_GET['profilName']) ? implode(',', $_GET['profilName']) : '' ?> </p>
    <p class="text-center text-secondary"> <?= $exp ?? '0' ?> an(s) exp.</p>
    <div class="d-flex justify-content-center">
        <a href="superCactus.php">
            <p class="text-center superCactus m-2">SuperCactus</p>
        </a>
        <a href="peterPaon.php">
            <p class="text-center peterPaon m-2">PeterPaon</p>
        </a>
        <a href="spiderLutin.php">
            <p class="text-center spiderLutin m-2">SpiderLutin</p>
        </a>
        <a href="ironSpoke.php">
            <p class="text-center ironSpoke m-2">IronSpoke</p>
        </a>
    </div>

    <p class="m-4 text-center"> La couleur des offres d'emplois correspond au type de profil recherch?? pr??f??rentiellement pour ce poste <br> ( superCactus, perterPaon, spiderLutin ou ironSpoke ). <br> Bonne nouvelle! Vous pouvez postuler ?? toutes les offres m??me si celle-ci ne correspond pas ?? votre profil! ????<br> Cependant , une offre correspondant ?? votre profil sera potentiellement plus adapt??e ?? vos talents! ???? </p>

    <div class="myCards d-flex justify-content-start m-3 mt-5 ms-3">
        <?php foreach ($allOfferssArray as $event) {  ?>

            <?php if (isset($event['profilColor']) && $event['profilColor'] == 'superCactus') {  ?>
                <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                    <div class="cardRed m-4 p-0">
                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'peterPaon') {  ?>
                        <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                            <div class="cardCandidate m-4 p-0">
                            <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'ironSpoke') {  ?>
                                <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                                    <div class="cardBlue m-4 p-0">
                                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'spiderLutin') {  ?>
                                        <a href="annonceRecruteurZoom.php?id=<?= $event['idAnnonce'] ?>">
                                            <div class="cardGreen m-4 p-0">
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
                                        <div class="d-flex justify-content-evenly row">
                                            <div class="publicationDate fw-light pt-2 col-8">
                                                <p>publi??e le : <?= $event['publicationDate'] ?></p>
                                            </div>
                                            <div class="col lineHeight">
                                                <i id="<?= $event['idAnnonce'] ?>" class="fa <?= in_array($event['idAnnonce'], $likesCandidateArray) ? 'fa-heart' : 'fa-heart-o' ?> text-white fs-3 ms-1 test p-0 heart"></i>
                                                <div class="p-0 d-table-cell align-top text-white">
                                                    <span class="like"> LIKE </span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>



                                <?php } ?>
                                <script>
                                    const test = document.querySelectorAll('.test');
                                    test.forEach(element => {
                                        element.addEventListener('click', function() {
                                            if (this.classList.contains('fa-heart-o')) {
                                                this.classList.remove('fa-heart-o');
                                                this.classList.add('fa-heart');
                                                let idOfferLike = this.id

                                                $.ajax({
                                                    url: 'offresCandidats.php',
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
                                                    url: 'offresCandidats.php',
                                                    type: 'post',
                                                    data: {
                                                        idOfferDislike: idOfferDislike,
                                                    },
                                                });
                                            }
                                        })

                                    });
                                </script>
                            </div>
                    </div>
    </div>
</div>
<div id="scroll_to_top">
    <a href="#top"><img src="../assets/img/scrolltop.png" alt="Retourner en haut" /></a>
</div>






<?php include 'footer.php' ?>
</body>

</html>