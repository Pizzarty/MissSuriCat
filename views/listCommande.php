<a href="./index.php?action=formAddCommande">Ajouter</a>
<table>
  <thead>
    <th>Id</th>
    <th>Référence</th>
    <th>Nom Client</th>
    <th>Prénom Client</th>
    <th>Date Commande</th>
    <th>Date Expédition</th>
    <th>Statut Commande</th>
  </thead>
  <tbody>
    <?php
      foreach ($listCommande as $commande) {
        echo '<tr>';
          echo '<td>' . $commande->getId() . '</td>';
          echo '<td>' . $commande->getReference() . '</td>';
          echo '<td>' . $commande->getNom() . '</td>';
          echo '<td>' . $commande->getPrenom() . '</td>';
          echo '<td>' . $commande->getDateCommande() . '</td>';
          echo '<td>' . $commande->getDateExpedition() . '</td>';
          echo '<td>' . $commande->getStatut() . '</td>';
          echo '<td><a href="./index.php?action=formEditCommande&id=' . $commande->getId() . '"">Editer</a></td>';
          echo '<td><a href="./index.php?action=deleteCommande&id=' . $commande->getId() . '">Supprimer</a></td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>