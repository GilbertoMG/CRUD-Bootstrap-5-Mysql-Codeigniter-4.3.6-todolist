<?= $this->extend('Modules\Todo\Main\Views\internal_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">

        <h1>
            Código: <?php echo $task->id; ?>
        </h1>
        <div class="card">
            <div class="card-header">
                Detalhes da tarefa
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $task->name; ?></h5>
                <p class="card-text">
                    <?php echo $task->description; ?>
                </p>
                <div class="text-end">
                    <?= anchor(site_url('todo/tasks/edit/' . $task->id . ''), 'Editar', ['class' => 'btn btn-outline-info btn-sm']); ?>
                    <?= anchor(site_url('todo/tasks/delete/' . $task->id . ''), 'Excluir', ['class' => 'btn btn-outline-danger btn-sm', 'onClick' => "return confirm('Deseja mesmo excluir este arquivo?');"]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>