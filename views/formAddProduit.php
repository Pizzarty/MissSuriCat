<form action="./index.php" method="POST">

  <label>Reference</label>
  <input type="text" name="ref" />
  <br>
  <label>Libelle</label>
  <input type="text" name="libelle" />
  <br>
  <label>Description</label>
  <input type="text" name="descr" />
  <br>
  <label>Prix Unitaire</label>
  <input type="text" name="prix" />
  <br>
  <label>Quantite Stock</label>
  <input type="text" name="quantite" />
  
  <input type="submit" value="Ajouter le produit"/>
  <br>
  <label><?php echo $message ?></label>
  <input type="hidden" name="action" value="insertProduit"/>

</form>