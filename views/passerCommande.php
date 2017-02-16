<form action="./index.php" method="POST">

  <label>Produit</label>
  <select name="produit" value="">
    <?php foreach ($listProduit as $produit ) { ?>
    <option>
      <?php
        echo $produit->getLibelle();
      ?>
    </option>
    <?php } ?>
  </select>
</form>
