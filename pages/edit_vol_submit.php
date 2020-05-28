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



    $id_admin_created  = (int) $_SESSION['id_client'];

    $type=isset($_GET['type']) ? $_GET['type'] : die('ERROR: Record type not found.');
    $id_v=isset($_GET['id_v']) ? $_GET['id_v'] : die('ERROR: Record id_v not found.');



    // $nam_voll1 = checkEmptyPage(check_input($_POST["nam_voll"]));
    // $price1 = checkEmptyPage(check_input($_POST["price"]));
    // $image1 = checkEmptyPage(check_input($_POST["image"]));
    // $pays_depart1 = checkEmptyPage(check_input($_POST["pays_depart"]));
    // $pays_arrive1 = checkEmptyPage(check_input($_POST["pays_arrive"]));
    // $date_vol1 = checkEmptyPage(check_input($_POST["date_vol"]));
    // $hour_vol1 = checkEmptyPage(check_input($_POST["hour_vol"]));
    // $hour_vol1 = (int) $hour_vol1;
    // $minute_vol1 = checkEmptyPage(check_input($_POST["minute_vol"]));
    // $minute_vol1 = (int) $minute_vol1;
    // $nb_place_initial1 = checkEmptyPage(check_input($_POST["nb_place_initial"]));
    // $nb_place_initial1 = (int) $nb_place_initial1;
    // $nb_place_rest = (int) $nb_place_rest;
    // $nb_place_rest = (int) $_POST["nb_place_initial"];




    // $nam_voll = mysqli_real_escape_string($conn,$nam_voll1);
    // $price = mysqli_real_escape_string($conn,$price1);
    // $image = mysqli_real_escape_string($conn,$image1);
    // $pays_depart = mysqli_real_escape_string($conn,$pays_depart1);
    // $pays_arrive = mysqli_real_escape_string($conn,$pays_arrive1);
    // $date_vol = mysqli_real_escape_string($conn,$date_vol1);
    // $hour_vol = mysqli_real_escape_string($conn,$hour_vol1);
    // $minute_vol = mysqli_real_escape_string($conn,$minute_vol1);
    // $nb_place_initial = mysqli_real_escape_string($conn,$nb_place_initial1);
    // $statu_vol = 'active';

    if($type == 1){
        $sql = " UPDATE `vols`,`user` SET `vols`.`statu_vol`='annule'  WHERE `vols`.`id_vol` = $id_v AND `user`.`id` = $id_admin_created AND  `vols`.`id_admin_created` = $id_admin_created ";
        if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
            $_SESSION['msg']=succes_msg('Voll update successfully');
            redirect("vos_vols.php");
        }else{
            $_SESSION['msg']=error_msg(' You can not Edit thes Volll');
            redirect('edit_vol.php?id_v='.$id_v);
        }
    }else if($type == 2){

        $nam_voll1 = checkEmptyPage(check_input($_POST["nam_voll"]));
        $price1 = checkEmptyPage(check_input($_POST["price"]));
        $image1 = checkEmptyPage(check_input($_POST["image"]));
        $pays_depart1 = checkEmptyPage(check_input($_POST["pays_depart"]));
        $pays_arrive1 = checkEmptyPage(check_input($_POST["pays_arrive"]));
        $date_vol1 = checkEmptyPage(check_input($_POST["date_vol"]));
        $statu_vol1 = checkEmptyPage($_POST["statu_vol"]);
        $hour_vol1 = checkEmptyPage(check_input($_POST["hour_vol"]));
        $hour_vol1 = (int) $hour_vol1;
        $minute_vol1 = checkEmptyPage(check_input($_POST["minute_vol"]));
        $minute_vol1 = (int) $minute_vol1;
        $nb_place_initial1 = checkEmptyPage(check_input($_POST["nb_place_initial"]));
        $nb_place_initial1 = (int) $nb_place_initial1;
        // $nb_place_rest1 = (int) $nb_place_rest;
        $nb_place_rest1 = (int) $_POST["nb_place_rest"];




        $nam_voll = mysqli_real_escape_string($conn,$nam_voll1);
        $price = mysqli_real_escape_string($conn,$price1);
        $image = mysqli_real_escape_string($conn,$image1);
        $pays_depart = mysqli_real_escape_string($conn,$pays_depart1);
        $pays_arrive = mysqli_real_escape_string($conn,$pays_arrive1);
        $statu_vol = mysqli_real_escape_string($conn,$statu_vol1);
        $date_vol = mysqli_real_escape_string($conn,$date_vol1);
        $hour_vol = mysqli_real_escape_string($conn,$hour_vol1);
        $minute_vol = mysqli_real_escape_string($conn,$minute_vol1);
        $nb_place_initial = mysqli_real_escape_string($conn,$nb_place_initial1);
        $nb_place_rest = mysqli_real_escape_string($conn,$nb_place_rest1);
        $statu_vol = 'active';

        echo " nb_place_initial ".$nb_place_initial;
        echo "<br>";
        echo "nb_place_rest".$nb_place_rest;
        echo "<br>";
        $nbr_plass = $_SESSION['nbr_plass'];
        if($nb_place_initial < $nbr_plass){
            echo "---------------------------------------<br>";
            echo "imposible becuse num place moins < de num rest";
            echo "<br>";
            echo " nb_place_initial ".$nb_place_initial;
            echo "<br>";
            echo "nb_place".$nbr_plass;
            echo "<br>";
            echo "---------------------------------------<br>";
            $_SESSION['msg']=error_msg(' imposible becuse num place moins < de num rest');
            redirect('edit_vol.php?id_v='.$id_v);


        }else if($nb_place_initial == $nbr_plass){
            echo "---------------------------------------<br>";
            echo "oui possible becuse num place equal = de num rest";
            echo "<br>";
            echo " nb_place_initialll ".$nb_place_initial;
            echo "<br>";
            echo "nb_place".$nbr_plass;
            echo "<br>";
            echo "calcul";
            echo "<br>";
            $n1 = $nb_place_initial;
            $n2 =  $nbr_plass;
            $r = (int)$n1 - (int)$n2;
            echo $r;
            echo "<br>---------------------------------------<br>";
            $sql =" UPDATE `vols` SET `nam`='{$nam_voll}',`price`={$price},`image`='{$image}',`pays_depart`='{$pays_depart}',`pays_arrive`='{$pays_arrive}',`date_vol`='{$date_vol}',`hour_vol`='{$hour_vol}',`minute_vol`='{$minute_vol}',`nb_place_initial`='{$nb_place_initial}',`nb_place_rest`={$r},`statu_vol`='{$statu_vol1}' WHERE `id_vol`= $id_v AND `id_admin_created` =  $id_admin_created";
            if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                $_SESSION['msg']=succes_msg('Voll update successfully');
                redirect("admin.php");
            }else{

                $_SESSION['msg']=error_msg(' You can not Edit thes Voll');
                redirect('edit_vol.php?id_v='.$id_v);
                // header("Location:create_menu.php");
                // exit();
            }


        }else if($nb_place_initial > $nbr_plass){

            echo "---------------------------------------<br>";
            echo "oui possible becuse num place grande > de num rest";
            echo "<br>";
            echo " nb_place_initial ".$nb_place_initial;
            echo "<br>";
            echo "nb_place_rest".$nb_place_rest;
            echo "<br>";
            echo "nombre de placce a get".$_SESSION['nbr_plass'];
            echo "<br>";
            echo "---------------------------------------<br>";
            echo ">>>>>>>>>>>>>> opperation";
            echo "<br>";
            // $nbr_plass = $_SESSION['nbr_plass'];
            $nb_place_rest2 = $nb_place_initial - $nbr_plass;
            echo ">>>>>>>>>>>>>> nb_place_rest2 = ".$nb_place_rest2;
            echo "<br>";

            $sql =" UPDATE `vols` SET `nam`='{$nam_voll}',`price`={$price},`image`='{$image}',`pays_depart`='{$pays_depart}',`pays_arrive`='{$pays_arrive}',`date_vol`='{$date_vol}',`hour_vol`='{$hour_vol}',`minute_vol`='{$minute_vol}',`nb_place_initial`='{$nb_place_initial}',`nb_place_rest`={$nb_place_rest2},`statu_vol`='{$statu_vol1}' WHERE `id_vol`= $id_v AND `id_admin_created` =  $id_admin_created";
            if(mysqli_query($conn,$sql) && mysqli_affected_rows($conn)>0){
                $_SESSION['msg']=succes_msg('Voll update successfully');
                redirect("admin.php");
            }else{

                $_SESSION['msg']=error_msg(' You can not Edit thes Voll');
                redirect('edit_vol.php?id_v='.$id_v);
                // header("Location:create_menu.php");
                // exit();
            }



            

        }

        // if(){

        // }

        // redirect('edit_vol.php?id_v='.$id_v);
    }else{
        
        $_SESSION['msg']=error_msg(' You can not Edit thes Voll');
        redirect('edit_vol.php?id_v='.$id_v);
    }



    // if(isset($_POST["submit"])){
        
    //     // $action_control = $_SESSION['action_control'];
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