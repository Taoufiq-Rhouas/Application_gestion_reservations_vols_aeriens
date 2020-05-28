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
        <script>
            function choix_vol_famille(){
                document.getElementById("nam_voll").value = "Voyage en famille";
            }
            function choix_vol_travel(){
                document.getElementById("nam_voll").value = "Voyage de travel";
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
            <h1>Admin / <span>Add New Vol</span></h1>
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

        <!-- start container form -->

        <div class="container shadow-lg p-3 mt-5 mb-5 bg-white rounded">
            <h1 class="text-center mt-5">Veuillez Remplire Vos informations Pour reservez un Vol</h1>
            <div class="row mb-5 mt-5">
                <div class="col-md-1 order-md-1"></div>
                <div class="col-md-10 order-md-1">
                    <form class="needs-validation" method='POST' action='add_vol_submit.php'>
                        <h2>Information de Voll</h2><br> 
                        <!-- <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="text">Nom :</label>
                                <input type="text" name="nom_client" class="form-control" id="firstName" placeholder="First name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="text">Prenom :</label>
                                <input type="text" name="prenom_client" class="form-control" id="lastName" placeholder="Last name" required>
                            </div>
                        </div><br> -->






                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="text">Nom Voll :</label>
                                <input type="button" id="btn_vol_famille" class="chois_name" onclick="choix_vol_famille()" value="#Voyage en famille" >
                                <input type="button" id="btn_vol_travel" class="chois_name" onclick="choix_vol_travel()" value="#Voyage en travel" >
                            </div>
                            <div>
                                <input type="text" name="nam_voll" class="form-control" id="nam_voll" placeholder="Autre nom" required>
                            </div>
                        </div><br>

                        

                        <!-- <div class="mb-3">
                            <label for="text">Pays De Depart :</label>
                            <input type="text" name="cin_client" class="form-control" id="nam_voll" placeholder="Autre nom">
                        </div><br> -->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="text">Pays De Depart :</label>
                                <input type="text" name="pays_depart" class="form-control" id="pays_depart" placeholder="Pays De Depart" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="text">Pays De Arrive :</label>
                                <input type="text" name="pays_arrive" class="form-control" id="pays_arrive" placeholder="Pays De Arrive" required>
                            </div>
                        </div><br>

                        <div class="mb-3">
                            <label for="text">Date De Voll :</label>
                            <input type="date" name="date_vol" class="form-control" id="date_vol" placeholder="Date De Voll" required>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="text">Hour De Vol :</label>
                                <input type="number" name="hour_vol" class="form-control" id="hour_vol" placeholder="Hour De Vol" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="text">Minute_vol :</label>
                                <input type="number" name="minute_vol" class="form-control" id="minute_vol" placeholder="Minute_vol" required>
                            </div>
                        </div><br>

                        <div class="mb-3">
                            <label for="text">Nombre De plasse De Voll :</label>
                            <input type="number" name="nb_place_initial" class="form-control" id="nb_place_initial" placeholder="Nombre De plasse De Voll" required>
                        </div><br>



                        <div class="mb-3">
                            <label for="text">Price Voll :</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Price Voll" required>
                        </div><br>	



                        <!-- <div class="mb-3">
                            <label for="text">Cin :</label>
                            <input type="text" name="cin_client" class="form-control text-uppercase" id="cin" placeholder="CIN" required>
                        </div><br>
                        <div class="mb-3">
                            <label for="text">Numéro De Passeport :</label>
                            <input type="text" name="num_pasport" class="form-control" id="num_pasport" placeholder="Numéro De Passeport" required>
                        </div><br> -->
                        <!-- <div class="mb-3">
                            <label for="example-tel-input">Telephone :</label>
                            <input type="number" name="phon" class="form-control" id="example-tel-input" placeholder="Telephone" required>
                        </div><br> -->
                        <!-- <div class="mb-3">
                            <label for="text">Email :</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                        </div><br> -->


                        <div class="mb-3">
                            <label for="text">Image :</label>
                            <input type="text" name="image" class="form-control" id="image" placeholder="Image" required >
                        </div><br>
                        <hr class="mb-4">

                        <button class="btn btn-outline-success btn-lg btn-block" type="submit"  name="submit">Add New Voll</button>
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