<?php

namespace App\Controllers;

class GroupController extends BaseController {

    public function index() {
        $groups = $this->db->query("SELECT * FROM asset_groups ORDER BY name")->fetchAll();
        $this->render('groups/index', ['groups' => $groups]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $this->db->prepare("INSERT INTO asset_groups (name, description) VALUES (:name, :description)");
            $stmt->execute(['name' => $name, 'description' => $description]);

            $this->setFlash('Grupo criado com sucesso!');
            $this->redirect('/groups');
        }
        $this->render('groups/form', ['action' => 'create']);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $this->db->prepare("UPDATE asset_groups SET name = :name, description = :description WHERE id = :id");
            $stmt->execute(['name' => $name, 'description' => $description, 'id' => $id]);

            $this->setFlash('Grupo atualizado com sucesso!');
            $this->redirect('/groups');
        }

        $stmt = $this->db->prepare("SELECT * FROM asset_groups WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $group = $stmt->fetch();

        if (!$group) {
            $this->setFlash('Grupo não encontrado.', 'danger');
            $this->redirect('/groups');
        }

        $this->render('groups/form', ['action' => 'edit', 'group' => $group]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM asset_groups WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $this->setFlash('Grupo excluído com sucesso!');
        $this->redirect('/groups');
    }
}
