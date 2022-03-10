<?php 
require_once '../controller/controller_testCandidat.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=places&language=fr&key=AIzaSyDecTo4CO49wUS9-_FtES7kcZmnb6H_Reg"></script>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Document</title>
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
                        <a class="nav-link text-white text-center" href="quisommesnous.php">Qui sommes nous</a>


                </div>
            </div>

        </nav>

        <h1 class="text-center m-3"> Inscription candidat </h1>
        <p class="m-4 text-center text-danger">Vous allez passer un test qui nous permettra de définir vos talents. Répondez le plus naturellement possible, sélectionnez la réponse qui vous ressemble le plus.
            Ce test est obligatoire. Vous devez répondre à chaque question et une seule réponse est autorisée. Attention vous ne pouvez passer ce test qu'une seule fois !</p>
        <div class="m-3">

    <form action="" method="POST">
                <div class="mb-3">

                    <label for=""><b> Vous êtes en train de regarder votre émission préférée et votre conjoint ou votre ami(e) vous demande de changer de chaîne TV afin de suivre une autre émission.</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["emission"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="emission" id="emission" value="peterPaon" <?= isset($_POST["emission"]) && $_POST["emission"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="emission">
                            Vous le convainquez de regarder la même émission que vous
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="emission" id="emission1" value="Cactus" <?= isset($_POST["emission"]) && $_POST["emission"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="emission1">
                            Vous refusez catégoriquement
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="emission" id="emission2" value="SpiderLutin" <?= isset($_POST["emission"]) && $_POST["emission"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="emission2">
                            Vous acceptez pour lui faire plaisir
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="emission" id="emission3" value="IronSpoke" <?= isset($_POST["emission"]) && $_POST["emission"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="emission3">
                            Vous lui faîtes remarquer que vous suivez régulièrement cette émission depuis 2 ans et qu’il devra attendre sa fin
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b> Une voiture vous double à toute allure et se rabat brutalement devant vous.</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["voiture"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="voiture" id="voiture" value="IronSpoke" <?= isset($_POST["voiture"]) && $_POST["voiture"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="voiture">
                            Vous pensez qu’on devrait renforcer les contrôles routiers pour empêcher de pareils abus
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="voiture" id="voiture1" value="peterPaon" <?= isset($_POST["voiture"]) && $_POST["voiture"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="voiture1">
                            Vous profitez du prochain feu rouge pour le féliciter avec humour de sa "bonne conduite"
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="voiture" id="voiture2" value="SpiderLutin" <?= isset($_POST["voiture"]) && $_POST["voiture"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="voiture2">
                            Vous pensez qu’il doit avoir de bonnes raisons de conduire aussi vite
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="voiture" id="voiture3" value="Cactus" <?= isset($_POST["voiture"]) && $_POST["voiture"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="voiture3">
                            Vous lui faites immédiatement un appel de phares ou un geste </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b>L’enfant qui vous accompagne, un peu turbulent, fait tomber un tas de boîtes dans un magasin</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["enfant"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="enfant" id="enfant" value="peterPaon" <?= isset($_POST["enfant"]) && $_POST["enfant"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="enfant">
                            Vous ramassez le tout en plaisantant sur la vivacité des petits
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="enfant" id="enfant1" value="SpiderLutin" <?= isset($_POST["enfant"]) && $_POST["enfant"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="enfant1">
                            Vous êtes gêné et ramassez rapidement ce qu’il a fait tomber
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="enfant" id="enfant2" value="IronSpoke" <?= isset($_POST["enfant"]) && $_POST["enfant"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="enfant2">
                            Vous lui expliquez pourquoi il a mal agi et lui demandez de remettre chaque boîte en place
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="enfant" id="enfant3" value="Cactus" <?= isset($_POST["enfant"]) && $_POST["enfant"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="enfant3">
                            Vous rattrapez l’enfant et le forcez à réparer ses bêtises </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b> Cette année vous vous préparez à de belles vacances</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["vacances"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="vacances" id="vacances" value="SpiderLutin" <?= isset($_POST["vacances"]) && $_POST["vacances"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="vacances">
                            Vous êtes ravi que votre conjoint vous propose des vacances au calme avec quelques amis
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="vacances" id="vacances1" value="Cactus" <?= isset($_POST["vacances"]) && $_POST["vacances"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="vacances1">
                            Vous prenez en main l’organisation d’un voyage lointain
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="vacances" id="vacances2" value="IronSpoke" <?= isset($_POST["vacances"]) && $_POST["vacances"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="vacances2">
                            Après avoir consulté et comparé les différentes offres depuis un mois, vous retenez les différentes étapes de votre voyage
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="vacances" id="vacances3" value="peterPaon" <?= isset($_POST["vacances"]) && $_POST["vacances"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="vacances3">
                            Vous adorez l’improviste et attendez les bonnes occasions de dernière minute
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b> Vous arrivez dans un embouteillage</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["embouteillage"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="embouteillage" id="embouteillage" value="Cactus" <?= isset($_POST["embouteillage"]) && $_POST["embouteillage"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="embouteillage">
                            Vous fulminez et cherchez immédiatement un moyen de contourner le bouchon
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="embouteillage" id="embouteillage1" value="IronSpoke" <?= isset($_POST["embouteillage"]) && $_POST["embouteillage"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="embouteillage1">
                            Vous trouvez anormal que certains changent de file pour vous passer devant
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="embouteillage" id="embouteillage2" value="peterPaon" <?= isset($_POST["embouteillage"]) && $_POST["embouteillage"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="embouteillage2">
                            Vous en profitez pour regarder les passagers autour de vous ou appeler un ami
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="embouteillage" id="embouteillage3" value="SpiderLutin" <?= isset($_POST["embouteillage"]) && $_POST["embouteillage"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="embouteillage3">
                            Vous patientez tranquillement, il n’y a rien d’autre à faire </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b>Vous vous rendez chez le médecin</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["medecin"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="medecin" id="medecin" value="peterPaon" <?= isset($_POST["medecin"]) && $_POST["medecin"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="medecin">
                            Vous lui donnez le maximum d’informations même si c’est un peu en vrac
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="medecin" id="medecin1" value="IronSpoke" <?= isset($_POST["medecin"]) && $_POST["medecin"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="medecin1">
                            Vous amenez toutes les analyses en votre possession et votre carnet de santé </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="medecin" id="medecin2" value="Cactus" <?= isset($_POST["medecin"]) && $_POST["medecin"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="medecin2">
                            Vous avez déjà une idée de ce qui vous arrive et lui demandez un traitement de cheval pour vous soigner très vite
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="medecin" id="medecin3" value="SpiderLutin" <?= isset($_POST["medecin"]) && $_POST["medecin"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="medecin3">
                            Vous préférez un traitement doux quitte à augmenter les doses progressivement
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b> Au restaurant, vous attendez depuis 35 mn sans que personne ne se soit occupé de vous</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["restaurant"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="restaurant" id="restaurant" value="IronSpoke" <?= isset($_POST["restaurant"]) && $_POST["restaurant"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="restaurant">
                            Vous vous levez pour intercepter la serveuse et lui demandez si elle pourrait être sympa et vous amener la carte
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="restaurant" id="restaurant1" value="Cactus" <?= isset($_POST["restaurant"]) && $_POST["restaurant"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="restaurant1">
                            Vous décidez de partir : vous détestez attendre et à coup sûr la suite de la soirée promet d’être identique !
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="restaurant" id="restaurant2" value="SpiderLutin" <?= isset($_POST["restaurant"]) && $_POST["restaurant"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="restaurant2">
                            Vous patientez car la serveuse fait tout ce qu’elle peut
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="restaurant" id="restaurant3" value="peterPaon" <?= isset($_POST["restaurant"]) && $_POST["restaurant"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="restaurant3">
                            Vous attendez que la serveuse vienne et lui faites remarquer poliment que vous attendez depuis 35 mns
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b>Vous disposez d’une salle de bain pour 4 personnes</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["sdb"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="sdb" id="sdb" value="IronSpoke" <?= isset($_POST["sdb"]) && $_POST["sdb"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="sdb">
                            Suivant l’emploi du temps de chacun, vous organisez un ordre de passage logique
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="sdb" id="sdb1" value="Cactus" <?= isset($_POST["sdb"]) && $_POST["sdb"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="sdb1">
                            Vous occupez en premier la SDB, c’est vous le plus rapide et pressé
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="sdb" id="sdb2" value="SpiderLutin" <?= isset($_POST["sdb"]) && $_POST["sdb"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="sdb2">
                            Vous attendez que la SDB se libère
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="sdb" id="sdb3" value="peterPaon" <?= isset($_POST["sdb"]) && $_POST["sdb"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="sdb3">
                            Vous vous douchez rapidement et terminez votre habillage ailleurs </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label"><b> Vous gagnez au loto</b></label>
                    <span class="text-danger">
                        <?= $arrayErrors["loto"] ?? "" ?>
                    </span>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="loto" id="loto" value="IronSpoke" <?= isset($_POST["loto"]) && $_POST["loto"] == "IronSpoke" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="loto">
                            Vous gérez prudemment votre portefeuille en appliquant les règles de prudence dictées par les spécialistes
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="loto" id="loto1" value="peterPaon" <?= isset($_POST["loto"]) && $_POST["loto"] == "peterPaon" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="loto1">
                            Vous et vos proches en profitez avec enthousiasme et sans parcimonie. La vie est si courte !
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="loto" id="loto2" value="Cactus" <?= isset($_POST["loto"]) && $_POST["loto"] == "Cactus" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="loto2">
                            Vous montez votre entreprise, c’est l’occasion rêvée
                        </label>
                    </div>
                    <div class="form-check d-flex ms-3">
                        <input class="form-check-input me-3" type="radio" name="loto" id="loto3" value="SpiderLutin" <?= isset($_POST["loto"]) && $_POST["loto"] == "SpiderLutin" ? 'checked' : '' ?>>
                        <label class="form-check-label" for="loto3">
                            Cela ne change pas radicalement votre façon de vivre mais vous apporte la stabilité </label>
                    </div>
                </div>
                <button type="submit" class="btn btnEnregist mb-5" name="testProfilButton"><b>Envoyer</b></button>
                <?php
                var_dump($_POST);  ?>


            </form>

        </div>
        <?php include 'footer.php' ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>