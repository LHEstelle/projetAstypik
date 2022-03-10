<?php
session_start();
if (empty($_SESSION) || !isset($_SESSION)) {
    header('Location: pageErreur.php');
}
session_unset();

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

            <h1 class="text-center profilGreen">Vous êtes un spider-Lutin ! </h1>
            <h2 class="text-center">"chaque jour avec constance en respectant les petits changements."</h2>
            <div class="d-flex justify-content-center">
                <img src="../assets/img/spiederlutin.jpg" class="supercactusImg" alt="image spiderLutin">
            </div>
            <div class="container">

                <p class="m-2 mb-3">Le spider-Lutin parle doucement. Il faut souvent lui demander de parler plus fort au téléphone. Ses interventions sont rares mais pertinentes. Il impose le silence et quand il prend la parole en réunion, les participants se taisent.</p>
                <p class="m-2 mb-3">Le spider-Lutin ne supporte pas d’être stressé. Le spider-Lutin a besoin de temps pour digérer l’information et être capable de réagir. Presser un spider-Lutin risque de le bloquer.
                </p>
                <p class="m-2 mb-3">Le spider-Lutin fait passer les autres avant lui-même. C’est le profil typique de mère Teresa ou du bon père de famille. Il est incapable de résister quand on lui demande son aide et va tout lâcher pour secourir ses proches.
                </p>
                <p class="m-2 mb-3">Le spider-Lutin agit de façon calme et modérée. Il est d’humeur égale. Il parle sans hausser le ton, ni agiter les mains qu’il garde sur la table ou dans ses poches. Il ne montre pas spécialement de réaction face aux situations de stress,
                    mais les vit très mal en réalité.

                </p>
                <p class="m-2 mb-3">Le spider-Lutin est humble. Il n’aime pas être mis en avant ou recevoir des compliments devant tout le monde. Il est préférable de le féliciter en privé. En revanche, il appréciera que son équipe soit complimentée et valorisée en public.</p>

                </p>
                <p class="m-2 mb-3">Le spider-Lutin peut réagir violemment. Calme et serviable, il a tendance à intérioriser d’éventuels reproches ou des situations qui lui déplaisent. Mais à force de se contenir, il accumule de l’énergie négative. Il suffit alors d’une
                    montée de stress, ou d’une simple remarque envers une personne de son équipe ou de sa famille, pour le faire exploser. Telle la goutte d’eau qui fait déborder le vase !</p>
                <p class="m-2 mb-3"> Le spider-Lutin peut exploser sans demi-mesure. Quand il s’énerve, tout risque de sortir d’un seul coup, de façon disproportionnée. Il regrettera probablement certains mots qui auront dépassé sa pensée. On peut alors se trouver en conflit
                    avec un spider-Lutin pour une chose qui nous semble anodine, sans comprendre que sa réaction est le fruit de multiples sources de tensions professionnelles et/ou personnelles.</p>
                <p class="m-2 mb-3"><b>En bref, vous n'hésitez pas à aider vos proches comme le ferait un lutin pour
                        faire plaisir à tous les enfants le jour de noël! Vous êtes toujours là pour les autres. Mais
                        attention, vous avez des limites et si on vous pousse trop loin vous vous transformez en
                        araignée piquante!</b>
                </p>
                <h2 class="text-center mt-3 profilGreen">Votre orientation métier</h2>
                <p class="m-2 mb-3">Le spider-Lutin est orienté vers un travail constant et prévisible, il rend les pratiques et les procédures stables. Il fonctionne mieux dans un groupe où, grâce à des actions quotidiennes, il renforce sa stabilité et ses liens relationnels.
                    Il est très utile à ses collègues, il est fidèle à son groupe cible, qui peut aussi être la marque ou l'entreprise, il est résistant et fait preuve de beaucoup de patience. Il est amical et cordial avec tout le monde, il sait écouter
                    attentivement les gens. Le spider-Lutin est souvent dans des postes en lien avec les ressources humaines, et aussi tout ce qui est conseil, coaching et accompagnement de la personne que ce soit à son compte en tant que thérapeute ou
                    bien au sein d’une hôpital.
                </p>
                <h2 class="text-center mt-3 profilGreen">Vos talents naturels</h2>

                <p class="text-center mt-3 mb-2"><b>Patience - fiabilité - coopération - empathie</b></p>
            </div>
            <p class="text-center mb-5">Votre inscription est maintenant terminée. Alors? Hâte de voir quels offres d'emplois sont faites pour vous? <a href="connexionCandidat.php" class="text-primary"> Connectez-vous !! </a></p>
            
            </div>
            <?php include 'footer.php' ?>
        </body>

</html>