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
    $_SESSION['resultat_insert'] = null;
    $_SESSION['id_client'] = null;
    // info client
    $nom_client = $_POST["nom_client"];
    $prenom_client = $_POST["prenom_client"];
    $cin_client = $_POST["cin_client"];
    // $num_pasport = $_POST["num_pasport"];
    // $phon_client = $_POST["phon"];
    $email_client = $_POST["email"];
    $password = $_POST["ConfirmMotpass"];
    // $statut_client = $_POST["statut"];
    $statut_client=isset($_GET['statut']) ? $_GET['statut'] : die('ERROR: Record statut not found.');


    if(isset($_POST["submit"])){
        $query0 = "SELECT `id`, `statut` FROM `user` WHERE `user`.`email`='{$email_client}'";
        $result0 = mysqli_query($conn,$query0);
        if(mysqli_num_rows($result0) >0){
            while($row0 = mysqli_fetch_assoc($result0)){
                $rol_client = $row0['statut'];
            }
            $_SESSION['resultat_insert'] = 'votre email existe deja comme :'. $rol_client;
            header('Location:'.'errur.php');
            exit();
        }else{
            if($statut_client == 'User'){
                $sql = "INSERT INTO `user`(`nom`, `prenom`, `email`,`password`, `statut`, `cin`) VALUES ('{$nom_client}','{$prenom_client}','{$email_client}','{$password}','{$statut_client}','_')";
                if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                    $_SESSION['resultat_insert'] = 'User Ajouté Avec Succes';

                    // GET ID Client INSERT
                    $latest_id_client = $conn->insert_id; 
                    $_SESSION['id_client'] = $latest_id_client;

                    header('Location:'.'user.php');
                    exit();
                }else{
                    $_SESSION['resultat_insert'] = 'User pas Ajouté Avec Succes';
                    header('Location:'.'errur.php');
                    exit();
                }
            }else if($statut_client == 'Admin'){
                $query1 = "SELECT `id`, `statut` FROM `user` WHERE `user`.`cin`='{$cin_client}'";
                $result1 = mysqli_query($conn,$query1);
                if(mysqli_num_rows($result1) >0){
                    while($row1 = mysqli_fetch_assoc($result1)){
                        $rol_client = $row1['statut'];
                    }
                    $_SESSION['resultat_insert'] = 'votre CIN existe deja comme :'. $rol_client;
                    header('Location:'.'errur.php');
                    exit();
                }else{
                    $sql = "INSERT INTO `user`(`nom`, `prenom`, `email`,`password`, `statut`, `cin`) VALUES ('{$nom_client}','{$prenom_client}','{$email_client}','{$password}','{$statut_client}','{$cin_client}')";
                    if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                        $_SESSION['resultat_insert'] = 'Admin Ajouté Avec Succes';

                        // GET ID Client INSERT
                        $latest_id_client = $conn->insert_id; 
                        $_SESSION['id_client'] = $latest_id_client;

                        header('Location:'.'admin.php');
                        exit();
                    }else{
                        $_SESSION['resultat_insert'] = 'Admin pas Ajouté Avec Succes';
                        header('Location:'.'errur.php');
                        exit();
                    }
                }
            }else{
                $_SESSION['resultat_insert'] = 'Atontion errur ser votre status';
                header('Location:'.'errur.php');
                exit();
            }

        }
    }
?>