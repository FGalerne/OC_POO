<?php
class PersonnageManager
{
  private $_db;

  public function __construct($db)
  {
    $this->setDB($db);
  }

  public function add (Personnage $perso)
  {
    // Préparation de la requête d'insertion.
    $q = $this->_db->prepare('INSERT INTO personnages(nom, degats) VALUES (:nom, :degats)');
    // Assignation des valeurs pour le nom du personnage.
    $q->bindValues(':nom', $perso->nom(), PDO::PARAM_INT);
    $q->bindValues(':degats', $perso->degats(), PDO::PARAM_INT);
    // Exécution de la requête.
    $q->execute();
    // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
  }

  public function count()
  {
    //Execute une requete COUNT() et retourne le nombre de résultat retourné.
    return $this->_db->query('SELET COUNT(*) FROM personnages')->fetchColumn();

  }

  public function delete (Personnage $perso)
  {
    //Exécute une requete de type DELETE
      $this->_db->exec('DELETE FROM personnages WHERE id ='.$perso->id());
  }

  public function exists($info)
  {
    // Si le paramètre est un entier, c'est qu'on a fourni un identifiant.
    if (is_int($info))
    {
        // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query('SELECT COUNT(*) FROM personnage WHERE id ='.$info)->fetchColumn();
    }
    // Sinon c'est qu'on a passé un nom.
    // Exécution d'une requête COUNT() avec une clause WHERE, et retourne un boolean.
    $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
    $q->execute([':nom' => $info]);
    return (bool) $q->fetchColumn();
  }
  public function get($info)
  {
    // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
    if(is_int($info))
    {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
      $q = $this->_db->query('SELECT id, nom, degats FROM personnage WHERE id ='.$info);
      $data = $q->fetch(PDO::FETCH_ASSOC);
      return new Personnage($data);

    }
    // Sinon, on veut récupérer le personnage avec son nom.
    else
    {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
      $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
      $q->execute([':nom' => $info]);
      return new Personnage($q->fetch(PDO::FETCH_ASSOC));
    }

  }

  public function getList($nom)
 {
   // Retourne la liste des personnages dont le nom n'est pas $nom.
   // Le résultat sera un tableau d'instances de Personnage.
   $persos = array();
   $q =$this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom');
   $q->execute(array(
     'nom' => $nom
   ));

   while ($data =$q->fetch(PDO::FETCH_ASSOC))
   {
     $persos[] = new Personnage($data);
   }
   return persos;
 }

 public function update(Personnage $perso)
 {
   // Prépare une requête de type UPDATE
    $q =$this->_db->prepare('UPDATE personnages SET degats = :degats WHERE id = :id');
   // Assignation des valeurs à la requête.
   $q->bindValues(':nom', $perso->nom(), PDO::PARAM_INT);
   $q->bindValues(':degats', $perso->degats(), PDO::PARAM_INT);
   // Exécution de la requête.
   $q->execute();
 }

 public function setDb(PDO $db)
 {
   $this->_db = $db;
}

 ?>
