<?php

    require_once("functions.php");

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    if (isset($_GET["potion_id"])) {


        switch ($_GET["potion_id"]){
            case "vie max" :

                if ($_SESSION['perso']['gold'] < 150) {
                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter une potion de vie...');
                    exit();
                } else {


                    $sql = "UPDATE persos SET `gold` = :gold, `max_pdv` = :max_pdv WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'        => $_SESSION['perso']['gold'] - 150,
                        'max_pdv'       => $_SESSION['perso']['max_pdv'] + 10,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 150;
                    $_SESSION['perso']['max_pdv'] = $_SESSION['perso']['max_pdv'] + 10;

                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Vous avez acheté ume potion de pv max!!!');
                    exit();
                
                 }


                break;

            case vitesse :

                if ($_SESSION['perso']['gold'] < 150) {
                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter une potion de vitesse...');
                    exit();
                } else {

                    $sql = "UPDATE persos SET `gold` = :gold, `vit` = :vit WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'        => $_SESSION['perso']['gold'] - 150,
                        'vit'       => $_SESSION['perso']['vit'] + 10,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 150;
                    $_SESSION['perso']['vit'] = $_SESSION['perso']['vit'] + 10;
                
                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Vous avez acheté une potion de vitesse !!!');
                    exit();

                 }

                break;

            case intelligence :
                
                if ($_SESSION['perso']['gold'] < 150) {
                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter une potion d\'intelligence...');
                    exit();
                } else {

                    

                    $sql = "UPDATE persos SET `gold` = :gold, `int` = :int WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'      => $_SESSION['perso']['gold'] - 150,
                        'int'       => $_SESSION['perso']['int'] + 10,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 150;
                    $_SESSION['perso']['int'] = $_SESSION['perso']['int'] + 10;

                    header('Location: sorciere.php?id=' . $_GET['id'] . '&msg=Vous avez acheté une potion d\'intelligence!!!');
                    exit();

                 }
               
                break;
        }

    }

    header('Location: sorciere.php?id='.$_GET['id']);

?>

