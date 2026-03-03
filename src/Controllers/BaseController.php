<?php

namespace App\Controllers;

class BaseController {
    protected $router;
    protected $db;

    public function __construct($router) {
        $this->router = $router;
        $this->db = getDbConnection();
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check authentication for protected routes
        // Exclude login page from check
        $match = $this->router->match();
        if ($match && $match['name'] !== 'login' && !isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
    }

    protected function render($view, $data = []) {
        extract($data);
        
        $headerPath = __DIR__ . '/../../templates/header.php';
        $viewPath = __DIR__ . '/../../templates/' . $view . '.php';
        $footerPath = __DIR__ . '/../../templates/footer.php';

        if (file_exists($headerPath)) {
            require $headerPath;
        }

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View not found: $view";
        }

        if (file_exists($footerPath)) {
            require $footerPath;
        }
    }

    protected function redirect($route) {
        header("Location: $route");
        exit;
    }

    protected function setFlash($message, $type = 'success') {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
}
