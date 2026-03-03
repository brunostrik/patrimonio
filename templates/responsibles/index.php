<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Responsáveis</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/responsibles/create" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Novo Responsável
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
                <th>Telefone</th>
                <th>Departamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($responsibles as $responsible): ?>
            <tr>
                <td><?php echo $responsible['id']; ?></td>
                <td><?php echo htmlspecialchars($responsible['name']); ?></td>
                <td><?php echo htmlspecialchars($responsible['email']); ?></td>
                <td><?php echo htmlspecialchars($responsible['phone']); ?></td>
                <td><?php echo htmlspecialchars($responsible['department']); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="/responsibles/edit/<?php echo $responsible['id']; ?>" class="btn btn-outline-secondary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/responsibles/delete/<?php echo $responsible['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este responsável?');">
                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($responsibles)): ?>
            <tr>
                <td colspan="6" class="text-center">Nenhum responsável cadastrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
