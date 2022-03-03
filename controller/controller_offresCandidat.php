<?php 
require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/annonces.php';
require_once '../models/likes.php';

session_start();
$offers = new Annonce;
$allOfferssArray = $offers -> getAllOffers();

$likesObj = new Likes();
$likesCandidateArray = $likesObj->getAllLikesFromOneCandidate($_SESSION['id']);
var_dump($likesCandidateArray);

if(!isset($_SESSION)){
    header('Location: pageErreur.php');
}