<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Accueil::index');
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

/* section utilisateur */
$routes->get('admin/get-users', 'Inscription::getAllUser');
$routes->post('admin/create', 'Inscription::create');
$routes->post('admin/delete/(:num)', 'Inscription::delete/$1');
$routes->get('admin/get-user/(:num)', 'Inscription::getUtilisateur/$1');
$routes->post('admin/update-user', 'Inscription::updateUtilisateur');

/* produit */
$routes->get('admin/get-all-user', 'Produit::getAllUser');
$routes->post('admin/create-produit', 'Produit::create');
$routes->post('admin/delete-produit/(:num)', 'Produit::delete/$1');
$routes->get('admin/get-produit/(:num)', 'Produit::getProduit/$1');
$routes->post('admin/update-produit', 'Produit::updateProduit');

/* categorie */
$routes->get('admin/hero', 'Admin::hero');
$routes->get('admin/service', 'Admin::service');
$routes->get('admin/solution', 'Admin::solution');
$routes->get('admin/tarifs', 'Admin::tarif');
$routes->get('admin/blog', 'Admin::blog');
$routes->get('admin/statistique', 'Admin::statistique');
$routes->get('admin/expertise', 'Admin::expertise');
$routes->get('admin/apropos', 'Admin::apropos');
$routes->get('admin/contact', 'Admin::contact');

/* section hero */
$routes->post('admin/hero/create', 'Hero::create');
$routes->get('getInfoHero', 'Hero::getInfo');
$routes->post('admin/hero/delete/(:num)', 'Hero::delete/$1');
$routes->get('admin/hero/get-hero/(:num)', 'Hero::getHero/$1');
$routes->post('admin/hero/update-hero', 'Hero::updateHero');
$routes->get('admin/getInfoHero', 'Hero::getInfo');

/* section apropos */
$routes->post('admin/apropos/create', 'Apropos::create');
$routes->get('getInfoApropos', 'Apropos::getInfo');
$routes->post('admin/apropos/delete/(:num)', 'Apropos::delete/$1');
$routes->get('admin/apropos/get-apropos/(:num)', 'Apropos::getApropos/$1');
$routes->post('admin/apropos/update-apropos', 'Apropos::update');
$routes->get('admin/getInfoApropos', 'Apropos::getInfo');

/* section solution */
$routes->post('admin/solution/create', 'Solution::create');
$routes->get('getInfoSolution', 'Solution::getInfo');
$routes->post('admin/solution/delete/(:num)', 'Solution::delete/$1');
$routes->get('admin/solution/get-solution/(:num)', 'Solution::getSolution/$1');
$routes->post('admin/solution/update-solution', 'Solution::update');
$routes->get('admin/getInfoSolution', 'Solution::getInfo');

/* section tarifs */
$routes->post('admin/tarif/create', 'Tarif::create');
$routes->get('getInfoTarif', 'Tarif::getInfo');
$routes->post('admin/tarif/delete/(:num)', 'Tarif::delete/$1');
$routes->get('admin/tarif/get-tarif/(:num)', 'Tarif::getTarif/$1');
$routes->post('admin/tarif/update-tarif', 'Tarif::update');
$routes->get('admin/getInfoTarif', 'Tarif::getInfo');

/* section expertise */
$routes->post('admin/expertise/create', 'Expertise::create');
$routes->get('getInfoExpertise', 'Expertise::getInfo');
$routes->post('admin/expertise/delete/(:num)', 'Expertise::delete/$1');
$routes->get('admin/expertise/get-expertise/(:num)', 'Expertise::getExpertise/$1');
$routes->post('admin/expertise/update-expertise', 'Expertise::update');
$routes->get('admin/getInfoExpertise', 'Expertise::getInfo');

/* section service */
$routes->post('admin/service/create', 'Service::create');
$routes->get('getInfoService', 'Service::getInfo');
$routes->post('admin/service/delete/(:num)', 'Service::delete/$1');
$routes->get('admin/service/get-service/(:num)', 'Service::getService/$1');
$routes->post('admin/service/update-service', 'Service::update');
$routes->get('admin/getInfoService', 'Service::getInfo');

/* section contact */
$routes->post('admin/contact/create', 'Contact::create');
$routes->get('getInfoContact', 'Contact::getInfo');
$routes->post('admin/contact/delete/(:num)', 'Contact::delete/$1');
$routes->get('admin/contact/get-contact/(:num)', 'Contact::getContact/$1');
$routes->post('admin/contact/update-contact', 'Contact::update');
$routes->get('admin/getInfoContact', 'Contact::getInfo');

/* send message */
$routes->post('send-message', 'Message::save') ;

/* changement de mot de passe */
$routes->get('admin/change-password', 'Admin::changePassword');
$routes->post('admin/update-password', 'Admin::updatePassword');

/* conditions */
$routes->get('admin/cgv', 'Admin::CGV');
$routes->get('admin/cgu', 'Admin::CGU');
$routes->get('admin/politique', 'Admin::politiqueConfidentialite');
$routes->get('admin/faq', 'Admin::FAQ');

/* cgv front end */
$routes->get('cgv', 'Accueil::cgv');
$routes->get('cgu', 'Accueil::cgu');
$routes->get('politique', 'Accueil::politique');
$routes->get('faq', 'Accueil::faq');    

/* commentaires */
