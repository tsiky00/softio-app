<?php

namespace App\Controllers;

use App\Models\Produit_model;

class Produit extends BaseController
{
    private function template($title, $link, $page, $script = null)
    {
        return view('template/template_view', [
            "page" => $page,
            "title" => $title,
            "link" => $link,
            "script" => $script
        ]);
    }
    public function index(): string
    {
        $content = view('pages/produit');
        return $this->template('Produit', 'produit.css', $content, 'produit.js');
    }

    public function getAllUser()
    {
        $model = new Produit_model();
        $users = $model->findAll();

        if ($users) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $users
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Aucun utilisateur trouvé'
            ]);
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $rules = [
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|valid_email|is_unique[utilisateur.email]',
                'telephone' => 'required',
                'entreprise' => 'required',
                'password' => 'required|min_length[6]',
                'password1' => 'required|matches[password]',
            ];

            if (!$validation->setRules($rules)->run($this->request->getPost())) {
                return $this->response->setJSON([
                    'status' => 'validation',
                    'errors' => $validation->getErrors()
                ]);
            }

            $model = new Produit_model();
            $data = [
                'nom' => $this->request->getPost('nom'),
                'prenom' => $this->request->getPost('prenom'),
                'email' => $this->request->getPost('email'),
                'telephone' => $this->request->getPost('telephone'),
                'entreprise' => $this->request->getPost('entreprise'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            $model->save($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Compte ajouté avec succès.'
            ]);
        }

        // Accès direct interdit
        return redirect()->to('/');
    }

    public function delete($id = null)
    {
        if ($this->request->isAJAX()) {
            if ($id === null) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status' => 'error',
                    'message' => 'ID manquant'
                ]);
            }
            $model = new Produit_model();

            if ($model->delete($id)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Produit supprimé avec succès.'
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

    public function getProduitById($id)
    {
        $model = new Produit_model();
        $user = $model->getProduitById($id);

        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Utilisateur introuvable']);
        }
    }

    public function updateProduit()
    {
        $model = new \App\Models\Produit_model();

        $id = $this->request->getPost('idProduit');

        if (!$id) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID manquant']);
        }

        $data = [
            'nom'        => $this->request->getPost('nom'),
            'prenom'     => $this->request->getPost('prenom'),
            'email'      => $this->request->getPost('email'),
            'telephone'  => $this->request->getPost('telephone'),
            'entreprise' => $this->request->getPost('entreprise'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($model->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Modification réussie']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Échec de la mise à jour']);
        }
    }
}
