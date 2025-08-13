<?php

namespace App\Models;

use CodeIgniter\Model;

class Expertise_model extends Model
{
    protected $table = 'expertise';
    protected $primaryKey = 'idExpertise';

    protected $allowedFields = ['titre', 'description', 'image'];

    protected $useTimestamps = true;

    public function getExpertiseById($id)
    {
        return $this->where('idExpertise', $id)->first();
    }

    public function updateExpertise($id, $data)
    {
        return $this->update($id, $data);
    }
}