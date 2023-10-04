<?php

namespace Modules\Todo\Dashboard\Controllers;

use Modules\Todo\Main\Controllers\BaseController;
use Modules\Todo\Tasks\Models\TaskModel;

class Dashboard extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        array_push($this->helpers,'text','dates','custom');
        $this->taskModel = new taskModel();       
    }

    public function index()
    {
        // $this->getUser('id')
        
        $this->data['tasks'] = $this->taskModel
        ->orderBy('id')
        ->limit(20)
        ->findAll();

        return view('Modules\Todo\Dashboard\Views\index',$this->data);
    }
}
