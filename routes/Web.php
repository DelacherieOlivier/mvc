<?php

namespace routes;

use controllers\AuthControler;
use controllers\ClientController;
use controllers\FicheControleur;
use controllers\SampleWebController;
use controllers\TodoWeb;
use routes\base\Route;
use utils\SessionHelpers;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $todo = new TodoWeb();
        $auth = new AuthControler();
        $client = new ClientController();
        $fiche = new FicheControleur();

        // Appel la méthode « home » dans le contrôleur $main.

        Route::Add('/about', [$main, 'about']);

        // Exemple de limitation d'accès à une page en fonction de la SESSION.
        if (SessionHelpers::isLogin()) {
            Route::Add('/logout', [$main, 'home']);
            Route::Add('/', [$todo, 'liste']);
            Route::Add('/liste', [$todo, 'liste']);
            Route::Add('/ajouter', [$todo, 'ajouter']);
            Route::Add('/terminer', [$todo, 'terminer']);
            Route::Add('/supprimer', [$todo, 'supprimer']);
            Route::Add('/clients', [$client, 'liste']);
            Route::Add('/client/{id}', [$fiche, 'fiche']);
        } else {
            Route::Add('/', function () {
                header('Location: /login');
            });
            Route::Add('/login', [$auth, 'login']);
            Route::Add('/register', [$auth, 'register']);
        }
    }
}

