<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

$router = new AltoRouter();

// Base path if in a subdirectory (optional, but good practice)
// $router->setBasePath('/patrimonio'); 

// Rotas
$router->map('GET', '/', 'App\Controllers\HomeController#index', 'home');
$router->map('GET|POST', '/login', 'App\Controllers\AuthController#login', 'login');
$router->map('GET', '/logout', 'App\Controllers\AuthController#logout', 'logout');

// Usuários
$router->map('GET', '/users', 'App\Controllers\UserController#index', 'users_list');
$router->map('GET|POST', '/users/create', 'App\Controllers\UserController#create', 'users_create');
$router->map('GET|POST', '/users/edit/[i:id]', 'App\Controllers\UserController#edit', 'users_edit');
$router->map('POST', '/users/delete/[i:id]', 'App\Controllers\UserController#delete', 'users_delete');

// Grupos
$router->map('GET', '/groups', 'App\Controllers\GroupController#index', 'groups_list');
$router->map('GET|POST', '/groups/create', 'App\Controllers\GroupController#create', 'groups_create');
$router->map('GET|POST', '/groups/edit/[i:id]', 'App\Controllers\GroupController#edit', 'groups_edit');
$router->map('POST', '/groups/delete/[i:id]', 'App\Controllers\GroupController#delete', 'groups_delete');

// Locais
$router->map('GET', '/locations', 'App\Controllers\LocationController#index', 'locations_list');
$router->map('GET|POST', '/locations/create', 'App\Controllers\LocationController#create', 'locations_create');
$router->map('GET|POST', '/locations/edit/[i:id]', 'App\Controllers\LocationController#edit', 'locations_edit');
$router->map('POST', '/locations/delete/[i:id]', 'App\Controllers\LocationController#delete', 'locations_delete');

// Responsáveis
$router->map('GET', '/responsibles', 'App\Controllers\ResponsibleController#index', 'responsibles_list');
$router->map('GET|POST', '/responsibles/create', 'App\Controllers\ResponsibleController#create', 'responsibles_create');
$router->map('GET|POST', '/responsibles/edit/[i:id]', 'App\Controllers\ResponsibleController#edit', 'responsibles_edit');
$router->map('POST', '/responsibles/delete/[i:id]', 'App\Controllers\ResponsibleController#delete', 'responsibles_delete');

// Bens
$router->map('GET', '/assets', 'App\Controllers\AssetController#index', 'assets_list');
$router->map('GET|POST', '/assets/create', 'App\Controllers\AssetController#create', 'assets_create');
$router->map('GET|POST', '/assets/edit/[i:id]', 'App\Controllers\AssetController#edit', 'assets_edit');
$router->map('POST', '/assets/delete/[i:id]', 'App\Controllers\AssetController#delete', 'assets_delete');

// Movimentações
$router->map('GET', '/movements', 'App\Controllers\MovementController#index', 'movements_list');
$router->map('GET|POST', '/movements/create', 'App\Controllers\MovementController#create', 'movements_create');

// Relatórios
$router->map('GET', '/reports', 'App\Controllers\ReportController#index', 'reports_index');
$router->map('GET', '/reports/group', 'App\Controllers\ReportController#byGroup', 'reports_group');
$router->map('GET', '/reports/location', 'App\Controllers\ReportController#byLocation', 'reports_location');
$router->map('GET', '/reports/responsible', 'App\Controllers\ReportController#byResponsible', 'reports_responsible');

// Match da rota atual
$match = $router->match();

if ($match) {
    list($controllerName, $method) = explode('#', $match['target']);
    
    if (class_exists($controllerName)) {
        $controller = new $controllerName($router);
        if (is_callable([$controller, $method])) {
            call_user_func_array([$controller, $method], $match['params']);
        } else {
            // Método não encontrado
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
            echo 'Erro 404: Método não encontrado no controller';
        }
    } else {
        // Controller não encontrado
        header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        echo "Erro 404: Controller $controllerName não encontrado";
    }
} else {
    // Rota não encontrada
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo 'Erro 404: Página não encontrada';
}
