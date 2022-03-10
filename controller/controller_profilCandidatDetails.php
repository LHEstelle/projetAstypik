<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';
require_once '../models/likes.php';


session_start();
if(empty($_SESSION)){
    header('Location: pageErreur.php');
}
if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $candidate = new Candidat;
    $candidatInfoArray= $candidate-> getOneCandidateDetails($id);
}

if (isset($_POST['idCandidatLike'])) {
    $idCandidate = $_POST['idCandidatLike'];
    $idRecrutor = $_SESSION['id'];
    $likeObj = new Likes;
    $addLikes = $likeObj->addLikeRecrutor($idCandidate, $idRecrutor);
}
if (isset($_POST['idCandidatDislike'])) {
    $idCandidate = $_POST['idCandidatDislike'];
    $idRecrutor = $_SESSION['id'];
    $likeObj = new Likes;
    $deleteLikes = $likeObj->deleteLikeRecrutor($idCandidate, $idRecrutor);
} 

$likesObj = new Likes();
$likesRecrutorArray = $likesObj->getAllLikesFromOneRecrutor($_SESSION['id']);
