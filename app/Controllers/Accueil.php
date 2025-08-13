<?php

namespace App\Controllers;

class Accueil extends BaseController
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
        $content = view('pages/home');
        return $this->template('Accueil', 'style.css', $content, 'script.js');
    }

    public function menu2()
    {
        $content = view('pages/menu2');
        return $this->template('Menu 2', 'style.css', $content, 'script.js');
    }

    public function inscription()
    {
        $content = view('pages/inscription');
        return $this->template('Inscription', 'inscription.css', $content, 'inscription.js');
    }

    public function seConnecte()
    {
        $content = view('pages/connect');
        return $this->template('Se connecter', 'connect.css', $content, 'connect.js');
    }

    public function cgv()
    {
        $content = view('pages/cgv/cgv');
        return $this->template('CGV', 'cgv.css', $content, 'script.js');
    }

    public function cgu()
    {
        $content = view('pages/cgv/cgu');
        return $this->template('CGU', 'cgv.css', $content, 'script.js');
    }

    public function politique()
    {
        $content = view('pages/cgv/politique');
        return $this->template('Politique de confidentialité', 'cgv.css', $content, 'script.js');
    }

    public function faq()
    {
        $content = view('pages/cgv/faq');
        return $this->template('FAQ', 'cgv.css', $content, 'script.js');
    }
}
