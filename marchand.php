<?php


    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }


// Exemple de liste d'objets
$items = array(
    array("nom" => "mitaine","attaque" => 1, "prix" => 25),
    array("nom" => "couteau","attaque" => 3, "prix" => 60),
    array("nom" => "épée longue","attaque" => 6, "prix" => 110),
);

require_once('_header.php');

if (isset($_GET['msg'])) {
    $erreur = $_GET['msg'];
    echo '<script type="text/javascript">alert("' . $erreur . '");</script>';
}

?>*
<style>
    body {
        background-image: url(img/marchand.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
        color: grey; 
    }
</style>

    <table class="table">
        <thead>
            <tr>
                <td width="20%">Nom</td>
                <td>Attaque</td>
                <td>Prix</td>
                <td width="30%">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <td><?php echo $item['nom']; ?></td>
                    <td><?php echo $item['attaque']; ?></td>
                    <td><?php echo $item['prix']; ?></td>
                    <td>
                        <a 
                            class="btn btn-green"
                            href="achat_marchand.php?item_id=<?php echo $item['nom']; ?>&id=<?php echo $_GET['id']; ?>">
                        Acheter</a>
                    </td>
                </tr>
            <?php } ?>
    </table>
    <div class="row mt-4" style="text-align: center; margin-top: 60px;">
        <div class="col">
            <b>Votre Or:</b> <?php echo $_SESSION['perso']['gold']; ?>
        </div>
        <div class="col">
            <b>Votre Force:</b> <?php echo $_SESSION['perso']['for']; ?>
        </div>
    </div>

    <div style="text-align: center; margin-top: 60px;">
        <a href='donjon_play.php?id=<?php echo $_GET['id']; ?>' class='me-2 btn btn-red' style="display: inline-block;">Continuer l'aventure</a>
    </div>



</body>
</html>

