<?php
// Afficher les erreurs à l'écran
//ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
//ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
//ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements
//error_reporting(e_all);


// Les classes peuvent être chargées dynamiquement (c'est-à-dire sans avoir explicitement inclus le fichier la déclarant) grâce à l'auto-chargement de classe (utilisation de spl_autoload_register).
function chargerClasse($classe)
{
  require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

// On envoie une « FORCE_MOYENNE » en guise de force initiale.
$perso1 = new PersonnageTest(PersonnageTest::FORCE_MOYENNE);
$perso2 = new PersonnageTest(PersonnageTest::FORCE_MOYENNE);


// Appel de methode static
PersonnageTest::parler();
// Ou
$perso3 = new PersonnageTest(PersonnageTest::FORCE_GRANDE);
$perso3->parler();


// Via BDD
$perso = new Personnage([
  'nom' => 'Victor2',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

try
{
    $db = new PDO('mysql:host=localhost;dbname=personnages', 'root', 'labo');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

echo $perso->nom().' affichage de l\'attribut nom';

$manager = new PersonnagesManager($db);

$manager->add($perso);