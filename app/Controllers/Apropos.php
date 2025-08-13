<?php

namespace App\Controllers;

use App\Models\Apropos_model;

class Apropos extends BaseController
{
    public function create()
    {
        helper(['form']);

        $rules = [
            'titre'       => 'required|min_length[3]|max_length[202]',
            'description' => 'required|min_length[3]|max_length[500]',
            'image'       => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'validation',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $file = $this->request->getFile('image');
        $newName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/uploads', $newName);
        }

        $model = new Apropos_model();
        $data = [
            'titre'       => $this->request->getPost('titre'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName
        ];

        if ($model->save($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Ajout réussie !',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Erreur lors de l\'ajout.'
            ]);
        }
    }


    public function getInfo()
    {
        $model = new Apropos_model();
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
        $model = new Apropos_model();
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
                    'message' => 'Apropos supprimé avec succès.'
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

    public function getApropos($id)
    {
        $id = intval($id);
        $model = new Apropos_model();
        $user = $model->getAproposById($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Apropos introuvable']);
        }
    }

    public function update()
    {
        $model = new Apropos_model();
        $id = $this->request->getPost('idApropos');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        $data = [
            'titre'       => $this->request->getPost('titre'),
            'description' => $this->request->getPost('description')
        ];

        // Gestion de l'image si modifiée
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/uploads', $newName);
            $data['image'] = $newName;
        } else {
            // Si pas de nouvelle image, garder l'ancienne
            $old = $model->find($id);
            if ($old && isset($old['image'])) {
                $data['image'] = $old['image'];
            }
        }

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Modification réussie']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Échec de la mise à jour']);
        }
    }
}
