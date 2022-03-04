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
    <title>Astypik recrutement</title>
</head>

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
                    <a class="nav-link text-white text-center" href="#">Qui sommes nous</a>


            </div>
        </div>

    </nav>
    <div class="container">
        <h1 class="text-center mb-4">Qui sommes-nous?</h1>

        <h2 class="mt-4 mb-3 titlePara text-center">Astypik Recrutement? Une manière atypique de recruter des AS!</h2>
        <div class="d-flex justify-content-center">
            <img src="../assets/img/aspique.png" alt="as de pique" class="imgPique">
        </div>
        <p>Et oui! Nous sommes tous atypiques car tous uniques! Nous pouvons tous être l'AStout d'une entreprise. Il suffit simplement d'utiliser les talents naturels au service d'un poste adéquat! </p>
        Astypik recrutement est une base de données d'offres d’emplois et de candidats fonctionnant sur le même principe qu’une application de rencontres, qui a pour objectif de faire matcher le profil des candidats en fonction des critères de recrutement des
        entreprises.
        <h2 class="mt-4 mb-3 titlePara text-center">Comment repérer les talents?</h2>
        <p>A l'inscription le candidat passe un test de personnalité de 5min qui nous aidera à connaitre ses talents naturels. Alors, êtes-vous un super organisateur, un leader naturel...? </p>
        <h2 class="mt-4 mb-3 titlePara text-center">Nos valeurs</h2>
        <b><p>Du fun</p></b> Notre but est de créer un recrutement fun! Alors ne vous étonnez pas de voir apparaitre dans votre fil des profils d'entreprise ou de candidats déjantés! L'originalité est mise à l'honneur ici!
        <b><p class="mt-3">Un recrutement basé sur la réciprocité</p></b>
        <p class="">Si un candidat et un recruteur matchent, cela permettra d’engager une conversation qui aboutira dans le meilleur des cas à un entretien.</p>
        <a href="inscriptionEntrepriseOuCandidat">
            <h3 class="mb-5 linkInscriptionn text-center">Alors? Envie de faire parti des astypiks? Rejoignez-nous!</h3>
        </a>

    </div>

    <?php include 'footer.php' ?>
</body>

</html>