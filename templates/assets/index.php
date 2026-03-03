<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bens Patrimoniados</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/assets/create" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Novo Bem
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>Patrimônio</th>
                <th>Descrição</th>
                <th>Grupo</th>
                <th>Local</th>
                <th>Responsável</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assets as $asset): ?>
            <tr>
                <td><?php echo htmlspecialchars($asset['patrimony_code']); ?></td>
                <td><?php echo htmlspecialchars($asset['description']); ?></td>
                <td><?php echo htmlspecialchars($asset['group_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($asset['location_name'] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($asset['responsible_name'] ?? '-'); ?></td>
                <td>
                    <span class="badge bg-<?php 
                        echo match($asset['status']) {
                            'Ativo' => 'success',
                            'Baixado' => 'danger',
                            'Em Manutenção' => 'warning',
                            'Desaparecido' => 'dark',
                            default => 'secondary'
                        };
                    ?>">
                        <?php echo htmlspecialchars($asset['status']); ?>
                    </span>
                </td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="/assets/edit/<?php echo $asset['id']; ?>" class="btn btn-outline-secondary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/assets/delete/<?php echo $asset['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este bem?');">
                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($assets)): ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum bem cadastrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
