<form action="./index.php" method="POST">

	<label>Référence</label>
	<input type="text" name="ref" value="<?php echo $client->getReference() ?>"/>
	<br>
	<label>Libellé</label>
	<input type="text" name="libelle" value="<?php echo $client->getLibelle() ?>"/>
	<br>
	<label>Description</label>
	<input type="text" name="desc" value="<?php echo $client->getDescription() ?>"/>
	<br>
	<label>Prix unitaire</label>
	<input type="text" name="prix" value="<?php echo $client->getPrixUnitaire() ?>"/>
	<br>
	<label>Quantité en stock</label>
	<input type="text" name="quantite" value="<?php echo $client->getQuantite() ?>"/>


	<input type="submit" value="Mettre à jour"/>
	<br>
	<label><?php if(isset($message)) echo $message ?></label>
	<input type="hidden" name="id" value="<?php echo $client->getId() ?>"/>
	<input type="hidden" name="action" value="updateClient"/>
</form>
