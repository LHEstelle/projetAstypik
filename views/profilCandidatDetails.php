<!DOCTYPE html>
<html lang="fr">


<?php
require_once '../controller/controller_profilCandidatDetails.php';
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
                <a href="profilRecruteur.php" id="jobOffer1" class="menu text-dark p-3 col-2">Mon profil</a>
                <a href="annoncesRecruteur.php" id="jobOffer1" class="menu text-dark  p-3 col-2">Mes offres d'emplois</a>
                <a href="viewRH.php" id="candidateProfil1" class="menu text-dark p-3 col-2">Profils candidats</a>
                <a href="likesRecruteur.php" id="likes1" class="menu text-dark  p-3 col-2">Likes</a>
                <a href="profilRecruteur.php" class="fas fa-user menuIcon p-3 col-2 d-lg-none"></a>
                <a href="annoncesRecruteur.php" class="fas fa-briefcase menuIcon p-3 col-2 d-lg-none"></a>
                <a href="viewRH.php" class="fas fa-users menuIcon p-3 col-2 d-lg-none"></a>
                <a href="likesRecruteur.php" class="fas fa-heart menuIcon p-3 col-2 d-lg-none"></a>
            </div>
        </div>
    </div>


    <div class="container text-center mb-5">

        <div class="cardDetail m-3 p-1">

            <div class="ms-3">

                <div class="d-flex justify-content-center mt-4">
                    <img src="../assets/img/<?= $candidatInfoArray['profilPicture'] ?? "" ?>" alt="candidateImg" class="imageProfil3 p-0">
                </div>

                <?= $candidatInfoArray['profilName'] ?>
                <h3 class="text-center mb-5"><?= $candidatInfoArray['profilTalents'] ?></h3>

                <p>😎</p>

                <p class="m-3"><?= $candidatInfoArray['lastName'] ?> <?= $candidatInfoArray['firstName'] ?></p>

                <p class="m-3"><?= isset($_POST["pseudo"]) ? htmlspecialchars($_POST["pseudo"]) : $candidatInfoArray['pseudo'] ?></p>


                <p>🎂</p>

                <p class="m-3"><?= $candidatInfoArray['birthDate'] ?></p>

                <!-- <p class="mt-3"><b>MES COORDONNEES</b></p>
            <div class="d-flex">
                <p class="text-center"><?= isset($_POST["adress"]) ? htmlspecialchars($_POST["adress"]) : $candidatInfoArray['adress'] ?></p>
               
                <p class="text-center"><?= isset($_POST["postalCode"]) ? htmlspecialchars($_POST["postalCode"]) : $candidatInfoArray['postalCode'] ?></p>
                
                <p class="text-center"><?= isset($_POST["city"]) ? htmlspecialchars($_POST["city"]) : $candidatInfoArray['city'] ?></p>
                
                <p class="text-center"><?= isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"]) : $candidatInfoArray['mail'] ?></p>
               
                <p class="text-center"><?= isset($_POST["phone"]) ? htmlspecialchars($_POST["phone"]) : $candidatInfoArray['phone'] ?></p>
             
            </div> -->

                <p>💼</p>
                <p class="m-3"><?= $candidatInfoArray["domaineName"] ?></p>


                <p class="m-3"><?= $candidatInfoArray["contractName"] ?></p>

                <p class="m-3"> <?= isset($candidatInfoArray['experienceYears']) ?? ''  ?> ans d'expérience</p>

                <img src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?>" alt="cvImg" class="cvPicture p-0">
                <p>💪</p>
                <p class=""><?= $candidatInfoArray['candidateDescription'] ?></p>



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