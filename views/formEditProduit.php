<form action="./index.php" method="POST">

	<label>Référence</label>
	<input type="text" name="ref" value="<?php echo $produit->getReference() ?>"/>
	<br>
	<label>Libellé</label>
	<input type="text" name="libelle" value="<?php echo $produit->getLibelle() ?>"/>
	<br>
	<label>Description</label>
	<input type="text" name="descr" value="<?php echo $produit->getDescription() ?>"/>
	<br>
	<label>Prix unitaire</label>
	<input type="text" name="prix" value="<?php echo $produit->getPrixUnitaire() ?>"/>
	<br>
	<label>Quantité en stock</label>
	<input type="text" name="quantite" value="<?php echo $produit->getQuantite() ?>"/>


	<input type="submit" value="Mettre à jour"/>
	<br>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="id" value="<?php echo $produit->getId() ?>"/>
	<input type="hidden" name="action" value="updateProduit"/>
</form>
