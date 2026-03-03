<?php

$config = require __DIR__ . '/config/config.php';

echo "Tentando conectar ao MySQL em {$config['db_host']}...\n";

try {
    // Connect without database selected first
    $host = $config['db_host'] === 'localhost' ? '127.0.0.1' : $config['db_host'];
    
    $pdo = new PDO(
        "mysql:host={$host};charset=utf8mb4",
        $config['db_user'],
        $config['db_pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado ao MySQL com sucesso.\n";

    // Read SQL file
    $sqlFile = __DIR__ . '/database/schema.sql';
    if (!file_exists($sqlFile)) {
        die("Erro: Arquivo schema.sql não encontrado em $sqlFile\n");
    }
    
    $sql = file_get_contents($sqlFile);

    // Execute SQL commands
    echo "Executando script de criação do banco de dados...\n";
    $pdo->exec($sql);
    
    echo "✅ Sucesso! Banco de dados e tabelas criados.\n";
    echo "✅ Usuário admin criado: admin@ifpr.edu.br / admin123\n";

} catch (PDOException $e) {
    echo "\n❌ Erro ao conectar ou criar banco de dados:\n";
    echo $e->getMessage() . "\n";
    
    if (strpos($e->getMessage(), 'target machine actively refused it') !== false || strpos($e->getMessage(), '2002') !== false) {
        echo "\n⚠️  Parece que o serviço MySQL não está rodando.\n";
        echo "   Por favor, inicie o serviço MySQL (via XAMPP, WAMP ou Services.msc) e tente novamente.\n";
    }
}
