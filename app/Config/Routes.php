<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('accueil', 'Accueil::index');
$routes->get('menu-2', 'Accueil::menu2');
$routes->get('inscription', 'Accueil::inscription');
$routes->get('se-connecter', 'Accueil::seConnecte');
$routes->post('save', 'Inscription::save');
$routes->post('login', 'Inscription::login');
$routes->get('admin', 'Admin::index');
$routes->post('login-admin', 'Admin::login');
$routes->post('insert-admin', 'Admin::insert');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/utilisateur', 'Admin::utilisateur');
$routes->get('deconnexion', 'Admin::logout');
$routes->get('admin/get-users', 'Inscription::getAllUser');
$routes->post('admin/create', 'Inscription::create');
$routes->post('admin/delete/(:num)', 'Inscription::delete/$1');
$routes->get('admin/get-user/(:num)', 'Inscription::getUtilisateur/$1');
$routes->post('admin/update-user', 'Inscription::updateUtilisateur');
/* produit */
$routes->get('admin/produit', 'Produit::index');
$routes->get('admin/get-all-user', 'Produit::getAllUser');
$routes->post('admin/create-produit', 'Produit::create');
$routes->post('admin/delete-produit/(:num)', 'Produit::delete/$1');
$routes->get('admin/get-produit/(:num)', 'Produit::getProduit/$1');
$routes->post('admin/update-produit', 'Produit::updateProduit');
/* categorie */
$routes->get('admin/hero', 'Admin::hero');
$routes->get('admin/apropos', 'Admin::apropos');
$routes->get('admin/produit', 'Admin::produit');
$routes->get('admin/contact', 'Admin::contact');
$routes->get('admin/prix', 'Admin::prix');
$routes->get('admin/blog', 'Admin::blog');
$routes->get('admin/fonctionnalite', 'Admin::fonctionnalite');

/* section hero */
$routes->post('admin/hero/create', 'Hero::create');
$routes->get('getInfoHero', 'Hero::getInfo');
$routes->post('admin/hero/delete/(:num)', 'Hero::delete/$1');
$routes->get('admin/hero/get-hero/(:num)', 'Hero::getHero/$1');
$routes->post('admin/hero/update-hero', 'Hero::updateHero');
$routes->get('admin/getInfoHero', 'Hero::getInfo');

/* sction apropos */