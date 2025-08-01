<?php

namespace App\Controllers;

use App\Models\Admin_model;

class Admin extends BaseController
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

    private function checkSession()
    {
        if (!session()->get('isLoggedIn')) {
            // Redirection propre avec exit
            redirect()->to(base_url('admin'))->send();
            exit; // ⛔️ Obligatoire pour stopper ici
        }
    }

    public function index(): string
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
                $session = session();
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

    public function insert()
    {
        $nom = "tsiky";
        $prenom = "Rajaonarivelo";
        $email = "tsiky.@gmail.com";
        $password = "12345678";

        $model = new Admin_model();
        $model->save([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

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

    public function apropos()
    {
        // facultatif : à protéger si nécessaire
        $content = view('pages/apropos');
        return $this->template('A propos', 'apropos.css', $content, 'apropos.js');
    }

    public function hero()
    {
        $this->checkSession();
        $content = view('pages/hero');
        return $this->template('Hero', 'hero.css', $content, 'hero.js');
    }

    public function tarif()
    {
        $this->checkSession();
        $content = view('pages/tarif');
        return $this->template('Tarifs', 'tarif.css', $content, 'tarif.js');
    }

    public function blog()
    {
        $this->checkSession();
        $content = view('pages/blog');
        return $this->template('Blog', 'blog.css', $content, 'blog.js');
    }

    public function solution()
    {
        $this->checkSession();
        $content = view('pages/solution');
        return $this->template('Nos solution', 'solution.css', $content, 'solution.js');
    }

    public function expertise()
    {
        $this->checkSession();
        $content = view('pages/expertise');
        return $this->template('Expertises', 'expertise.css', $content, 'expertise.js');
    }

    public function statistique()
    {
        $this->checkSession();
        $content = view('pages/statistique');
        return $this->template('Statistique', 'statistique.css', $content, 'statistique.js');
    }
}
