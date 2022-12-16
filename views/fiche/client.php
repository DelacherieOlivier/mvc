<!--afficher les information du client-->
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Client</h1>
            <p>id : <?= $client->getId() ?></p>
            <p>Nom : <?= $client->getNom() ?></p>
            <p>Prenom : <?= $client->getPrenom() ?></p>
            <p>Telephone : <?= $client->getTelephone() ?></p>
            <p>Email : <?= $client->getEmail() ?></p>
        </div>
    </div>
</div>
<div class="container">
    <h2>Produit</h2>
    <ul>
        <?php foreach($client->lesProduits() as $leProduit){ ?>
            <li> <?= $leProduit->toString(); ?> </li>
        <?php } ?>
    </ul>
    <h2>add produit</h2>
    <form action="/client/<?= $client->getId() ?>" method="post">
        <input type="hidden" name="idClient" value="<?= $client->getId() ?>">
        <input type="text" name="nomProduit" placeholder="nom du produit">
        <input type="text" name="prixProduit" placeholder="prix du produit">
        <input type="submit" value="Ajouter">
    </form>
</div>
<div class="container">
    <h2>adresse</h2>
    <ul>
        <?php foreach($client->lesAdresses() as $lAdresse){ ?>
            <li> <?= $lAdresse->toString(); ?> </li>
        <?php } ?>
    </ul>
    <h2>add adresse</h2>
    <form action="/client/<?= $client->getId() ?>" method="post">
        <input type="text" name="rue" placeholder="rue">
        <input type="text" name="ville" placeholder="ville">
        <input type="text" name="codePostal" placeholder="codePostal">
        <input type="submit" value="add">
    </form>
</div>
