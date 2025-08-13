<?php

namespace App\Controllers;

use App\Models\Admin_model;

class Admin extends BaseController
{
    // Affiche le formulaire de changement de mot de passe
    private function template($title, $link, $page, $script = null)
    {
        return view('template/template_view', [
            "page" => $page,
            "title" => $title,
            "link" => $link,
            "script" => $script
        ]);
    }

    private function checkSession()
    {
        if (!session()->get('isLoggedIn')) {

            redirect()->to(base_url('admin'))->send();
            exit;
        }
    }

    public function index()
    {
        $content = view('pages/login_admin');
        return $this->template('Admin | Login', 'admin.css', $content, 'admin.js');
    }

    public function login()
    {
        helper(['form']);
        $model = new Admin_model();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = \Config\Services::session();
                $session->set([
                    'idAdmin' => $user['idAdmin'],
                    'nom' => $user['nom'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);

                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Connexion réussie',
                    'redirect' => base_url('admin/dashboard')
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Mot de passe incorrect'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email non trouvé',
            ]);
        }
    }

    public function changePassword()
    {
        $this->checkSession();
        $content = view('pages/admin_change_password');
        return $this->template('Changer le mot de passe', 'admin.css', $content,'admin.js');
    }

    // Traite la soumission du formulaire de changement de mot de passe
    public function updatePassword()
    {
        $this->checkSession();
        $model = new \App\Models\Admin_model();
        $session = session();
        $adminId = $session->get('idAdmin');
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Vérifier que les champs sont remplis
        if (!$oldPassword || !$newPassword || !$confirmPassword) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires.');
        }

        // Vérifier la correspondance des nouveaux mots de passe
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Les nouveaux mots de passe ne correspondent pas.');
        }

        // Récupérer l'admin courant
        $admin = $model->find($adminId);
        if (!$admin) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        // Vérifier l'ancien mot de passe
        if (!password_verify($oldPassword, $admin['password'])) {
            return redirect()->back()->with('error', 'Ancien mot de passe incorrect.');
        }

        // Mettre à jour le mot de passe
        $model->update($adminId, ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);
        return redirect()->to(base_url('admin'))->with('success', 'Mot de passe modifié avec succès.');
    }

    // public function insert()
    // {
    //     $nom = "tsiky";
    //     $prenom = "Rajaonarivelo";
    //     $email = "tsiky.@gmail.com";
    //     $password = "12345678";

    //     $model = new Admin_model();
    //     $model->save([
    //         'nom' => $nom,
    //         'prenom' => $prenom,
    //         'email' => $email,
    //         'password' => password_hash($password, PASSWORD_DEFAULT)
    //     ]);
    // }

    public function dashboard()
    {
        $this->checkSession();
        $content = view('pages/dashboard');
        return $this->template('Admin | Dashboard', 'dash.css', $content, 'dash.js');
    }

    public function utilisateur()
    {
        $this->checkSession();
        $content = view('pages/utilisateur');
        return $this->template('Admin | Utilisateurs', 'utilisateur.css', $content, 'utilisateur.js');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('admin'));
    }

    public function hero()
    {
        $this->checkSession();
        $content = view('pages/hero');
        return $this->template('Hero', 'dash.css', $content, 'hero.js');
    }

    public function tarif()
    {
        $this->checkSession();
        $content = view('pages/tarif');
        return $this->template('Tarifs', 'dash.css', $content, 'tarif.js');
    }

    public function blog()
    {
        $this->checkSession();
        $content = view('pages/blog');
        return $this->template('Blog', 'dash.css', $content, 'blog.js');
    }

    public function solution()
    {
        $this->checkSession();
        $content = view('pages/solution');
        return $this->template('Nos solution', 'dash.css', $content, 'solution.js');
    }

    public function expertise()
    {
        $this->checkSession();
        $content = view('pages/expertise');
        return $this->template('Expertises', 'dash.css', $content, 'expertise.js');
    }

    public function statistique()
    {
        $this->checkSession();
        $content = view('pages/statistique');
        return $this->template('Statistique', 'dash.css', $content, 'statistique.js');
    }

    public function service()
    {
        $this->checkSession();
        $content = view('pages/service');
        return $this->template('Service', 'dash.css', $content, 'service.js');
    }

    public function apropos()
    {
        $this->checkSession();
        $content = view('pages/apropos');
        return $this->template('A-propos', 'dash.css', $content, 'apropos.js');
    }

    public function contact()
    {
        $this->checkSession();
        $content = view('pages/contact');
        return $this->template('Contact', 'dash.css', $content, 'contact.js');
    }

    public function CGV ()
    {
        $this->checkSession();
        $content = view('pages/cgv');
        return $this->template('Conditions Générales de Vente', 'dash.css', $content, 'condition.js');
    }

    public function CGU ()
    {
        $this->checkSession();
        $content = view('pages/cgu');
        return $this->template('Conditions Générales d\'Utilisation', 'dash.css', $content, 'condition.js');
    }

    public function politiqueConfidentialite ()
    {
        $this->checkSession();
        $content = view('pages/politique');
        return $this->template('Politique de Confidentialité', 'dash.css', $content, 'condition.js');
    }

    public function FAQ ()
    {
        $this->checkSession();
        $content = view('pages/faq');
        return $this->template('FAQ', 'dash.css', $content, 'condition.js');
    }

}
