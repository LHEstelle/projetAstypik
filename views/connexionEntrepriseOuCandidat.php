<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&language=fr&key=AIzaSyDecTo4CO49wUS9-_FtES7kcZmnb6H_Reg">
    </script>
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
        <h1 class="text-center">Qui êtes-vous?</h1>

        <div class="d-flex justify-content-center ms-1">
            <img src="../assets/img/candidat.png" alt="image candidat" class="imgCandidatOuEntrepriseConnexion me-5">
            <a href="connexionCandidat.php">

                <div class="entrepriseChoice d-flex align-items-center justify-content-center m-3">


                    <p class="text-center"><b>Un candidat</b></p>
                </div>
            </a>





            <a href="connexionRecruteur.php">

                <div class="candidatChoice d-flex align-items-center justify-content-center m-3">

                    <p class="text-center"><b>Une entreprise</b></p>

                </div>

            </a>
            <img src="../assets/img/entreprise.png" alt="image entreprise" class="imgCandidatOuEntrepriseConnexion ms-5">
        </div>
        <?php include 'footer.php' ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        </script>
    </body>

</html>