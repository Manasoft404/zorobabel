<?php
require_once 'config.php'; // Database setting constants [DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD]
class dbHelper {
    private $db;
    private $err;
    function __construct() {
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
        try {
            $this->db = new PDO($dsn, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            $response["status"] = "error";
            $response["message"] = 'Connection failed: ' . $e->getMessage();
            $response["data"] = null;
            //echoResponse(200, $response);
            exit;
        }
    }
    function select($table, $columns, $where){
        try{
            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }
            $stmt = $this->db->prepare("select ".$columns." from ".$table." where 1=1 ". $w);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)<=0){
                $response["status"] = "warning";
                $response["message"] = "No data found.";
            }else{
                $response["status"] = "success";
                $response["message"] = "Data selected from database";
            }
                $response["data"] = $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }
    function select2($table, $columns, $where, $order){
        try{
            $a = array();
            $w = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " like :".$key;
                $a[":".$key] = $value;
            }
            $stmt = $this->db->prepare("select ".$columns." from ".$table." where 1=1 ". $w." ".$order);
            $stmt->execute($a);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($rows)<=0){
                $response["status"] = "warning";
                $response["message"] = "No data found.";
            }else{
                $response["status"] = "success";
                $response["message"] = "Data selected from database";
            }
                $response["data"] = $rows;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Select Failed: ' .$e->getMessage();
            $response["data"] = null;
        }
        return $response;
    }
    function insert($table, $columnsArray, $requiredColumnsArray) {
        $this->verifyRequiredParams($columnsArray, $requiredColumnsArray);
        
        try{
            $a = array();
            $c = "";
            $v = "";
            foreach ($columnsArray as $key => $value) {
                $c .= $key. ", ";
                $v .= ":".$key. ", ";
                $a[":".$key] = $value;
            }
            $c = rtrim($c,', ');
            $v = rtrim($v,', ');
            $stmt =  $this->db->prepare("INSERT INTO $table($c) VALUES($v)");
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            $lastInsertId = $this->db->lastInsertId();
            $response["status"] = "success";
            $response["message"] = $affected_rows." row inserted into database";
            $response["data"] = $lastInsertId;
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = 'Insert Failed: ' .$e->getMessage();
            $response["data"] = 0;
        }
        return $response;
    }
    function update($table, $columnsArray, $where, $requiredColumnsArray){ 
        $this->verifyRequiredParams($columnsArray, $requiredColumnsArray);
        try{
            $a = array();
            $w = "";
            $c = "";
            foreach ($where as $key => $value) {
                $w .= " and " .$key. " = :".$key;
                $a[":".$key] = $value;
            }
            foreach ($columnsArray as $key => $value) {
                $c .= $key. " = :".$key.", ";
                $a[":".$key] = $value;
            }
                $c = rtrim($c,", ");

            $stmt =  $this->db->prepare("UPDATE $table SET $c WHERE 1=1 ".$w);
            $stmt->execute($a);
            $affected_rows = $stmt->rowCount();
            if($affected_rows<=0){
                $response["status"] = "warning";
                $response["message"] = "No row updated";
            }else{
                $response["status"] = "success";
                $response["message"] = $affected_rows." row(s) updated in database";
            }
        }catch(PDOException $e){
            $response["status"] = "error";
            $response["message"] = "Update Failed: " .$e->getMessage();
        }
        return $response;
    }
    function delete($table, $where){
        if(count($where)<=0){
            $response["status"] = "warning";
            $response["message"] = "Delete Failed: At least one condition is required";
        }else{
            try{
                $a = array();
                $w = "";
                foreach ($where as $key => $value) {
                    $w .= " and " .$key. " = :".$key;
                    $a[":".$key] = $value;
                }
                $stmt =  $this->db->prepare("DELETE FROM $table WHERE 1=1 ".$w);
                $stmt->execute($a);
                $affected_rows = $stmt->rowCount();
                if($affected_rows<=0){
                    $response["status"] = "warning";
                    $response["message"] = "No row deleted";
                }else{
                    $response["status"] = "success";
                    $response["message"] = $affected_rows." row(s) deleted from database";
                }
            }catch(PDOException $e){
                $response["status"] = "error";
                $response["message"] = 'Delete Failed: ' .$e->getMessage();
            }
        }
        return $response;
    }
    /*function selectP($name){
        // Select statement
        try{
            // $a = array();
            // $w = "";
            // // $where = array('name' => 'Ipsita Sahoo', 'uid'=>'170' );
            // foreach ($where as $key => $value) {
            //     $w .= " and " .$key. " like :".$key;
            //     $a[":".$key] = $value;
            // }
            // $stmt = $this->db->prepare("CALL `simpleproc`(@a);SELECT @a AS `param1`;");
            // $stmt->execute($a);
            // return $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = $this->db->prepare("CALL $name(@resultId)"); 
            $stmt->execute(); 
            $stmt = $this->db->prepare("select @resultId as Id"); 
            $stmt->execute(); 
            $myResultId = $stmt->fetchColumn();

            print "procedure returned \n".$myResultId;
            
        }catch(PDOException $e){
            print_r('Query Failed: ' .$e->getMessage());
            return $rows=null;
            exit;
        }
    }*/
    function verifyRequiredParams($inArray, $requiredColumns) {
        $error = false;
        $errorColumns = "";
        foreach ($requiredColumns as $field) {
        // strlen($inArray->$field);
            if (!isset($inArray->$field) || strlen(trim($inArray->$field)) <= 0) {
                $error = true;
                $errorColumns .= $field . ', ';
            }
        }

        if ($error) {
            $response = array();
            $response["status"] = "error";
            $response["message"] = 'Required field(s) ' . rtrim($errorColumns, ', ') . ' is missing or empty';
            echoResponse(200, $response);
            exit;
        }
    }
    /* ------------- méthodes de la table `clients Zorobabele` ------------------ */

    /**
     * Vérification de connexion du client
     * @param String $login
     * @param String $password
     * @return boolean Le statut de connexion utilisateur réussite / échec
     */
    public function checkLoginClient($login, $password) {
        try{
            // Obtention d'un client par login
            $stmt = $this->db->prepare("SELECT password FROM tb_client WHERE login = :in_login");
            $stmt->execute(array('in_login'=>$login));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $num_rows = count($rows);
            if ($num_rows > 0) {
                // client trouvé avec login
                // Maintenant, vérifier le mot de passe
                if ($rows[0]['password']== $password) {
                    // Mot de passe client est correcte
                    return TRUE;
                } else {
                    // mot de passe client est incorrect
                    return FALSE;
                }
            } else {

                // client n'existe pas avec login
                return FALSE;
            }

        }catch(PDOException $e){
            $response["error"] = "true";
            $response["message"] = 'Insert Failed: ' .$e->getMessage();
            $response["data"] = null;
            return FALSE;
        }

    }

    /**
     *Obtention de client par login
     * @param String $email
     */
    public function getClientByLogin($login) {
        try{
            $stmt = $this->db->prepare("SELECT idclient, nom_complet, email, phone, adresse, login, password FROM tb_client WHERE login = :in_login");
            $stmt->execute(array('in_login'=>$login));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows)>0) {
                $client= array();
                $client["idclient"] = $rows[0]['idclient'];
                $client["nom_complet"] = $rows[0]['nom_complet'];
                $client["email"] = $rows[0]['email'];
                $client["phone"] = $rows[0]['phone'];
                $client["adresse"] =$rows[0]['adresse'];
                $client["login"] =$rows[0]['login'];
                $client["password"] =$rows[0]['password'];
                return $client;
            } else {
                return NULL;
            }

        }catch(PDOException $e){
            $response["error"] = "true";
            $response["message"] = 'select Failed: ' .$e->getMessage();
            return null;
        }

    }



}

?>
