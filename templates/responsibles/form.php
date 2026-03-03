<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $action === 'edit' ? 'Editar Responsável' : 'Novo Responsável'; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/responsibles" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="<?php echo $action === 'edit' ? '/responsibles/edit/' . $responsible['id'] : '/responsibles/create'; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required value="<?php echo isset($responsible) ? htmlspecialchars($responsible['name']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($responsible) ? htmlspecialchars($responsible['email']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($responsible) ? htmlspecialchars($responsible['phone']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Departamento</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo isset($responsible) ? htmlspecialchars($responsible['department']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
