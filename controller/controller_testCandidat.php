<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';



if (!empty($_POST)) {
    if (isset($_POST['emission'])) {
        if (empty($_POST["emission"])) {
            $arrayErrors["emission"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['voiture'])) {
        if (empty($_POST["voiture"])) {
            $arrayErrors["voiture"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['enfant'])) {
        if (empty($_POST["enfant"])) {
            $arrayErrors["enfant"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['vacances'])) {
        if (empty($_POST["vacances"])) {
            $arrayErrors["vacances"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['embouteillage'])) {
        if (empty($_POST["embouteillage"])) {
            $arrayErrors["embouteillage"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['medecin'])) {
        if (empty($_POST["medecin"])) {
            $arrayErrors["medecin"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['restaurant'])) {
        if (empty($_POST["restaurant"])) {
            $arrayErrors["restaurant"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['sdb'])) {
        if (empty($_POST["sdb"])) {
            $arrayErrors["sdb"] = "Veuillez saisir une réponse";
        }
    }
    if (isset($_POST['loto'])) {
        if (empty($_POST["loto"])) {
            $arrayErrors["loto"] = "Veuillez saisir une réponse";
        }
    }
}



$arrayAnswer = [];
$arrayAnswers = array_values($_POST);
$counts = array_count_values($arrayAnswers);


foreach ($counts as $key => $value) {

    if ($value == $max) {
        $max = 0;
        $type = "";
        $max = $value;
        $type = $key;
        echo " vous êtes " . $key;
        $arrayAnswer = "Nous allons vous poser une dernière question";
    } else if ($value > $max) {
        $max = 0;
        $type = "";
        $max = $value;
        $type = $key;
        echo "vous êtes " . $key;

        var_dump($key);

        // header('location: test' . $key . '.html');
    }
}
var_dump($max, $type);
