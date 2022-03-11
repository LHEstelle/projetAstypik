<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';

session_start();
if (empty($_SESSION) ) {
    header('Location: pageErreur.php');
}else if(isset($_SESSION['key'])){
    header('Location: pageErreurTest.php');
}

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


if (isset($_POST['testProfilButton']) && empty($arrayErrors)) {
    $max = 0;
    $maxKey = '';
    foreach ($counts as $key => $value) {


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
    if (!empty($drawAnswerProfile)) {

        $_SESSION['key'] = $drawAnswerProfile;

        header("Location: autreQuestion.php");
    }

    if (empty($drawAnswerProfile)) {

        foreach ($counts as $key => $value) {
            if ($value == $max) {
                var_dump($value);
                $maxKey = $key;
                $max = $value;
                $type = $key;
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
                $sessionObj = new Candidat;
                $_SESSION = $sessionObj->getOneCandidate($_SESSION['mail']);
                $candidateProfil = new Candidat;
                $modifyCandidateProfil = $candidateProfil->modifyProfil($id_profils, $_SESSION['mail']);

                header("Location: test" . $key . ".php");
            }
        }
    }
}
