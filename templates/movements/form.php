<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Nova Movimentação</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/movements" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<form action="/movements/create" method="POST">
    <div class="mb-3">
        <label for="asset_id" class="form-label">Bem Patrimonial *</label>
        <select class="form-select" id="asset_id" name="asset_id" required>
            <option value="">Selecione o bem...</option>
            <?php foreach ($assets as $a): ?>
            <option value="<?php echo $a['id']; ?>">
                <?php echo htmlspecialchars($a['patrimony_code'] . ' - ' . $a['description']); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="to_location_id" class="form-label">Novo Local</label>
            <select class="form-select" id="to_location_id" name="to_location_id">
                <option value="">Selecione...</option>
                <?php foreach ($locations as $l): ?>
                <option value="<?php echo $l['id']; ?>">
                    <?php echo htmlspecialchars($l['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">Deixe em branco se não houver mudança de local.</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="to_responsible_id" class="form-label">Novo Responsável</label>
            <select class="form-select" id="to_responsible_id" name="to_responsible_id">
                <option value="">Selecione...</option>
                <?php foreach ($responsibles as $r): ?>
                <option value="<?php echo $r['id']; ?>">
                    <?php echo htmlspecialchars($r['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
            <div class="form-text">Deixe em branco se não houver mudança de responsável.</div>
        </div>
    </div>

    <div class="mb-3">
        <label for="reason" class="form-label">Motivo da Movimentação</label>
        <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Registrar Movimentação</button>
</form>
