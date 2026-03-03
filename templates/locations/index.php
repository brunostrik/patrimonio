<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Locais</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/locations/create" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i>Novo Local
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
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?php echo $location['id']; ?></td>
                <td><?php echo htmlspecialchars($location['name']); ?></td>
                <td><?php echo htmlspecialchars($location['description']); ?></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <a href="/locations/edit/<?php echo $location['id']; ?>" class="btn btn-outline-secondary" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/locations/delete/<?php echo $location['id']; ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este local?');">
                            <button type="submit" class="btn btn-outline-danger" title="Excluir">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if (empty($locations)): ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum local cadastrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
