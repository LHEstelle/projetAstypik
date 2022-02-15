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
        <div class="d-flex justify-content-center mt-4">
            <img src="<?= $event['picture'] ?>" alt="candidateImg" class="imageProfil3 p-0 ms-4">
        </div>
        <p class="fs-6 fw-light text-center">Changer ma photo de profil</p>
<h2 class="text-center text-danger"><?= $event['talentProfil'] ?></h2>
<p class="text-center"><?= $event['talents'] ?></p>
        <div class="ms-3">
        <form method="POST" action="">
            <p class=""><b>TYPE DE POSTE</b></p>
            <div class="d-flex">
                <input value="<?= $event['job'] ?? htmlspecialchars($_POST['job'])?>" class="form-control inputSearch me-2 ms-3" name="" type="text" placeholder="ex: chargé(e) de communication" >
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>NOM</b></p>
            <div class="d-flex">
                <input value="<?= $event['lastName'] ?? htmlspecialchars($_POST['lastName'])?>" class="form-control inputSearch me-2 ms-3" type="text">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>PRENOM</b></p>
            <div class="d-flex">
                <input value="<?= $event['firstName'] ?? htmlspecialchars($_POST['firstName'])?>" class="form-control inputSearch me-2 ms-3" type="text" >
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>PSEUDO</b></p>
            <div class="d-flex">
                <input value="<?= $event['pseudo'] ?? htmlspecialchars($_POST['pseudo'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>MES COORDONNEES</b></p>
            <div class="d-flex">
                <input value="<?= $event['adress'] ?? htmlspecialchars($_POST['adress'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
                <input value="<?= $event['postalCode'] ?? htmlspecialchars($_POST['postalCode'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
                <input value="<?= $event['city'] ?? htmlspecialchars($_POST['city'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
                <input value="<?= $event['mail'] ?? htmlspecialchars($_POST['mail'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
                <input value="<?= $event['phone'] ?? htmlspecialchars($_POST['phone'])?>" class="form-control inputSearch me-2 ms-3" type="text"  >
            </div>
            <p class="mt-3"><b>TYPE DE CONTRAT (facultatif)</b></p>
            <div class="form-check d-flex ms-3">
                <input <?= $event['contract'] == "CDI" ? 'checked' : '' ?> class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                <label class="form-check-label" for="flexRadioCDI">
                    CDI
                </label>
            </div>
            <div class="form-check d-flex ms-3">
                <input <?= $event['contract'] == "CDD" ? 'checked' : '' ?> class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                <label class="form-check-label" for="flexRadioCDI">
                    CDD
                </label>
            </div>
            <div class="form-check d-flex ms-3">
                <input <?= $event['contract'] == "Alternance" ? 'checked' : '' ?> class="form-check-input me-3" type="checkbox" name="flexRadioDefault" id="flexRadioCDI">
                <label class="form-check-label" for="flexRadioCDI">
                    Alternance
                </label>
            </div>
            <p class="mt-3"><b>EXPERIENCE (facultatif)</b></p>
            <label for="experienceYear" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
            <div class="d-flex">
                <input value="<?= $event['experience'] ?? htmlspecialchars($_POST['experience'])?>" type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3" min="0" max="50">
                <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
            </div>

            <p class="mt-3"><b>COMPETENCES (facultatif)</b></p>
            <div class="d-flex">
                <input value="<?= $event['competences'] ?? htmlspecialchars($_POST['competences'])?>" class="form-control inputSearch me-2 ms-3" type="text" placeholder="ex: PHP, management" aria-label="Rechercher">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>DESCRIPTION PERSONNELLE, MOTIVATIONS...</b></p>
            <textarea class="col-12" name="mytextarea" id="mytextarea"><?= $event['summary'] ?? htmlspecialchars($_POST['jobDescription'])?></textarea>
            <button type="submit" class="btn btnMofidy text-white col-10 m-3">
                                Modifier
                            </button>
        </form>
        </div>
<?php  } ?>

        
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