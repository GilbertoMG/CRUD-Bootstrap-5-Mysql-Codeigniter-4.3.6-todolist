<?php

namespace Modules\Todo\Tasks\Models;

use CodeIgniter\Model;
use Modules\Todo\Entities\Task;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $returnType       = Task::class; // 'array' ou 'object';
    // coloca a data de exclusão e não retorna por padrão nas consultas ou usar o withDeleted na query
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'description',
        'hash',
        'deadline',
        'priority',
        'status'
    ];

    // Dates
    protected $useTimestamps = false;

    // Validation
    protected $skipValidation       = false;

    // Callbacks
    protected $allowCallbacks = true;
}
