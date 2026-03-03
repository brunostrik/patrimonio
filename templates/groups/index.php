<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grupos de Bens</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/groups/create" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Novo Grupo
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?php echo $group['id']; ?></td>
                <td><?php echo htmlspecialchars($group['name']); ?></td>
                <td><?php echo htmlspecialchars($group['description']); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="/groups/edit/<?php echo $group['id']; ?>" class="btn btn-outline-secondary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/groups/delete/<?php echo $group['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este grupo?');">
                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($groups)): ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum grupo cadastrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
