<?php
class Personnage
{
  private $_id;
  private $_degats;
  private $_nom;

  const CEST_MOI = 1;
  const PERSONNAGE_TUE = 2;
  const PERSONNAGE_FRAPPE = 3;

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  public function hydrate (array $data)
  {
    foreach ($data as $hey => $value)
    {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function frapper(Personnage $perso)
  {
    /* verifier que ne se frappe pas soi-meme
    si c'est le cas on stop tout en renvoyant une valeur signifiant que le personnage ciblée est le personnage qui attage.*/
    if ($perso->id() == $this->_id)
    {
      return self::CEST_MOI;
    }
    //on indique au personnage frappé qu'il doit recevoir des dégats
    return $perso->recevoirDegats();
  }

  public function recevoirDegats(Personnage $perso)
  {
    // On augmente de 5 les dégâts.
    $this->_degats += 5;

    // Si on a 100 de dégâts ou plus, la méthode renverra une valeur signifiant que le personnage a été tué.
    if ($his->_degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    else
    {
      // Sinon, elle renverra une valeur signifiant que le personnage a bien été frappé
      return self::PERSONNAGE_FRAPPE;
    }

  }
  // getters
  public function getId ()
  {
    return $this->_id;
  }

  public function getNom ()
  {
    return $this->_nom;
  }

  public function getDegats ()
  {
    return $this->_degats;
  }

  /* setters*/
  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }

  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }

  public function setDegats($degats)
  {
    $degats = (int) $degats;
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function hydrate (array $data)
  {
    foreach ($data as $hey => $value)
    {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }


}



 ?>
