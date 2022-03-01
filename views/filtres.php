<?php
require '../controller/controller_filtresCandidats.php';

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

    <script>
        function seeFilters() {
    document.getElementById("heartIconEmpty").style.display = "block"
    document.getElementById("heartIcon").style.display = "none"
}
    </script>
</head>

<body class="viewRH">

    <div class="row">
        <div class="col-lg-3">
            <div class="filters pb-5">


                <div class="d-flex justify-content-center">
                    <a href="index.php">
                        <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3">
                    </a>
                </div>
            </div>
            <div class="filtersHide pb-5">
                <div class="div">
                    <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE POSTE</b></p>

                    <?php foreach ($domainArray as $domain) { ?>
                        <div class="form-check col-10 ms-3">
                            <input class="form-check-input" type="checkbox" name="domaine" value="<?= $domain["id"] ?>" id="<?= $domain["id"] ?>">
                            <label class="form-check-label text-white" for="<?= $domain["id"] ?>">

                                <?= $domain["name"] ?>
                            </label>
                        </div>


                    <?php } ?>



                    <p class="border-bottom m-4 p-3 col-10 text-white"><b>TYPE DE CONTRAT</b></p>

                    <?php foreach ($contractArray as $contract) { ?>
                        <div class="form-check col-10 ms-3">
                            <input class="form-check-input" type="checkbox" name="contract" value="<?= $contract["id"] ?>" id="<?= $contract["name"] ?>">
                            <label class="form-check-label text-white" for="<?= $contract["name"] ?>">

                                <?= $contract["name"] ?>
                            </label>
                        </div>
                    <?php } ?>

                    <p class="border-bottom m-4 p-3 col-10 text-white"><b>COMPETENCES PREFERENTIELLES POUR LE POSTE</b></p>
                    <?php foreach ($profilsArray as $competences) { ?>
                        <div class="form-check col-10 ms-3">
                            <input class="form-check-input" type="checkbox" name="competences" value="<?= $competences["id"] ?>" id="<?= $competences["name"] ?>">
                            <label class="form-check-label text-white" for="<?= $competences["name"] ?>">

                                <?= $competences["name"] ?> : <?= $competences["talents"] ?>
                            </label>
                        </div>
                    <?php } ?>

                    <p class="border-bottom m-4 p-3 col-10 text-white"><b>EXPERIENCE</b></p>
                    <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
                    <div class="d-flex">
                        <input type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3 text-center" min="0" max="50">
                        <button class="btnSearch btn text-white mt-3 me-3" type="submit">Search</button>
                    </div>

                </div>
            </div>
        </div>