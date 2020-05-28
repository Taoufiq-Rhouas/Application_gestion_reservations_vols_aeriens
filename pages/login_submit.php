<?php 
    if(!isset($_SESSION)){
        session_start();
    }
?>
<?php 
    // include("../includes/layout/public_theme/header.php");
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php");        
?>
<?php

    // $_SESSION['resultat_insert'] = null;
    $_SESSION['last_id_client'] = null;

    // info client
    $cin_client = $_POST["cin_client"];
    $email_client = $_POST["email"];
    $password = $_POST["motpass"];
    $statut_client=isset($_GET['statut']) ? $_GET['statut'] : die('ERROR: Record statut not found.');

    if(isset($_POST["submit"])){
        if($statut_client == 'User'){
            $query0 = "SELECT `id`,`nom`,`prenom`,`statut` FROM `user` WHERE `user`.`email`='{$email_client}' AND `user`.`password`='{$password}' AND `user`.`statut`='User'";
            $result0 = mysqli_query($conn,$query0);
            if(mysqli_num_rows($result0) == 1){
                while($row0 = mysqli_fetch_assoc($result0)){
                    $_SESSION['id_client'] = $row0['id'];
                    $rol_client = $row0['statut'];
                    $_SESSION['nom_client'] = $row0['nom'];
                    $_SESSION['prenom_client'] = $row0['prenom'];

                }
                // $_SESSION['resultat_insert'] = 'Opperation login pass avec succes comme :'. $rol_client.' .';
                header('Location:'.'user.php');
                exit();
            }else{
                $_SESSION['resultat_login'] = 'Email ou Passworde USER incoreect';
                header('Location:'.'login.php');
                exit();
            }
        }else if($statut_client == 'Admin'){
            $query0 = "SELECT `id`,`nom`,`prenom`,`statut` FROM `user` WHERE `user`.`cin`='{$cin_client}' AND `user`.`email`='{$email_client}' AND `user`.`password`='{$password}' AND `user`.`statut`='Admin'";
            $result0 = mysqli_query($conn,$query0);
            if(mysqli_num_rows($result0) == 1){
                while($row0 = mysqli_fetch_assoc($result0)){
                    $_SESSION['id_client'] = $row0['id'];
                    $rol_client = $row0['statut'];
                    $_SESSION['nom_client'] = $row0['nom'];
                    $_SESSION['prenom_client'] = $row0['prenom'];

                }
                // $_SESSION['resultat_insert'] = 'Opperation login pass avec succes comme :'. $rol_client.' .';
                header('Location:'.'admin.php');
                exit();
            }else{
                $_SESSION['resultat_login'] = 'Email ou Passworde ADMIN incoreect';
                header('Location:'.'login.php');
                exit();
            }
        }
    }

?>