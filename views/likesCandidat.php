<?php
require_once '../controller/controller_likesCandidat.php';
include 'filtresCandidat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    a[href="likesCandidat.php"]
    {
        border-bottom: #E28850 6px solid;
        text-decoration: none;
        width: 14rem;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--ICI CDN BOOTSRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
</head>



        <div class="col-lg-9">
        <?php include 'menuCandidats.php'; ?>


            <?php foreach ($likesCandidatesArray as $event) {  ?>

                <div class="row mt-5 m-2 pb-5 border-bottom text-center d-flex justify-content-center">
                    <img src="../assets/img/<?= $event['recrutorProfilPicture'] ?? '' ?>" alt="recrutorImg" class="imageProfil3 p-0 ms-4">
                    <div class="jobName col-lg-4 col-12 ms-3 me-3">
                        <a href="annonceRecruteurZoom.php?id=<?= $event['idOfferLiked'] ?>">
                            <h1 class="fs-3"><b><?= $event['job'] ?></b></h1>
                            <p class="text-secondary"> <?= $event['recrutorName'] ?> - <?= $event['contractName'] ?></p>
                        </a>
                    </div>

                    <div class="col-lg-3 col-12">
               
                        <?php foreach ($allRecrutor as $likes) {
                            if (($likes['idCandidat'] == $event['idCandidat']) && ($likes['id_recruteur'] == $event['idRecrutor'])) { ?>
                                <form action="annonceRecruteurZoom.php?id=<?= $event['idOfferLiked'] ?>" method="POST">
                                    <button type="submit" name="conversationButton" class="btn btnMofidy text-white col-10 mb-2 ms-4 mt-4">
                                        Conversation
                                    </button>
                                </form>
                        <?php  }
                        } ?>
                    </div>
                </div>
            <?php } ?>



            <div class="d-flex justify-content-center">
                <a href="offresCandidats.php">
                    <button type="button" class="mb-5 btn btn-secondary btnAddAnnonce" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Trouver d'autres annonces
                    </button>
                </a>
            </div>
        </div>

        <?php include 'footer.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script src="../assets/js/script.js"></script>
</body>


</script>

</html>