<?php

include_once (__DIR__ . '/../app/controllers/UserColorController.php');
include_once (__DIR__ . '/../app/controllers/UserController.php');

$userColorController = new UserColorController();
$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addUser':
            echo $userController->addUser($_POST['name'], $_POST['email'], $_POST['cores']);
            break;
        case 'updateUser':
            echo $userController->updateUser($_POST['id_usuario'], $_POST['nome_usuario'], $_POST['email_usuario']);
            break;
        case 'updateColors':
            echo $userColorController->updateColors($_POST['id_usuario'], $_POST['cores_selecionadas']);
            break;
        case 'deleteUser':
            echo $userController->deleteUser($_POST['id_usuario_del']);
            break;
        case 'addUserForm':
            echo $userController->showAddUserForm();
            break;
        case 'editUserForm':
            echo $userController->showEditUserForm($_POST['id_usuario'], $_POST['nome_usuario'], $_POST['email_usuario']);
            break;
        case 'addColorForm':
            echo $userColorController->showAddColorForm($_POST['id_usuario']);
            break;
        case 'deleteUserForm':
            echo $userController->showDeleteUserForm($_POST['id_usuario_del'], $_POST['nome_usuario_del']);
            break;
        case 'listUsers':
        default:
            $userController->showUserList();
            break;
    }
} else {
    $userController->showUserList();
}

?>