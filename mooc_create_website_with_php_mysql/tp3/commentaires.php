<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'labo');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id_billet, title, content, DATE_FORMAT(create_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM billets WHERE id_billet = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['title']); ?>
        <em>le <?php echo $donnees['create_date_fr']; ?></em>
    </h3>

    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['content']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id_billet = ? ORDER BY comment_date');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['author']); ?></strong> le <?php echo $donnees['comment_date_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['comment'])); ?></p>
<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>