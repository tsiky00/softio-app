<?php

namespace App\Controllers;

use App\Models\Solution_model;

class Solution extends BaseController
{
    public function create()
    {
        helper(['form']);

        $rules = [
            'description' => 'required|min_length[3]|max_length[500]',
            'image'       => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            // Retour JSON des erreurs de validation
            return $this->response->setJSON([
                'status' => 'validation',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Récupération de l'image
        $file = $this->request->getFile('image');
        $newName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Renommer l'image de façon unique
            $newName = $file->getRandomName();
            // Déplacer l'image dans le dossier public/uploads/
            $file->move(FCPATH . 'assets/uploads', $newName);
        }

        // Sauvegarde dans la base
        $model = new Solution_model();
        $data = [
            'description' => $this->request->getPost('description'),
            'image'       => $newName // On stocke juste le nom du fichier
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ajout réussie !',
        ]);
    }


    public function getInfo()
    {
        $model = new Solution_model();
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
        $model = new Solution_model();
        $hero = $model->find($id);
        if ($this->request->isAJAX()) {
            if ($id === null) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'ID manquant'
                ]);
            }

            // Suppression du fichier image
            if (!empty($hero['image'])) {
                $imagePath = FCPATH . 'assets/uploads/' . $hero['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Supprime le fichier
                }
            }

            if ($model->delete($id)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Solution supprimé avec succès.'
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

    public function getSolution($id)
    {
        $id = intval($id);
        $model = new Solution_model();
        $user = $model->getSolutionById($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Solution introuvable']);
        }
    }

    public function update() {
        $model = new Solution_model();
        $id = $this->request->getPost('idUtilisateur');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        // Récupération de l'image
        $file = $this->request->getFile('image');
        $newName = null;

        $data = [
            'description' => $this->request->getPost('description'),
            'image'       => $newName
        ];

        $model->save($data);

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Modification réussie']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Échec de la mise à jour']);
        }
    }
}