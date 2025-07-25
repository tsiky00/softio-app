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
        return $this->template('Insription', 'inscription.css', $content, 'inscription.js');
    }

    public function seConnecte()
    {
        $content = view('pages/connect');
        return $this->template('Se connecté', 'connect.css', $content, 'connect.js');
    }
}
