<?php


    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }


// Exemple de liste d'objets
$potions = array(
    array("nom" => "vie max","vie" => 10, "prix" => 150),
    array("nom" => "vitesse","vitesse" => 10, "prix" => 150),
    array("nom" => "intelligence","intelligence" => 10, "prix" => 150),
);

require_once('_header.php');

if (isset($_GET['msg'])) {
    $erreur = $_GET['msg'];
    echo '<script type="text/javascript">alert("' . $erreur . '");</script>';
}

?>*
<style>
    body {
        background-image: url(img/witch.jpg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
        color: white; 
    }
</style>

    <table class="table">
        <thead>
            <tr>
                <td width="20%">Potions</td>
                <td>Stats ajoutées</td>
                <td>Prix</td>
                <td width="30%">Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($potions as $potions) { ?>
                <tr>
                    <td><?php echo $potions['nom']; ?></td>
                    <?php if(isset($potions['vie'])){ ?>

                        <td><?php echo $potions['vie']; ?></td>

                    <?php }
                    else if(isset($potions['vitesse'])){ ?>

                        <td><?php echo $potions['vitesse']; ?></td>

                    <?php }
                    else { ?>

                        <td><?php echo $potions['intelligence']; ?></td>

                    <?php } ?>
                    <td><?php echo $potions['prix']; ?></td>
                    <td>
                        <a 
                            class="btn btn-green"
                            href="achat_sorciere.php?potion_id=<?php echo $potions['nom']; ?>&id=<?php echo $_GET['id']; ?>">
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
            <b>Votre vie max:</b> <?php echo $_SESSION['perso']['max_pdv']; ?>
        </div>
        <div class="col">
            <b>Votre vitesse:</b> <?php echo $_SESSION['perso']['vit']; ?>
        </div>
        <div class="col">
            <b>Votre intelligence:</b> <?php echo $_SESSION['perso']['int']; ?>
        </div>
    </div>

    <div style="text-align: center; margin-top: 60px;">
        <a href='donjon_play.php?id=<?php echo $_GET['id']; ?>' class='me-2 btn btn-red' style="display: inline-block;">Continuer l'aventure</a>
    </div>



</body>
</html>
