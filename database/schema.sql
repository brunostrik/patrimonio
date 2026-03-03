-- Criação do banco de dados (se necessário)
CREATE DATABASE IF NOT EXISTS patrimonio_ifpr CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE patrimonio_ifpr;

-- Tabela de Usuários (Administradores do sistema)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Grupos de Bens (ex: Mobiliário, Informática)
CREATE TABLE IF NOT EXISTS asset_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Locais (ex: Sala 101, Lab Informática 1)
CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Responsáveis (Servidores que detêm a carga do bem)
CREATE TABLE IF NOT EXISTS responsibles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    department VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Bens Patrimoniados
CREATE TABLE IF NOT EXISTS assets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patrimony_code VARCHAR(50) NOT NULL UNIQUE, -- Código da etiqueta visual
    rfid_code VARCHAR(100) UNIQUE, -- Código da etiqueta RFID
    description TEXT NOT NULL,
    group_id INT,
    location_id INT,
    responsible_id INT,
    acquisition_date DATE,
    value DECIMAL(10, 2),
    status ENUM('Ativo', 'Baixado', 'Em Manutenção', 'Desaparecido') DEFAULT 'Ativo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (group_id) REFERENCES asset_groups(id) ON DELETE SET NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE SET NULL,
    FOREIGN KEY (responsible_id) REFERENCES responsibles(id) ON DELETE SET NULL
);

-- Tabela de Movimentações (Histórico)
CREATE TABLE IF NOT EXISTS movements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    from_location_id INT,
    to_location_id INT,
    from_responsible_id INT,
    to_responsible_id INT,
    user_id INT, -- Quem realizou a movimentação no sistema
    movement_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reason TEXT,
    FOREIGN KEY (asset_id) REFERENCES assets(id) ON DELETE CASCADE,
    FOREIGN KEY (from_location_id) REFERENCES locations(id) ON DELETE SET NULL,
    FOREIGN KEY (to_location_id) REFERENCES locations(id) ON DELETE SET NULL,
    FOREIGN KEY (from_responsible_id) REFERENCES responsibles(id) ON DELETE SET NULL,
    FOREIGN KEY (to_responsible_id) REFERENCES responsibles(id) ON DELETE SET NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);
