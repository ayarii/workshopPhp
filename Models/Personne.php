<?php
class Personne
{
private $id;
private $nom;
private $prenom;
private $email;
private $tel;

public function __construct($nom, $prenom, $email, $tel)
{
$this->nom = $nom;
$this->prenom = $prenom;
$this->email = $email;
$this->tel = $tel;
}
public function getNom() { return $this->nom; }
public function getPrenom() { return $this->prenom; }
public function getEmail() { return $this->email; }
public function getTel() { return $this->tel; }
}
?>