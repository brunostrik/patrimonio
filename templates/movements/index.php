<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Histórico de Movimentações</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/movements/create" class="btn btn-sm btn-primary">
            <i class="fas fa-exchange-alt me-1"></i>Nova Movimentação
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>Data</th>
                <th>Bem</th>
                <th>Origem (Local)</th>
                <th>Destino (Local)</th>
                <th>Origem (Resp.)</th>
                <th>Destino (Resp.)</th>
                <th>Usuário</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movements as $m): ?>
            <tr>
                <td><?php echo date('d/m/Y H:i', strtotime($m['movement_date'])); ?></td>
                <td><?php echo htmlspecialchars($m['patrimony_code']); ?></td>
                <td><?php echo htmlspecialchars($m['from_location'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($m['to_location'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($m['from_responsible'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($m['to_responsible'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($m['user_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($m['reason'] ?? '-'); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($movements)): ?>
            <tr>
                <td colspan="8" class="text-center">Nenhuma movimentação registrada.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
