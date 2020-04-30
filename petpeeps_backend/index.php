<?php

require("./controller/controller.php");
try {
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    $uid = isset($_REQUEST['uid']) ? $_REQUEST['uid'] : '';
    

    
    if (isset($_REQUEST['action'])) {
        if ($action === 'getUserInfo') {
            getUserInfo($uid); 
        } else if ($action === 'updateAccountType') {
            $accountType = isset($_REQUEST['accType']) ? $_REQUEST['accType'] : '';
            updateAccountType($accountType,$uid);
        } else if ($action === 'createUser') {
            $login = isset($_REQUEST['login']) ? $_REQUEST['login'] : '';
            $email= isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
            createUser($login,$email,$uid);
        } else if ($action === 'removeAccount') {
            removeAccount($uid);
        } else if ($action === 'getPets') {
            $owner_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
            getPets($owner_id);
        } else if ($action === 'createPet') {
            $owner_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
            $breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : '';
            $size = isset($_REQUEST['size']) ? $_REQUEST['size'] : '';
            createPet($owner_id,$name,$breed,$size);
        }
        else if ($action === 'editPet') {
            $pet_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
            $breed = isset($_REQUEST['breed']) ? $_REQUEST['breed'] : '';
            $size = isset($_REQUEST['size']) ? $_REQUEST['size'] : '';
            editPet($name,$breed,$size,$pet_id);
        }
    } 
}
    catch(PDOException $e) {
        $PDOArray = [];
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        array_push($PDOArray, $msg, $code, $line, $file);
        print_r($PDOArray);
    }
    catch(Exception $e) {
        $ExceptionArray = [];
        $msg = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        $file = $e->getFile();
        array_push($ExceptionArray, $msg, $code, $line, $file);
        print_r($ExceptionArray);
    }