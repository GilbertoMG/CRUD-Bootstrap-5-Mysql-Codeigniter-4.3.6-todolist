<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <?= link_tag(base_url('assets/css/bootstrap.min.css')); ?>
    <?= $this->renderSection('css'); ?>
</head>

<body data-url="<?php echo site_url(); ?>">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tarefas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('todo'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('todo/tasks/new'); ?>">Nova tarefa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('todo/tasks/all'); ?>">Lista de tarefas</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="d-flex justify-content-between">
                <div>
                    Olá: <strong><?= $userData['name']; ?></strong>
                </div>
                <div class="text-end">
                    Codeigniter Versão <?= CodeIgniter\CodeIgniter::CI_VERSION ?> - <a href="<?= site_url('auth/logout'); ?>">Sair</a>
                </div>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo renderAlerts(session('message')); ?>
            </div>
        </div>
        <!-- cada view renderiza uma row -->
        <?= $this->renderSection('content'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?= script_tag(site_url('assets/js/bootstrap.bundle.min.js')); ?>
    <?= script_tag(site_url('assets/js/app/main.js')); ?>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>