<?php
require 'personnage.php';

$moi = new Personnage();
$lui = new Personnage();
$moi->parler();
echo '<br>';
$moi->afficherExperience();

echo '<br>';
$moi->gagnerExperience();
$moi->afficherExperience();

$moi->frapper($lui);
$moi->gagnerExperience();
$lui->frapper($moi);
$lui->gagnerExperience();







 ?>
