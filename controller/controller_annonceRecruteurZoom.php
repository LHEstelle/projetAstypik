<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';
require_once '../models/likes.php';

session_start();
if(empty($_SESSION)){
    header('Location: pageErreur.php');
}
if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $annonce = new Annonce;
    $annonceInfoArray= $annonce-> getOneAnnonceDetails($id);

}
$likesObj = new Likes();
$likesCandidateArray = $likesObj->getAllLikesFromOneCandidate($_SESSION['id']);
if (isset($_POST['idOfferLike'])) {
    $idOffer = $_POST['idOfferLike'];
    $idCandidate = $_SESSION['id'];
    $likeObj = new Likes;
    $addLikes = $likeObj->addLikeCandidate($idOffer, $idCandidate);
}
if (isset($_POST['idOfferDislike'])) {
    $idOffer = $_POST['idOfferDislike'];
    $idCandidate = $_SESSION['id'];
    $likeObj = new Likes;
    $deleteLikes = $likeObj->deleteLikeCandidate($idOffer, $idCandidate);
} 
