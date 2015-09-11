<?php
$classeMagicien = new ReflectionClass('Magicien');
$magicien = new Magicien(['nom' => 'vyk12', 'type' => 'magicien']);

foreach ($classeMagicien->getProperties() as $attribut)
{
  $attribut->setAccessible(true);
  echo $attribut->getName(), ' => ', $attribut->getValue($magicien);
}


$uneClasse = new ReflectionClass('Magicien');

foreach ($uneClasse->getProperties() as $attribut)
{
  echo $attribut->getName(), ' => attribut ';

  if ($attribut->isPublic())
  {
    echo 'public';
  }
  elseif ($attribut->isProtected())
  {
    echo 'protégé';
  }
  else
  {
    echo 'privé';
  }
}


$uneClasse = new ReflectionClass('Magicien');

foreach ($uneClasse->getProperties() as $attribut)
{
  echo $attribut->getName(), ' => attribut ';

  if ($attribut->isPublic())
  {
    echo 'public';
  }
  elseif ($attribut->isProtected())
  {
    echo 'protégé';
  }
  else
  {
    echo 'privé';
  }

  if ($attribut->isStatic())
  {
    echo ' (attribut statique)';
  }
}