<?php

namespace App\Models;

use CodeIgniter\Model;

class Apropos_model extends Model
{
    protected $table = 'apropos';
    protected $primaryKey = 'idApropos';

    protected $allowedFields = ['titre', 'description', 'image'];

    protected $useTimestamps = true;

    public function getAproposById($id)
    {
        return $this->where('idApropos', $id)->first();
    }

    public function updateApropos($id, $data)
    {
        return $this->update($id, $data);
    }
}