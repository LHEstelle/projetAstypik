<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';



if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $annonce = new Annonce;
    $annonceInfoArray= $annonce-> getOneAnnonceDetails($id);

}