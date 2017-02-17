<form action="./index.php" method="POST">


  <label>Produit</label>
  <select name="produit" value="">
    <option> </option>
    <?php foreach ($listProduit as $produit ) { ?>
    <option name="produit_id" value=<?php echo $produit->getId()?>>
      <?php
        echo $produit->getLibelle();
      ?>
    </option>
    
    <?php } ?>
      </select>

<label>Quantité</label>
<input type="text" name="quantite">
<br>


    <br>
  <label><?php if(isset($message)) echo $message ?></label>
  <input type="submit" value="Ajouter au panier"/>
  <input type="hidden" name="action" value="addPanier"/>
</form>
