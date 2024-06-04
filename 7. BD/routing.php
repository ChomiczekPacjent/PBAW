<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('personList'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('personList',    'PersonListCtrl');

Utils::addRoute('loginShow',     'LoginCtrl');
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');

Utils::addRoute('register',        'RegisterCtrl');

Utils::addRoute('personNew',     'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personEdit',    'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personSave',    'PersonEditCtrl',	['user','admin']);
Utils::addRoute('personDelete',  'PersonEditCtrl',	['admin']);

Utils::addRoute('Tour',          'TourCtrl');

//Utils::addRoute('Shop',          'ShopCtrl'['user']);
//Utils::addRoute('Play',          'ShopCtrl'['user']);
//Utils::addRoute('AddToCart',     'ShopCtrl'['user']);

//Utils::addRoute('search', 'SearchControl', ['admin', 'moderator', 'user']);



