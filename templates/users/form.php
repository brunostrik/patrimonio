<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $action === 'edit' ? 'Editar Usuário' : 'Novo Usuário'; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/users" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="<?php echo $action === 'edit' ? '/users/edit/' . $user['id'] : '/users/create'; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($user) ? htmlspecialchars($user['name']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($user) ? htmlspecialchars($user['email']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" <?php echo $action === 'create' ? 'required' : ''; ?>>
                <?php if ($action === 'edit'): ?>
                <div class="form-text">Deixe em branco para manter a senha atual.</div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
