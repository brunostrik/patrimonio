<?php

namespace App\Controllers;

class ResponsibleController extends BaseController {

    public function index() {
        $responsibles = $this->db->query("SELECT * FROM responsibles ORDER BY name")->fetchAll();
        $this->render('responsibles/index', ['responsibles' => $responsibles]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $department = $_POST['department'];

            $stmt = $this->db->prepare("INSERT INTO responsibles (name, email, phone, department) VALUES (:name, :email, :phone, :department)");
            $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'department' => $department]);

            $this->setFlash('Responsável cadastrado com sucesso!');
            $this->redirect('/responsibles');
        }
        $this->render('responsibles/form', ['action' => 'create']);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $department = $_POST['department'];

            $stmt = $this->db->prepare("UPDATE responsibles SET name = :name, email = :email, phone = :phone, department = :department WHERE id = :id");
            $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'department' => $department, 'id' => $id]);

            $this->setFlash('Responsável atualizado com sucesso!');
            $this->redirect('/responsibles');
        }

        $stmt = $this->db->prepare("SELECT * FROM responsibles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $responsible = $stmt->fetch();

        if (!$responsible) {
            $this->setFlash('Responsável não encontrado.', 'danger');
            $this->redirect('/responsibles');
        }

        $this->render('responsibles/form', ['action' => 'edit', 'responsible' => $responsible]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM responsibles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $this->setFlash('Responsável excluído com sucesso!');
        $this->redirect('/responsibles');
    }
}
