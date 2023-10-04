<?= $this->extend('Modules\Todo\Main\Views\internal_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<h1>
   Listagem de tarefas...
</h1>

<div id="usuarios_listar"></div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
   const usuario = new Main('usuarios_listar');
   usuario.setURL(usuario.baseURL + '/todo/tasks/ajax');
   usuario.getDataTable(); 
</script>
<?= $this->endSection(); ?>