<?php
/* Souvenez-vous : on n'accède pas à un attribut statique avec $this mais avec self !
self représente la classe tandis que $this représente l'objet actuellement créé.
Si un attribut statique est modifié, il n'est pas modifié uniquement dans l'objet créé mais dans la structure complète de la classe */

class Compteur
{
  // Déclaration de la variable $compteur
  private static $_compteur = 0;

  public function __construct()
  {
    // On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé self).
    self::$_compteur++;
  }

  public static function getCompteur() // Méthode statique qui renverra la valeur du compteur.
  {
    return self::$_compteur;
  }
}

$test1 = new Compteur;
$test2 = new Compteur;
$test3 = new Compteur;

echo Compteur::getCompteur();