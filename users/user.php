<?php

namespace users;
require_once('..\classes\Database.php');

use classes\Database;

Database::connect();

//Запрос с бд пользователя по id

//public function requestIdUser($idUser)
//{
//  $userIdRequest= Database::query("SELECT `id_user`, `email`, `phonenumber`, `full_name` FROM user WHERE `id_user`='$idUser'");
//  $user = Database::fetch($userIdRequest);
//  if (!isset($user)) {
//      echo "User with this id not found. Try again.";
//  }
//    return $user;

//Запрос с бд пользователя по id
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["idUser"])) {
        $idUser = $_GET["idUser"];
        $userRequest = Database::query("SELECT `id_user`, `email`, `phonenumber`, `full_name` FROM user WHERE `id_user`='$idUser'");
        $user = Database::fetch($userRequest);
        print_r($user);
    }
    if (empty($user)) {
        echo "User with this id not found. Try again.";
    }
    json_encode($user);

// Запрос всех пользователей с бд
    } else {
    $selectAllUsers = Database::query("SELECT `id_user`, `email`, `phonenumber`, `full_name` FROM user");
    $users = [];
    while ($users[] = Database::fetch($selectAllUsers)) {
    }
    echo json_encode($users);


////Запись в бд нового пользователя
} else if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    $error = null;
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['password'])) {
        Database::query("INSERT INTO user (`email`, `phonenumber`, `full_name`, `password`) VALUES ('{$_POST['email']}','{$_POST['phonenumber']}', '{$_POST['name']}','{$_POST['password']}')");
        echo "New user: {$_POST['name']} {$_POST['email']} {$_POST['phonenumber']} {$_POST['password']} added.";
    } else {
        $error = "Not all fields are filled in";
        echo json_encode($error);
    }
// Обновляем данные пользователя в бд
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents('php://input'), $updateParam);
    if (isset($updateParam['idUser'])) {
        $idUser = $updateParam['idUser'];
    }
    $updateName = "";
    if (isset($updateParam['name'])) {
        $updateName = ",`full_name`='{$updateParam['name']}'";
    }
    $updateEmail = "";
    if (isset($updateParam['email'])) {
        $updateEmail = "`email`= '{$updateParam['email']}'";
    }
    $updatePhone = "";
    if (isset($updateParam['phonenumber'])) {
        $updatePhone = ",`phonenumber`='{$updateParam['phonenumber']}'";
    }
    $updatePass = "";
    if (isset($updateParam['password'])) {
        $updatePass = ",`password`='{$updateParam['password']}'";
    }
    if (isset($updateParam['name']) || isset($updateParam['email']) || isset($updateParam['phonenumber']) || isset($updateParam['password'])) {
        $updateParamUser = Database::query("UPDATE user SET $updateEmail $updatePhone $updateName $updatePass WHERE `id_user`= $idUser ");
        if (isset($updateParamUser)) {
            echo "User data with id" . "&nbsp" . $idUser . "&nbsp" . "has been update.";
        } else {
            echo "User data is not updated. Try again.";
            exit();
        }
    }
//    Удаляем пользователя из бд
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    parse_str(file_get_contents("php://input"), $deleteUser);

    if (isset($deleteUser['idUser'])) {
        $idUser = $deleteUser['idUser'];
        $deleteUserQuery = Database::query("DELETE FROM user WHERE `id_user`=$idUser");
        echo "User with id" . "&nbsp" . $idUser . "&nbsp" . "deleted.";
    } else {
        echo "User has not been deleted.Try again.";
    }
}






