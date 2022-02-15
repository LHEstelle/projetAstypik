<?php
require_once '../controller/controller_details.php';
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
    <script src="https://cdn.tiny.cloud/1/y17w4t3wskvqoh0zg5y2e8yuvmjwv27vcfp9grnzbg2081eg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
    <script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
</head>

<body class="">
    <div class="row">
        <a href="index.php" class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
        </a>

        <div class="pb-3">
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
        </div>
    </div>

    <form method="POST" action="">
        <div class="ms-3">
            <p class=""><b>TYPE DE POSTE</b></p>
            <div class="d-flex">
                <input value="<?= $_POST["jobType"] ?? ' ' ?>" class="form-control inputSearch me-2 ms-3" name="jobType" type="text" placeholder="ex: chargé(e) de communication" aria-label="Rechercher">

            </div>
            <p class="mt-3"><b>NOM DE L'ENTREPRISE</b></p>
            <div class="d-flex">
                <input value="<?= $_POST["enterprise"] ?? ' ' ?>" class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: Renault">

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
                <input value="<?= $_POST["enterprise"] ?? ' ' ?>" type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3" min="0" max="50">
                <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
            </div>

            <p class="mt-3"><b>COMPETENCES (facultatif)</b></p>
            <div class="d-flex">
                <input value="<?= $_POST["competence"] ?? ' ' ?>" class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: PHP, management" aria-label="Rechercher">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>DESCRIPTION DE L'OFFRE</b></p>
            <textarea class="col-12" id="mytextarea" name="mytextarea"><?= $_POST["jobDescription"] ?? ' ' ?></textarea>
            <button type="submit" class="mb-5 btn btn-secondary btnAddAnnonce">
                Ajouter une annonce
            </button>
        </div>
    </form>

    <div class="row bg-dark text-light justify-content-between fixed-bottom">
        <a class="col text-start text-light text-decoration-none" href="#">Mentions légales</a>
        <div class="col text-end">Site by Estelle</div>
    </div>


</body>
<script src="assets/js/script.js">
</script>

</html>