<?php

namespace App\Controllers;

class LocationController extends BaseController {

    public function index() {
        $locations = $this->db->query("SELECT * FROM locations ORDER BY name")->fetchAll();
        $this->render('locations/index', ['locations' => $locations]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $this->db->prepare("INSERT INTO locations (name, description) VALUES (:name, :description)");
            $stmt->execute(['name' => $name, 'description' => $description]);

            $this->setFlash('Local criado com sucesso!');
            $this->redirect('/locations');
        }
        $this->render('locations/form', ['action' => 'create']);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $stmt = $this->db->prepare("UPDATE locations SET name = :name, description = :description WHERE id = :id");
            $stmt->execute(['name' => $name, 'description' => $description, 'id' => $id]);

            $this->setFlash('Local atualizado com sucesso!');
            $this->redirect('/locations');
        }

        $stmt = $this->db->prepare("SELECT * FROM locations WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $location = $stmt->fetch();

        if (!$location) {
            $this->setFlash('Local não encontrado.', 'danger');
            $this->redirect('/locations');
        }

        $this->render('locations/form', ['action' => 'edit', 'location' => $location]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM locations WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $this->setFlash('Local excluído com sucesso!');
        $this->redirect('/locations');
    }
}
