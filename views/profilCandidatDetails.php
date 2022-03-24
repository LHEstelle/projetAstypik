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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
<?php
if (date_create($candidatInfoArray['birthDate']) == TRUE || date_create($event['birthDate']) != FALSE) {
    $dateNaissance = $candidatInfoArray['birthDate'];
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
    $age = $diff->format('%y');
}

?>

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
        <?php
        if (isset($_SESSION['siretNumber'])) { ?>
            <div class="pb-3">
                <?php include 'menuRecruteurs.php' ?>
            </div>
        <?php } else { ?>
            <div class="pb-3">
                <?php include 'menuCandidats.php' ?>
            </div>
        <?php } ?>
    </div>


    <div class="ms-3">
        <div class="container text-center">
            <div class="mb-5">

                <?php if (isset($candidatInfoArray['profilColor']) && $candidatInfoArray['profilColor'] == 'superCactus') {  ?>
                    <div class="cardInfosRed myShadow">
                        <div class="cardDetailRed m-3 p-1 m-3 p-1">

                        <?php  } else if (isset($candidatInfoArray['profilColor']) && $candidatInfoArray['profilColor'] == 'peterPaon') {  ?>
                            <div class="cardInfosYellow myShadow">
                                <div class="cardDetailYellow m-3 p-1">

                                <?php  } else if (isset($candidatInfoArray['profilColor']) && $candidatInfoArray['profilColor'] == 'ironSpoke') {  ?>
                                    <div class="cardInfosBlue myShadow">
                                        <div class="cardDetailBlue m-3 p-1">

                                        <?php  } else if (isset($candidatInfoArray['profilColor']) && $candidatInfoArray['profilColor'] == 'spiderLutin') {  ?>
                                            <div class="cardInfosGreen myShadow">
                                                <div class="cardDetailGreen m-3 p-1">

                                                <?php  } ?>



                                                <div class="d-flex justify-content-center mt-4">

                                                    <img src="../assets/img/<?= $candidatInfoArray['profilPicture'] ?? "" ?>" alt="candidateImg" class="imageProfil3 p-0">
                                                </div>




                                                <h2 class="m-3 text-white"> <?= $candidatInfoArray['lastName'] ?> <?= $candidatInfoArray['firstName'] ?></h2>

                                                <p class="m-3 text-white"><?= $candidatInfoArray['pseudo'] ?></p>
                                                <p class="m-3 text-white"><?= $age ?> ans</p>


                                                <?php if (!isset($_SESSION['birthDate'])) { ?>
                                                    <div class="d-flex justify-content-end m-4">
                                                        <div class="col-11"></div>
                                                        <div class="lineHeight col">
                                                            <i id="<?= $candidatInfoArray['idCandidat'] ?>" class="fa <?= in_array($candidatInfoArray['idCandidat'], $likesRecrutorArray) ? 'fa-heart' : 'fa-heart-o' ?> heart text-white text-end fs-3 test p-1 pe-4"></i>
                                                            <div class="p-0 d-table-cell align-top text-white">
                                                                <span class="like ms-4"> LIKE </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                            <?php } ?>
                                            </div>

                                            <div class="text-center d-flex justify-content-center me-5"><img src="../assets/img/<?= $candidatInfoArray['img'] ?? "" ?>" alt="profilImg" class="supercactusImg p-0">
                                                <div class="mt-3"><?= $candidatInfoArray['profilName'] ?> <p><?= $candidatInfoArray['profilTalents'] ?></p>
                                                </div>

                                            </div>

                                            <?php if (isset($_POST['conversationButton'])) {  ?>

                                                <div class="d-flex justify-content-center mt-3">
                                                    <div class="coordonnees">
                                                        <h4 class="text-center mt-3">COORDONNEES</h4>
                                                        <div class="m-5 text-center">
                                                            <p class=""><?= $candidatInfoArray['adress']   ?> <?= $candidatInfoArray['postalCode']   ?> <?= $candidatInfoArray['city']   ?></p>
                                                        </div>
                                                        <div class="m-5 text-center">
                                                            <p class=""><?= $candidatInfoArray['mail']   ?></p>
                                                        </div>
                                                        <div class="m-5 text-center">
                                                            <p class=""><?= $candidatInfoArray['phone']   ?></p>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php } ?>

                                            <h4 class="mt-4">SOUHAITS ET EXPERIENCES</h4>
                                            <p class="m-3"><?= $candidatInfoArray["domaineName"] ?></p>


                                            <p class="m-3"><?= $candidatInfoArray["contractName"] ?></p>
                                            <?php if (isset($candidatInfoArray['experienceYears'])) { ?>
                                                <p class="m-3"> <?= $candidatInfoArray["experienceYears"]  ?> an(s) d'expérience</p>
                                            <?php } ?>

                                            <!-- Button trigger modal -->

                                            <?php if (strpos($candidatInfoArray['cvPicture'], '.pdf') !== false) { ?>

                                                <a href="../assets/img/<?= $candidatInfoArray['cvPicture'] ?>" target="_blank" class="text-primary">Voir le cv</a>

                                            <?php } else { ?>
                                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <img src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?>" alt="cvImg" class="cvPicture p-0">
                                                </button>
                                            <?php  } ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        </div>
                                                        <div class="modal-body">

                                                            <img src="../assets/img/<?= $candidatInfoArray['cvPicture'] ?>" alt="cvImg" class="cvPictureZoom">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="bgWhite">
                                                <div class="mt-5">
                                                    <h4>SA DESCRIPTION</h4>
                                                </div>
                                                <p class=""><?= $candidatInfoArray['candidateDescription'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const test = document.querySelectorAll('.test');
                            test.forEach(element => {
                                element.addEventListener('click', function() {
                                    if (this.classList.contains('fa-heart-o')) {
                                        this.classList.remove('fa-heart-o');
                                        this.classList.add('fa-heart');
                                        let idCandidatLike = this.id
                                        $.ajax({
                                            url: 'viewRH.php',
                                            type: 'post',
                                            data: {
                                                idCandidatLike: idCandidatLike,
                                            },

                                        });
                                    } else {
                                        this.classList.remove('fa-heart')
                                        this.classList.add('fa-heart-o')
                                        let idCandidatDislike = this.id
                                        console.log(idCandidatDislike)
                                        $.ajax({
                                            url: 'viewRH.php',
                                            type: 'post',
                                            data: {
                                                idCandidatDislike: idCandidatDislike,
                                            },

                                        });
                                    }
                                })

                            });
                        </script>

                        <?php include 'footer.php' ?>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

                        <script src="../assets/js/script.js ">
                        </script>
</body>


</html>