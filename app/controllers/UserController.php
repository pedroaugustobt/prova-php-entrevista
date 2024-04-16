<?php

include_once (__DIR__ . '/../models/User.php');
include_once (__DIR__ . '/../models/UserColor.php');
include_once (__DIR__ . '/../../core/Connection.php');

class UserController {
    private $userModel;
    private $userColorModel;

    public function __construct() {
        $connection = new Connection();
        $this->userModel = new User($connection);
        $this->userColorModel = new UserColor($connection);
    }

    public function showUserList() {
        $users = $this->userModel->listUsers();
        foreach ($users as $key => $user) {
            $colorIds = $this->userColorModel->getUserColors($user['id']);
            $colorNames = [];
    
            foreach ($colorIds as $color) {
                $colorName = $this->userColorModel->getColor($color);
                if ($colorName) {
                    $colorNames[] = $colorName;
                }
            }
    
            $users[$key]['color_names'] = $colorNames;
        }
        include_once (__DIR__ . '/../views/home.php');
    }

    public function addUser($name, $email, $cores) {
        try {
            header("Content-Type: application/json; charset=utf-8");
            $response = $this->userModel->addUser($name, $email, $cores);
            echo json_encode($response);
        } catch (Exception  $e) {
            echo json_encode(["status" => 0, "mensagem" => "Erro ao adicionar usuário."]);
        }
    }

    public function updateUser($id, $name, $email) {
        try {
            header("Content-Type: application/json; charset=utf-8");
            $this->userModel->updateUser($id, $name, $email);
            echo json_encode(["status" => 1, "mensagem" => "Dados do usuário atualizados com sucesso!"]);
        } catch (Exception  $e) {
            echo json_encode(["status" => 0, "mensagem" => "Erro ao atualizar usuário."]);
        }
    }

    public function deleteUser($userId) {
        try {
            header("Content-Type: application/json; charset=utf-8");
            $this->userModel->deleteUser($userId);
            echo json_encode(["status" => 1, "mensagem" => "Deletado com sucesso!"]);
        } catch (Exception $e) {
            echo json_encode(["status" => 0, "mensagem" => "Erro ao deletar usuário."]);
        }
    }

    public function showAddUserForm() {
        include_once (__DIR__ . '/../views/user/addUser.php');
    }

    public function showEditUserForm($id_usuario, $nome_usuario, $email_usuario) {
        include_once (__DIR__ . '/../views/user/editUser.php');
    }

    public function showDeleteUserForm($id_usuario_del, $nome_usuario_del) {
        include_once (__DIR__ . '/../views/user/deleteUser.php');
    }
}

?>