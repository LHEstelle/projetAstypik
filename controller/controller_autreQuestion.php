<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';

session_start();

if (empty($_SESSION)) {
    header('Location: pageErreur.php');
}else if(isset($_SESSION['anotherQuestionKey'])){
    header('Location: pageErreurTest.php');
}
$arrayAnswer = [];
$drawAnswer = [];
$arrayAnswers = array_values($_POST);
$counts = array_count_values($arrayAnswers);
$countsTry = arsort($counts);

if (isset($_POST['autreQuestionButton'])) {
    if (!isset($_POST['caractere'])) {
        $arrayErrors["caractere"] = "Veuillez saisir une réponse";
    }
}

if (isset($_POST['autreQuestionButton']) && empty($arrayErrors)) {
    $max = 0;
    $maxKey = '';

    foreach ($counts as $key => $value) {
        if ($value > $max) {

            $maxKey = $key;
            $max = $value;
            $type = $key;

            if (isset($key) && $key == 'Cactus') {
                $id_profils = intval(1);
            } else if (!empty($key) && $key == 'peterPaon') {
                $id_profils = intval(2);
            
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
