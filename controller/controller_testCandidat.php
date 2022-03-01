<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';

session_start();
var_dump($_SESSION);
if (isset($_POST['testProfilButton'])) {
    if (!isset($_POST['emission'])) {
        $arrayErrors["emission"] = "Veuillez saisir une réponse";
    }

    if (!isset($_POST['voiture'])) {
        $arrayErrors["voiture"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['enfant'])) {
        $arrayErrors["enfant"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['vacances'])) {
        $arrayErrors["vacances"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['embouteillage'])) {
        $arrayErrors["embouteillage"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['medecin'])) {
        $arrayErrors["medecin"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['restaurant'])) {
        $arrayErrors["restaurant"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['sdb'])) {
        $arrayErrors["sdb"] = "Veuillez saisir une réponse";
    }
    if (!isset($_POST['loto'])) {
        $arrayErrors["loto"] = "Veuillez saisir une réponse";
    }
}


$arrayAnswer = [];
$drawAnswer = [];
$arrayAnswers = array_values($_POST);
$counts = array_count_values($arrayAnswers);
$countsTry = arsort($counts);
var_dump($counts);


if (isset($_POST['testProfilButton']) && empty($arrayErrors)) {
    $max = 0;
    $maxKey = '';
    foreach ($counts as $key => $value) {
        echo $key . '<br>';

        if ($value == $max) {
            $drawAnswer[] = $maxKey;
            $drawAnswer[] = $key;

            $type = "";
            $max = $value;
            $type = $key;
        } else  if ($value > $max) {
            $maxKey = $key;
            $max = $value;
            $type = $key;
        } else if ($value > $max) {
            $maxKey = $key;
            $max = $value;
            $type = $key;
        }
    }

    $drawAnswerProfile = array_unique($drawAnswer);
    var_dump($drawAnswerProfile);
    if (empty($drawAnswerProfile)) {

        foreach ($counts as $key => $value) {
            var_dump($counts);
           
            if ($value == $max) {
                var_dump($value);
                $maxKey = $key;
                $max = $value;
                $type = $key;
               var_dump($key);
                if (isset($key) && $key == 'Cactus') {
                    $id_profils = intval(1);
                } else if (!empty($key) && $key == 'peterPaon') {
                    $id_profils = intval(2);
                    var_dump($id_profils);
                } else if ($key == 'SpiderLutin') {
                    $id_profils = intval(3);
                } else if ($key == 'IronSpoke') {
                    $id_profils = intval(4);
                }
               
                $candidateProfil = new Candidat;
                $modifyCandidateProfil = $candidateProfil->modifyProfil($id_profils, $_SESSION['mail']);
                session_unset();
                header("Location: test" . $key . ".php");
             
            }
        }
    }
}
