<?php
namespace OCFram;

abstract class Entity implements \ArrayAccess
{

  // Utilisation du trait Hydrator pour que nos entités puissent être hydratées
  use Hydrator;

  // La méthode hydrate() n'est ainsi plus implémentée dans notre classe

  protected $erreurs = [],
            $id;

  public function __construct(array $donnees = [])
  {
    if (!empty($donnees))
    {
      $this->hydrate($donnees);
    }
  }

  public function isNew()
  {
    return empty($this->id);
  }

  public function erreurs()
  {
    return $this->erreurs;
  }

  public function id()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = (int) $id;
  }

  // Cette méthode n'est plus utiliser, suite à la création du trait Hydrator (Hydrator.php)
  /*public function hydrate(array $donnees)
  {
    foreach ($donnees as $attribut => $valeur)
    {
      $methode = 'set'.ucfirst($attribut);

      if (is_callable([$this, $methode]))
      {
        $this->$methode($valeur);
      }
    }
  }*/

  public function offsetGet($var)
  {
    if (isset($this->$var) && is_callable([$this, $var]))
    {
      return $this->$var();
    }
  }

  public function offsetSet($var, $value)
  {
    $method = 'set'.ucfirst($var);

    if (isset($this->$var) && is_callable([$this, $method]))
    {
      $this->$method($value);
    }
  }

  public function offsetExists($var)
  {
    return isset($this->$var) && is_callable([$this, $var]);
  }

  public function offsetUnset($var)
  {
    throw new \Exception('Impossible de supprimer une quelconque valeur');
  }
}