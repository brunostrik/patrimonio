<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $action === 'edit' ? 'Editar Grupo' : 'Novo Grupo'; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/groups" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="<?php echo $action === 'edit' ? '/groups/edit/' . $group['id'] : '/groups/create'; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do Grupo</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($group) ? htmlspecialchars($group['name']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo isset($group) ? htmlspecialchars($group['description']) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
