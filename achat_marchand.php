<?php

    require_once("functions.php");

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    if (isset($_GET["item_id"])) {

        //dd($_SESSION);

        switch ($_GET["item_id"]){
            case mitaine :

                if ($_SESSION['perso']['gold'] < 25) {
                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter des mitaines');
                    exit();
                } else {


                    $sql = "UPDATE persos SET `gold` = :gold, `for` = :for WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'        => $_SESSION['perso']['gold'] - 25,
                        'for'       => $_SESSION['perso']['for'] + 1,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 25;
                    $_SESSION['perso']['for'] = $_SESSION['perso']['for'] + 1;

                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Vous avez acheté des mitaines!!!');
                    exit();
                
                 }


                break;

            case couteau :

                if ($_SESSION['perso']['gold'] < 60) {
                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter un couteau...');
                    exit();
                } else {

                    $sql = "UPDATE persos SET `gold` = :gold, `for` = :for WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'        => $_SESSION['perso']['gold'] - 60,
                        'for'       => $_SESSION['perso']['for'] + 3,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 60;
                    $_SESSION['perso']['for'] = $_SESSION['perso']['for'] + 3;
                
                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Vous avez acheté un couteau !!!');
                    exit();

                 }
                 
                

                break;

            case "épée longue" :
                
                if ($_SESSION['perso']['gold'] < 110) {
                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Or insuffisant pour acheter une épée longue...');
                    exit();
                } else {

                    

                    $sql = "UPDATE persos SET `gold` = :gold, `for` = :for WHERE id = :id AND user_id = :user_id;";
            
                    $sth = $bdd->prepare($sql);
        
                     $sth->execute([
                        'gold'      => $_SESSION['perso']['gold'] - 110,
                        'for'       => $_SESSION['perso']['for'] + 6,
                        'id'        => $_SESSION['perso']['id'],
                        'user_id'   => $_SESSION['user']['id']
                    ]);

                    $_SESSION['perso']['gold'] = $_SESSION['perso']['gold'] - 110;
                    $_SESSION['perso']['for'] = $_SESSION['perso']['for'] + 6;

                    header('Location: marchand.php?id=' . $_GET['id'] . '&msg=Vous avez acheté une épée longue!!!');
                    exit();

                 }
               
                break;
        }

    }

    header('Location: marchand.php?id='.$_GET['id']);

?>

