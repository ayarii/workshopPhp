<?php
require_once '../Controllers/PersonneC.php';
$pc = new PersonneC();
$liste = $pc->listePersonne();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-
scale=1.0">
<title>Exemple2A</title>
</head>
<body>
<h1>Liste Personnes</h1>
<ul>
<?php
foreach ($liste as $p) {
    ?>
<li>
<?= $p['id']; ?>
<?= $p['nom']; ?>
<?php echo ($p['prenom']); ?>
<?php echo ($p['email']); ?>
<?php echo ($p['tel']); ?>
<a href="modifierPersonne.php?id=<?= $p['id']; ?>">Modifier</a>
<form action="supprimerPersonne.php" method="POST" style="display:inline;">
    <input type="hidden" name="id" value="<?= $p['id']; ?>">
    <input type="submit" value="Supprimer">
</form>
</li>
<?php } ?>
</ul>
<a href="addPersonne.php">Ajouter une nouvelle personne</a>
</body>
</html>