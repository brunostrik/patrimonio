<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFPR - Controle de Patrimônio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ifpr-green: #2f9e41;
            --ifpr-red: #cd191e;
        }
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: var(--ifpr-green);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            color: #e2e6ea !important;
            text-decoration: underline;
        }
        .btn-primary {
            background-color: var(--ifpr-green);
            border-color: var(--ifpr-green);
        }
        .btn-primary:hover {
            background-color: #248c35;
            border-color: #248c35;
        }
        .btn-danger {
            background-color: var(--ifpr-red);
            border-color: var(--ifpr-red);
        }
        .card-header {
            background-color: var(--ifpr-green);
            color: white;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['user_id'])): ?>
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-university me-2"></i>IFPR Patrimônio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fas fa-tachometer-alt me-1"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/groups"><i class="fas fa-boxes me-1"></i>Grupos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/locations"><i class="fas fa-map-marker-alt me-1"></i>Locais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/responsibles"><i class="fas fa-user-tie me-1"></i>Responsáveis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/assets"><i class="fas fa-barcode me-1"></i>Bens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/movements"><i class="fas fa-exchange-alt me-1"></i>Movimentações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/reports"><i class="fas fa-file-alt me-1"></i>Relatórios</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user me-1"></i> <?php echo $_SESSION['user_name'] ?? 'Usuário'; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/users"><i class="fas fa-users-cog me-1"></i>Usuários</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt me-1"></i>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>

<div class="container">
    <?php if (isset($_SESSION['flash_message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['flash_type'] ?? 'info'; ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['flash_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_type']);
        ?>
    <?php endif; ?>
