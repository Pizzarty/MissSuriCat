<a href="./index.php?action=formAddCommande">Ajouter</a>
<table>
  <thead>
    <th>Id</th>
    <th>Référence</th>
    <th>Libellé</th>
    <th>Description</th>   
    <th>Prix Unitaire</th>
    <th>Quantité en stock</th>
    <th>Editer</th>
    <th>Supprimer</th>
  </thead>
  <tbody>
    <?php
      foreach ($listProduit as $produit) {
        echo '<tr>';
          echo '<td>' . $produit->getId() . '</td>';
          echo '<td>' . $produit->getReference() . '</td>';
          echo '<td>' . $produit->getLibelle() . '</td>';
          echo '<td>' . $produit->getDescription() . '</td>';
          echo '<td>' . $produit->getPrixUnitaire() . ' €</td>';
          echo '<td>' . $produit->getQuantite() . '</td>';
          echo '<td><a href="./index.php?action=formEditCommande&id=' . $produit->getId() . '"">Editer</a></td>';
          echo '<td><a href="./index.php?action=deleteCommande&id=' . $produit->getId() . '">Supprimer</a></td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>