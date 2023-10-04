<?php

namespace Modules\Todo\Tasks\Controllers;

use CodeIgniter\Entity\Entity;
use Modules\Todo\Main\Controllers\BaseController;
use Modules\Todo\Tasks\Models\TaskModel;
use Modules\Todo\Entities\Task;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        array_push($this->helpers, 'custom', 'form', 'dates');
        $this->taskModel = new taskModel();
        $this->data['validation'] = \Config\Services::validation();
    }

    public function index()
    {
        return view('Modules\Todo\Tasks\Views\index', $this->data);
    }

    public function all()
    {
        $this->data['tasks'] = $this->taskModel->paginate();
        $this->data['pager'] = $this->taskModel->pager;
        return view('Modules\Todo\Tasks\Views\all', $this->data);
    }

    public function ajax()
    {
        if ($this->request->isAJAX()) {
            $json = $this->request->getJSON();


            if ($json->order_by) {
                $this->taskModel->orderBy('id','desc');
            }

            return $this->response->setJSON([
                'header' => [
                    'id' => ['name' => 'id', 'class' => 'bg-info'],
                    'name' => ['name' => 'name', 'class' => "text-start"],
                    'description' => ['name' => 'description', 'class' => "text-start"],
                    'status' => ['name' => 'status', 'class' => "text-center bg-warning"],

                ],
                'data' => $this->taskModel->paginate(),
                'pager' => $this->taskModel->pager,
                'total_paginas'=> $this->taskModel->pager->getPageCount(),
                'total_registros'=> $this->taskModel->pager->getTotal(),
                'pagination' => $this->taskModel->pager->links('default'),
                'actions' => [
                    'edit' => 'edit/',
                    'delete' => 'delete/'
                ],
            ]);
            //return $this->response->setJSON(['info' => $this->request->isAJAX()]);
        }

        // var_dump($this->request->isAJAX());
        /*
        if($this->request->isAJAX()){
            return $this->response->setJSON(['erro' => 'AJAX']);
        }else{
            die();
        }
*/
        return view('Modules\Todo\Tasks\Views\ajax', $this->data);
        //
        //  return $this->response->setJSON(['erro'=>'Não é AJAX']);
        /*
        if(){
            $this->data['tasks'] = $this->taskModel->paginate();
            $this->data['pager'] = $this->taskModel->pager;
            return view('Modules\Todo\Tasks\Views\all', $this->data);

        }*/
    }



    public function save()
    {
        if ($this->request->is('post')) {

            $post = $this->request->getPost();

            unset($post['btn_salvar']);

            if ($this->data['validation']->run($post, 'tasks_save')) {

                if ((int) $post['id'] > 0) {
                    $task = $this->getByIdOr404($post['id']);
                    $task->fill($post);

                    if ($task->hasChanged() === false) {
                        return redirect()->to('todo/tasks/new')
                            ->with('message', lang('FlashMessages.sem_alteracao'));
                    }
                }

                $taskNew = new Task($post);

                /*
                echo '<pre>';
                print_r($taskNew);
                exit;
                */
                if ($this->taskModel->save($taskNew)) {
                    $lastId = $this->taskModel->getInsertID();
                    // app/Language/pt-BR/FlashMessages.php
                    return redirect()->to('todo/tasks/new')->with('message', lang('FlashMessages.sucesso'));
                }

                /*
                var_dump($post, $task->hasChanged());
                die();
                */
            }
            $this->lastTasks();
            return view('Modules\Todo\Tasks\Views\new', $this->data);
        }
    }

    public function new()
    {
        $this->lastTasks();

        $this->data['results'] = new Task();

        return view('Modules\Todo\Tasks\Views\new', $this->data);
    }

    public function edit($id)
    {
        $id = (int) $id;
        //$this->taskModel->where('id',1)->first(1);
        //string(78) "SELECT * FROM `tasks` WHERE `id` = 1 AND `tasks`.`deleted_at` IS NULL LIMIT 1"

        $this->data['results'] = $this->taskModel->find($id);

        //$this->taskModel->getLastQuery()->getQuery()
        //string(77) "SELECT * FROM `tasks` WHERE `tasks`.`deleted_at` IS NULL AND `tasks`.`id` = 1"

        $this->lastTasks();
        return view('Modules\Todo\Tasks\Views\new', $this->data);
    }

    public function view($id)
    {
        $id = (int) $id;
        $this->data['task'] = $this->getByIdOr404($id);
        return view('Modules\Todo\Tasks\Views\view', $this->data);
    }

    public function delete($id)
    {
        $id = (int) $id;
        $this->getByIdOr404($id);
        // app/Language/pt-BR/FlashMessages.php
        $msg = lang('FlashMessages.deleted_ok');

        if (!$this->taskModel
            ->where(['id' => $id])
            ->delete()) {
            // app/Language/pt-BR/FlashMessages.php
            $msg = lang('FlashMessages.deleted_error');
        }

        return redirect()->to('todo/tasks/new')->with('message', $msg);
    }

    public function close($id)
    {
        $id = (int) $id;
        $this->getByIdOr404($id);
        // app/Language/pt-BR/FlashMessages.php
        $msg = lang('FlashMessages.sucesso');

        if (!$this->taskModel->update($id, ['status' => 1])) {
            // app/Language/pt-BR/FlashMessages.php
            $msg = lang('FlashMessages.close_error');
        }

        return redirect()->to('todo/tasks/new')->with('message', $msg);
    }

    private function lastTasks()
    {
        $this->data['tasks'] = $this->taskModel
            ->orderBy('id')
            ->limit(10)
            ->findAll();
    }

    /**
     * Recupera task por id
     * @param integer $id
     * @return Exception|object
     */
    private function getByIdOr404(int $id = null)
    {

        if (!$id || !$task = $this->taskModel->withDeleted(true)->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("A tarefa $id não foi encontrada.");
        }

        return $task;
    }
}
