<!DOCTYPE html>
<html lang="fr">
    <?php
require_once '../controller/controller_modifierAnnonce.php';

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
    <script src="https://cdn.tiny.cloud/1/y17w4t3wskvqoh0zg5y2e8yuvmjwv27vcfp9grnzbg2081eg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
    <?php if (isset($annonceInfo)) { ?>

        <div class="ms-3">
        <form method="POST" action="">
        <div class="ms-3">
            <p class="mt-3"><b>NOM ENTREPRISE</b></p>
            <select name="id_recruteur" id="idRecruteur" class="inputSearch ms-3">
                        <option selected value="<?= $entrepriseInfoArray["id"] ?>"><?= $entrepriseInfoArray['name'] ?></option>
                </select>
 
            <p class="mt-3"><b>NOM DU POSTE</b></p>
            <span class="text-danger">
                        <?= $arrayErrors["job"] ?? "" ?>
                    </span>

            <div class="d-flex">
                <input value="<?= isset($_POST["job"]) ? htmlspecialchars($_POST["job"]) : $annonceInfo['job'] ?>" name="job" class="form-control inputSearch me-2 ms-3" name="jobType" type="text" placeholder="ex: chargé(e) de communication" aria-label="Rechercher">

            </div>
            <div class="mt-3">
                <p class=""><b>DOMAINE</b></p>
                <span class="text-danger"><?= $arrayErrors['id_domaine'] ?? '' ?></span>
                <select name="id_domaine" id="domaine" class="inputSearch ms-3">
                    <option disabled selected value="">Choisissez un domaine</option>
                    <?php foreach ($domainArray as $domain) { ?>
                        <option value="<?= $domain["id"] ?>"  <?= $domain["id"] == $annonceInfo["id_domaine"] ? 'selected' : '' ?>><?= $domain["name"] ?></option>


                    <?php } ?>
                </select>
                <p class="mt-3"><b>DATE DE DEBUT DU POSTE</b></p>
                <span class="text-danger"><?= $arrayErrors['startDate'] ?? '' ?></span>
                <div class="d-flex">
                    <input value="<?= isset($_POST['startDate']) ? htmlspecialchars($_POST["startDate"]) : $annonceInfo['startDate'] ?>" name="startDate" class="form-control inputSearch me-2 ms-3" type="date">

                </div>
                <p class="mt-3"><b>TYPE DE CONTRAT</b></p>
                <span class="text-danger"><?= $arrayErrors['id_contract'] ?? '' ?></span>
                <select name="id_contract" id="contract" class="inputSearch ms-3">
                    <option disabled selected value="">Choisissez un contrat</option>
                    <?php foreach ($contractArray as $contract) { ?>
                        <option value="<?= $contract["id"] ?>" <?= $contract["id"] == $annonceInfo["id_contract"] ? 'selected' : '' ?>><?= $contract["name"] ?></option>


                    <?php } ?>
                </select>

                <p class="mt-3"><b>COMPETENCES PREFERENTIELLES POUR LE POSTE</b></p>
                <span class="text-danger"><?= $arrayErrors['id_profils'] ?? '' ?></span>
                <select name="id_profils" id="profils" class="inputSearch ms-3">
                    <option disabled selected value="">Choisissez des compétences</option>
                    <?php foreach ($profilsArray as $competences) { ?>
                        <option value="<?= $competences["id"] ?>" <?= $competences["id"] == $annonceInfo["id_profils"] ? 'selected' : '' ?> ><?= $competences["name"] ?> : <?=$competences["talents"] ?></option>


                    <?php } ?>
                </select>


                <p class="mt-3"><b>EXPERIENCE (facultatif)</b></p>

                <div class="d-flex">
                    <input value="<?= isset($_POST['experienceYear']) ? htmlspecialchars($_POST["experienceYear"]) : $annonceInfo['experienceYear'] ?>" name="experienceYear" type="number" class="ms-3 me-2  inputSearch form-control" min="0" max="50">
                    <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
                </div>
                <input type="hidden" name="idAnnonce" value="<?= $annonceInfo['idAnnonce'] ?>">

                <p class="mt-3"><b>DESCRIPTION DE L'OFFRE</b></p>
                <span class="text-danger"><?= $arrayErrors['description'] ?? '' ?></span>
                <textarea class="col-12" id="description" name="description" ><?= isset($_POST['description']) ? ($_POST["description"]) : $annonceInfo['description']?></textarea>
                <input class="form-control inputSearch me-2 ms-3" type="hidden" name="publicationDate" value="<?= strftime('%Y-%m-%d')?>">
                <button type="submit" class="mb-5 btn btn-secondary btnAddAnnonce" name="modifyAnnonce">
                    Modifier
                </button>
                <button type="button" class="btn btnRemove text-white  mb-3 ms-4" data-bs-toggle="modal" data-bs-target="#modalDelete">
                                Supprimer
                            </button>
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
                <input type="hidden" name="idDeletePatient" value="<?= $annonceInfo['idAnnonce'] ?>">
                                  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" name="deleteButton" value="<?= $annonceInfo['idAnnonce'] ?>" class="btn btn-danger">Supprimer</button>
            </div>
        
                    </form>
        </div>
<?php  } ?>
        <<?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


</html>