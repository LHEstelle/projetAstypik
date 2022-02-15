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
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
</head>

<body class="">
    <div class="row">
        <a href="index.php" class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
        </a>

        <div class="pb-3">
            <div class="d-flex justify-content-evenly align-items-end text-center">
         

            <a href="annoncesRecruteur.php" id="jobOffer1" onclick="colorOrangeJobOffer1()" class="menu text-dark p-3 col-3">Mes offres d'emplois</a>
                <a href="viewRH.php" id="candidateProfil1" onclick="colorOrangeCandidateProfil1()" class="menu text-dark p-3 col-3">Profils candidats</a>
                <a href="likesRecruteur.php" id="likes1" onclick="colorOrangeLikes1()" class="menu text-dark p-3 col-3">Likes</a>
                <a href="annoncesRecruteur.php" class="fas fa-briefcase menuIcon p-3 col-3 d-lg-none"></a>
                <a href="viewRH.php" class="fas fa-users menuIcon p-3 col-3 d-lg-none"></a>
                <a href="likesRecruteur.php" class="fas fa-heart menuIcon p-3 col-3 d-lg-none"></a>
            </div>
        </div>
    </div>
    
    <?php foreach ($arrayCandidates as $event) { 
        if ($event["id"]== $_GET["id"]){?>
    <div class="container profilCandidateDetail col-8">
        <div class="row mt-4">
            <div class="col-5 row text-white d-flex align-items-center infoProfil bg-dark">
            <img src="<?= $event['picture'] ?>" alt="candidateImg" class="imageProfil3 col-1 p-0 ms-4">
            <div class="col-6">
            <p class=""><b><?= $event['firstName']. " " . $event['lastName'] ?></b></p>
            <p class=""><?= $event['age'] . " ". $event['place'] ?></p>
        </div>
        </div>

        <div class="col-5 m-3">
        
            <p class="profilTextDetail"><b>TYPE DE POSTE</b></p>
            <p class="">
            <?= $event['job'] ?>
            </p>

            <p class="profilTextDetail"><b>TYPE DE CONTRAT</b></p>
            <p class="">
            <?= $event['contract'] ?>
            </p>
            <p class="profilTextDetail"><b>EXPERIENCE</b></p>
            <p class=" "><?= $event['experience'] ?> ans</p>

            <p class="profilTextDetail"><b>COMPETENCES</b></p>
            <p class=" ">
            <?= $event['competences'] ?>
            </p>
            <p class="profilTextDetail"><b>DESCRIPTION</b></p>

            <p class=""><?= $event['summary'] ?></p>
        </div>
        </div>
        <?php }} ?>

    

        <?php foreach ($arrayAnnounces as $event) { 
        if ($event["id"]== $_GET["id"]){?>
    <div class="d-flex justify-content-center">
            <div class="titleAnnounce  mt-4">
                <h1 class="text-center"><?= $event['job'] ?></h1>
                <p class="text-center"><?= $event['enterprise'] ?></p>
                <p class="text-center"><?= $event['contract'] ?></p>
            </div>
        </div>
    </div>


    </div>

    <p class="text-center mt-5 ms-5 me-5"><?= $event['jobDescription'] ?></p>

    <div class="d-flex justify-content-center mt-4">
        <button type="button" class="btn btnMofidy text-white mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Modifier
          </button>
    </div>
        <?php }} ?>

        
    
    <div class="row bg-dark text-light justify-content-between fixed-bottom">
        <a class="col text-start text-light text-decoration-none " href="# ">Mentions légales</a>
        <div class="col text-end ">Site by Estelle</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <script src="assets/js/script.js ">
    </script>
</body>


</html>