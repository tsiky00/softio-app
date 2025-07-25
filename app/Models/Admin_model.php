<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'idAdmin';
    protected $allowedFields = ['nom','prenom','email', 'password'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
