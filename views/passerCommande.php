<form action="./index.php" method="POST">

<?php foreach ($listProduit as $produit ) { ?>
  <label>Produit</label>
  <select name="produit" value="">
    <option> </option>
    <?php foreach ($listProduit as $produit ) { ?>
    <option value=<?php echo $produit->getId()?>>
      <?php
        echo $produit->getLibelle();
      ?>
    </option>
    <br>
    <?php } ?>
  </select>
<label>Quantité</label>
<input type="text" name="quantite">
<br>
    <?php } ?>
    <br>
  <label><?php echo $message ?></label>
  <input type="submit" value="Ajouter au panier"/>
  <input type="hidden" name="action" value="insertPanier"/>
</form>
