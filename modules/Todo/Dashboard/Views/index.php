<?= $this->extend('Modules\Todo\Main\Views\internal_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1>
    Dashboard
</h1>
últimas tarefas...

<?php echo $this->include('Modules\Todo\Main\Views\_tasks_table'); ?>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>