<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $action === 'edit' ? 'Editar Bem' : 'Novo Bem'; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="/assets" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Voltar
        </a>
    </div>
</div>

<form action="<?php echo $action === 'edit' ? '/assets/edit/' . $asset['id'] : '/assets/create'; ?>" method="POST">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="patrimony_code" class="form-label">Código Patrimônio *</label>
            <input type="text" class="form-control" id="patrimony_code" name="patrimony_code" required value="<?php echo isset($asset) ? htmlspecialchars($asset['patrimony_code']) : ''; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="rfid_code" class="form-label">Código RFID</label>
            <input type="text" class="form-control" id="rfid_code" name="rfid_code" value="<?php echo isset($asset) ? htmlspecialchars($asset['rfid_code']) : ''; ?>">
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição *</label>
        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo isset($asset) ? htmlspecialchars($asset['description']) : ''; ?></textarea>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="group_id" class="form-label">Grupo</label>
            <select class="form-select" id="group_id" name="group_id">
                <option value="">Selecione...</option>
                <?php foreach ($groups as $g): ?>
                <option value="<?php echo $g['id']; ?>" <?php echo (isset($asset) && $asset['group_id'] == $g['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($g['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="location_id" class="form-label">Local</label>
            <select class="form-select" id="location_id" name="location_id">
                <option value="">Selecione...</option>
                <?php foreach ($locations as $l): ?>
                <option value="<?php echo $l['id']; ?>" <?php echo (isset($asset) && $asset['location_id'] == $l['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($l['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="responsible_id" class="form-label">Responsável</label>
            <select class="form-select" id="responsible_id" name="responsible_id">
                <option value="">Selecione...</option>
                <?php foreach ($responsibles as $r): ?>
                <option value="<?php echo $r['id']; ?>" <?php echo (isset($asset) && $asset['responsible_id'] == $r['id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($r['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="acquisition_date" class="form-label">Data Aquisição</label>
            <input type="date" class="form-control" id="acquisition_date" name="acquisition_date" value="<?php echo isset($asset) ? htmlspecialchars($asset['acquisition_date']) : ''; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="value" class="form-label">Valor (R$)</label>
            <input type="number" step="0.01" class="form-control" id="value" name="value" value="<?php echo isset($asset) ? htmlspecialchars($asset['value']) : ''; ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="status" class="form-label">Situação</label>
            <select class="form-select" id="status" name="status">
                <option value="Ativo" <?php echo (isset($asset) && $asset['status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                <option value="Baixado" <?php echo (isset($asset) && $asset['status'] == 'Baixado') ? 'selected' : ''; ?>>Baixado</option>
                <option value="Em Manutenção" <?php echo (isset($asset) && $asset['status'] == 'Em Manutenção') ? 'selected' : ''; ?>>Em Manutenção</option>
                <option value="Desaparecido" <?php echo (isset($asset) && $asset['status'] == 'Desaparecido') ? 'selected' : ''; ?>>Desaparecido</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
