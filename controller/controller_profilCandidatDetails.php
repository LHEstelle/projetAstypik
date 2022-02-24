<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';



if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $candidate = new Candidat;
    $candidatInfoArray= $candidate-> getOneCandidateDetails($id);
    var_dump($_GET);
}