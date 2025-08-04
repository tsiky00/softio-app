<?php

namespace App\Models;

use CodeIgniter\Model;

class Solution_model extends Model
{
    protected $table = 'solution';
    protected $primaryKey = 'idSolution';

    protected $allowedFields = ['image', 'description'];

    protected $useTimestamps = true;

    public function getSolutionById($id)
    {
        return $this->where('idSolution', $id)->first();
    }

    public function updateSolution($id, $data)
    {
        return $this->update($id, $data);
    }
}