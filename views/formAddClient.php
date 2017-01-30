<form action="./index.php" method="POST">

  <label>Civilite</label>
  <input type="text" name="civ" />
  <br>
  <label>Prénom</label>
  <input type="text" name="prenom" />
  <br>
  <label>Nom</label>
  <input type="text" name="nom" />
  <br>
  <label>Date de naissance</label>
  <input type="text" name="date_naissance" />
  <br>
  <label>Adresse</label>
  <input type="text" name="adresse" />
  <br>
  <label>Code Postal</label>
  <input type="text" name="cp" />
  <br>
  <label>Ville</label>
  <input type="text" name="ville" />
  <br>
  <label>Code IBAN</label>
  <input type="text" name="iban" />
  <br>
  <label>Code BIC</label>
  <input type="text" name="bic" />
  <br>

  <input type="submit" value="Ajouter"/>
  <br>
  <label><?php echo $mesage ?></label>
  <input type="hidden" name="action" value="insertClient"/>


</form>
