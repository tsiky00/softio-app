<?php

namespace App\Controllers;

use App\Models\Tarif_model;

class Tarif extends BaseController
{
    public function create()
    {
        helper(['form']);

        $rules = [
            'tarif'       => 'required',
            'description' => 'required|min_length[3]|max_length[500]',
            'autre'       => 'required'
        ];

        if (!$this->validate($rules)) {
            // Retour JSON des erreurs de validation
            return $this->response->setJSON([
                'status' => 'validation',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Sauvegarde dans la base
        $model = new Tarif_model();
        $data = [
            'tarif'       => $this->request->getPost('tarif'),
            'description' => $this->request->getPost('description'),
            'autre'       => $this->request->getPost('autre')
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ajout réussie !',
        ]);
    }


    public function getInfo()
    {
        $model = new Tarif_model();
        $users = $model->findAll();

        if ($users) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $users
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Aucun contenu'
            ]);
        }
    }

    public function delete($id = null)
    {
        $model = new Tarif_model();
        $hero = $model->find($id);
        if ($this->request->isAJAX()) {
            if ($id === null) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'ID manquant'
                ]);
            }

            if ($model->delete($id)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Tarif supprimé avec succès.'
                ]);
            } else {
                return $this->response->setStatusCode(500)->setJSON([
                    'status' => 'error',
                    'message' => 'Échec de la suppression.'
                ]);
            }
        }

        return $this->response->setStatusCode(403)->setJSON([
            'status' => 'error',
            'message' => 'Requête non autorisée.'
        ]);
    }

    public function getTarif($id)
    {
        $id = intval($id);
        $model = new Tarif_model();
        $user = $model->getTarifById($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tarif introuvable']);
        }
    }

    public function update() {
        $model = new Tarif_model();
        $id = $this->request->getPost('idUtilisateur');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        $data = [
            'tarif'       => $this->request->getPost('tarif'),
            'description' => $this->request->getPost('description'),
            'autre'       => $this->request->getPost('autre')
        ];

        $model->save($data);

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Modification réussie']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Échec de la mise à jour']);
        }
    }
}