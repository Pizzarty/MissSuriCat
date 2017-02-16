<form action="./index.php" method="POST">

  <label>Produit</label>
  <select name="produit" value="">
    <?php foreach ($listProduit as $produit ) { ?>
    <option value=<?php echo $produit->getId()?>>
      <?php
        echo $produit->getLibelle();
      ?>
    </option>
    <?php } ?>
  </select>
<label>Quantité</label>
<input type="number" name="quantité" value="1">
  <input type="submit" value="Ajouter au panier"/>
  <br>
  <label><?php echo $message ?></label>
  <input type="hidden" name="action" value="insertPanier"/>
</form>
