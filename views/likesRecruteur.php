<?php
require_once '../controller/controller_likesRecruteur.php';
include 'filtresCandidat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--ICI CDN BOOTSRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
</head>


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


            <?php foreach ($likesRecrutorArray as $event) { ?>

                <div class="row mt-5 m-2 pb-5 border-bottom text-center d-flex justify-content-center">

                    <img src="../assets/img/<?= $event['candidateProfilPicture'] ?? '' ?>" alt="candidateImg" class="imageProfil3 p-0 ms-4">

                    <div class="jobName col-lg-4 col-12 ms-3 me-3">
                        <a href="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>">
                            <h1 class="fs-3"><b> <?= $event['candidatePseudo'] ?> - <?= $event['firstName'] ?> <?= $event['lastName'] ?></b></h1>
                            <p class="text-secondary"><?= $event['profilName'] ?> <?= $event['candidateCity'] ?></p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">

                        <?php if (($allCandidatesLikes[0]['id_candidat'] == $event['idCandidat']) && ($allCandidatesLikes[0]['recrutorId'] == $event['id_recruteur'])) { ?>
                
                                <form action="profilCandidatDetails.php?id=<?= $event['idCandidat'] ?>" method="POST">
                                    <button type="submit" name="conversationButton" class="btn btnMofidy text-white col-10 mb-2 ms-4 mt-4">
                                        Conversation
                                    </button>
                                </form>
                        
                        <?php  } ?>
                    </div>

                </div>
            <?php } ?>



            <div class="d-flex justify-content-center">
                <a href="viewRH.php">
                    <button type="button" class="mb-5 btn btn-secondary btnAddAnnonce" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Trouver d'autres talents
                    </button>
                </a>
            </div>
        </div>

        <div class="row bg-dark text-light justify-content-between fixed-bottom">
            <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
            <div class="col text-end">Site by Estelle</div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="../assets/js/script.js"></script>
</body>


</script>

</html>