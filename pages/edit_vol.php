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
    // include_once("../includes/functions.php");
    include_once("../data/connectdb.php"); 
    include_once("../includes/functions.php");
    include_once("../includes/session.php"); 
    
    
?>
<?php
    $id_v=(int)isset($_GET['id_v']) ? $_GET['id_v'] : die('ERROR: Record type not found.');
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
            <h1>Admin / <span>Modifier une Vol</span></h1>
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

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit">Modifier le Voll</button>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-outline-danger btn-lg btn-block" type="submit"  name="submit">Annuler le Voll</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="container bg-warning">
            <center><h1>vraiment mpdifier</h1></center>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit">non</a>
                </div>
                <div class="col-sm-6">
                    <?php
                        echo '<a href="edit_vol_submit.php?type=1&&id_v='.$id_v.'" class="btn btn-outline-danger btn-lg btn-block" type="submit"  name="submit">oui</a>';
                    ?>
                </div>
            </div>
        </div>

        <!-- start container form -->

        <div class="container shadow-lg p-3 mt-5 mb-5 bg-white rounded">
            <h1 class="text-center mt-5">Veuillez Remplire Vos informations Pour Modifier un Vol</h1>
            <div class="row mb-5 mt-5">
                <div class="col-md-1 order-md-1"></div>
                <div class="col-md-10 order-md-1">
                <?php
                    echo'
                        <form class="needs-validation" method="POST" action="edit_vol_submit.php?type=2&&id_v='.$id_v.'">
                            <h2>Information de Voll</h2><br> ';
                        
                            $query = "SELECT * FROM `vols`,`user` WHERE `vols`.`id_vol` = $id_v AND `user`.`id` = $id_admin_created AND  `vols`.`id_admin_created` = $id_admin_created";
                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) >0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $nombre_plass_initiale = mysqli_real_escape_string($conn,$row["nb_place_initial"]);
                                    $nb_place_reste = mysqli_real_escape_string($conn,$row["nb_place_rest"]);
                                    $nombre_de_place_reserve =  $nombre_plass_initiale - $nb_place_reste;
                                    $_SESSION['nbr_plass'] = $nombre_de_place_reserve; 
                                    $nam_v = mysqli_real_escape_string($conn,$row["nam"]);
                                    ?>

                                    
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="text">Nom Voll :</label>
                                                <input type="button" id="btn_vol_famille" class="chois_name" onclick=" document.getElementById('nam_voll').value = 'Voyage en famille' " value="Voyage en famille" >
                                                <input type="button" id="btn_vol_travel" class="chois_name" onclick=" document.getElementById('nam_voll').value = 'Voyage de travel' " value="Voyage en travel" >
                                            </div>
                                    <?php    echo"      
                                            <div>
                                                <input type='text' name='nam_voll' class='form-control' id='nam_voll' placeholder='Autre nom' value='$nam_v' required>
                                            </div>
                                        </div><br>
                                        
                                    
                                        <div class='row'>
                                            <div class='col-md-6 mb-3'>
                                                <label for='text'>Pays De Depart :</label>
                                                <input type='text' name='pays_depart' class='form-control' id='pays_depart' placeholder='Pays De Depart' value=" . mysqli_real_escape_string($conn,$row["pays_depart"]) . " required>
                                            </div>
                                            <div class='col-md-6 mb-3'>
                                                <label for='text'>Pays De Arrive :</label>
                                                <input type='text' name='pays_arrive' class='form-control' id='pays_arrive' placeholder='Pays De Arrive' value=" . mysqli_real_escape_string($conn,$row["pays_arrive"]) . " required>
                                            </div>
                                        </div><br>

                                        <div class='mb-3'>
                                            <label for='text'>Date De Voll :</label>
                                            <input type='date' name='date_vol' class='form-control' id='date_vol' placeholder='Date De Voll' value=" . mysqli_real_escape_string($conn,$row["date_vol"]) . " required>
                                        </div><br>

                                        <div class='row'>
                                            <div class='col-md-6 mb-3'>
                                                <label for='text'>Hour De Vol :</label>
                                                <input type='number' name='hour_vol' class='form-control' id='hour_vol' placeholder='Hour De Vol' value=" . mysqli_real_escape_string($conn,$row["hour_vol"]) . " required>
                                            </div>
                                            <div class='col-md-6 mb-3'>
                                                <label for='text'>Minute_vol :</label>
                                                <input type='number' name='minute_vol' class='form-control' id='minute_vol' placeholder='Minute_vol' value=" . mysqli_real_escape_string($conn,$row["minute_vol"]) . " required>
                                            </div>
                                        </div><br>

                                        <div class='mb-3'>
                                            <label for='text'>Nombre De plasse De Voll :</label>
                                            <input type='number' name='nb_place_initial' class='form-control' id='nb_place_initial' placeholder='Nombre De plasse De Voll' value=" . mysqli_real_escape_string($conn,$row["nb_place_initial"]) . " onkeyup='testNombrePlace()' required>
                                        </div><br>

                                        <div class='mb-3'>
                                            <label for='text'>Nombre De plasse Resster De Voll :</label>
                                            <input type='number' name='nb_place_rest' class='form-control' id='nb_place_rest' placeholder='Nombre De plasse De Voll' value=" . mysqli_real_escape_string($conn,$row["nb_place_rest"]) . " required>
                                        </div><br>



                                        <div class='mb-3'>
                                            <label for='text'>Price Voll :</label>
                                            <input type='text' name='price' class='form-control' id='price' placeholder='Price Voll' value=" . mysqli_real_escape_string($conn,$row["price"]) . " required>
                                        </div><br>	

                                        <div class='mb-3'>
                                            <label for='text'>Image :</label>
                                            <input type='text' name='image' class='form-control' id='image' placeholder='Image'  value=" . mysqli_real_escape_string($conn,$row["image"]) . " required >
                                        </div><br>
                                        
                                        <div class='mb-3'>
                                            <label for='text'>statu de vol :</label>
                                            <select name='statu_vol' id='statu_vol' class='form-control' required>";
                                                if (mysqli_real_escape_string($conn,$row["statu_vol"]) === 'active'){
                                                    echo"
                                                    <option value='active' selected >active</option>
                                                    <option value='annule'>annule</option>                                                
                                                    ";

                                                }else  if (mysqli_real_escape_string($conn,$row["statu_vol"]) === 'annule'){
                                                    echo"
                                                    <option value='active' selected >active</option>
                                                    <option value='annule' selected>annule</option>
                                                    ";
                                                }
                                            echo "
                                            </select>
                                        </div><br>
                                        
                                        <hr class='mb-4'>

                                        <button class='btn btn-outline-success btn-lg btn-block' type='submit'  name='submit' >Modifier le Voll</button>

                                    ";
                                }
                            }
                            // <input type='text' name='statu_vol' class='form-control' id='statu_vol' placeholder='Image'  value=" . mysqli_real_escape_string($conn,$row["statu_vol"]) . " required >
                         
                        echo"</form>";
                    ?> 
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