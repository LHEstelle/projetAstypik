<!DOCTYPE HTML>
<html lang="fr">
<?php
require_once '../controller/controller_creerAnnonce.php';
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://cdn.tiny.cloud/1/dkcfca5o4hxmltg1wtj473qxutifqfmr848v06z4ya8ecdf1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
    <script>
        tinymce.init({
            selector: '#description',
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

        <?php include 'menuRecruteurs.php' ?>
    </div>
    <h2 class="text-center mt-4">Créer une annonce</h2>
    <form method="POST" action="">
        <div class="ms-3">
            <p class="mt-3"><b>NOM ENTREPRISE *</b></p>
            <select name="id_recruteur" id="idRecruteur" class="inputSearch ms-3">
                <option selected value="<?= $entrepriseInfoArray["id"] ?>"><?= $entrepriseInfoArray['name'] ?></option>
            </select>

            <p class="mt-3"><b>NOM DU POSTE *</b> <span class="text-danger">
                    <?= $arrayErrors["job"] ?? "" ?>
                </span></p>


            <div class="d-flex">
                <input value="<?= isset($_POST['job']) ? htmlspecialchars($_POST["job"]) : '' ?>" name="job" class="form-control inputSearch me-2 ms-3" name="jobType" type="text" placeholder="ex: chargé(e) de communication" aria-label="Rechercher">

            </div>
            <div class="mt-3">
                <p class=""><b>DOMAINE *</b><span class="text-danger"><?= $arrayErrors['id_domaine'] ?? '' ?></span></p>

                <select name="id_domaine" id="domaine" class="inputSearch ms-3">
                    <option value="">Choisissez un domaine</option>
                    <?php foreach ($domainArray as $domain) { ?>
                        <option value="<?= $domain["id"] ?>" <?= isset($_POST["id_domaine"]) && $domain["id"] == $_POST["id_domaine"] ? 'selected' : '' ?>><?= $domain["name"] ?></option>


                    <?php } ?>
                </select>

                <p class="mt-3"><b>DATE DE DEBUT DU POSTE *</b><span class="text-danger"><?= $arrayErrors['startDate'] ?? '' ?></span></p>

                <div class="d-flex">
                    <input value="<?= isset($_POST['startDate']) ? htmlspecialchars($_POST["startDate"]) : '' ?>" name="startDate" class="form-control inputSearch me-2 ms-3" type="date">

                </div>
                <p class="mt-3"><b>TYPE DE CONTRAT *</b><span class="text-danger"><?= $arrayErrors['id_contract'] ?? '' ?></span></p>

                <select name="id_contract" id="contract" class="inputSearch ms-3">
                    <option value="">Choisissez un contrat</option>
                    <?php foreach ($contractArray as $contract) { ?>
                        <option value="<?= $contract["id"] ?>" <?= isset($_POST["id_contract"]) && $contract["id"] == $_POST["id_contract"] ? 'selected' : '' ?>><?= $contract["name"] ?></option>


                    <?php } ?>
                </select>
      
                <p class="mt-3"><b>COMPETENCES PREFERENTIELLES (SOFTSKILLS) POUR LE POSTE *</b><span class="text-danger"><?= $arrayErrors['id_profils'] ?? '' ?></span></p>

                <select name="id_profils" id="profils" class="inputSearch ms-3">
                    <option value="">Choisissez des compétences</option>
                    <?php foreach ($profilsArray as $competences) { ?>
                        <option value="<?= $competences["id"] ?>" <?= isset($_POST["id_profils"]) && $competences["id"] == $_POST["id_profils"] ? 'selected' : '' ?>><?= $competences["name"] ?> : <?= $competences["talents"] ?></option>


                    <?php } ?>
                </select>
                
                <p class="mt-3"><b>NOMBRE D'ANNEES D'EXPERIENCE MINIMUM REQUIS (facultatif)</b></p>

                <div class="d-flex">
                    <input value="<?= isset($_POST['experienceYear']) ? htmlspecialchars($_POST["experienceYear"]) : '' ?>" name="experienceYear" type="number" class="ms-3 me-2  inputSearch form-control" min="0" max="50">
                    <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
                </div>


                <p class="mt-3"><b>DESCRIPTION DE L'OFFRE *</b><span class="text-danger"><?= $arrayErrors['description'] ?? '' ?></span></p>
                <textarea class="col-12 textArea" id="description" name="description"><?= isset($_POST['description']) ? $_POST["description"] : '' ?></textarea>
                <input class="form-control inputSearch me-2 ms-3" type="hidden" name="publicationDate" value="<?= strftime('%Y-%m-%d') ?>">
                <button type="submit" class="mb-5 btn btn-secondary btnAddAnnonce" name="createAnnonce">
                    Ajouter une annonce
                </button>

            </div>
    </form>

    <?php include 'footer.php' ?>


</body>


</html>