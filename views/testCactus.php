<?php
session_start();
if (empty($_SESSION) || !isset($_SESSION)) {
    header('Location: pageErreur.php');
}

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
    <script src="https://kit.fontawesome.com/105da6fa91.js" crossorigin="anonymous"></script>
    <title>Astypik recrutement</title>
</head>

<body>

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

            <h1 class="text-center profilRed">Vous êtes un super Cactus ! </h1>
            <h2 class="text-center">"travaille le terrain, élimine les obstacles avec force et énergie."</h2>
            <div class="d-flex justify-content-center">
                <img src="../assets/img/supercactus.jpg" class="supercactusImg" alt="image super cactus">
            </div>
            <div class="container">
                <p class="m-2 mb-3">Le super Cactus possède une vision macro. Il aime avoir une vue d’ensemble et ne s’embarrasse pas des détails, qui ont tendance à l’ennuyer ou à lui faire peur.</p>
                <p class="m-2 mb-3"> Le super Cactus est franc. Il ne tourne pas autour du pot pour dire ce qu’il a à dire. Un franc parler sans fioritures qui, à l’excès, peut mettre mal à l’aise ses interlocuteurs.</p>
                <p class="m-2 mb-3"> Le super Cactus est motivé par les challenges. Les tâches répétitives l’ennuient. Il est capable de les effectuer mais sans entrain. Il s’investira à 100% si un challenge lui est proposé.</p>
                <p class="m-2 mb-3"> Le super Cactus va droit au but. Il avance et se donne les moyens d’atteindre ses objectifs. S’il y a des embûches sur son chemin (des difficultés techniques ou des personnes), il trouvera comment les surmonter. Le dominant est un compétiteur
                    dans l'âme, ce qui peut le rendre agressif aux yeux des autres.</p>
                <p class="m-2 mb-3"> Le super Cactus parle fort. Il peut donner l’impression de crier, surtout s’il parle avec un autre dominant. Leur simple discussion peut ressembler à une dispute et surprendre les personnes alentours ayant d’autres profils.</p>
                <p class="m-2 mb-3"> Le super Cactus parle vite. Il n’aime pas les trous dans une phrase et peut prendre la parole à la moindre pause de son interlocuteur.</p>
                <p class="m-2 mb-3"> Le super Cactus n’a pas peur de se tromper. Il préfère se tromper que de rester immobile. Il peut prendre des décisions avec très peu de cartes en main et n’a aucun souci à reconnaître ses erreurs éventuelles.</p>
                <p class="m-2 mb-3"><b>En bref, le super Cactus est très performant et n'a pas peur de piquer quiconque se mettrait en travers de sa route !</b>
                </p>
                <h2 class="text-center mt-3 profilRed">Votre orientation métier</h2>
                <p class="m-2 mb-3">Le super Cactus a tendance à graviter vers des postes à forte autorité (CEO, Directeur de Réseau …) qui peuvent être pour lui d'énormes sources de motivation.Le super Cactus est orienté vers les résultats. Il va directement au but, accélère
                    les efforts des autres. Il est orienté vers le changement et les nouveaux défis, garde un rythme serré, maintient la concentration et le contrôle des objectifs. Il ne se décourage pas, il agit de manière indépendante, il résout froidement
                    les problèmes, même dans les situations d'urgence.


                </p>
                <h2 class="text-center mt-3 profilRed">Vos talents naturels</h2>

                <p class="text-center mt-3 mb-2"><b>Leader - autonome - factuel - énergique</b></p>
            </div>
            <p class="text-center mb-5">Votre inscription est maintenant terminée. Alors? Hâte de voir quels offres d'emplois sont faites pour vous? <a href="connexionCandidat.php" class="text-primary"> Connectez-vous !! </a></p>
        
            </div>
            <?php include 'footer.php' ?>
        </body>

</html>