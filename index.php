<?php

include_once('library/PDOFactory.php');
include_once('models/entities/Personne.php');
include_once('models/entities/Client.php');
include_once('models/repositories/ClientRepository.php');

//On récupère un objet PDO une fois pour toutes pour dialoguer avec la Bdd
$pdo = PDOFactory::getMysqlConnection();

//Récupère le paramètre acion dans l'url (ex: "localhost/index.php?action=add") envoyer par l'utilsateur

//$_REQUEST c'est comme $_POST + $_GET
if (isset($_REQUEST['action'])) {
  $action = $_REQUEST['action'];
} else {
  $action = null;
}


switch ($action) {

    //Afficher le formulaire d'ajout d'un client
    case "formAddClient";
      $vueAAfficher = "views/formAddClient.php";
      break;

    case "insertClient";
      //Appeler le modèle qui va s'occuper de votre client
      $client = new Client();
      $client->setCiv($_POST["civ"]);
      $client->setPrenom($_POST["prenom"]);
      $client->setNom($_POST["nom"]);
      $client->setDateNaissance($_POST["date_naissance"]);
      $client->setAdresse($_POST["adresse"]);
      $client->setCp($_POST["cp"]);
      $client->setVille($_POST["ville"]);
      $client->setIban($_POST["iban"]);
      $client->setBic($_POST["bic"]);

      $client->save($pdo);
      $vueAAfficher = "views/formAddClient.php";
      break;

    default;
      $clientRepo = new ClientRepository();
      $listeClients = $clientRepo->getAll($pdo);
      $vueAAfficher = "views/listClient.php";

}

include("layouts/layout.php");
