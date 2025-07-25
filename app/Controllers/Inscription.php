<?php

namespace App\Controllers;

use App\Models\Inscription_model;

class Inscription extends BaseController
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
    public function index()
    {
        $content = view('pages/inscription');
        return $this->template('Inscription', 'inscription.css', $content, 'inscription.js');
    }

    public function save()
    {
        helper(['form']);

        $rules = [
            'nom'       => 'required|min_length[3]|max_length[20]',
            'prenom'    => 'required|min_length[3]|max_length[20]',
            'email'     => 'required|valid_email|is_unique[utilisateur.email]',
            'telephone' => 'required|min_length[10]|max_length[20]',
            'entreprise' => 'required|min_length[3]|max_length[20]',
            'password'  => 'required|min_length[6]',
            'password1' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            // Retour JSON des erreurs
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $model = new Inscription_model();
        $data = [
            'nom'       => $this->request->getPost('nom'),
            'prenom'    => $this->request->getPost('prenom'),
            'email'     => $this->request->getPost('email'),
            'telephone' => $this->request->getPost('telephone'),
            'entreprise' => $this->request->getPost('entreprise'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        $model->save($data);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Inscription réussie !',
            'redirect' => ''
        ]);
    }
    public function login()
    {
        $model = new Inscription_model();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {

                // Créer la session locale (facultatif si elle n’est pas utilisée ici)
                $session = session();
                $session->set([
                    'idUtilisateur' => $user['idUtilisateur'],
                    'nom'   => $user['nom'],
                    'email'    => $user['email'],
                    'isLoggedIn' => true
                ]);

                // Retourne l'URL vers le nouveau domaine
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Connexion réussie',
                    'redirect' => ''
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Mot de passe incorrect',
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email non trouvé',
            ]);
        }
    }

    public function getAllUser()
    {
        $model = new Inscription_model();
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

            $model = new Inscription_model();
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

            $model = new Inscription_model();

            if ($model->delete($id)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Utilisateur supprimé avec succès.'
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

    public function getUtilisateur($id)
    {
        $model = new Inscription_model();
        $user = $model->getUtilisateurById($id);

        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Utilisateur introuvable']);
        }
    }

    public function updateUtilisateur()
    {
        $model = new \App\Models\Inscription_model();

        $id = $this->request->getPost('idUtilisateur');

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
