<!DOCTYPE html>
<html lang="fr">


<?php
require_once '../controller/controller_profilCandidat.php';
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
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn text-white col-10 m-3" name="deconnectButton">
                    se déconnecter
                </button>
            </div>
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



    <div class="ms-3">
        <form enctype="multipart/form-data" method="POST" action="">
            <div class="d-flex justify-content-center mt-4">
                <img src="../assets/img/<?= $candidatInfoArray['profilPicture'] ?? "" ?>" alt="candidateImg" class="imageProfil3 p-0">
            </div>

            <div class="d-flex justify-content-center text-center">
                <div class="div"></div>
                <input name="changeProfilPicture" type="submit" class="btn text-primary fs-6 fw-light text-center" value="Changer ma photo de profil">
            </div>

            <div class="d-flex justify-content-center text-center">
                <div class="div"></div>

                <?php if (isset($_POST["changeProfilPicture"])) {  ?>
                    <input id="fileToUpload" name="fileToUpload" type="file" />
                    <input name="submitButtonProfilPicture" type="submit" value="Envoyer le fichier" />

                    <?= $arrayErrors["mime"] ?? "" ?>
                    <?= $arrayErrors["size"] ?? "" ?>
                    <?= $arrayErrors["extension"] ?? "" ?>
                <?php    } ?>
            </div>

            <?= $candidatProfilArray['nameStruct'] ?>
            <h3 class="text-center"><?= $candidatProfilArray['talents'] ?></h3>
            <p class="mt-3"><b>NOM</b></p>
            <span class="text-danger"><?= $arrayErrors['lastName'] ?? '' ?></span>
            <div class="d-flex">
                <input value="<?= isset($_POST["lastName"]) ? htmlspecialchars($_POST["lastName"]) : $candidatInfoArray['lastName'] ?>" name="lastName" class="form-control inputSearch me-2 ms-3" type="text">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>PRENOM</b></p>
            <span class="text-danger"><?= $arrayErrors['firstName'] ?? '' ?></span>
            <div class="d-flex">
                <input value="<?= isset($_POST["firstName"]) ? htmlspecialchars($_POST["firstName"]) : $candidatInfoArray['firstName'] ?>" name="firstName" class="form-control inputSearch me-2 ms-3" type="text">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>PSEUDO</b></p>
            <span class="text-danger"><?= $arrayErrors['pseudo'] ?? '' ?></span>
            <div class="d-flex">
                <input value="<?= isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : $candidatInfoArray['pseudo'] ?>" name="pseudo" class="form-control inputSearch me-2 ms-3" type="text">
                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
            </div>
            <p class="mt-3"><b>DATE DE NAISSANCE</b></p>
            <span class="text-danger"><?= $arrayErrors['birthDate'] ?? '' ?></span>
            <div class="d-flex">
                <input type="date" value="<?= isset($_POST["birthDate"]) ? htmlspecialchars($_POST["birthDate"]) : $candidatInfoArray['birthDate'] ?>" class="form-control" name="birthDate" id="birthdate">
            </div>
            <p class="mt-3"><b>MES COORDONNEES</b></p>
            <div class="d-flex">
                <input value="<?= isset($_POST["adress"]) ? htmlspecialchars($_POST["adress"]) : $candidatInfoArray['adress'] ?>" name="adress" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['adress'] ?? '' ?></span>
                <input value="<?= isset($_POST["postalCode"]) ? htmlspecialchars($_POST["postalCode"]) : $candidatInfoArray['postalCode'] ?>" name="postalCode" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['postalCode'] ?? '' ?></span>
                <input value="<?= isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : $candidatInfoArray['city'] ?>" name="city" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['city'] ?? '' ?></span>
                <input value="<?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : $candidatInfoArray['mail'] ?>" name="mail" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['mail'] ?? '' ?></span>
                <input value="<?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : $candidatInfoArray['phone'] ?>" name="phone" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['phone'] ?? '' ?></span>
            </div>

            <p class=""><b>DOMAINE</b></p>
            <span class="text-danger"><?= $arrayErrors['id_domaine'] ?? '' ?></span>
            <select name="id_domaine" id="domaine" class="inputSearch ms-3">
                <option disabled selected value="">Choisissez un domaine</option>
                <?php foreach ($domainArray as $domain) { ?>
                    <option value="<?= $domain["id"] ?>" <?= $domain["id"] == $candidatInfoArray["id_domaine"] ? 'selected' : '' ?>><?= $domain["name"] ?></option>


                <?php } ?>
            </select>

            <p class="mt-3"><b>TYPE DE CONTRAT</b></p>
            <span class="text-danger"><?= $arrayErrors['id_contract'] ?? '' ?></span>
            <select name="id_contract" id="contract" class="inputSearch ms-3">
                <option disabled selected value="">Choisissez un contrat</option>
                <?php foreach ($contractArray as $contract) { ?>
                    <option value="<?= $contract["id"] ?>" <?= $contract["id"] == $candidatInfoArray["id_contract"] ? 'selected' : '' ?>><?= $contract["name"] ?></option>
                <?php } ?>
            </select>
            <p class="mt-3"><b>EXPERIENCE DANS LE DOMAINE(facultatif)</b></p>
            <label for="experienceYears" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
            <div class="d-flex">
                <input value="<?= isset($_POST["experienceYears"]) ? htmlspecialchars($_POST["experienceYears"]) : $candidatInfoArray['experienceYears'] ?>" name="experienceYears" type="number" class="ms-3 me-2 mt-3 inputSearch form-control pe-3" min="0" max="50">
                <!-- <button class="btnSearch btn text-white mt-3 me-3" type="submit">Modifier</button> -->
            </div>

            <p class="mt-3"><b>CV (facultatif)</b></p>

            <img src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?? "" ?>" alt="cvImg" class="cvPicture p-0">




            <input name="changeCvPicture" type="submit" class="btn text-primary fs-6 fw-light text-center" value="Ajouter ou changer un CV">

            <?php if (isset($_POST["changeCvPicture"])) {  ?>
                <input id="cvToUpload" name="cvToUpload" type="file" />
                <input name="submitButtonCvPicture" type="submit" value="Envoyer le fichier" />

                <?= $arrayErrors["mime"] ?? "" ?>
                <?= $arrayErrors["size"] ?? "" ?>
                <?= $arrayErrors["extension"] ?? "" ?>

            <?php    } ?>
            <p class="mt-3"><b>DESCRIPTION PERSONNELLE, MOTIVATIONS...</b></p>
            <textarea class="col-12" name="description" id="description"><?= isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : $candidatInfoArray['description'] ?></textarea>


            <button type="submit" name="modifyButton" class="btn btnMofidy text-white col-10 m-3">
                Modifier
            </button>
            <button type="button" class="btn text-start col-10 m-3 text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                Supprimer son compte
            </button>
            <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDel">Supprimer son compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Attention! Vous êtes sur le point de supprimer votre compte. Si vous continuez toutes vos données seront perdues.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" name="deleteButton" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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