<?php
class Personnage
{
  private $force; //force du Personnage
  private $localisation;
  private $experience = 50;
  private $degats;

  public function deplacer()
  {

  }

  public function frapper(Personnage $persoAfrapper){
    $persoAfrapper->degats += $this->force;

  }

  public function gagnerExperience(){
    $this->experience ++;

  }

  public function afficherExperience(){
    echo $this->experience;
  }

  public function parler(){
    echo "je suis un personnage";

  }

  public function force(){
    return $this->force;
  }

  public function localisation(){
    return $this->localisation;
  }

  public function experience(){
    return $this->experience;
  }

  public function degats(){
    return $this->degats;
  }

  public function setForce($fort){
    if (!is_int($fort)) // si il ne s'agit pas d'un nombre enetier
    {
      trigger_error('La force d\'un personnage doît être un entier', E_USER_WARNING);
      return;
    }
    if ($fort > 100)
    {
      trigger_error('La force ne peut pas dépasser 100', E_USER_WARNING);
      return;
    }
    $this->force = $fort;
  }

  public function setExperience($exper){
    if (!is_int($exper)) // si il ne s'agit pas d'un nombre enetier
    {
      trigger_error('L\'experience d\'un personnage doît être un entier', E_USER_WARNING);
      return;
    }
    if ($erper > 100)
    {
      trigger_error('L\'experience ne peut pas dépasser 100', E_USER_WARNING);
      return;
    }
    $this->force = $exper;
  }


}









 ?>
