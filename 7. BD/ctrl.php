<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcKomunikat'); // akcja DOMYŚLNA, wyświetla powiadomienie pod kalkulatorem
getRouter()->setLoginRoute('login'); // akcja, gdy BRAK DOSTĘPU

getRouter()->addRoute('calcKomunikat', 'CalcCtrl',  ['user','admin']); // calcKomunikat >> CalcCtrl.php >> action_calcKomunikat()
getRouter()->addRoute('calcCompute', 'CalcCtrl',  ['user','admin']);
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl', ['user','admin']);
getRouter()->addRoute('results', 'ResultsCtrl', ['user','admin']);

getRouter()->go(); 
