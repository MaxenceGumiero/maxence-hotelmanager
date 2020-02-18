<?php

$router = $container->getRouter();
$router->setNamespace('App\Controller');

/**
 * Routes de base
 */
$router->get('', 'PagesController@index');                          // Page d'accueil contenant entre autres la liste des rooms
$router->post('/rooms/new/', 'PagesController@create');             // Traite le formulaire de création d'une room puis redirige
$router->get('/rooms/(\d+)/edit/', 'PagesController@edit');         // Affiche le formulaire d'édition d'une room
$router->post('/rooms/(\d+)/edit/', 'PagesController@update');      // Traite le formulaire d'édition d'une room puis redirige
$router->get('/rooms/(\d+)/delete/', 'PagesController@delete');     // Action de supprimer une room

/**
 * Routes ROOM
 */
$router->get('/rooms/(\d+)', 'RoomsController@show');               // Affichage d'une room
$router->get('/rooms/new/', 'RoomsController@new');                 // Affiche le formulaire de création d'une room

/**
 * Routes CLIENT
 */
$router->get('/clients', 'ClientsController@index');                // Affichage des clients
$router->get('/clients/(\d+)', 'ClientsController@show');           // Affichage de 1 client
$router->get('/clients/new/', 'ClientsController@new');             // Affiche le formulaire de création d'un client
$router->post('/clients/new/', 'ClientsController@create');         // Traite le formulaire de création d'un client puis redirige
$router->get('/clients/(\d+)/edit/', 'ClientsController@edit');     // Affiche le formulaire d'édition d'un client
$router->post('/clients/(\d+)/edit/', 'ClientsController@update');  // Traite le formulaire d'édition d'un client puis redirige
$router->get('/clients/(\d+)/delete/', 'ClientsController@delete'); // Action de supprimer un client


$router->run();