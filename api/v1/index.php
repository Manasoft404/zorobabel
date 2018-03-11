<?php
require '.././libs/Slim/Slim.php';
require_once 'dbHelper.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();//initialisation de l'application
$app = \Slim\Slim::getInstance();
$db = new dbHelper();

/**
 * Database Helper Function templates
 */
/*
select(table name, where clause as associative array)
insert(table name, data as associative array, mandatory column names as array)
update(table name, column names as associative array, where clause as associative array, required columns as array)
delete(table name, where clause as array)
*/

// Products
//route accessible via URL 'http:nom_de_domaine/products'
$app->get('/products', function() {
    global $db;
    $rows = $db->select("tb_produit"," idProduit,nom, prix, poids, description, garniture, typeproduit, image, stock,statut, idBoulangerie",array());
    echoResponse(200, $rows);//renvoie  les donnees
});

$app->get('/products/:idBoulangerie', function($idBoulangerie) {
    global $db;
    $rows = $db->select("tb_produit"," idProduit,nom, prix, poids, description, garniture, typeproduit, image, stock, statut,idBoulangerie",array('idBoulangerie'=>$idBoulangerie));
    echoResponse(200, $rows);//renvoie  les donnees
});

$app->post('/products', function() use ($app) { 
    $data = json_decode($app->request->getBody());
    $mandatory = array('nom');
    global $db;
    $rows = $db->insert("tb_produit", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Product added successfully.";
    echoResponse(200, $rows);
});

$app->put('/products/:id', function($id) use ($app) { 
    $data = json_decode($app->request->getBody());
    $condition = array('id'=>$id);
    $mandatory = array();
    global $db;
    $rows = $db->update("tb_produit", $data, $condition, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Product information updated successfully.";
    echoResponse(200, $rows);
});
$app->delete('/products/:id', function($id) { 
    global $db;
    $rows = $db->delete("tb_produit", array('id'=>$id));
    if($rows["status"]=="success")
        $rows["message"] = "Product removed successfully.";
    echoResponse(200, $rows);
});

// boulangerie
//route accessible via URL 'http:nom_de_domaine/products'
$app->get('/boulangeries', function() {
    global $db;
    $rows = $db->select("tb_boulangerie"," idBoulangerie,nomBoulangerie, communeBoulangerie, adresseBoulangerie, idchefBoulangerie",array());
    echoResponse(200, $rows);//renvoie  les donnees
});

// chefs_boulangeri
//route accessible via URL 'http:nom_de_domaine/products'
$app->get('/chefs', function() {
    global $db;
    $rows = $db->select("tb_chef_boulangerie"," idChef,nomComplet, email, phone, addresse, username, password",array());
    echoResponse(200, $rows);//renvoie  les donnees
});

// clients
$app->get('/clients', function() {
    global $db;
    $rows = $db->select("tb_client"," idclient,nom_complet, email, phone, adresse, login, password",array());
    echoResponse(200, $rows);//renvoie  les donnees
});

// commandes
$app->get('/commandes', function() {
    global $db;
    $rows = $db->select("tb_commande"," idCommande,idClient, total_cmd, adresse_livraison, latitude, longitude, etat_commande, date_commande",array());
    echoResponse(200, $rows);//renvoie  les donnees
});

//gestion client
$app->post('/loginclient', function() use ($app) {
    global $db;
    $login = null; $password = null;
    $data= json_decode($app->request->getBody());
    $param = array();
    foreach ($data as $key => $value) {
        $param[$key] = $value;
    }
     // lecture des params de post
     $login = $param['login'];
     $password =$param['password'];
    $response = array();
    // vérifier le login et le mot de passe sont corrects
    if ($db-> checkLoginClient($login, $password)) {
        // obtenir un client par email
        $client = $db->getClientByLogin($login);
        if ($client != NULL) {
                $response["error"] = false;
                $response["idclient"] =$client['idclient'];
                $response["nom_complet"] = $client['nom_complet'];
                $response["email"] = $client['email'];
                $response["phone"] = $client['phone'];
                $response["adresse"] =$client['adresse'];
                $response["login"] =$client['login'];
                $response["password"] =$client['password'];
        } else {
            // erreur inconnue est survenue
            $response['error'] = true;
            $response['message'] = "Une erreur est survenue. S'il vous plaît essayer à nouveau";
        }
    } else {
        // identificateurs de l'utilisateur sont erronés
        $response['error'] = true;
        $response['message'] = 'Échec de la connexion. identificateurs incorrectes';
    }

    echoResponse(200, $response);
});

//register client
$app->post('/clients', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('nom_complet');
    global $db;
    $rows = $db->insert("tb_client", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Product added successfully.";
    echoResponse(200, $rows);
});

//register des commandes
$app->post('/commandes', function() use ($app) {
    $data = json_decode($app->request->getBody());
    $mandatory = array('idClient');
    global $db;
    $rows = $db->insert("tb_commande", $data, $mandatory);
    if($rows["status"]=="success")
        $rows["message"] = "Commande added successfully.";
    echoResponse(200, $rows);

});

$app->run();//lance l'application


?>