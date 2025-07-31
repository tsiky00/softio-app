<?php

namespace App\Controllers;

use App\Models\Hero_model;

class Hero extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function create()
    {
        helper(['form']);

        $rules = [
            'titre'       => 'required|min_length[3]|max_length[202]',
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
        $model = new Hero_model();
        $data = [
            'titre'       => $this->request->getPost('titre'),
            'description' => $this->request->getPost('description'),
            'image'       => $newName // On stocke juste le nom du fichier
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Ajout réussie !',
            'redirect' => ''
        ]);
    }


    public function getInfo()
    {
        $model = new Hero_model();
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
        $model = new Hero_model();
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
                    'message' => 'Héros supprimé avec succès.'
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

    public function getHero($id)
    {
        $id = intval($id);
        $model = new Hero_model();
        $user = $model->getHeroById($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Hero introuvable']);
        }
    }

    public function update() {
        $model = new Hero_model();
        $id = $this->request->getPost('idUtilisateur');
        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        // Récupération de l'image
        $file = $this->request->getFile('image');
        $newName = null;

        $data = [
            'titre'       => $this->request->getPost('titre'),
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
