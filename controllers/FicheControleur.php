<?php
namespace controllers;

use controllers\base\WebController;
use models\ClientsModele;
use utils\Template;

class FicheControleur extends WebController
{
    function __construct()
    {
        $this->clientModel = new ClientsModele();
    }
    public function fiche($id="")
    {
        $infoClient = $this->clientModel->getByClientId($id);
        return Template::render("views/fiche/client.php", ["client" => $infoClient]);
    }



}