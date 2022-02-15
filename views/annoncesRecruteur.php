<?php
require_once '../controller/controller_index.php';

var_dump($_SERVER);
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

<body class="viewRH">

    <div class="row">
        <div class="col-lg-3 filters pb-5">


            <div class="d-flex justify-content-center">
                <a href="index.php">
                    <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3">
                </a>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE POSTE</b></p>
            <div class="d-flex">
                <input class="form-control inputSearch me-2 ms-3" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btnSearch btn text-white me-3" type="submit">Search</button>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE CONTRAT</b></p>
            <div class="form-check col-10 ms-3">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                <label class="form-check-label" for="flexRadioCDI">
                    CDI
                </label>
            </div>
            <div class="form-check col-10  ms-3">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioCDD">
                <label class="form-check-label" for="flexRadioCDD">
                    CDD
                </label>
            </div>
            <div class="form-check col-10  ms-3">
                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioAlternance">
                <label class="form-check-label" for="flexRadioAlternance">
                    Alternance
                </label>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>EXPERIENCE</b></p>
            <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
            <div class="d-flex">
                <input type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center" min="0" max="50">
                <button class="btnSearch btn text-white mt-3 me-3" type="submit">Search</button>
            </div>

            <p class="border-bottom m-4 p-3 col-10 text-white"><b>COMPETENCES</b></p>
            <div class="d-flex">
                <input class="form-control inputSearch me-2 ms-3" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btnSearch btn text-white me-3" type="submit">Search</button>
            </div>

        </div>



        <div class="col-lg-9">
            <div class="d-flex justify-content-evenly align-items-end text-center">
                <a href="annoncesRecruteur.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark p-3 col-3">Mes offres d'emplois</a>
                <a href="viewRH.php" id="candidateProfil1" onclick="colorOrangeCandidateProfil1()" class="menu text-dark p-3 col-3">Profils candidats</a>
                <a href="likesRecruteur.php" id="likes1" onclick="colorOrangeLikes1()" class="menu text-dark p-3 col-3">Likes</a>
                <a href="annoncesRecruteur.php" class="fas fa-briefcase menuIcon p-3 col-3 d-lg-none"></a>
                <a href="viewRH.php" class="fas fa-users menuIcon p-3 col-3 d-lg-none"></a>
                <a href="likesRecruteur.php" class="fas fa-heart menuIcon p-3 col-3 d-lg-none"></a>
            </div>



            <?php foreach ($arrayAnnounces as $event) { ?>
                <div class="row mt-5 m-2 pb-5 border-bottom text-center d-flex justify-content-center">


                    <div class="jobColor ms-2">
                    </div>

                    <div class="jobName col-lg-4 col-12 ms-3 me-3">
                        <a href="detailRecrutor.php?id=<?= $event['id'] ?>" class="announceLink">
                            <h1 class="fs-3"><b><?= $event['job'] ?></b></h1>
                            <p class="text-secondary"><?= $event['contract'] ?> - <?= $event['experience'] ?> ans d'expérience</p>
                        </a>
                    </div>
                    <p class="mt-3 col"><?= $event['likes'] ?> candidats ont liké votre annonce</p>
                    <div class="col-lg-3 col-12">
<!-- Button trigger modal -->
                        <button type="button" class="btn btnMofidy text-white col-10 mb-2 ms-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Modifier
                        </button>
                         <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h1 class="fs-2 text-white pb-2s">Ajout d'une annonce</h1>
                            <div class="d-flex m-2 justify-content-end">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                        </div>
                        <div class="modal-body  myModal">

                            <div class="modal-title text-white" id="exampleModalLabel">
                            <form method="GET" action = "annoncesRecruteur.php">
                                    <p class=""><b>TYPE DE POSTE</b></p>
                                    <div class="d-flex">
                                        <input value="<?= $_GET['jobType'] ?>" class="form-control inputSearch me-2 ms-3" name="" type="text" placeholder="ex: chargé(e) de communication" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
                                    </div>
                                    <p class="mt-3"><b>NOM DE L'ENTREPRISE</b></p>
                                    <div class="d-flex">
                                        <input class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: Renault" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
                                    </div>
                                    <p class="mt-3 text-center"><b>TYPE DE CONTRAT (facultatif)</b></p>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            CDI
                                        </label>
                                    </div>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            CDD
                                        </label>
                                    </div>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            Alternance
                                        </label>
                                    </div>
                                    <p class="mt-3"><b>EXPERIENCE (facultatif)</b></p>
                                    <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
                                    <div class="d-flex">
                                        <input type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center" min="0" max="50">
                                        <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
                                    </div>

                                    <p class="mt-3"><b>COMPETENCES (facultatif)</b></p>
                                    <div class="d-flex">
                                        <input class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: PHP, management" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
                                    </div>
                                    <p class="mt-3"><b>DESCRIPTION DE L'OFFRE</b></p>
                                    <textarea class="col-12" name="description"></textarea>
                                </form>
                            </div>

                        </div>

                        <div class="modal-footer bg-dark">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
                        <button type="button" class="btn btnRemove text-white col-10 ms-4">Supprimer</button>
                    </div>
                </div>
            <?php } ?>




            <!-- Button trigger modal -->
            <div class="d-flex justify-content-center">
                <button type="button" class="mb-5 btn btn-secondary btnAddAnnonce" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter une annonce
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h1 class="fs-2 text-white pb-2s">Ajout d'une annonce</h1>
                            <div class="d-flex m-2 justify-content-end">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                        </div>
                        <div class="modal-body  myModal">

                            <div class="modal-title text-white" id="exampleModalLabel">
                            <form method="GET" action = "annoncesRecruteur.php" >
                                    <p class=""><b>TYPE DE POSTE</b></p>
                                    <div class="d-flex">
                                        <input value="<?= isset($_GET['jobType']) ? htmlspecialchars($_GET['jobType']) : "" ?>" name="jobType" id="jobType" class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: chargé(e) de communication" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Ajouter</button> -->
                                    </div>
                                    <p class="mt-3"><b>NOM DE L'ENTREPRISE</b></p>
                                    <div class="d-flex">
                                        <input class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: Renault" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Ajouter</button> -->
                                    </div>
                                    <p class="mt-3"><b>TYPE DE CONTRAT (facultatif)</b></p>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            CDI
                                        </label>
                                    </div>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            CDD
                                        </label>
                                    </div>
                                    <div class="form-check d-flex ms-3">
                                        <input class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                                        <label class="form-check-label" for="flexRadioCDI">
                                            Alternance
                                        </label>
                                    </div>
                                    <p class="mt-3"><b>EXPERIENCE (facultatif)</b></p>
                                    <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
                                    <div class="d-flex">
                                        <input type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center" min="0" max="50">
                                        <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Ajouter</button> -->
                                    </div>

                                    <p class="mt-3"><b>COMPETENCES (facultatif)</b></p>
                                    <div class="d-flex">
                                        <input class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: PHP, management" aria-label="Rechercher">
                                        <!-- <button class="btnSearch btn text-white me-3" type="submit">Ajouter</button> -->
                                    </div>
                                    <p class="mt-3"><b>DESCRIPTION DE L'OFFRE</b></p>
                                    <textarea class="col-12" name="description"></textarea>
                                
                            </div>

                        </div>

                        <div class="modal-footer bg-dark">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                        </form>
                    </div>
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