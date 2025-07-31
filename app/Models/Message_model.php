<?php

namespace App\Models;

use CodeIgniter\Model;

class Message_model extends Model 
{
    protected $table = 'message';
    protected $primaryKey = 'idMessage';
    protected $allowedFields = ['nom','email','message'];
}