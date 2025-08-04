<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarif_model extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'idtarif';

    protected $allowedFields = ['tarif', 'description', 'autre'];

    protected $useTimestamps = true;

    public function getTarifById($id)
    {
        return $this->where('idTarif', $id)->first();
    }

    public function updateTarif($id, $data)
    {
        return $this->update($id, $data);
    }
}