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


  public function getOneById($pdo, $id) {

    //Effectuer la requête en bdd pour récupérer le client correspondant à l'id renseigné
    $resultat = $pdo->query('SELECT id, ref, libelle, description, prix_unitaire, quantite_stock FROM produit WHERE id = ' . $id);

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();
    
    //Ensuite :
    // 1 -  instancier un objet client
    // 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
    // 3 -  retourner ensuite cet objet

    $produit = new Produit();
    $produit->setId($obj->id);
    $produit->setReference($obj->ref);
    $produit->setLibelle($obj->libelle);
    $produit->setDescription($obj->description);
    $produit->setPrixUnitaire($obj->prix_unitaire);
    $produit->setQuantite($obj->quantite_stock);

    return $produit;
  }
  }
