<!-- form recherche-->
<form action="/clients" method="get">
    <input type="search" name="search" placeholder="Rechercher un client">
    <input type="submit" value="Rechercher">
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nom prenom</th>
        <th scope="col">telephone</th>
        <th scope="col">email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($clients as $client) {
        echo "<tr>";
        echo "<th scope='row'>" . $client->getId() . "</th>";
        echo "<td>" . $client->getNom() . " " . $client->getPrenom() . "</td>";
        echo "<td>" . $client->getTelephone() . "</td>";
        echo "<td>" . $client->getEmail() . "</td>";
        echo "<td> <a href='/client/" . $client->getId() . "'>Voir +</a></td>";
        echo "</tr>";
        echo "<tr>";
    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <?php if($page > 0){ ?>
                <?php if($search != null){ ?>
                    <a class="btn btn-secondary" href="/clients?page=<?= $page - 1 ?>&search=<?= $search ?>"> < </a>
                <?php }else{ ?>
                    <a class="btn btn-secondary" href="/clients?page=<?= $page - 1 ?>"> < </a>
                <?php } ?>
            <?php } ?>

            <?php if(count($clients) == 10) { ?>
                <?php if($search != null){ ?>
                    <a class="btn btn-secondary" href="/clients?page=<?= $page + 1 ?>&search=<?= $search ?>"> > </a>
                <?php }else{ ?>
                    <a class="btn btn-secondary" href="/clients?page=<?= $page + 1 ?>"> > </a>
                <?php } ?>
            <?php } ?>
        </td>
    </tr>
    </tbody>
</table>
