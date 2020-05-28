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

    if(isset($_POST["submit"])){
        // $id = $_SESSION['id_client'];
        // $id1 = (int)$id;

        // $menu = checkEmpty(check_input($_POST["menu"]));
        // $rank = (int) $_POST["rank"];


        // $menu2 = mysqli_real_escape_string($conn,$menu);


        // if(!empty($errors)){
        //     $_SESSION['errors']= $errors;
        //     redirect('edit_menu.php');
        // }


        // if(!empty($errors)){
        //     $_SESSION['errors']= $errors;
        //     redirect('edit_menu.php');
        // }

        $id_admin_created  = (int) $_SESSION['id_client'];
        // $nam_voll = $_POST["nam_voll"];
        // $price = $_POST["price"];
        // $image = $_POST["image"];
        // $pays_depart = $_POST["pays_depart"];
        // $pays_arrive = $_POST["pays_arrive"];
        // $date_vol = $_POST["date_vol"];
        // $hour_vol = $_POST["hour_vol"];
        // $minute_vol = $_POST["minute_vol"];
        // $nb_place_initial = $_POST["nb_place_initial"];



        $nam_voll1 = checkEmptyPage(check_input($_POST["nam_voll"]));
        $price1 = checkEmptyPage(check_input($_POST["price"]));
        $image1 = checkEmptyPage(check_input($_POST["image"]));
        $pays_depart1 = checkEmptyPage(check_input($_POST["pays_depart"]));
        $pays_arrive1 = checkEmptyPage(check_input($_POST["pays_arrive"]));
        $date_vol1 = checkEmptyPage(check_input($_POST["date_vol"]));
        $hour_vol1 = checkEmptyPage(check_input($_POST["hour_vol"]));
        $hour_vol1 = (int) $hour_vol1;
        $minute_vol1 = checkEmptyPage(check_input($_POST["minute_vol"]));
        $minute_vol1 = (int) $minute_vol1;
        $nb_place_initial1 = checkEmptyPage(check_input($_POST["nb_place_initial"]));
        $nb_place_initial1 = (int) $nb_place_initial1;




        $nam_voll = mysqli_real_escape_string($conn,$nam_voll1);
        $price = mysqli_real_escape_string($conn,$price1);
        $image = mysqli_real_escape_string($conn,$image1);
        $pays_depart = mysqli_real_escape_string($conn,$pays_depart1);
        $pays_arrive = mysqli_real_escape_string($conn,$pays_arrive1);
        $date_vol = mysqli_real_escape_string($conn,$date_vol1);
        $hour_vol = mysqli_real_escape_string($conn,$hour_vol1);
        $minute_vol = mysqli_real_escape_string($conn,$minute_vol1);
        $nb_place_initial = mysqli_real_escape_string($conn,$nb_place_initial1);
        $statu_vol = 'active';
        



        $action_control = $_SESSION['action_control'];
        $sql = "INSERT INTO `vols`(`nam`, `price`, `image`, `pays_depart`, `pays_arrive`, `date_vol`, `hour_vol`, `minute_vol`, `nb_place_initial`, `nb_place_rest`, `statu_vol`, `id_admin_created`) VALUES ('{$nam_voll}',{$price},'{$image}','{$pays_depart}','{$pays_arrive}','{$date_vol}','{$hour_vol}','{$minute_vol}','{$nb_place_initial}','{$nb_place_initial}','{$statu_vol}',{$id_admin_created})";
        if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            $_SESSION['msg']=succes_msg_vol();
            redirect("admin.php");
        }else{

            $_SESSION['msg']=error_msg_vol();
            redirect("add_vol.php");
            // header("Location:create_menu.php");
            // exit();
        }









    }else{
        redirect("add_vols.php");
        // header("Location:create_menu.php");
        // exit();
    }

?>