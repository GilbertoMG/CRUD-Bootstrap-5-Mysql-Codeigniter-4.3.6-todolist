<?= $this->extend('Modules\Todo\Main\Views\internal_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h1>
    Nova Tarefa
</h1>
<?php
/*
echo '<pre>';
var_dump($results->id);
die();
*/
?>
<?php echo form_open(site_url('todo/tasks/save'), ['id' => 'form', 'autocomplete' => 'off'], ['id' => $results->id ?? set_value('id')]) ?>
<div class="row">
    <div class="col-10">
        <?= form_label(renderLabel($validation->getError('name'), '*Nome')); ?>
        <?= form_input([
            'class' => 'form-control form-control-sm ' . toggleCSSValidOrInvalid($validation->getError('name')),
            'placeholder' => 'Informe nome',
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            // 'required' => 'required',
            'value' => $results->name ?? set_value('name')
        ]);
        ?>
    </div>

    <div class="col-2">
        <?= form_label(renderLabel($validation->getError('hash'), '*Auto')); ?>
        <?= form_input([
            'class' => 'form-control form-control-sm ' . toggleCSSValidOrInvalid($validation->getError('hash')),
            'placeholder' => 'Informe nome',
            'type' => 'text',
            'name' => 'hash',
            'id' => 'hash',
            // 'required' => 'required',
            'value' => $results->hash ?? set_value('hash')
        ]);
        ?>
    </div>

    <div class="col-12">
        <?= form_label(renderLabel($validation->getError('description'), '*Descrição')); ?>
        <?= form_textarea([
            'class' => 'form-control form-control-sm' . toggleCSSValidOrInvalid($validation->getError('description')),
            'name' => 'description',
            'placeholder' => 'Descrição da tarefa',
            'id' => 'description',
            // 'required' => 'required',
            'rows' => 4,
            'value' => $results->description ?? set_value('description')
        ]);
        ?>
    </div>

    <div class="col-12 col-sm-6">
        <?= form_label(renderLabel($validation->getError('deadline'), '*Prazo final')); ?>
        <?= form_input([
            'class' => 'form-control form-control-sm' . toggleCSSValidOrInvalid($validation->getError('deadline')),
            'name' => 'deadline',
            'type' => 'date',
            'placeholder' => 'Prazo final',
            'id' => 'deadline',
            // 'required' => 'required',            
            'value' => $results->deadline ?? set_value('deadline')
        ]);
        ?>
    </div>

    <div class="col-12 col-sm-6 ">
        <?= form_label(renderLabel($validation->getError('priority'), '*Prioridade')); ?>
        <?= form_dropdown('priority', [
            '' => '(Selecione)',
            1 => 'Urgente',
            2 => 'Importante',
            3 => 'Media',
            4 => 'Baixa',
        ], $results->priority ??  set_value('priority'), ['id' => 'priority', 'class' => 'form-select form-select-sm' . toggleCSSValidOrInvalid($validation->getError('priority'))]); ?>
    </div>



    <div class="col-12 col-sm-10">
        <?= form_submit('btn_salvar', (isset($results->id) && $results->id > 0) ? 'Atualizar' : 'Salvar', ['class' => 'btn btn-success mt-2 w-100 btn-sm']); ?>
    </div>
    <div class="col-12 col-sm-2">
        <a href="<?= site_url('todo/tasks/new'); ?>" class="btn w-100 btn-sm border mt-2">Nova</a>
    </div>

</div>
<?= form_close() ?>

<div class="row">
    <div class="col-12">
        <?php if ($tasks) : ?>
            <hr>
            Últimas tarefas...
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                nome
                            </th>
                            <th>
                                Prazo final
                            </th>
                            <th>
                                Prioridade
                            </th>
                            <th class="text-center">
                                status
                            </th>
                            <th class="text-center">
                                ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task) : ?>
                            <tr>
                                <td><?= $task->id; ?></td>
                                <td><?= $task->name; ?></td>
                                <td><?= isset($task->deadline) ? dataDBtoBRL($task->deadline) : '---'; ?></td>
                                <td><?= isset($task->priority) ? priority($task->priority) : ''; ?></td>
                                <td class="text-center"><?= isset($task->status) ? status($task->status) : '---'; ?></td>
                                <td class="text-center bg-light text-nowrap">
                                    <?= anchor(site_url('todo/tasks/delete/' . $task->id . ''), 'Excluir', ['class' => 'btn btn-outline-danger btn-sm', 'onClick' => "return confirm('Deseja mesmo excluir este arquivo?');"]); ?>
                                    <?= anchor(site_url('todo/tasks/edit/' . $task->id . ''), 'Editar', ['class' => 'btn btn-outline-info btn-sm']); ?>
                                    <?= anchor(site_url('todo/tasks/view/' . $task->id . ''), 'detalhes', ['class' => 'btn btn-outline-secondary btn-sm']); ?>
                                    <?= anchor(site_url('todo/tasks/close/' . $task->id . ''), 'Finalizar', ['class' => 'btn btn-outline-success btn-sm']); ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>