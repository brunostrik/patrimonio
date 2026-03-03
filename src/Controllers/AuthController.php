<?php

namespace App\Controllers;

class AuthController extends BaseController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $this->redirect('/');
            } else {
                $this->setFlash('Email ou senha incorretos.', 'danger');
            }
        }
        
        // If already logged in, redirect to home
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/');
        }

        $this->render('login');
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}
