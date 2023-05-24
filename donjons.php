<?php

    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_SESSION['perso'])) {
        header('Location: persos.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM donjons";

    $sth = $bdd->prepare($sql);
        
    $sth->execute();

    $donjons = $sth->fetchAll();
?>
<?php require_once('_header.php'); ?>
<section>
    <div class="container">
        <h1 class="text-center"><?php echo $_SESSION['perso']['name']; ?> (<a href="persos.php">Changer</a>)</h1>
        <div class="text-center">
            <ul class="donjon-list">
                <?php foreach($donjons as $donjon) { ?>
                    <li><a href="donjon_play.php?id=<?php echo $donjon['id']; ?>">
                        <?php echo $donjon['name']; ?>
                    </a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </section>
</body>
</html>





