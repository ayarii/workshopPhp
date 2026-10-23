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
<?php echo ($p['tel']);
?>
</li>
<?php } ?>
</ul>
</body>
</html>