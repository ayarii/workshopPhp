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
public function setNom($nom) { $this->nom = $nom; }

public function getPrenom() { return $this->prenom; }
public function setPrenom($prenom) { $this->prenom = $prenom; }

public function getEmail() { return $this->email; }
public function setEmail($email) { $this->email = $email; }

public function getTel() { return $this->tel; }
public function setTel($tel) { $this->tel = $tel; }
}
?>