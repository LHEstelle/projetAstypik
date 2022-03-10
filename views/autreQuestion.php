<?php require_once '../controller/controller_autreQuestion.php';



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&language=fr&key=AIzaSyDecTo4CO49wUS9-_FtES7kcZmnb6H_Reg"></script>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Document</title>
</head>

<body>


    <body class="">
        <nav class="navbar navbar-expand-lg navbar-dark text-white sticky-top row">
            <div class="container">
                <div class="containerImage">

                    <a href="index.php">
                        <img src="../assets/img/Astypik.png" alt="logo" class="logo">
                    </a>
                </div>




                <div class="list row col-lg-4 col" id="navbarSupportedContent">

                    <li class="connexion d-flex justify-content-center ms-3 mb-5 mt-5 col-lg-8 col-5">
                        <a class="nav-link text-dark text-center" href="connexionEntrepriseOuCandidat.php"><b>Connexion</b></a>
                    </li>
                    <li class="whoAreWe col-lg-8 col-5 m-2 mt-5">
                        <a class="nav-link text-white text-center" href="quisommesnous.php">Qui sommes nous</a>


                </div>
            </div>

        </nav>


<form action="" method="POST">
            <div class="mb-3 ms-3">
                <p class="text-danger text-center">Nous allons vous posez une dernière question pour déterminer avec certitude votre profil</p>
                <label for="lastname" class="form-label"><b> Vous êtes plutôt :</b></label>
                <span class="text-danger">
                    <?= $arrayErrors["caractere"] ?? "" ?>
                </span>

          
                <div class="form-check d-flex ms-3">
                    <input class="form-check-input me-3" type="radio" name="caractere" id="caractere" value="IronSpoke" <?= (in_array('IronSpoke', $_SESSION['key'])) ? '' : 'style="visibility:hidden"' ?>>
                    <label class="form-check-label" for="caractere">
                    <?= (in_array('IronSpoke', $_SESSION['key'])) ? 'Rigoureux, précis' : '' ?>   
                    </label>
                </div>
                <div class="form-check d-flex ms-3">
                    <input class="form-check-input me-3" type="radio" name="caractere" id="caractere1" value="peterPaon" <?= (in_array('peterPaon', $_SESSION['key'])) ? '' : 'style="visibility:hidden"' ?>>
                    <label class="form-check-label" for="caractere1">
                    <?= (in_array('peterPaon', $_SESSION['key'])) ? 'Enthousiaste, plein d’humour' : '' ?>  
                    </label>
                </div>
                <div class="form-check d-flex ms-3">
                    <input class="form-check-input me-3" type="radio" name="caractere" id="caractere2" value="Cactus" <?= (in_array('Cactus', $_SESSION['key'])) ? '' : 'style="visibility:hidden"' ?>>
                    <label class="form-check-label" for="caractere2">
                    <?= (in_array('Cactus', $_SESSION['key'])) ? 'Rapide, décidant facilement' : '' ?> 
                    </label>
                </div>
                <div class="form-check d-flex ms-3">
                    <input class="form-check-input me-3" type="radio" name="caractere" id="caractere3" value="SpiderLutin" <?= (in_array('SpiderLutin', $_SESSION['key'])) ? '' : 'style="visibility:hidden"' ?>>
                    <label class="form-check-label" for="caractere3">
                    <?= (in_array('SpiderLutin', $_SESSION['key'])) ? 'Compréhensif, attentif aux autres' : '' ?> </label>
                </div>
            </div>
    
        <button type="submit" class="btn btnEnregist mb-5" name="autreQuestionButton"><b>Envoyer</b></button>
        </form>
  
        </div>
        <?php include 'footer.php' ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>