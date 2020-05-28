<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['id_client']==null){
        header('Location:'.'index.php');
        exit();
       
    }
    if($_SESSION['passager_exist'] == null){
        header('Location:'.'index.php');
        exit();
    }
?>
<?php 
    // include("../includes/layout/public_theme/header.php");
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php"); 
    include_once("../includes/functions.php");
    include_once("../includes/session.php"); 
    
    
?>
<?php
    // $id_v=(int)isset($_GET['id_v']) ? $_GET['id_v'] : die('ERROR: Record id_v not found.');
    $id_v = $_SESSION['id_voll'];
    $type=(int)isset($_GET['type']) ? $_GET['type'] : die('ERROR: Record type not found.');
    $id_admin_created = $_SESSION['id_client'];
    $test_type = $_SESSION['passager_exist'];
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <title>Hello, world!</title>
        <style>
            .chois_name{
                border: none;
                padding: 2px 40px;
                border-radius: 10px;
                -moz-box-shadow: -5px 18px 54px 29px rgba(127,140,141,1);
                -webkit-box-shadow: -7px 2px 12px 14px rgba(127,140,141,0.99);
                -moz-box-shadow: -7px 2px 12px 14px rgba(127,140,141,0.99);
                box-shadow: 0px 2px 7px 8px rgba(127,140,141,0.99);
                background-color: white;
                margin-left: 30px;
                outline: none;
                color: #C13584;
            }
            .chois_name:hover{
                background-color: #C13584;
                color: white;
            }
        </style>
        <script  type="text/javascript">
            function choix_vol_famille(){
                document.getElementById("nam_voll").value = "Voyage en famille";
            }
            function choix_vol_travel(){
                document.getElementById("nam_voll").value = "Voyage de travel";
            }
            function testNombrePlace(){
                // var nbrPlass = document.getElementById("nb_place_initial").value;
                // var nbrPlassRest = document.getElementById("nb_place_rest").value;
                // if(nbrPlass == nbrPlassRest){
                    alert 'cc';
            //     }
            // }
        </script>
    </head>
    <body>

        <!-- start navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">T-aér</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vos_vols.php">Vos vols</a>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                     <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <?php echo msg();?>
                    <!-- errer fichkeel -->
                    <?php 
                        $errors = err();
                    ?> 
                    <?php 
                        error_function($errors);
                    ?>
                </div>
            </div>
        </div>

        <!-- end navbar -->
        <center>
            <h1>Admin / <span>Reserver une Vol</span></h1>
        </center>
        <div>
            <?php
                // echo '<h1> Wolcom :' . $_SESSION['nom_client'] . ' - ' . $_SESSION['prenom_client'];
            ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                </div>
                <div class="col-sm">
                <center>
                    <?php
                        echo '<h3 class="ml-4"> welcome :' . $_SESSION['nom_client'] . ' - ' . $_SESSION['prenom_client'] . '</h3>';
                    ?>
                </center>
                </div>
            </div>
        </div>
        <hr>
        <?php
            echo '<h1> ID Voll : '.$id_v.'</h1>';
            echo '<br>';
            echo '<h1> TYPE : '.$type.'</h1>';
        ?>


        
                <?php
                    if ($type == 1 && $test_type === 'Validation@Type$1'){
                        echo "
                        <div class='container shadow-lg p-3 mt-5 mb-5 bg-white rounded'>
                            <h1 class='text-center mt-5'>Formuler Vol</h1>
                            <h3 class='text-center mt-5'>Verifier c'est formulaire</h3>
                            <div class='row mb-5 mt-5'>
                                <div class='col-md-1 order-md-1'></div>
                                <div class='col-md-10 order-md-1'>
                                    <form class='needs-validation' method='POST' action='confermation_reservation_submit2.php'>";
                                        $query0 = "SELECT * FROM `vols` WHERE `vols`.`id_vol` = $id_v AND `vols`.`statu_vol` = 'active'";
                                        $result0 = mysqli_query($conn,$query0);
                                        if(mysqli_num_rows($result0) >0){
                                            while($row0 = mysqli_fetch_assoc($result0)){
                                                $heurMinut = mysqli_real_escape_string($conn,$row0['hour_vol']) .'h ' .mysqli_real_escape_string($conn,$row0["minute_vol"]) .'min';
                                                $place_initial = mysqli_real_escape_string($conn,$row0['nb_place_initial']);
                                                $place_reste = mysqli_real_escape_string($conn,$row0['nb_place_rest']);
                                                $place_reste = $place_reste - 1;
                                                $num_plass = $place_initial - $place_reste;
                                                echo "<h4> Nmbre de polass initial : ".$place_initial." </h4>";
                                                echo "<h4> Nmbre de polass rester : ".$place_reste." </h4>";
                                                echo "<h4> votre polass : ".$num_plass." </h4>";
                                                echo "<h4> id vol : ".$_SESSION['id_voll']."</h4>";

                                                echo "
                                                    <div class='border border-dark mb-4'>
                                                        <div class='mb-3'>
                                                            <center><h2>Information De Voll</h2></center>
                                                            
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <h3>". mysqli_real_escape_string($conn,$row0["nam"]) ."</h3>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <h3><strong> ID Voll : </strong> ". $id_v ."</h3>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Vill De Depart : </label>
                                                                <input type='text' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["pays_depart"]) . " disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Vill D'arive : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Minute_vol' value=" . mysqli_real_escape_string($conn,$row0["pays_arrive"]) . " disabled>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Date voll : </label>
                                                                <input type='date' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["date_vol"]) . " disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Heur Voll : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Minute_vol' value=' $heurMinut' disabled>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Numero de plass : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Nombre De Plasse' value='  $num_plass  ' disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Prix : </label>
                                                                <input type='number' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["price"]) . " disabled>
                                                            </div>
                                                        </div><br>
                                                    </div>";

                                                    $cin_user = NULL;
                                                    $query1 = "SELECT `cin` FROM `user` WHERE `user`.`id` = $id_admin_created";
                                                    $result1 = mysqli_query($conn,$query1);
                                                    if(mysqli_num_rows($result1) >0){
                                                        while($row1 = mysqli_fetch_assoc($result1)){
                                                            $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
                                                        }
                                                        $query2 = "SELECT p.* FROM `passager` p,`user` u WHERE u.`id` = p.`id_user_created` AND u.`cin` = p.`cin_passager` AND u.`id` = $id_admin_created AND u.`cin` = '$cin_user'";
                                                        // $query2 = "SELECT * FROM `passager` WHERE `passager`.`cin_passager` =  '$cin_user'";
                                                        $result2 = mysqli_query($conn,$query2);
                                                        if(mysqli_num_rows($result2) >0){
                                                            while($row2 = mysqli_fetch_assoc($result2)){
                                                                // $_SESSION['passager_exist'] = 'Validation@Type$1';
                                                                $_SESSION["id_passager"] = mysqli_real_escape_string($conn,$row2["id_passager"]);
                                                                
                                                                echo "
                                                                    <h2> id passager : ".$_SESSION["id_passager"]."</h2>
                                                                    <div class='mb-3'>
                                                                        <center><h2>Information De Passager</h2></center>
                                                                        
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Nom De Passager :</label>
                                                                        <input type='text' name='nom_passager' class='form-control' id='nom_passager' placeholder='Nom De Passager' value=" . mysqli_real_escape_string($conn,$row2["nom_passager"]) . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Prenom De Passager :</label>
                                                                        <input type='text' name='prenom_passager' class='form-control' id='prenom_passager' placeholder='Prenom De Passager' value=" . mysqli_real_escape_string($conn,$row2["prenom_passager"]) . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Date de naissance :</label>
                                                                        <input type='date' name='date_de_naissance' class='form-control' id='date_de_naissance' placeholder='Date De Naissance De Passager'  value=" . mysqli_real_escape_string($conn,$row2["date_de_naissance"]) . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='example-tel-input'>Telephone :</label>
                                                                        <input type='number' name='phone_passager' class='form-control' id='phone_passager' placeholder='Telephone' value=" . mysqli_real_escape_string($conn,$row2["phone_passager"]) . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Email :</label>
                                                                        <input type='text' name='email_passager' class='form-control' id='email_passager' placeholder='Email' value=" . mysqli_real_escape_string($conn,$row2["email_passager"]) . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Cin :</label>
                                                                        <input type='text' name='cin_passager' class='form-control' id='cin_passager' placeholder='Cin' value=". mysqli_real_escape_string($conn,$row2["cin_passager"]) ." disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Numero De Passport :</label>
                                                                        <input type='text' name='n_passport' class='form-control' id='n_passport' placeholder='Numero De Passport' value=". mysqli_real_escape_string($conn,$row2["n_passport_passager"]) ." disabled>
                                                                    </div><br>
                                            
                                                                    
                                                                    
                                            
                                            
                                                                    <hr class='mb-4'>
                                            
                                                                
                                                                    <div class='row'>
                                                                        <div class='col-sm-6'>
                                                                            <center>
                                                                                <a href='confermation_reservation2.php?id_v=$id_v&&type=1' class='btn btn-outline-success btn-lg btn-block'>Modifier Les Information</a>
                                                                            </center>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <center>
                                                                                <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Confermer La Reservation</button>
                                                                                
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                ";           
                                                            }
                                                        }else {
                                                            $_SESSION['msg']=error_msg(' You can not Get tour information ');
                                                            // <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Resserver Le Voll</button>
                                                            // <a href='confermation_reservation.php?id_v=$id_v&&type=2' class='btn btn-outline-success btn-lg btn-block'>Confermer La Reservation</a>
                                                            // $_SESSION['passager_exist'] == null;
                                                            // redirect("Location:'.'confermation_reservation.php?id_v='.$id_v.'&&type='.$type.'");
                                                            header("Location:'.'reserve2.php?id_v='.$id_v.'");
                                                            exit();
                                                        }
                                                    }else{
                                                        $_SESSION['id_client']==null;
                                                        redirect("Location:'.'index.php");
                                                    }
                                                
                                            }
                                        }else {
                                            $_SESSION['msg']=error_msg(' You can not Get thes voll ');
                                            header("Location:'.'reserve2.php?id_v='.$id_v.'");
                                            exit();
                                        }
                                        
                                    echo "
                                    </form>
                                </div>
                                <div class='col-md-1 order-md-1'>
                                </div>
                            </div>
                        </div>"; 
                    }else if ($type == 3 && $test_type === 'Validation@Type$2'){
                        echo "
                        <div class='container shadow-lg p-3 mt-5 mb-5 bg-white rounded'>
                            <h1 class='text-center mt-5'>Formuler Vol</h1>
                            <h3 class='text-center mt-5'>Verifier c'est formulaire</h3>
                            <div class='row mb-5 mt-5'>
                                <div class='col-md-1 order-md-1'></div>
                                <div class='col-md-10 order-md-1'>
                                    <form class='needs-validation' method='POST' action='confermation_reservation_submit2.php'>";
                                        $query0 = "SELECT * FROM `vols` WHERE `vols`.`id_vol` = $id_v AND `vols`.`statu_vol` = 'active'";
                                        $result0 = mysqli_query($conn,$query0);
                                        if(mysqli_num_rows($result0) >0){
                                            while($row0 = mysqli_fetch_assoc($result0)){
                                                $heurMinut = mysqli_real_escape_string($conn,$row0['hour_vol']) .'h ' .mysqli_real_escape_string($conn,$row0["minute_vol"]) .'min';
                                                $place_initial = mysqli_real_escape_string($conn,$row0['nb_place_initial']);
                                                $place_reste = mysqli_real_escape_string($conn,$row0['nb_place_rest']);
                                                $place_reste = $place_reste - 1;
                                                $num_plass = $place_initial - $place_reste;
                                                echo "<h4> Nmbre de polass initial : ".$place_initial." </h4>";
                                                echo "<h4> Nmbre de polass rester : ".$place_reste." </h4>";
                                                echo "<h4> votre polass : ".$num_plass." </h4>";
                                                echo "<h4> id vol : ".$_SESSION['id_voll']."</h4>";

                                                echo "
                                                    <div class='border border-dark mb-4'>
                                                        <div class='mb-3'>
                                                            <center><h2>Information De Voll</h2></center>
                                                            
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <h3>". mysqli_real_escape_string($conn,$row0["nam"]) ."</h3>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <h3><strong> ID Voll : </strong> ". $id_v ."</h3>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Vill De Depart : </label>
                                                                <input type='text' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["pays_depart"]) . " disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Vill D'arive : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Minute_vol' value=" . mysqli_real_escape_string($conn,$row0["pays_arrive"]) . " disabled>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Date voll : </label>
                                                                <input type='date' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["date_vol"]) . " disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Heur Voll : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Minute_vol' value=' $heurMinut' disabled>
                                                            </div>
                                                        </div><br>
                                                        <div class='row'>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Numero de plass : </label>
                                                                <input type='text' name='minute_vol' class='form-control' id='minute_vol' placeholder='Nombre De Plasse' value='  $num_plass  ' disabled>
                                                            </div>
                                                            <div class='col-md-6 mb-3'>
                                                                <label for='text'>Prix : </label>
                                                                <input type='number' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row0["price"]) . " disabled>
                                                            </div>
                                                        </div><br>
                                                    </div>";

                                                    $cin_user = NULL;
                                                    $query1 = "SELECT * FROM `user` WHERE `user`.`id` = $id_admin_created";
                                                    $result1 = mysqli_query($conn,$query1);
                                                    if(mysqli_num_rows($result1) >0){
                                                        while($row1 = mysqli_fetch_assoc($result1)){
                                                            $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
                                                            // $_SESSION['cin_user'] = mysqli_real_escape_string($conn,$row1["cin"]);
                                                            $nom = mysqli_real_escape_string($conn,$row1["nom"]);
                                                            $prenom = mysqli_real_escape_string($conn,$row1["prenom"]);
                                                            $email = mysqli_real_escape_string($conn,$row1["email"]);
                                                            
                                                        }
                                                        $query2 = "SELECT p.* FROM `passager` p,`user` u WHERE u.`id` = p.`id_user_created` AND u.`cin` = p.`cin_passager` AND u.`id` = $id_admin_created AND u.`cin` = '$cin_user'";
                                                        // $query2 = "SELECT * FROM `passager` WHERE `passager`.`cin_passager` =  '$cin_user'";
                                                        $result2 = mysqli_query($conn,$query2);
                                                        if(mysqli_num_rows($result2) == 0){ 
                                                            // while($row2 = mysqli_fetch_assoc($result2)){
                                                                // $_SESSION['passager_exist'] = 'Validation@Type$1';
                                                                // $_SESSION["id_passager"] = mysqli_real_escape_string($conn,$row2["id_passager"]);
                                                                
                                                                echo "
                                                                    <div class='mb-3'>
                                                                        <center><h2>Information De Passager</h2></center>
                                                                        
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Nom De Passager :</label>
                                                                        <input type='text' name='nom_passager' class='form-control' id='nom_passager' placeholder='Nom De Passager' value=" . $nom . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Prenom De Passager :</label>
                                                                        <input type='text' name='prenom_passager' class='form-control' id='prenom_passager' placeholder='Prenom De Passager' value=" . $prenom . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Date de naissance :</label>
                                                                        <input type='date' name='date_de_naissance' class='form-control' id='date_de_naissance' placeholder='Date De Naissance De Passager'  required>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='example-tel-input'>Telephone :</label>
                                                                        <input type='number' name='phone_passager' class='form-control' id='phone_passager' placeholder='Telephone' required>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Email :</label>
                                                                        <input type='text' name='email_passager' class='form-control' id='email_passager' placeholder='Email' value=" . $email . " disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Cin :</label>
                                                                        <input type='text' name='cin_passager' class='form-control' id='cin_passager' placeholder='Cin' value=". $cin_user ." disabled>
                                                                    </div><br>
                                                                    <div class='mb-3'>
                                                                        <label for='text'>Numero De Passport :</label>
                                                                        <input type='text' name='n_passport' class='form-control' id='n_passport' placeholder='Numero De Passport' required>
                                                                    </div><br>
                                            
                                                                    
                                                                    
                                            
                                            
                                                                    <hr class='mb-4'>
                                            
                                                                
                                                                    <div class='row'>
                                                                        <div class='col-sm-6'>
                                                                            <center>
                                                                                <a href='confermation_reservation2.php?id_v=$id_v&&type=1' class='btn btn-outline-success btn-lg btn-block'>Modifier Les Information</a>
                                                                            </center>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <center>
                                                                                <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Confermer La Reservation</button>
                                                                            </center>
                                                                        </div>
                                                                    </div>
                                                                ";           
                                                            // }
                                                        }else {
                                                            $_SESSION['msg']=error_msg(' all erdy exist ');
                                                            // <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Resserver Le Voll</button>
                                                            // <a href='confermation_reservation.php?id_v=$id_v&&type=2' class='btn btn-outline-success btn-lg btn-block'>Confermer La Reservation</a>
                                                            // $_SESSION['passager_exist'] == null;
                                                            // redirect("Location:'.'confermation_reservation.php?id_v='.$id_v.'&&type='.$type.'");
                                                            header("Location:'.'reserve2.php?id_v='.$id_v.'");
                                                            exit();
                                                        }
                                                    }else{
                                                        $_SESSION['id_client']==null;
                                                        redirect("Location:'.'index.php");
                                                    }
                                                
                                            }
                                        }else {
                                            $_SESSION['msg']=error_msg(' You can not Get thes voll ');
                                            header("Location:'.'reserve2.php?id_v='.$id_v.'");
                                            exit();
                                        }
                                    echo "
                                    </form>
                                </div>
                                <div class='col-md-1 order-md-1'>
                                </div>
                            </div>
                        </div>";
                    }else if ($type == 2 && $test_type === 'Validation@Type$3'){
                        $n_place = $_SESSION['nombre_plass_demande'];
                        for ($i=0; $i <$n_place ; $i++) { 
                            echo "
                            <div class='container shadow-lg p-3 mt-5 mb-5 bg-white rounded'>
                                <h1 class='text-center mt-5'>Formuler Vol</h1>
                                <h3 class='text-center mt-5'>Verifier c'est formulaire</h3>
                                <div class='row mb-5 mt-5'>
                                    <div class='col-md-1 order-md-1'></div>
                                    <div class='col-md-10 order-md-1'>
                                        <form class='needs-validation' method='POST' action='confermation_reservation_submit2.php'>
                        
                                            <h1>cc<h1>";
                                            echo "<br><h1>info form ".$i."/".$n_place."</h1><br>";
                                        echo "
                                        </form>
                                    </div>
                                    <div class='col-md-1 order-md-1'>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                ?>
                
                <?php



                            //     $cin_user = NULL;
                            //     $query1 = "SELECT `cin` FROM `user` WHERE `user`.`id` = $id_admin_created";
                            //     $result1 = mysqli_query($conn,$query1);
                            //     if(mysqli_num_rows($result1) >0){
                            //         while($row1 = mysqli_fetch_assoc($result1)){
                            //             $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
                            //         }
                            //         $query2 = "SELECT * FROM `passager` WHERE `passager`.`cin_passager` =  '$cin_user'";
                            //         $result2 = mysqli_query($conn,$query2);
                            //         if(mysqli_num_rows($result2) >0){
                            //             while($row2 = mysqli_fetch_assoc($result2)){
                            //                 $_SESSION['passager_exist'] = 'Validation@Type$1';
                                            
                            //                 echo "
                                                
                            //                     <div class='mb-3'>
                            //                         <center><h2>Information De Passager</h2></center>
                                                    
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Nom De Passager :</label>
                            //                         <input type='text' name='nom_passager' class='form-control' id='nom_passager' placeholder='Nom De Passager' value=" . mysqli_real_escape_string($conn,$row2["nom_passager"]) . " disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Prenom De Passager :</label>
                            //                         <input type='text' name='prenom_passager' class='form-control' id='prenom_passager' placeholder='Prenom De Passager' value=" . mysqli_real_escape_string($conn,$row2["prenom_passager"]) . " disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Date de naissance :</label>
                            //                         <input type='date' name='date_de_naissance' class='form-control' id='date_de_naissance' placeholder='Date De Naissance De Passager'  value=" . mysqli_real_escape_string($conn,$row2["date_de_naissance"]) . " disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='example-tel-input'>Telephone :</label>
                            //                         <input type='number' name='phone_passager' class='form-control' id='phone_passager' placeholder='Telephone' value=" . mysqli_real_escape_string($conn,$row2["phone_passager"]) . " disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Email :</label>
                            //                         <input type='text' name='email_passager' class='form-control' id='email_passager' placeholder='Email' value=" . mysqli_real_escape_string($conn,$row2["email_passager"]) . " disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Cin :</label>
                            //                         <input type='text' name='cin_passager' class='form-control' id='cin_passager' placeholder='Cin' value=". mysqli_real_escape_string($conn,$row2["cin_passager"]) ." disabled>
                            //                     </div><br>
                            //                     <div class='mb-3'>
                            //                         <label for='text'>Numero De Passport :</label>
                            //                         <input type='text' name='n_passport' class='form-control' id='n_passport' placeholder='Numero De Passport' value=". mysqli_real_escape_string($conn,$row2["n_passport_passager"]) ." disabled>
                            //                     </div><br>
                        
                                                
                                                
                        
                        
                            //                     <hr class='mb-4'>
                        
                                            
                            //                     <div class='row'>
                            //                         <div class='col-sm-6'>
                            //                             <center>
                            //                                 <a href='confermation_reservation2.php?id_v=$id_v&&type=1' class='btn btn-outline-success btn-lg btn-block'>Modifier Les Information</a>
                            //                             </center>
                            //                         </div>
                            //                         <div class='col-sm-6'>
                            //                             <center>
                            //                                 <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Confermer La Reservation</button>
                                                            
                            //                             </center>
                            //                         </div>
                            //                     </div>
                            //                 ";           
                            //             }
                            //         }else {
                            //             $_SESSION['msg']=error_msg(' You can not Get tour information ');
                            //             // <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit'>Resserver Le Voll</button>
                            //             // <a href='confermation_reservation.php?id_v=$id_v&&type=2' class='btn btn-outline-success btn-lg btn-block'>Confermer La Reservation</a>
                            //             // $_SESSION['passager_exist'] == null;
                            //             // redirect("Location:'.'confermation_reservation.php?id_v='.$id_v.'&&type='.$type.'");
                            //             header("Location:'.'reserve.php?id_v='.$id_v.'");
                            //             exit();
                            //         }
                            //     }else {
                            //         $_SESSION['id_client']==null;
                            //         redirect("Location:'.'index.php");
                            //     }            
                            // // }
                            
                // </fprm>        
                ?>    
                </div>
                <div class='col-md-1 order-md-1'>
                </div>
            </div>
        </div>
        <hr>

        <!-- start container form -->

        

        <!-- end container form -->






















        

        <?php
            // $_SESSION['id_client']=null;
        ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>