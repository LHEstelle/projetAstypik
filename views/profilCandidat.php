<?php
require_once '../controller/controller_index.php';
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

<body class="backgroundProfil">
    <div class="row">
        <a href="index.php" class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
        </a>

        <div class="pb-3 bgProfil">
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
    <?php foreach ($arrayCandidates as $event) { ?>
    <div class="container profilCandidate">
        <div class="d-flex justify-content-center mt-4">
            <img src="<?= $event['picture'] ?>" alt="candidateImg" class="imageProfil3 p-0 ms-4">
        </div>
        <p class="fs-6 fw-light text-white text-center">Changer ma photo de profil</p>

        <div class="text-center m-3">
            <p class="profilText"><b>TYPE DE POSTE</b></p>
            <p class="text-white">
            <?= $event['job'] ?>
            </p>

            <p class="profilText"><b>TYPE DE CONTRAT</b></p>
            <p class="text-white">
            <?= $event['contract'] ?>
            </p>
            <p class="profilText"><b>EXPERIENCE</b></p>
            <p class="text-white "><?= $event['experience'] ?> ans</p>

            <p class="profilText "><b>COMPETENCES</b></p>
            <p class="text-white ">
            <?= $event['competences'] ?>
            </p>
            <p class="profilText "><b>PETIT TEXTE DE DESCRIPTION</b></p>

            <p class="text-white "><?= $event['summary'] ?></p>
        </div>

        <!-- Button trigger modal -->
        <div class="d-flex justify-content-center ">
            <button type="button " class="mb-5 btn btn-secondary btnAddAnnonce " data-bs-toggle="modal " data-bs-target="#exampleModal">
        Modifier
      </button>
        </div>
    </div>
    <?php } ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1 " aria-labelledby="exampleModalLabel " aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header bg-dark ">
                    <div class="d-flex m-2 justify-content-end ">
                        <button type="button " class="btn-close btn-close-white " data-bs-dismiss="modal " aria-label="Close "></button>
                    </div>
                    <h1 class="fs-2 text-center text-white pb-2 ">Modifier mon profil</h1>
                </div>
                <div class="modal-body myModal ">

                    <div class="modal-title text-white " id="exampleModalLabel ">
                        <form>
                            <p class=" "><b>TYPE DE POSTE</b></p>
                            <div class="d-flex ">
                                <input class="form-control inputSearch me-2 ms-3 " type="text " placeholder="ex: commerce, ouvert à toutes propositions... " aria-label="Rechercher ">
                                <button class="btnSearch btn text-white me-3 " type="submit ">Ajouter</button>
                            </div>

                            <p class="mt-3 "><b>TYPE DE CONTRAT (facultatif)</b></p>
                            <div class="form-check ms-3 ">
                                <input class="form-check-input " type="radio " name="flexRadioDefault " id="flexRadioCDI ">
                                <label class="form-check-label " for="flexRadioCDI ">
                  CDI
                </label>
                            </div>
                            <div class="form-check ms-3 ">
                                <input class="form-check-input " type="radio " name="flexRadioDefault " id="flexRadioCDD ">
                                <label class="form-check-label " for="flexRadioCDD ">
                  CDD
                </label>
                            </div>
                            <div class="form-check ms-3 ">
                                <input class="form-check-input " type="radio " name="flexRadioDefault " id="flexRadioAlternance ">
                                <label class="form-check-label " for="flexRadioAlternance ">
                  Alternance
                </label>
                            </div>
                            <p class="mt-3 "><b>EXPERIENCE (facultatif)</b></p>
                            <label for="experienceYear " class="ms-3 text-white ">Années d'expériences dans le domaine recherché:</label>
                            <div class="d-flex ">
                                <input type="number " class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center " min="0 " max="50 ">
                                <button class="btnSearch btn text-white mt-3 me-3 " type="submit ">Ajouter</button>
                            </div>

                            <p class="mt-3 "><b>COMPETENCES (facultatif)</b></p>
                            <div class="d-flex ">
                                <input class="form-control inputSearch me-2 ms-3 " type="text " placeholder="ex: PHP, management " aria-label="Rechercher ">
                                <button class="btnSearch btn text-white me-3 " type="submit ">Ajouter</button>
                            </div>
                            <p class="mt-3 "><b>PETIT TEXTE DE DESCRIPTION</b></p>
                            <textarea class="col-12 " name="description " placeholder="ex: Très créative, je suis actuellement à la recherche d 'un emploi dans le commerce. J'aime le travail en équipe, et si vous n
                'avez pas peur de mélanger sérieux et humour je suis celle qu'il vous faut! "></textarea>
                        </form>
                    </div>

                </div>

                <div class="modal-footer bg-dark ">
                    <button type="button " class="btn btn-secondary " data-bs-dismiss="modal ">Fermer</button>
                    <button type="button " class="btn btn-primary ">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row bg-dark text-light justify-content-between fixed-bottom ">
        <a class="col text-start text-light text-decoration-none " href="# ">Mentions légales</a>
        <div class="col text-end ">Site by Estelle</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <script src="../assets/js/script.js ">
    </script>
</body>


</html>