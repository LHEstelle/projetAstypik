<?php
require_once '../controller/controller_profilRecruteur.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a[href="profilRecruteur.php"] {
            border-bottom: #E28850 6px solid;
            text-decoration: none;
            width: 14rem;
        }

        @media screen and (max-width: 1000px) {
            a[href="profilRecruteur.php"] {
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <div class="navbar">
            <img src="../assets/img/Astypik.png" alt="logo" class="logoFilters mt-3 ms-4">
            <div class="d-flex justify-content-end">
                <form action="" method="POST">
                    <button type="submit" class="btn text-white col-10 m-3" name="deconnectButton">
                        se d??connecter
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="pb-3">
        <?php include 'menuRecruteurs.php' ?>
    </div>
    </div>






    <div class="ms-3">
        <form enctype="multipart/form-data" method="POST" action="">
            <div class="d-flex justify-content-center mt-4">
                <img src="../assets/img/<?= $entrepriseInfoArray['profilPicture'] ?? "../assets/img/avatar.jpg" ?>" alt="enterpriseImg" class="imageProfil3 p-0">
            </div>

            <div class="d-flex justify-content-center text-center">
                <div class="div"></div>
                <input name="changeProfilPicture" type="submit" class="btn text-primary fs-6 fw-light text-center" value="Changer ma photo de profil">
            </div>

            <div class="d-flex justify-content-center text-center">
                <div class="div"></div>

                <?php if (isset($_POST["changeProfilPicture"])) {  ?>
                    <input id="fileToUpload" name="fileToUpload" type="file" />
                    <input name="submitButton" type="submit" value="Envoyer le fichier" />

                    <?= $arrayErrors["mime"] ?? "" ?>
                    <?= $arrayErrors["size"] ?? "" ?>
                    <?= $arrayErrors["extension"] ?? "" ?>
                <?php    } ?>
            </div>


            <h2 class="text-center"><?= $entrepriseInfoArray['name'] ?></h2>
            <p class="mt-3"><b>PSEUDO OU SLOGAN...(facultatif)</b></p><span class="text-danger"><?= $arrayErrors['pseudo'] ?? "" ?></span>
            <div class="d-flex m-2">
                <input value="<?= $entrepriseInfoArray['pseudo'] ?>" name="pseudo" class="form-control inputSearch me-2 ms-3" type="text">
                <span class="text-danger"><?= $arrayErrors['pseudo'] ?? "" ?></span>
            </div>
            <p class="mt-3"><b>MES COORDONNEES *</b></p>
            <div class="d-flex m-2">

                <input value="<?= $entrepriseInfoArray['adress'] ?>" name="adress" class="form-control inputSearch me-2 ms-3" type="text"><span class="text-danger"><?= $arrayErrors['adress'] ?? "" ?></span>
            </div>
            <div class="d-flex m-2">
                <input value="<?= $entrepriseInfoArray['postalCode'] ?>" name="postalCode" class="form-control inputSearch me-2 ms-3" type="text"><span class="text-danger"><?= $arrayErrors['postalCode'] ?? "" ?></span>
            </div>
            <div class="d-flex m-2">
                <input value="<?= $entrepriseInfoArray['city'] ?>" name="city" class="form-control inputSearch me-2 ms-3" type="text"><span class="text-danger"><?= $arrayErrors['city'] ?? "" ?></span>
            </div>
            <div class="d-flex m-2">
                <select name="mail" class="form-control inputSearch me-2 ms-3" id="idRecruteur">
                    <option selected value="<?= $entrepriseInfoArray['id'] ?>"><?= $entrepriseInfoArray['mail'] ?></option>
                </select>
            </div>
            <div class="d-flex m-2">
                <input value="<?= $entrepriseInfoArray['phone'] ?>" name="phone" class="form-control inputSearch me-2 ms-3" type="text"><span class="text-danger"><?= $arrayErrors['phone'] ?? "" ?></span>
            </div>

            <button type="submit" class="btn btnMofidy text-white col-10 m-4" name="modifyButton">
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
                            Attention! Vous ??tes sur le point de supprimer votre compte. Si vous continuez toutes vos donn??es seront perdues.
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


    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

    <script src="../assets/js/script.js ">
    </script>
</body>


</html>