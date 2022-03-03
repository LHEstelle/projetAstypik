<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';

session_start();

if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $candidate = new Candidat;
    $candidatInfoArray= $candidate-> getOneCandidateDetails($id);
    var_dump($_GET);
}

if(!isset($_SESSION)){
    header('Location: pageErreur.php');
}