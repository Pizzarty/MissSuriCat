<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Blog Miss SuriCat</title>
  </head>
  <body>
    <?php if (!empty($_SESSION['login'])) {?>
      <!-- Bloc Menu -->
      <?php if($_SESSION['grade'] == 1){ ?>
        <a href="./index.php?action=listClient">Clients</a>
        <a href="./index.php?action=listCommande">Commandes</a>
        <?php } ?>
      <a href="./index.php?action=passerCommande">Passer une commande</a>
      <a href="./index.php?action=listProduit">Produits</a>
      <label>Bienvenue en enfer <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></label>
      <a href="./index.php?action=disconnect">Déconnexion</a>
    <?php } ?>
    <!-- Bloc Contenu -->
    <div id="contenu">
      <!-- Affiche une vue en fonction de l'action que l'utilisateur souhaite réaliser -->
      <?php include($vueAAfficher); ?>
    </div>
  </body>
</html>
