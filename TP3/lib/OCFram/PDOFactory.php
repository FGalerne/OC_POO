<?php
namespace OCFram;

class PDOFactory
{
  public static function getMysqlConnexion()
  {
    // Connexion à la base de donnée
    $db = new \PDO('mysql:host=localhost;dbname=news', 'root', '');
    $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ATTR_EXCEPTION);
    return $db;
    
  }
}




 ?>
