<?php

namespace App\Controllers;

use App\Models\Contact_model;

class Contact extends BaseController
{
    public function create()
    {
        helper(['form']);

        $rules = [
            'numero'       => 'required',
            'adresse' => 'required|min_length[3]|max_length[500]',
            'email'       => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            // Retour JSON des erreurs de validation
            return $this->response->setJSON([
                'status' => 'validation',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Sauvegarde dans la base
        $model = new Contact_model();
        $data = [
            'numero'       => $this->request->getPost('numero'),
            'adresse' => $this->request->getPost('adresse'),
            'email'       => $this->request->getPost('email')
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ajout réussie !',
        ]);
    }


    public function getInfo()
    {
        $model = new Contact_model();
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
        $model = new Contact_model();
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

    public function getContact($id)
    {
        $id = intval($id);
        $model = new Contact_model();
        $user = $model->getContactById($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tarif introuvable']);
        }
    }

    public function update() {
        $model = new Contact_model();
        $id = $this->request->getPost('idContact');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        $data = [
            'numero'  => $this->request->getPost('numero'),
            'adresse' => $this->request->getPost('adresse'),
            'email'   => $this->request->getPost('email')
        ];

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Modification réussie']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Échec de la mise à jour']);
        }
    }
}