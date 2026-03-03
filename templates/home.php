<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4 mb-4">
    <div class="col">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Bens Patrimoniados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['assets_count']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-barcode fa-2x text-gray-300" style="color: #ccc;"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-primary stretched-link" href="/assets">Ver Detalhes</a>
                <div class="small text-primary"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Grupos de Bens</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['groups_count']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-gray-300" style="color: #ccc;"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-success stretched-link" href="/groups">Ver Detalhes</a>
                <div class="small text-success"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Locais</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['locations_count']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marker-alt fa-2x text-gray-300" style="color: #ccc;"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-info stretched-link" href="/locations">Ver Detalhes</a>
                <div class="small text-info"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Responsáveis</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['responsibles_count']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300" style="color: #ccc;"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-warning stretched-link" href="/responsibles">Ver Detalhes</a>
                <div class="small text-warning"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold"">Ações Rápidas</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="/assets/create" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i>Cadastrar Bem</a>
                    <a href="/movements/create" class="btn btn-success"><i class="fas fa-exchange-alt me-2"></i>Registrar Movimentação</a>
                    <a href="/groups/create" class="btn btn-outline-secondary"><i class="fas fa-plus me-2"></i>Novo Grupo</a>
                    <a href="/locations/create" class="btn btn-outline-secondary"><i class="fas fa-plus me-2"></i>Novo Local</a>
                </div>
            </div>
        </div>
    </div>
</div>
-->
