<?php

include_once (__DIR__ . '/../models/UserColor.php');
include_once (__DIR__ . '/../../core/Connection.php');

class UserColorController {
    private $userColorModel;

    public function __construct() {
        $connection = new Connection();
        $this->userColorModel = new UserColor($connection);
    }

    public function updateColors($userId, $selectedColors) {
        try {
            header("Content-Type: application/json; charset=utf-8");
            if (!is_array($selectedColors)) {
                $selectedColors = [];
            }
        
            $linkedColors = $this->userColorModel->getUserColors($userId);
            if (!is_array($linkedColors)) {
                $linkedColors = [];
            }
            
            $colorsToAdd = array_diff($selectedColors, $linkedColors);
            foreach ($colorsToAdd as $colorId) {
                $this->userColorModel->insertColor($userId, $colorId);
            }
            
            $colorsToRemove = array_diff($linkedColors, $selectedColors);
            foreach ($colorsToRemove as $colorId) {
                $this->userColorModel->deleteColor($userId, $colorId);
            }
            echo json_encode(["status" => 1, "mensagem" => "Cor alterada com sucesso!"]);
        } catch (Exception $th) {
            echo json_encode(["status" => 0, "mensagem" => "Erro ao alterar cor."]);
        }
    }

    public function insertColor($userId, $selectedColors) {
        if (is_string($selectedColors)) {
            $selectedColors = explode(',', $selectedColors);
        }
    
        if (empty($selectedColors)) {
            return;
        }
    
        $linkedColors = $this->userColorModel->getUserColors($userId);
    
        foreach ($selectedColors as $colorId) {
            if (!in_array($colorId, $linkedColors)) {
                $this->userColorModel->insertColor($userId, $colorId);
            }
        }
    }

    public function showAddColorForm($id_usuario) {
        $colorIds = $this->userColorModel->getUserColors($id_usuario);
        include_once (__DIR__ . '/../views/color/addColor.php');
    }
}

?>