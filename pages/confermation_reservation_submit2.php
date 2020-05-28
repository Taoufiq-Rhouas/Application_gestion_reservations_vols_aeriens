<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['id_client']==null){
        header('Location:'.'index.php');
        exit();
    }
?>
<?php 
    // include("../includes/layout/public_theme/header.php");
    include_once("../includes/functions.php");
    include_once("../includes/session.php");
    include_once("../data/connectdb.php");        
?>
<?php

    $id = $_SESSION['id_client'];
    $id = (int)$id;



















    $test_type = $_SESSION['passager_exist'];
    $id_vol = $_SESSION['id_voll'];
    $id_passager = $_SESSION["id_passager"];
    if($test_type === 'Validation@Type$1'){
        $sql = "INSERT INTO `reservations`(`id_vol`, `id_passager`) VALUES ({$id_vol},{$id_passager})";
        if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            $_SESSION['msg']=succes_msg(' Reservation passe sans errurs');
            redirect("admin.php");
        }else{

            $_SESSION['msg']=error_msg('errur sur lajout de cest reservation');
            redirect("reserve2.php");
            // header("Location:create_menu.php");
            // exit();
        }
    }else if($test_type === 'Validation@Type$2'){

        if(isset($_POST["submit"])){

            $query1 = "SELECT * FROM `user` WHERE `user`.`id` = $id";
            $result1 = mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1) >0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
                    // $_SESSION['cin_user'] = mysqli_real_escape_string($conn,$row1["cin"]);
                    $nom = mysqli_real_escape_string($conn,$row1["nom"]);
                    $prenom = mysqli_real_escape_string($conn,$row1["prenom"]);
                    $email = mysqli_real_escape_string($conn,$row1["email"]);
                    
                }
            }
            // $nom_passager = $_POST["nom_passager"];
            // $prenom_passager = $_POST["prenom_passager"];
            $date_de_naissance = $_POST["date_de_naissance"];
            // $email_passager = $_POST["email_passager"];
            // $cin_passager = $_POST["cin_passager"];
            $n_passport = $_POST["n_passport"];
            $phone_passager = $_POST["phone_passager"];



            // $nom_passager = mysqli_real_escape_string($conn,$nom_passager);
            // $prenom_passager = mysqli_real_escape_string($conn,$prenom_passager);
            // $date_de_naissance = mysqli_real_escape_string($conn,$date_de_naissance);
            // $email_passager = mysqli_real_escape_string($conn,$email_passager);
            // $cin_passager = mysqli_real_escape_string($conn,$cin_passager);
            // $n_passport = mysqli_real_escape_string($conn,$n_passport);
            
            echo"<br>".$nom."</br>";
            echo"<br>".$prenom."</br>";
            echo"<br>".$date_de_naissance."</br>";
            echo"<br>".$email."</br>";
            echo"<br>".$cin_user."</br>";
            echo"<br>".$n_passport."</br>";
            echo"<br>".$phone_passager."</br>";

            $sql = "INSERT INTO `passager`(`nom_passager`, `prenom_passager`, `date_de_naissance`, `phone_passager`, `email_passager`, `cin_passager`, `n_passport_passager`, `id_user_created`) VALUES ('{$nom}','{$prenom}','{$date_de_naissance}',{$phone_passager},'{$email}','{$cin_user}','{$n_passport}',{$id})";
            if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                $id_passager = $conn->insert_id; 
                $sql = "INSERT INTO `reservations`(`id_vol`, `id_passager`) VALUES ({$id_vol},{$id_passager})";
                if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                    $_SESSION['msg']=succes_msg(' Reservation 2 passe sans errurs');
                    redirect("admin.php");
                }else{

                    $_SESSION['msg']=error_msg('errur sur lajout de cest reservation');
                    redirect("reserve2.php");
                }
            }else{
    
                $_SESSION['msg']=error_msg('errur sur lajout de cest reservation');
                redirect("reserve2.php");
            }
        }

    }else {
        $_SESSION['msg']=error_msg('autre choix');
        redirect("reserve2.php");
    }



















        // if(isset($_POST["submit"])){

        //     $query1 = "SELECT * FROM `user` WHERE `user`.`id` = $id";
        //     $result1 = mysqli_query($conn,$query1);
        //     if(mysqli_num_rows($result1) >0){
        //         while($row1 = mysqli_fetch_assoc($result1)){
        //             $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
        //             // $_SESSION['cin_user'] = mysqli_real_escape_string($conn,$row1["cin"]);
        //             $nom = mysqli_real_escape_string($conn,$row1["nom"]);
        //             $prenom = mysqli_real_escape_string($conn,$row1["prenom"]);
        //             $email = mysqli_real_escape_string($conn,$row1["email"]);
                    
        //         }
        //     }
        //     // $nom_passager = $_POST["nom_passager"];
        //     // $prenom_passager = $_POST["prenom_passager"];
        //     $date_de_naissance = $_POST["date_de_naissance"];
        //     // $email_passager = $_POST["email_passager"];
        //     // $cin_passager = $_POST["cin_passager"];
        //     $n_passport = $_POST["n_passport"];
        //     $phone_passager = $_POST["phone_passager"];



        //     // $nom_passager = mysqli_real_escape_string($conn,$nom_passager);
        //     // $prenom_passager = mysqli_real_escape_string($conn,$prenom_passager);
        //     // $date_de_naissance = mysqli_real_escape_string($conn,$date_de_naissance);
        //     // $email_passager = mysqli_real_escape_string($conn,$email_passager);
        //     // $cin_passager = mysqli_real_escape_string($conn,$cin_passager);
        //     // $n_passport = mysqli_real_escape_string($conn,$n_passport);
            
        //     echo"<br>".$nom."</br>";
        //     echo"<br>".$prenom."</br>";
        //     echo"<br>".$date_de_naissance."</br>";
        //     echo"<br>".$email."</br>";
        //     echo"<br>".$cin_user."</br>";
        //     echo"<br>".$n_passport."</br>";
        //     echo"<br>".$phone_passager."</br>";

        //     $sql = "INSERT INTO `passager`(`nom_passager`, `prenom_passager`, `date_de_naissance`, `phone_passager`, `email_passager`, `cin_passager`, `n_passport_passager`, `id_user_created`) VALUES ('{$nom}','{$prenom}','{$date_de_naissance}',{$phone_passager},'{$email}','{$$cin_user}','{$n_passport}',{$id})";
        //     if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
        //         $_SESSION['msg']=succes_msg(' Reservation passe sans errurs');
        //         redirect("admin.php");
        //     }else{
    
        //         $_SESSION['msg']=error_msg('errur sur lajout de cest reservation');
        //         redirect("reserve2.php");
        //         // header("Location:create_menu.php");
        //         // exit();
        //     }
        // }else {
        //     $_SESSION['msg']=error_msg('autre choix');
        //     redirect("reserve2.php");
        // }
            


            


        // }else {
        //     $_SESSION['msg']=error_msg('autre choix');
        //     redirect("reserve2.php");
        // }
        // }else{
        //     redirect("add_vols.php");
        //     // header("Location:create_menu.php");
        //     // exit();
        // }
    // }

    //     $nom_passager = $_POST["nom_passager"];
    //     $prenom_passager = $_POST["prenom_passager"];
    //     $date_de_naissance = $_POST["date_de_naissance"];
    //     $email_passager = $_POST["email_passager"];
    //     $cin_passager = $_POST["cin_passager"];
    //     $n_passport = $_POST["n_passport"];




    //     $nom_passager = checkEmptyPage(check_input($_POST["nom_passager"]));
    //     $prenom_passager = checkEmptyPage(check_input($_POST["prenom_passager"]));
    //     $date_de_naissance = checkEmptyPage(check_input($_POST["date_de_naissance"]));
    //     $email_passager = checkEmptyPage(check_input($_POST["email_passager"]));
    //     $cin_passager = checkEmptyPage(check_input($_POST["cin_passager"]));
    //     $n_passport = checkEmptyPage(check_input($_POST["n_passport"]));



    //     $nom_passager = mysqli_real_escape_string($conn,$nom_passager);
    //     $prenom_passager = mysqli_real_escape_string($conn,$prenom_passager);
    //     $date_de_naissance = mysqli_real_escape_string($conn,$date_de_naissance);
    //     $email_passager = mysqli_real_escape_string($conn,$email_passager);
    //     $cin_passager = mysqli_real_escape_string($conn,$cin_passager);
    //     $n_passport = mysqli_real_escape_string($conn,$n_passport);
        
    //     echo"<br>".$nom_passager."</br>";
    //     echo"<br>".$prenom_passager."</br>";
    //     echo"<br>".$date_de_naissance."</br>";
    //     echo"<br>".$email_passager."</br>";
    //     echo"<br>".$cin_passager."</br>";
    //     echo"<br>".$n_passport."</br>";
        


        


    // }else {
    //     $_SESSION['msg']=error_msg('autre choix');
    //     redirect("reserve2.php");
    // }


    // if(isset($_POST["submit"])){
    //     // $id = $_SESSION['id_client'];
    //     // $id1 = (int)$id;

    //     // $menu = checkEmpty(check_input($_POST["menu"]));
    //     // $rank = (int) $_POST["rank"];


    //     // $menu2 = mysqli_real_escape_string($conn,$menu);


    //     // if(!empty($errors)){
    //     //     $_SESSION['errors']= $errors;
    //     //     redirect('edit_menu.php');
    //     // }


    //     // if(!empty($errors)){
    //     //     $_SESSION['errors']= $errors;
    //     //     redirect('edit_menu.php');
    //     // }

    //     $id_admin_created  = (int) $_SESSION['id_client'];
    //     // $nam_voll = $_POST["nam_voll"];
    //     // $price = $_POST["price"];
    //     // $image = $_POST["image"];
    //     // $pays_depart = $_POST["pays_depart"];
    //     // $pays_arrive = $_POST["pays_arrive"];
    //     // $date_vol = $_POST["date_vol"];
    //     // $hour_vol = $_POST["hour_vol"];
    //     // $minute_vol = $_POST["minute_vol"];
    //     // $nb_place_initial = $_POST["nb_place_initial"];



    //     $nam_voll1 = checkEmptyPage(check_input($_POST["nam_voll"]));
    //     $price1 = checkEmptyPage(check_input($_POST["price"]));
    //     $image1 = checkEmptyPage(check_input($_POST["image"]));
    //     $pays_depart1 = checkEmptyPage(check_input($_POST["pays_depart"]));
    //     $pays_arrive1 = checkEmptyPage(check_input($_POST["pays_arrive"]));
    //     $date_vol1 = checkEmptyPage(check_input($_POST["date_vol"]));
    //     $hour_vol1 = checkEmptyPage(check_input($_POST["hour_vol"]));
    //     $hour_vol1 = (int) $hour_vol1;
    //     $minute_vol1 = checkEmptyPage(check_input($_POST["minute_vol"]));
    //     $minute_vol1 = (int) $minute_vol1;
    //     $nb_place_initial1 = checkEmptyPage(check_input($_POST["nb_place_initial"]));
    //     $nb_place_initial1 = (int) $nb_place_initial1;




    //     $nam_voll = mysqli_real_escape_string($conn,$nam_voll1);
    //     $price = mysqli_real_escape_string($conn,$price1);
    //     $image = mysqli_real_escape_string($conn,$image1);
    //     $pays_depart = mysqli_real_escape_string($conn,$pays_depart1);
    //     $pays_arrive = mysqli_real_escape_string($conn,$pays_arrive1);
    //     $date_vol = mysqli_real_escape_string($conn,$date_vol1);
    //     $hour_vol = mysqli_real_escape_string($conn,$hour_vol1);
    //     $minute_vol = mysqli_real_escape_string($conn,$minute_vol1);
    //     $nb_place_initial = mysqli_real_escape_string($conn,$nb_place_initial1);
    //     $statu_vol = 'active';
        



    //     $action_control = $_SESSION['action_control'];
    //     $sql = "INSERT INTO `vols`(`nam`, `price`, `image`, `pays_depart`, `pays_arrive`, `date_vol`, `hour_vol`, `minute_vol`, `nb_place_initial`, `nb_place_rest`, `statu_vol`, `id_admin_created`) VALUES ('{$nam_voll}',{$price},'{$image}','{$pays_depart}','{$pays_arrive}','{$date_vol}','{$hour_vol}','{$minute_vol}','{$nb_place_initial}','{$nb_place_initial}','{$statu_vol}',{$id_admin_created})";
    //     if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
    //         $_SESSION['msg']=succes_msg_vol();
    //         redirect("admin.php");
    //     }else{

    //         $_SESSION['msg']=error_msg_vol();
    //         redirect("add_vol.php");
    //         // header("Location:create_menu.php");
    //         // exit();
    //     }









    // }else{
    //     redirect("add_vols.php");
    //     // header("Location:create_menu.php");
    //     // exit();
    // }

?>