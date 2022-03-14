<!DOCTYPE html>
<html lang="fr">


<?php
require_once '../controller/controller_profilCandidat.php';
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a[href="profilCandidat.php"] {
            border-bottom: #E28850 6px solid;
            text-decoration: none;
            width: 14rem;
        }

        @media screen and (max-width: 1000px) {
            a[href="profilCandidat.php"] {
                border-bottom: #E28850 6px solid;
                text-decoration: none;
                width: 7rem;
            }
        }
    </style>
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
        <div class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
            <div class="d-flex justify-content-end">
                <form action="" method=POST>
                    <button type="submit" class="btn text-white col-10 m-3" name="deconnectButton">
                        se déconnecter
                    </button>
                </form>
            </div>
        </div>

        <?php include 'menuCandidats.php'; ?>
    </div>



    <div class="ms-3">
        <form enctype="multipart/form-data" method="POST" action="">
            <div class="d-flex justify-content-center mt-4">
                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#exampleModall">
                    Aperçu de mon profil
                </button>
                <div class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                            <div class="modal-body">
                                <p class="text-center">Voici comment apparait votre profil dans le fil des recruteurs. Cliquez sur votre profil pour voir les détails que peuvent observer les recruteurs</p>
                                <?php if (isset($candidatProfilArray['name']) && $candidatProfilArray['name'] == 'superCactus') {  ?>
                                    <div class="d-flex justify-content-center ">

                                        <a href="profilCandidatDetails.php?id=<?= $_SESSION['id'] ?>">
                                            <div class="cardRed m-4 p-1">
                                            <?php  } else if (isset($candidatProfilArray['name']) && $candidatProfilArray['name'] == 'peterPaon') {  ?>
                                                <div class="d-flex justify-content-center ">
                                                    <a href="profilCandidatDetails.php?id=<?= $_SESSION['id'] ?>">
                                                        <div class="cardCandidate m-4 p-1">

                                                        <?php  } else if (isset($candidatProfilArray['name']) && $candidatProfilArray['name'] == 'ironSpoke') {  ?>
                                                            <div class="d-flex justify-content-center ">
                                                                <a href="profilCandidatDetails.php?id=<?= $_SESSION['id'] ?>">
                                                                    <div class="cardBlue m-4 p-1">

                                                                    <?php  } else if (isset($candidatProfilArray['name']) && $candidatProfilArray['name'] == 'spiderLutin') {  ?>
                                                                        <div class="d-flex justify-content-center ">
                                                                            <a href="profilCandidatDetails.php?id=<?= $_SESSION['id'] ?>">
                                                                                <div class="cardGreen m-4 p-1">
                                                                                <?php  } ?>

                                                                                <input type="hidden" name="name" value="<?= $candidatProfilArray['name']  ?>">
                                                                                <div class="d-flex justify-content-evenly m-2">
                                                                                    <img src="../assets/img/<?= $candidatInfoArray['profilPicture'] ?? '' ?>" alt="candidateImg" class="imageProfil3">
                                                                                    <div class="infoCandidate">
                                                                                        <p class="fs-6 m-0 candidateNameTruncate"><?= $candidatInfoArray['lastName'] ?> <?= $candidatInfoArray['firstName'] ?></p>
                                                                                        <p class="fs-6 fw-light m-0"> <?= $candidatInfoArray['pseudo'] ?></p>
                                                                                        <p class="fs-6 fw-light"><?= $candidatInfoArray['city'] ?> - <?= $age ?> ans</p>

                                                                                    </div>
                                                                                </div>

                                                                                <div class=" jobDescriptionTruncate m-2">
                                                                                    <div class=" jobDescriptionTruncate m-2">
                                                                                        <?= strip_tags($candidatInfoArray['description']) ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row d-flex align-text-bottom">


                                                                                    <i class="fa fa-heart' text-white text-end fs-3 test p-1 pe-4"></i>

                                                                                </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>


                                            <div class="d-flex justify-content-center mt-4">
                                                <img src="../assets/img/<?= $candidatInfoArray['profilPicture'] ?? "../assets/img/avatar.jpg" ?>" alt="candidateImg" class="imageProfil3 p-0">
                                            </div>

                                            <div class="d-flex justify-content-center text-center">
                                                <div class="div"></div>
                                                <input id="changeProfilPicture" name="changeProfilPicture" type="button" class="changeProfilPicture btn text-primary fs-6 fw-light text-center" value="Changer ma photo de profil">
                                            </div>
                                            <p class="text-danger text-center">
                                                <?= $arrayErrors["mime"] ?? "" ?>
                                                <?= $arrayErrors["size"] ?? "" ?>
                                                <?= $arrayErrors["extension"] ?? "" ?>
                                            </p>

                                            <div class="d-flex justify-content-center text-center">
                                                <div class="div"></div>

                                                <div id="profilPictureButtons">
                                                    <input id="fileToUpload" name="fileToUpload" type="file" />
                                                    <input name="submitButtonProfilPicture" type="submit" value="Envoyer le fichier" />
                                                </div>
                                            </div>
                                            <script>
                                                const test = document.getElementById('changeProfilPicture');
                                                document.getElementById('profilPictureButtons').style.display = "none";
                                                test.addEventListener('click', function() {
                                                    document.getElementById('profilPictureButtons').style.display = "block";
                                                })
                                            </script>
                                            <a href="<?= $candidatProfilArray['name'] ?>.php">
                                                <?= $candidatProfilArray['nameStruct'] ?></a>
                                            <h3 class="text-center"><?= $candidatProfilArray['talents'] ?></h3>
                                            <p class="mt-3"><b>NOM</b></p>
                                            <span class="text-danger"><?= $arrayErrors['lastName'] ?? '' ?></span>
                                            <div class="d-flex">
                                                <input value="<?= isset($_POST["lastName"]) ? htmlspecialchars($_POST["lastName"]) : $candidatInfoArray['lastName'] ?>" name="lastName" class="form-control inputSearch me-2 ms-3" type="text">
                                                <!-- <button class="btnSearch btn text-white me-3" type="submit">Modifier</button> -->
                                            </div>
                                            <p class="mt-3"><b>PRENOM *</b></p>
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
                                            <p class="mt-3"><b>DATE DE NAISSANCE *</b></p>
                                            <span class="text-danger"><?= $arrayErrors['birthDate'] ?? '' ?></span>
                                            <div class="d-flex m-2">
                                                <input type="date" value="<?= isset($_POST["birthDate"]) ? htmlspecialchars($_POST["birthDate"]) : $candidatInfoArray['birthDate'] ?>" class="form-control inputSearch" name="birthDate" id="birthdate">
                                            </div>
                                            <p class="mt-3"><b>MES COORDONNEES *</b></p>
                                            <div class="d-flex mt-2">
                                                <p class="ms-1" name="mail"><?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : $candidatInfoArray['mail'] ?></p>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <input value="<?= isset($_POST["adress"]) ? htmlspecialchars($_POST["adress"]) : $candidatInfoArray['adress'] ?>" name="adress" class="form-control inputSearch ms-1" type="text">
                                                <span class="text-danger"><?= $arrayErrors['adress'] ?? '' ?></span>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <input value="<?= isset($_POST["postalCode"]) ? htmlspecialchars($_POST["postalCode"]) : $candidatInfoArray['postalCode'] ?>" name="postalCode" class="form-control inputSearch ms-1" type="text">
                                                <span class="text-danger"><?= $arrayErrors['postalCode'] ?? '' ?></span>
                                            </div>
                                            <div class="d-flex mt-2">
                                                <input value="<?= isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : $candidatInfoArray['city'] ?>" name="city" class="form-control inputSearch ms-1" type="text">
                                                <span class="text-danger"><?= $arrayErrors['city'] ?? '' ?></span>
                                            </div>
                                            <div class="d-flex mt-2 mb-3">
                                                <input value="<?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : $candidatInfoArray['phone'] ?>" name="phone" class="form-control inputSearch ms-1" type="text">
                                                <span class="text-danger"><?= $arrayErrors['phone'] ?? '' ?></span>
                                            </div>

                                            <p class=""><b>DOMAINE RECHERCHE *</b></p>
                                            <span class="text-danger"><?= $arrayErrors['id_domaine'] ?? '' ?></span>
                                            <select name="id_domaine" id="domaine" class="inputSearch ms-3">
                                                <option value="">Choisissez un domaine</option>
                                                <?php foreach ($domainArray as $domain) { ?>
                                                    <option value="<?= $domain["id"] ?>" <?= (isset($_POST["id_domaine"]) && $domain["id"] == $_POST["id_domaine"]) || $domain["id"] == $candidatInfoArray["id_domaine"] ? 'selected' : '' ?>><?= $domain["name"] ?></option>


                                                <?php } ?>
                                            </select>


                                            <p class="mt-3"><b>TYPE DE CONTRAT *</b></p>
                                            <span class="text-danger"><?= $arrayErrors['id_contract'] ?? '' ?></span>
                                            <select name="id_contract" id="contract" class="inputSearch ms-3">
                                                <option value="">Choisissez un contrat</option>
                                                <?php foreach ($contractArray as $contract) { ?>
                                                    <option value="<?= $contract["id"] ?>" <?= (isset($_POST['id_contract']) && $contract["id"] == $_POST["id_contract"]) || $contract["id"] == $candidatInfoArray["id_contract"]  ? 'selected' : '' ?>><?= $contract["name"] ?></option>
                                                <?php } ?>
                                            </select>


                                            <p class="mt-3"><b>NOMBRE D'ANNEES D'EXPERIENCE DANS LE DOMAINE(facultatif)</b></p>
                                            <label for="experienceYears" class="ms-3 text-white">Nombre minimum d'années d'expériences:</label>
                                            <div class="d-flex">
                                                <input value="<?= isset($_POST["experienceYears"]) ? htmlspecialchars($_POST["experienceYears"]) : $candidatInfoArray['experienceYears'] ?>" name="experienceYears" type="number" class="ms-3 me-2 inputSearch form-control pe-3" min="0" max="50">
                                            </div>



                                            <p class="mt-3"><b> CV (facultatif)</b><span class="text-danger"> formats acceptés : jpg, jpeg, pdf <br> Veuillez cacher vos coordonnées</span></p>
                                            <span class="text-danger">
                                                <?= $arrayErrors["mimeCV"] ?? "" ?>
                                                <?= $arrayErrors["sizeCV"] ?? "" ?>
                                                <?= $arrayErrors["extensionCV"] ?? "" ?>
                                            </span>



                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="../assets/img/<?= (isset($_POST['submitButtonCvPicture']) ?? $_POST['submitButtonCvPicture']) ?><?= (!isset($_POST['submitButtonCvPicture']) ?? $candidatInfoArray['cvPicture']) ?> <?= (!isset($candidatInfoArray['cvPicture']) ?? "../assets/img/cv.jpg") ?>" alt="cvImg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (strpos($candidatInfoArray['cvPicture'], '.pdf') !== false) { ?>
                                                <embed src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?>" width=800 height=500 type='application/pdf' />
                                            <?php } else { ?>
                                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <img src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?? "../assets/img/cv.jpg" ?>" alt="cvImg" class="cvPicture p-0">
                                                </button>

                                            <?php } ?>

                                            <br>
                                            <input id="changeCvPicture" name="changeCvPicture" type="button" class="btn text-primary fs-6 fw-light text-center" value="Ajouter ou changer un CV">

                                            <div id="CVButtons">
                                                <input id="cvToUpload" name="cvToUpload" type="file" />
                                                <input name="submitButtonCvPicture" type="submit" value="Envoyer le fichier" />
                                            </div>
                                            <script>
                                                const cv = document.getElementById("changeCvPicture");
                                                document.getElementById("CVButtons").style.display = "none";
                                                cv.addEventListener('click', function() {
                                                    document.getElementById("CVButtons").style.display = "block";
                                                })
                                            </script>
                                            <p class="mt-3"><b>DESCRIPTION PERSONNELLE, MOTIVATIONS... *</b></p>
                                            <span class="text-danger"><?= $arrayErrors['description'] ?? '' ?></span>
                                            <textarea class="col-12 textArea" name="description" id="description"><?= isset($_POST["description"]) ? htmlspecialchars($_POST["description"]) : $candidatInfoArray['description'] ?></textarea>


                                            <button type="submit" name="modifyButton" class="btn btnMofidy text-white col-10 m-3">
                                                Modifier et Enregistrer
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
    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <script src="../assets/js/script.js ">
    </script>
</body>


</html>