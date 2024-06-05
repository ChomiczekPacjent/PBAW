<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('showMainPage'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('showMainPage',    'MainCtrl');
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
Utils::addRoute('showResults',   'TourCtrl', ['admin']);

Utils::addRoute('Shop',          'ShopCtrl');
Utils::addRoute('showShop',       'ShopCtrl');
Utils::addRoute('Play',          'ShopCtrl');
Utils::addRoute('AddToCart',     'ShopCtrl');

Utils::addRoute('play',     'PlayCtrl');


//Utils::addRoute('search', 'SearchControl', ['admin', 'user']);



