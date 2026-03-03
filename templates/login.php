<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header text-center">
                <h4><i class="fas fa-university me-2"></i>IFPR Patrimônio</h4>
                <p class="mb-0">Acesso ao Sistema</p>
            </div>
            <div class="card-body">
                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted">
                <small>Solicite acesso ao sistema via e-mail para <a href="mailto:bruno.strik@ifpr.edu.br">bruno.strik@ifpr.edu.br</a></small>
            </div>
        </div>
    </div>
</div>
