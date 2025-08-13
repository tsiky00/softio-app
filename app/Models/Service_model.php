<?php

namespace App\Models;

use CodeIgniter\Model;

class Service_model extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'idService';

    protected $allowedFields = ['titre', 'description', 'image'];

    protected $useTimestamps = true;

    public function getServiceById($id)
    {
        return $this->where('idService', $id)->first();
    }

    public function updateService($id, $data)
    {
        return $this->update($id, $data);
    }
}