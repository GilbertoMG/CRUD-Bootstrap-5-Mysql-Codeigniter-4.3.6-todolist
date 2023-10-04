<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas - login</title>
    <?= link_tag(site_url('assets/css/bootstrap.min.css')); ?>
    <?= $this->renderSection('css'); ?>
</head>

<body>
    <div class="container mt-5">        
        <div class="row">
            <div class="col-12">
                <div class="text-end mb-1">
                    Codeigniter Versão <?= CodeIgniter\CodeIgniter::CI_VERSION ?>
                </div>
            </div>
        </div>
        <!-- cada view renderiza uma row -->
        <?= $this->renderSection('content'); ?>
    </div>
    <?= script_tag(site_url('assets/js/bootstrap.bundle.min.js')); ?>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>