<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários do Sistema</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/users/create" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Novo Usuário
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo date('d/m/Y H:i', strtotime($user['created_at'])); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="/users/edit/<?php echo $user['id']; ?>" class="btn btn-outline-secondary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                        <form action="/users/delete/<?php echo $user['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
