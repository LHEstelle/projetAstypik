<?php 

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/likes.php';

session_start();

$likesCandidatesObj = new Likes();
$likesCandidatesArray = $likesCandidatesObj -> getLikesOfOneCandidate($_SESSION['mail']);

$RecrutorLikesObj = new Likes();
$allRecrutor = $RecrutorLikesObj-> getLikesOfAllRecrutorForOneCandidate($_SESSION['mail']);

if(empty($_SESSION)){
    header('Location: pageErreur.php');
}