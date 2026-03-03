<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom d-print-none">
    <h1 class="h2"><?php echo htmlspecialchars($title); ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <button onclick="window.print()" class="btn btn-sm btn-outline-secondary me-2">
            <i class="fas fa-print me-1"></i>Imprimir
        </button>
        <a href="/reports" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<div class="d-none d-print-block text-center mb-4">
    <h2>Instituto Federal do Paraná - IFPR</h2>
    <h3><?php echo htmlspecialchars($title); ?></h3>
    <p>Gerado em: <?php echo date('d/m/Y H:i'); ?></p>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Patrimônio</th>
                <th>Descrição</th>
                <th>Grupo</th>
                <th>Local</th>
                <th>Responsável</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $current_group = null;
            foreach ($assets as $asset): 
                $group_value = $asset[$group_field] ?? 'Não Definido';
                if ($group_value !== $current_group):
                    $current_group = $group_value;
            ?>
            <tr class="table-secondary">
                <td colspan="6" class="fw-bold text-uppercase">
                    <?php echo htmlspecialchars($current_group); ?>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><?php echo htmlspecialchars($asset['patrimony_code']); ?></td>
                <td><?php echo htmlspecialchars($asset['description']); ?></td>
                <td><?php echo htmlspecialchars($asset['group_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($asset['location_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($asset['responsible_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($asset['status']); ?></td>
            </tr>
            <?php endforeach; ?>
            
            <?php if (empty($assets)): ?>
            <tr>
                <td colspan="6" class="text-center">Nenhum registro encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
