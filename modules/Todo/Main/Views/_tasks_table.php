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