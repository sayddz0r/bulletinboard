<?php

namespace announcement;
require_once '..\announcement\items.php';
require_once '..\classes\Database.php';

use classes\Database;

Database::connect();

// Запрос с бд товара по id
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idItem'])) {
        $idItem = $_GET["idItem"];
        $itemRequest = Database::query("SELECT `item_name`, `description`, `price`, `phonenumber`, `full_name` FROM announcement LEFT OUTER JOIN `user` ON `select_id_user`=`id_user` WHERE `select_id_user`='$idItem'");
//        $item=[];
        $items = Database::fetch($itemRequest);
        print_r($items);
    }
    if (empty($items)) {
        echo "Items not fou nd. Try again.";
    }
    json_encode($items);

// Запрос всех товаров пользователя с бд
} else if (isset($_GET["idItemUser"])) {
    $idItem = $_GET["idItemUser"];
    $selectAllItems = Database::query("SELECT `item_name`, `description`, `price`, `phonenumber`, `full_name` FROM announcement LEFT OUTER JOIN `user` ON `select_id_user`=`id_user` WHERE `id_user`='$idUser'");
    $allItems = [];
    while ($allItems[] = Database::fetch($selectAllItems)) {
    }
    echo json_encode($allItems);
} //Запись в бд нового товара

else if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    $error = null;
    if (isset($_POST['item_name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['phonenumber']) && isset($_POST['full_name'])) {
        Database::query("INSERT INTO announcement (`item_name`, `description`, `price`, `phonenumber`, `full_name`) VALUES ('{$_POST['item_name']}','{$_POST['description']}','{$_POST['price']}','{$_POST['phonenumber']}','{$_POST['full_name']}')");
        echo "New item: {$_POST['item_name']} {$_POST['description']} {$_POST['price']} added. Contact {$_POST['full_name']} by phone number {$_POST['phonenumber']}";
    } else {
        $error = "Item not added. Not all fields are filled in";
        echo json_encode($error);
    }
    }
/// Обновляем данные товара в бд
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    parse_str(file_get_contents('php://input'), $updateParamItem);
    if (isset($updateParamItem['item_id'])) {
        $idItem = $updateParamItem['item_id'];
    }
    $updateItemName = "";
    if (isset($updateParamItem['item_name'])) {
        $updateItemName = ",`item_name`='{$updateParamItem['item_name']}'";
    }
    $updateDescription = "";
    if (isset($updateParamItem['description'])) {
        $updateDescription = "`description`= '{$updateParamItem['description']}'";
    }
    $updatePrice = "";
    if (isset($updateParamItem['price'])) {
        $updatePrice = ",`price`='{$updateParamItem['price']}'";
    }
    $updatePhonenumber = "";
    if (isset($updateParamItem['phonenumber'])) {
        $updatePhonenumber = ",`phonenumber`='{$updateParamItem['phonenumber']}'";
    }
    $updateSellerName = "";
    if (isset($updateParamItem['full_name'])) {
        $updateSellerName = ",`full_name`='{$updateParamItem['full_name']}'";
    }
    if (isset($updateParamItem['item_name']) || isset($updateParamItem['description']) || isset($updateParamItem['price']) || isset($updateParamItem['phonenumber']) || isset($updateParamItem['full_name'])) {
        $updateParamItems = Database::query("UPDATE user SET $updateItemName $updateDescription $updatePrice $updatePhonenumber $updateSellerName WHERE `item_id`= $idItem");
        if (isset($updateParamItems)) {
            echo "Item data" . "&nbsp" . $updateItemName . "&nbsp" . "has been update.";
        } else {
            echo "Item data is not updated. Try again.";
            exit();
        }
    }
//    Удаление товара из бд
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    parse_str(file_get_contents("php://input"), $deleteUser);
    if (isset($deleteItem['idItem'])) {
        $idItem=$deleteItem['idItem'];
        $deleteIdItemRequest=Database::query("DELETE FROM announcement WHERE `item_id`=$idItem");
        echo "Item" . "&nbsp" . $idItem . "&nbsp" . "deleted.";
    } else {
        echo "Item has not been deleted.Try again.";
    }
}
