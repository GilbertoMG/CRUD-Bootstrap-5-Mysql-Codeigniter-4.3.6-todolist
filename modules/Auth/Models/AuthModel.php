<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    public function chkLogin($data)
    {
        $password = $data['password'];

        $query = $this->query("SELECT id, name,email,password,status FROM users WHERE (email = " . $this->escape($data['email']) . ")");

        if (count($query->getResult()) === 1 && password_verify($password, $query->getRow()->password)) { // deve retornar apenas 1 resultado.
            unset($query->getRow()->senha);
            return $query->getRow();
        }
        return false;
    }
}
