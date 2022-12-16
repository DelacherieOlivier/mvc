<?php
namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use utils\Template;

class ClientController extends WebController
{
    public function __construct()
    {
        $this->clientModel = new ClientsModele();
    }


    function liste($page = 0, $search = null): string
    {
        if ($search) {
            $clients = $this->clientModel->recherche($search,10, $page);
        } else {
            $clients = $this->clientModel->liste(10, $page);
        }
        return Template::render(
            "views/liste/listeClient.php",
            array("page" => $page, "clients" => $clients, "search" => $search)
        );
    }
}