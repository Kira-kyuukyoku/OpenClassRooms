<?php
class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }

  public function __toString()
  {
    return $this->message;
  }
}

function additionner($a, $b)
{
  if (!is_numeric($a) || !is_numeric($b))
  {
    throw new MonException('Les deux paramètres doivent être des nombres'); // On lance une exception "MonException".
  }

  return $a + $b;
}

try // Nous allons essayer d'effectuer les instructions situées dans ce bloc.
{
  echo additionner(12, 3), '<br />';
  echo additionner('azerty', 54), '<br />';
  echo additionner(4, 8);
}

catch (MonException $e) // Nous allons attraper les exceptions "MonException" s'il y en a une qui est levée.
{
  echo $e; // On affiche le message d'erreur grâce à la méthode __toString que l'on a écrite.
}

echo '<br />Fin du script'; // Ce message s'affiche, ça prouve bien que le script est exécuté jusqu'au bout.


echo '<br />Exemple pour PDO'; // Ce message s'affiche, ça prouve bien que le script est exécuté jusqu'au bout.
try
{
  $db = new PDO('mysql:host=localhost;dbname=tests', 'root', 'labo'); // Tentative de connexion.
  echo 'Connexion réussie !'; // Si la connexion a réussi, alors cette instruction sera exécutée.
}

catch (PDOException $e) // On attrape les exceptions PDOException.
{
  echo 'La connexion a échoué.<br />';
  echo 'Informations : [', $e->getCode(), '] ', $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message.
}