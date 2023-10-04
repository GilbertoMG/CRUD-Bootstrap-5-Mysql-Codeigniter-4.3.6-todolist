<?= $this->extend('Modules\Todo\Main\Views\internal_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1>
   Todas as tarefas...
</h1>

<?= $pager->links('default') ?>

<div class="text-right">
   <small> Páginas: <?= $pager->getPageCount(); ?> - registros <?= $pager->getTotal(); ?>
   </small>
</div>

<?php echo $this->include('Modules\Todo\Main\Views\_tasks_table'); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>