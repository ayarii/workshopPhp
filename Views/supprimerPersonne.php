<?php
require_once __DIR__ . '/../Controllers/PersonneC.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Méthode non autorisée.');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) {
    http_response_code(400);
    exit('Identifiant de personne invalide.');
}

$personneC = new PersonneC();
$personneC->supprimerPersonne($id);

header('Location: ListPersonne.php', true, 303);
exit;
?>
