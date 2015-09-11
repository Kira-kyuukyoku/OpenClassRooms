<?php
class MaClasse
{
  public $attribut1;
  public $attribut2;
}

$a = new MaClasse;

$b = $a; // On assigne à $b l'identifiant de $a, donc $a et $b représentent le même objet.

$a->attribut1 = 'Hello';
echo $b->attribut1; // Affiche Hello.

$b->attribut2 = 'Salut';
echo $a->attribut2; // Affiche Salut.
?>
<br>
<?php

class MaClasseClone
{
  private static $instances = 0;

  public function __construct()
  {
    self::$instances++;
  }

  public function __clone()
  {
    self::$instances++;
  }

  public static function getInstances()
  {
    return self::$instances;
  }
}

$a = new MaClasseClone;
$b = clone $a;

echo 'Nombre d\'instances de MaClasseClone : ', MaClasseClone::getInstances();
?>
<br><br>

<?php
class A
{
  public $attribut1;
  public $attribut2;
}

class B
{
  public $attribut1;
  public $attribut2;
}

$a = new A;
$a->attribut1 = 'Hello';
$a->attribut2 = 'Salut';

$b = new B;
$b->attribut1 = 'Hello';
$b->attribut2 = 'Salut';

$c = new A;
$c->attribut1 = 'Hello';
$c->attribut2 = 'Salut';

if ($a == $b)
{
  echo '$a == $b';
}
else
{
  echo '$a != $b';
}

echo '<br />';

if ($a == $c)
{
  echo '$a == $c';
}
else
{
  echo '$a != $c';
}
?>
Comme on peut le voir, $a et $b ont beau avoir les mêmes attributs et les mêmes valeurs, ils ne sont pas identiques car ils ne sont pas des instances de la même classe. Par contre, $a et $c sont bien identiques.
<br><br>
<?php
class A
{
  public $attribut1;
  public $attribut2;
}

$a = new A;
$a->attribut1 = 'Hello';
$a->attribut2 = 'Salut';

$b = new A;
$b->attribut1 = 'Hello';
$b->attribut2 = 'Salut';

$c = $a;

if ($a === $b)
{
  echo '$a === $b';
}
else
{
  echo '$a !== $b';
}

echo '<br />';

if ($a === $c)
{
  echo '$a === $c';
}
else
{
  echo '$a !== $c';
}
?>
Pour comparer deux objets, l'opérateur == vérifie que les deux objets sont issus de la même classe et que les valeurs de chaque attribut sont identiques, tandis que l'opérateur === vérifie que les deux identifiants d'objet sont les mêmes.