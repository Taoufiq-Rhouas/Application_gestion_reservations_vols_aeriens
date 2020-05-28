<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['id_client']==null){
        header('Location:'.'index.php');
        exit();
    }
    ob_start();
?>
<?php 
    // include("../includes/layout/public_theme/header.php");
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php"); 
    include_once("../includes/functions.php");
    include_once("../includes/session.php"); 
    
    
?>
<?php
    $id_v=(int)isset($_GET['id_v']) ? $_GET['id_v'] : die('ERROR: Record type not found.');
    $_SESSION['id_voll'] = $id_v;
    $id_admin_created = $_SESSION['id_client'];
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
            #form_info_user_passager{
                display: none;
            }
        </style>
        <script  type="text/javascript">
            function choix_vol_famille(){
                document.getElementById("nam_voll").value = "Voyage en famille";
            }
            function choix_vol_travel(){
                document.getElementById("nam_voll").value = "Voyage de travel";
            }
            // function testNombrePlace(){
                // var nbrPlass = document.getElementById("nb_place_initial").value;
                // var nbrPlassRest = document.getElementById("nb_place_rest").value;
                // if(nbrPlass == nbrPlassRest){
                    // alert 'cc';
            //     }
            // }
            function affForm(){
                document.getElementById("form_info_user_passager").style.display = "block";
            }
            function testnumber(){
                var placr_rest = document.getElementById("placr_rest").value;
                alert(placr_rest);
            }
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
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
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
            echo '<h1> ID Admin : '.$id_admin_created.'</h1>';
        ?>
        <hr>
        <?php
            $query = "SELECT `nb_place_rest` FROM `vols` WHERE `vols`.`id_vol` = $id_v";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) >0){
                while($row = mysqli_fetch_assoc($result)){
                    $rombre_plass_rest = mysqli_real_escape_string($conn,$row["nb_place_rest"]);
                }
            }

                    

            $cin_user = NULL;
            $query1 = "SELECT `cin` FROM `user` WHERE `user`.`id` = $id_admin_created";
            $result1 = mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1) >0){
                while($row1 = mysqli_fetch_assoc($result1)){
                    // echo '<h1> CIN Client : '.mysqli_real_escape_string($conn,$row1["cin"]).'</h1>';
                    $cin_user = mysqli_real_escape_string($conn,$row1["cin"]);
                    // $control = 1;
                }
                $query2 = "SELECT p.* FROM `passager` p,`user` u WHERE u.`id` = p.`id_user_created` AND u.`cin` = p.`cin_passager` AND u.`id` = $id_admin_created AND u.`cin` = '$cin_user'";
                // $query2 = "SELECT * FROM `passager` WHERE `passager`.`cin_passager` =  '$cin_user'";
                $result2 = mysqli_query($conn,$query2);
                if(mysqli_num_rows($result2) >0){
                    $_SESSION['passager_exist'] = 'Validation@Type$1';
                    echo "<h1>oui deja exist com passager</h1>";
                    echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <center>
                                        <a href='confermation_reservation2.php?id_v=$id_v&&type=1' class='btn btn-outline-success btn-lg btn-block'>lui mem deja</a>
                                    </center>
                                </div>
                                <div class='col-sm-6'>
                                    <center>
                                        <button onclick='affForm()' class='btn btn-outline-success btn-lg btn-block'>autre person</button>
                                    </center>
                                </div>
                            </div>
                        </div>";
                }else {
                    $_SESSION['passager_exist'] = 'Validation@Type$2';
                    echo "<h1>non pas exist com passager</h1>";
                    echo "
                        <div class='container'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <center>
                                        <a href='confermation_reservation2.php?id_v=$id_v&&type=3' class='btn btn-outline-success btn-lg btn-block'>lui mem deja</a>
                                    </center>
                                </div>
                                <div class='col-sm-6'>
                                    <center>
                                        <button onclick='affForm()' class='btn btn-outline-success btn-lg btn-block'>autre person</button>
                                       
                                    </center>
                                </div>
                            </div>
                        </div>";
                        // <a href='confermation_reservation2.php?id_v=$id_v&&type=4' class='btn btn-outline-success btn-lg btn-block'>autre person</a>
                        // <a href='confermation_reservation2.php?id_v=$id_v&&type=3' class='btn btn-outline-success btn-lg btn-block'>lui mem pas</a>
                }
            }else {
                $_SESSION['id_client']==null;
                redirect("Location:'.'index.php");
            }            
        ?>

        <!-- start container form -->
        <!-- <button onclick="affForm()" >aff</button> -->

        <div class="container shadow-lg p-3 mt-5 mb-5 bg-white rounded" id="form_info_user_passager">
            <h1 class="text-center mt-5">_</h1>
            <h3 class="text-center mt-5">_</h3>
            <div class="row mb-5 mt-5">
                <div class="col-md-1 order-md-1"></div>
                <div class="col-md-10 order-md-1">
                    <?php
                        if(isset($_POST['n_place'])){
                            $n_place = $_POST['n_place'];
                            if( $n_place > $rombre_plass_rest){
                                echo "frechtiha";
                            }else {
                                echo "mafrechtihach";
                                $_SESSION['nombre_plass_demande'] = $n_place;
                                // header('redirect:'.'confermation_reservation2.php?id_v=$id_v&&type=2');
                                // exit();
                                $_SESSION['passager_exist'] = 'Validation@Type$3';
                                header('location:'.'confermation_reservation2.php?id_v=$id_v&&type=2');
                                ob_enf_fluch();

                                
                            }
                        }
                    ?>
                    <form class="needs-validation" action='' method='POST' >
                        <h2>Information de Voll</h2><br> 

                        <div class="mb-3">
                            <label for="text">Nombre De Plass :</label><span>  (atontion nombre de plasss reste = <span id="placr_rest"><?php echo $rombre_plass_rest ?></span>)</span>
                            <input type="number" name="n_place" class="form-control" id="n_place"  placeholder="Nombre De Place" required>
                        </div><br>

                        <!-- <div class="mb-3">
                            <label for="text">Date de naissance :</label>
                            <input type="date" name="date_naissance" class="form-control" id="date_naissance" onkeyup="testnumber()" placeholder="Date De Voll" required>
                        </div><br>
                        <div class="mb-3">
                            <label for="example-tel-input">Telephone :</label>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Telephone" required>
                        </div><br> -->

                        <!-- <div class='container'>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <center>
                                        <a href='confermation_reservation2.php?id_v=$id_v&&type=3' class='btn btn-outline-success btn-lg btn-block'>lui mem deja</a>
                                    </center>
                                </div>
                                <div class='col-sm-6'>
                                    <center>
                                        <a href='confermation_reservation2.php?id_v=$id_v&&type=4' class='btn btn-outline-success btn-lg btn-block'>autre person</a>
                                    </center>
                                </div>
                            </div>
                        </div> -->


                        <hr class="mb-4">
                        
                        <!-- <a href='confermation_reservation2.php?id_v=$id_v&&type=2' class='btn btn-outline-success btn-lg btn-block'>Contuneuer 1</a> -->
                        <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit">Contuneuer test</button>
                    </form>
                </div>
                <div class="col-md-1 order-md-1">
                </div>
            </div>
        </div>

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