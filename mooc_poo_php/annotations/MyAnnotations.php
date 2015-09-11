<?php
$reflectedClass = new ReflectionAnnotatedClass('Personnage');

$ann = 'Table';
if ($reflectedClass->hasAnnotation($ann))
{
  echo 'La classe possède une annotation <strong>', $ann, '</strong> dont la valeur est <strong>', $reflectedClass->getAnnotation($ann)->value, '</strong><br />';
}

$classInfos = $reflectedClass->getAnnotation('ClassInfos');

echo $classInfos->author . "<br />";
echo $classInfos->version;


$reflectedAttr = new ReflectionAnnotatedProperty('Personnage', 'force');
$reflectedMethod = new ReflectionAnnotatedMethod('Personnage', 'deplacer');

echo '<br />Infos concernant l\'attribut :';
var_dump($reflectedAttr->getAnnotation('AttrInfos'));

echo '<br />Infos concernant les paramètres de la méthode :';
var_dump($reflectedMethod->getAllAnnotations('ParamInfo'));

echo '<br />Infos concernant la méthode :';
var_dump($reflectedMethod->getAnnotation('MethodInfos'));