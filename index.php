<?php
//Contrôleur principal de notre application
session_start();
include_once('library/PDOFactory.php');
include_once('models/entities/Personne.php');
include_once('models/entities/Client.php');
include_once('models/entities/User.php');
include_once('models/entities/Statut.php');
include_once('models/entities/Commande.php');
include_once('models/entities/CommandeProduit.php');
include_once('models/entities/Produit.php');
include_once('models/repositories/ClientRepository.php');
include_once('models/repositories/UserRepository.php');
include_once('models/repositories/CommandeRepository.php');
include_once('models/repositories/ProduitRepository.php');


//On récupère un objet PDO une fois pour toutes pour dialoguer avec la bdd
$pdo = PDOFactory::getMysqlConnection();

//Récupère le paramètre action dans l'url (ex: "localhost/index.php?action=add") envoyer par l'utilisateur


//$_REQUEST c'est comme $_POST + $_GET
if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
} else {
	$action = null;
}


switch ($action) {

	case "verifLogin":
		$userRepo = new UserRepository();
		$user = $userRepo->getUser($pdo, $_POST['login'], $_POST['pwd']);

		if($user) {
			$_SESSION['login'] = $user->getLogin();
			$_SESSION['nom'] = $user->getNom();
			$_SESSION['prenom'] = $user->getPrenom();
			$_SESSION['grade'] = $user->getGrade();
			//On prépare la vue à afficher avec les données dont elle a besoin
			if($_SESSION['grade'] == 1) {
				$clientRepo = new ClientRepository();
				$listeClients = $clientRepo->getAll($pdo);
				$vueAAfficher = "views/listClient.php";
			} elseif($_SESSION['grade'] == 2) {
				$commandeRepo = new CommandeRepository();
				$listCommande = $commandeRepo->getAll($pdo);
				$vueAAfficher = "views/listCommande.php";
			}
		} else {
				$message = "Identifiants invalides !";
				$vueAAfficher = "views/login.php";
			}
		break;

	case "disconnect":
		$_SESSION = array();
		session_destroy();
		$vueAAfficher = "views/login.php";
		break;

	case "listCommande":
		$commandeRepo = new CommandeRepository();
		$listCommande = $commandeRepo->getAll($pdo);
		$vueAAfficher = "views/listCommande.php";

		break;

	case "listProduit":
		$produitRepo = new ProduitRepository();
		$listProduit = $produitRepo->getAll($pdo);
		$vueAAfficher = "views/listProduit.php";

		break;


	case "formEditProduit":
		$produitRepo = new ProduitRepository();
		$produit = $produitRepo->getOneById($pdo, $_GET['id']);
		$vueAAfficher = "views/formEditProduit.php";

		break;

	case "updateProduit":
			//Instancier un objet du modèle qui va s'occuper de sauvegarder votre client
			$produit = new Produit();
			$produit->setId($_POST["id"]);
			$produit->setReference($_POST["ref"]);
			$produit->setLibelle($_POST["libelle"]);
			$produit->setDescription($_POST["descr"]);
			$produit->setPrixUnitaire($_POST["prix"]);
			$produit->setQuantite($_POST["quantite"]);

			//On sauveagrde et on prépare la vue à afficher ensuite
			$message = $produit->save($pdo);
			$vueAAfficher = "views/formEditProduit.php";
			break;


	case "listClient":
		//On prépare la vue a afficher avec les données dont elle a besoin
		$clientRepo = new ClientRepository();
		$listeClients = $clientRepo->getAll($pdo);
		$vueAAfficher = "views/listClient.php";
		break;

	//Affiche le formulaire d'ajout d'un client
	case "formAddClient":
		//On prépare la vue à afficher
		$vueAAfficher = "views/formAddClient.php";
		break;

	//crée un nouveau client dans la base de données
	case "insertClient":
		//INstancier un objet du modèle qui va s'occuper sauvegarder votre client
		$client = new Client();
		$client->setCivilite($_POST["civ"]);
		$client->setNom($_POST["nom"]);
		$client->setPrenom($_POST["prenom"]);
		$client->setDateNaissance($_POST["date_naissance"]);
		$client->setAdresse($_POST["adresse"]);
		$client->setCp($_POST["code_postal"]);
		$client->setVille($_POST["ville"]);
		$client->setBic($_POST["bic"]);
		$client->setIban($_POST["iban"]);

		//On prépare la vue à afficher ensuite
		$message = $client->save($pdo);
		$vueAAfficher = "views/formAddClient.php";
		break;

	//Affiche le formulaire d'édition d'un client
	case "formEditClient":
		//On prépare la vue a afficher avec les données dont elle a besoin
		$clientRepo = new ClientRepository();
		$client = $clientRepo->getOneById($pdo, $_GET['id']);
		$vueAAfficher = "views/formEditClient.php";
		break;

	//Met à jour les données d'un client dans la bdd
	case "updateClient":
		//Instancier un objet du modèle qui va s'occuper de sauvegarder votre client
		$client = new Client();
		$client->setId($_POST["id"]);
		$client->setCivilite($_POST["civ"]);
		$client->setNom($_POST["nom"]);
		$client->setPrenom($_POST["prenom"]);
		$client->setDateNaissance($_POST["date_naissance"]);
		$client->setAdresse($_POST["adresse"]);
		$client->setCp($_POST["code_postal"]);
		$client->setVille($_POST["ville"]);
		$client->setBic($_POST["bic"]);
		$client->setIban($_POST["iban"]);

		//On sauveagrde et on prépare la vue à afficher ensuite
		$message = $client->save($pdo);
		$vueAAfficher = "views/formEditClient.php";
		break;

	//Supprime un client dans la bdd
	case "deleteClient":
		//Instancier l'objet modèle client à partir duquel on va supprimer son enregistrement dans la bdd
		$client = new Client();
		$client->setId($_GET['id']);

		//On supprime et on prépare la vue à afficher avec les données dont elle a besoin
		$message = $client->delete($pdo);
		$clientRepo = new ClientRepository();
		$listeClients = $clientRepo->getAll($pdo);
		$vueAAfficher = "views/listClient.php";
		break;

	case "deleteProduit":
		//Instancier l'objet modèle client à partir duquel on va supprimer son enregistrement dans la bdd
		$produit = new Produit();
		$produit->setId($_GET['id']);

		//On supprime et on prépare la vue à afficher avec les données dont elle a besoin
		$message = $produit->delete($pdo);
		$produitRepo = new ProduitRepository();
		$listProduit = $produitRepo->getAll($pdo);
		$vueAAfficher = "views/listProduit.php";
		break;

	case "passerCommande":

		$produitRepo = new ProduitRepository();
		$listProduit = $produitRepo->getAll($pdo);
		$vueAAfficher = "views/passerCommande.php";
		break;


	//Jeu d'instructions appelé lorsque aucune action n'est renseignée dans l'url
	default:
		if(empty($_SESSION['login'])) {
			$vueAAfficher = "views/login.php";
		} else {
			//On prépare la vue a afficher avec les données dont elle a besoin
			$clientRepo = new ClientRepository();
			$listeClients = $clientRepo->getAll($pdo);
			$vueAAfficher = "views/listClient.php";
			break;
		}
}

include_once("layouts/layout.php");
