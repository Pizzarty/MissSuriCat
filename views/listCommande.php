<a href="./index.php?action=formAddCommande">Ajouter</a>
<table>
  <thead>
    <th>Id</th>
    <th>Référence</th>
    <th>Civilité</th>
    <th>Nom Client</th>
    <th>Prénom Client</th>
    <th>Produit</th>
    <th>Quantite</th>
    <th>Date Commande</th>
    <th>Date Expédition</th>
    <th>Statut Commande</th>
    <th>Editer</th>
    <th>Supprimer</th>
  </thead>
  <tbody>
    <?php
      foreach ($listCommande as $commande) {
        echo '<tr>';
          echo '<td>' . $commande->getId() . '</td>';
          echo '<td>' . $commande->getReference() . '</td>';
          echo '<td>' . $commande->getClient()->getCivilite() . '</td>';
          echo '<td>' . $commande->getClient()->getNom() . '</td>';
          echo '<td>' . $commande->getClient()->getPrenom() . '</td>';
          echo '<td>' . $commande->getProduit()->getLibelle() . '</td>';
          echo '<td>' . $commande->getCommandeProduit()->getQuantite() . '</td>';
          echo '<td>' . $commande->getDateCommande() . '</td>';
          echo '<td>' . $commande->getDateExpedition() . '</td>';
          echo '<td>' . $commande->getStatut()->getLibelle() . '</td>';
          echo '<td><a href="./index.php?action=formEditCommande&id=' . $commande->getId() . '"">Editer</a></td>';
          echo '<td><a href="./index.php?action=deleteCommande&id=' . $commande->getId() . '">Supprimer</a></td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>
