<?php
require_once '../controller/controller_annoncesRecruteur.php';
include 'filtresCandidat.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    a[href="annoncesRecruteur.php"]
    {
        border-bottom: #E28850 6px solid;
        text-decoration: none;
        width: 14rem;
    }
    @media screen and (max-width: 1000px) {
        a[href="annoncesRecruteur.php"]
    {
        border-bottom: #E28850 6px solid;
        text-decoration: none;
        width: 7rem;  
    }
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
        <?php include 'menuRecruteurs.php' ?>



            <?php foreach ($annoncesArray as $annonces) { ?>
                <form action="" method="POST">
                    <div class="row mt-5 m-2 pb-5 border-bottom text-center d-flex justify-content-center">
                   
                        <?php if (isset($annonces['profilColor']) && $annonces['profilColor'] == 'superCactus') {  ?>
                            <div class="jobColorRed ms-2">
                            </div>
                        <?php  } else if (isset($annonces['profilColor']) && $annonces['profilColor'] == 'peterPaon') {  ?>
                            <div class="jobColorYellow ms-2">
                            </div>

                        <?php  } else if (isset($annonces['profilColor']) && $annonces['profilColor'] == 'ironSpoke') {  ?>
                            <div class="jobColorBlue ms-2">
                            </div>

                        <?php  } else if (isset($annonces['profilColor']) && $annonces['profilColor'] == 'spiderLutin') {  ?>
                            <div class="jobColorGreen ms-2">
                            </div>
                        <?php  } ?>

                     
                        <div class="jobName col-lg-4 col-12 ms-3 me-3">
                        <a href="annonceRecruteurZoom.php?id=<?= $annonces['idAnnonce'] ?>">
                            <h1 class="fs-3"><b><?= $annonces['job'] ?></b></h1>
                            <p class="text-secondary"><?= $annonces['contractName'] ?> - <?= $annonces['experienceYear'] ?> ans d'expérience</p>
                            </a>
                        </div>
                        <!-- <p class="mt-3 col"><?= $event['likes'] ?> candidats ont liké votre annonce</p> -->
                        <div class="col-lg-3 col-12">


                            <input type="hidden" name="idAnnonce" value="<?= $annonces['idAnnonce'] ?>">
                            <a href="modifierAnnonce.php?id=<?= $annonces['idAnnonce'] ?>">
                                <button type="button" class="btn btnMofidy text-white col-10 mt-4 ms-4">
                                    Modifier/supprimer
                                </button></a>

                </form>
                <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDel">Supprimer une annonce</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Attention! Vous êtes sur le point de supprimer votre annonce.
                            </div>
                            <div class="modal-footer">

                                <form action="" method="POST">

                                    <input type="hidden" name="idDeletePatient" value="<?= $annonces['idAnnonce'] ?>">
                                    <input type="hidden" name="idAnnonce" value="<?= $annonces['idAnnonce'] ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" name="deleteButton" value="<?= $annonces['idAnnonce'] ?>" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
                        
    </div>


<?php } ?>





<div class="d-flex justify-content-center">
    <a href="creerAnnonce.php" class="link">
        <button type="button" class="mb-5 btn btn-secondary btnAddAnnonce">
            Ajouter une annonce
        </button>
    </a>
</div>



<?php include 'footer.php' ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../assets/js/script.js"></script>
</body>


</script>

</html>