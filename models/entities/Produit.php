<?php
class Produit
{

	private $id;
	private $reference;
	private $libelle;
	private $description;
	private $prixUnitaire;
	private $quantite;

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getReference() {
		return $this->reference;
	}

	public function setReference($reference) {
		$this->reference = $reference;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelle;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getPrixUnitaire() {
		return $this->prixUnitaire;
	}

	public function setPrixUnitaire($prixUnitaire) {
		$this->prixUnitaire = $prixUnitaire;
	}
	public function getQuantite() {
		return $this->quantite;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}




}