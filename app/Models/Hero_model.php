<?php

namespace App\Models;

use CodeIgniter\Model;

class Hero_model extends Model
{
    protected $table = 'hero';
    protected $primaryKey = 'idHero';

    protected $allowedFields = ['titre', 'description', 'image'];

    protected $useTimestamps = true;

    public function getHeroById($id)
    {
        return $this->where('idHero', $id)->first();
    }

    public function updateHero($id, $data)
    {
        return $this->update($id, $data);
    }
}