<?php if($_SESSION['grade'] == 1){ ?>
  <a href="./index.php?action=formAddCommande">Ajouter</a>
<?php } ?>
<table>
  <thead>
    <th>Id</th>
    <th>Référence</th>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Produit</th>
    <th>Quantite</th>
    <th>Date Commande</th>
    <th>Date Expédition</th>
    <th>Statut</th>
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
        echo '</tr>';
      }
    ?>
  </tbody>
</table>
