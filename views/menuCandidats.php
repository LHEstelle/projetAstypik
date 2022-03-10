<?php if (isset($_COOKIE['checkMatch'])) {
    $show = true;
}  ?>

<div class="d-flex justify-content-evenly align-items-end text-center">
    <a href="profilCandidat.php" id="jobOffer1" class="menu text-dark p-3 col-3">Mon profil</a>
    <a href="offresCandidats.php" id="candidateProfil1" class="menu text-dark p-3 col-3">Offres d'emplois</a>
    <?php
    // if (isset($_SESSION['match'])) {
    //     $arraylikes = array_values($_SESSION['match']);
    //     $counts = array_count_values($arraylikes);
    //     $countString = implode(',', $counts);
    //     $memory = isset($_COOKIE['checkMatch']) ? $_COOKIE['checkMatch'] : 0;
    //     $countString = $countString - $memory;
    // }

    ?>

    <a href="likesCandidat.php" id="likesNotif" class="menu text-dark p-3 col-3 likesCandidats">Likes <span id="countString" class="text-danger">  </span> </a>
   
    <a href="profilCandidat.php" class="fas fa-user menuIcon p-3 col-3 d-lg-none"></a>
    <a href="offresCandidats.php" class="fas fa-briefcase menuIcon p-3 col-3 d-lg-none"></a>
    <a href="likesCandidat.php" class="fas fa-heart menuIcon p-3 col-3 d-lg-none"></a>
</div>