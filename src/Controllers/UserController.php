<?php

namespace App\Controllers;

class UserController extends BaseController {

    public function index() {
        $users = $this->db->query("SELECT * FROM users ORDER BY name")->fetchAll();
        $this->render('users/index', ['users' => $users]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hash = password_hash($password, PASSWORD_DEFAULT);

            try {
                $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hash]);

                $this->setFlash('Usuário criado com sucesso!');
                $this->redirect('/users');
            } catch (\PDOException $e) {
                $this->setFlash('Erro ao criar usuário: ' . $e->getMessage(), 'danger');
            }
        }
        $this->render('users/form', ['action' => 'create']);
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "UPDATE users SET name = :name, email = :email";
            $params = ['name' => $name, 'email' => $email, 'id' => $id];

            if (!empty($password)) {
                $sql .= ", password = :password";
                $params['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $sql .= " WHERE id = :id";

            try {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($params);

                $this->setFlash('Usuário atualizado com sucesso!');
                $this->redirect('/users');
            } catch (\PDOException $e) {
                $this->setFlash('Erro ao atualizar usuário: ' . $e->getMessage(), 'danger');
            }
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();

        if (!$user) {
            $this->setFlash('Usuário não encontrado.', 'danger');
            $this->redirect('/users');
        }

        $this->render('users/form', ['action' => 'edit', 'user' => $user]);
    }

    public function delete($id) {
        // Prevent deleting self
        if ($id == $_SESSION['user_id']) {
            $this->setFlash('Você não pode excluir a si mesmo.', 'danger');
            $this->redirect('/users');
        }

        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        
        $this->setFlash('Usuário excluído com sucesso!');
        $this->redirect('/users');
    }
}
