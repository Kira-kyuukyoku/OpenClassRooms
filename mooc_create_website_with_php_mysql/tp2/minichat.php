<?php
// Utilise le cookie du pseudo si existe
$pseudo = isset($_COOKIE['pseudo']) ? htmlspecialchars($_COOKIE['pseudo']) : '';

    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'labo');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

if(!empty($_POST['pseudo']) && !empty($_POST['message']))
{
    // Le dernier paramètre true permet d'activer le mode httpOnly sur le cookie, et donc de le rendre en quelque sorte plus sécurisé.
    setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO minichat (pseudo, message, date_mess) VALUES(?, ?, NOW())');
    $req->execute(array( $_POST['pseudo'], $_POST['message']));

    // Redirection du visiteur vers la page du minichat
    header('Location: minichat.php');
}
if(isset($_POST, $_POST['pseudo'], $_POST['message']))
{
    $error = 'Il faut remplir tous les champs.';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mini-chat</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    <?php if(!empty($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form action="minichat.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
    </p>
    </form>

<?php
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_mess, \'%d/%m/%Y à %H:%i:%s\') AS date_mess FROM minichat ORDER BY id_mess DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<p>[' . htmlspecialchars($donnees['date_mess']) . '] <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>