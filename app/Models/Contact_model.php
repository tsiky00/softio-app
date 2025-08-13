<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_model extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'idContact';

    protected $allowedFields = ['numero', 'adresse', 'email'];

    protected $useTimestamps = true;

    public function getContactById($id)
    {
        return $this->where('idContact', $id)->first();
    }

    public function updateContact($id, $data)
    {
        return $this->update($id, $data);
    }
}