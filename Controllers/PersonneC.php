Parse error: syntax error, unexpected token ";", expecting "function" or "const" in C:\xampp2A\htdocs\crudPersonne\Controllers\PersonneC.php on line 15<?php
require_once '../config.php';

class PersonneC
{
public function listePersonne(){
$db = config::getConnexion();
try {
$liste = $db->query('SELECT * FROM personne');
return $liste;
} catch (Exception $e) {
die('Error: ' . $e->getMessage());
}
}
}
?>