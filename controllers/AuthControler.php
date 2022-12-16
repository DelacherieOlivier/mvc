<?php

namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use utils\SessionHelpers;
use utils\Template;

class AuthControler extends WebController
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $email = $_POST['email'];
            if ($email && $password) {
                $user = AuthModel::getUser($password, $email);
               if (count($user) > 0) {
                   SessionHelpers::login($user);
                    $this->redirect('/');
                } else {
                    $this->redirect('/login');
                }
            }
        }
        return Template::render('views/auth/login.php');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            if ($email && $password) {
                $user = AuthModel::register($password, $email, $nom, $prenom);
                if ($user) {
                    $this->redirect('/');
                } else {
                    $this->redirect('/login');
                }
            }
        }
        return Template::render('views/auth/register.php');
    }

    public function logout()
    {
        $this->auth->logout();
        $this->redirect('/');
    }

}