<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

session_start();

$routes = new RouteCollection();

$routes->add('login', new Route('/login',
    array('controller' => 'LoginController' , 'method' => 'index' )));

$routes->add('signIn', new Route('/sign-in',
    array('controller' => 'LoginController' , 'method' => 'login' )));

$routes->add('index', new Route('/{page}',
    array('controller' => 'LogFileViewerController' , 'method' => 'index','page' => 1)));



