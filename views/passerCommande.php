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
</form>
