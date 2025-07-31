<?php

namespace App\Models;

use CodeIgniter\Model;

class Inscription_model extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'idUtilisateur';

    protected $allowedFields = ['nom', 'prenom', 'email', 'telephone', 'entreprise', 'password'];

    protected $useTimestamps = true;

    public function getUtilisateurById($id)
    {
        return $this->where('idUtilisateur', $id)->first();
    }

    public function updateUtilisateur($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
