<?php
require_once '../controller/controller_viewRH.php';
include 'filtresCandidat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a[href="viewRH.php"] {
            border-bottom: #E28850 6px solid;
            text-decoration: none;
            width: 14rem;
        }

        @media screen and (max-width: 1000px) {
            a[href="viewRH.php"] {
                border-bottom: #E28850 6px solid;
                text-decoration: none;
                width: 7rem;
            }
        }
    </style>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>

</head>

<div class="col-lg-9">

    <?php include 'menuRecruteurs.php' ?>

    <h1 class="text-center mt-4"><b>Chargé de communication</b></h1>
    <p class="text-center text-secondary"><?= $filtersArray['domaine'] ?? '' ?><?= $filtersArray['contract'] ?? '' ?><?= $filtersArray['profil'] ?? '' ?><?= $filtersArray['experience'] ?? '' ?></p>
    <div class="d-flex justify-content-center">
        <a href="superCactusR.php">
            <p class="text-center superCactus m-2">SuperCactus</p>
        </a>
        <a href="peterPaonR.php">
            <p class="text-center peterPaon m-2">PeterPaon</p>
        </a>
        <a href="spiderLutinR.php">
            <p class="text-center spiderLutin m-2">SpiderLutin</p>
        </a>
        <a href="ironSpokeR.php">
            <p class="text-center ironSpoke m-2">IronSpoke</p>
        </a>
    </div>


    <div class="myCards d-flex justify-content-start m-3 mt-5 ms-3">



        <?php foreach ($allCandidatesArray as $event) {
            if (date_create($event['birthDate']) == TRUE || date_create($event['birthDate']) != FALSE) {
                $dateNaissance = $event['birthDate'];
                $aujourdhui = date("Y-m-d");
                $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
                $age = $diff->format('%y');
            }
        ?>

            <?php if (isset($event['profilColor']) && $event['profilColor'] == 'superCactus') {  ?>
                <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">
                    <div class="cardRed m-4 p-1">
                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'peterPaon') {  ?>
                        <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">
                            <div class="cardCandidate m-4 p-1">

                            <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'ironSpoke') {  ?>
                                <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">
                                    <div class="cardBlue m-4 p-1">

                                    <?php  } else if (isset($event['profilColor']) && $event['profilColor'] == 'spiderLutin') {  ?>
                                        <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">
                                            <div class="cardGreen m-4 p-1">
                                            <?php  } ?>

                                            <input type="hidden" name="profilColor" value="<?= $event['profilColor']  ?>">
                                            <div class="d-flex justify-content-evenly m-2">
                                                <img src="../assets/img/<?= $event['profilPicture'] ?? '' ?>" alt="candidateImg" class="imageProfil3">
                                                <div class="infoCandidate">
                                                    <p class="fs-6 m-0 candidateNameTruncate"><?= $event['lastName'] ?> <?= $event['firstName'] ?></p>
                                                    <p class="fs-6 fw-light m-0"> <?= $event['pseudo'] ?></p>
                                                    <p class="fs-6 fw-light"><?= $event['city'] ?> - <?= $age ?> ans</p>

                                                </div>
                                            </div>

                                            <div class=" jobDescriptionTruncate m-2">
                                                <div class=" jobDescriptionTruncate m-2">
                                                    <?= strip_tags($event['candidateDescription']) ?>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="row d-flex align-text-bottom">


                                            <i class="fa <?= in_array($event['idCandidat'], $likesRecrutorArray) ? 'fa-heart' : 'fa-heart-o' ?> text-white text-end fs-3 test p-1 pe-4"></i>

                                        </div>
                                    </div>
                                <?php } ?>
                                <script>
                                    const test = document.querySelectorAll('.test');
                                    test.forEach(element => {
                                        element.addEventListener('click', function() {
                                            if (this.classList.contains('fa-heart-o')) {
                                                this.classList.remove('fa-heart-o')
                                                this.classList.add('fa-heart')
                                            } else {
                                                this.classList.remove('fa-heart')
                                                this.classList.add('fa-heart-o')
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