<a href="./index.php?action=formAddClient">Ajouter</a>
<table>
  <thead>
    <th>Id</th>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Adresse</th>
    <th>Code Postal</th>
    <th>Ville</th>
    <th>Bic</th>
    <th>Iban</th>
  </thead>
  <tbody>
    <?php
      foreach ($listeClients as $client) {
        echo '<tr>';
          echo '<td>' . $client->getId() . '</td>';
          echo '<td>' . $client->getCiv() . '</td>';
          echo '<td>' . $client->getNom() . '</td>';
          echo '<td>' . $client->getPrenom() . '</td>';
          echo '<td>' . $client->getDateNaissance() . '</td>';
          echo '<td>' . $client->getAdresse() . '</td>';
          echo '<td>' . $client->getCp() . '</td>';
          echo '<td>' . $client->getVille() . '</td>';
          echo '<td>' . $client->getBic() . '</td>';
          echo '<td>' . $client->getIban() . '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>
