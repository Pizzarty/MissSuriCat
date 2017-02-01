<?php


class ProduitRepository
{
	public function getAll($pdo){

	if($_SESSION['grade'] == 1){
		$req = $pdo->query("SELECT id, description, libelle, prix_unitaire, quantite_stock, ref FROM produit");
	} elseif($_SESSION['grade'] == 2){
		$req = $pdo->query("SELECT id, description, libelle, prix_unitaire, quantite_stock, ref FROM produit WHERE quantite_stock > 0");
	}

      $req->setFetchMode(PDO::FETCH_OBJ);


      $listProduit = array();

      while ($obj = $req->fetch()){

        $produit = new Produit();
        $produit->setId($obj->id);
        $produit->setReference($obj->ref);
        $produit->setLibelle($obj->libelle);
        $produit->setDescription($obj->description);
        $produit->setPrixUnitaire($obj->prix_unitaire);
        $produit->setQuantite($obj->quantite_stock);


        $listProduit[] = $produit;


      }

        return $listProduit;

    }
  }
